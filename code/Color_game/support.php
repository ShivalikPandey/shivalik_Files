<?php
require 'conn.php';
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    // Fetch user data first
    $number = $_SESSION['number'];
    $password = $_SESSION['password'];
    
    $stmt = mysqli_prepare(
        $conn, 
        "SELECT * FROM usersdata WHERE number = ? AND password = ?"
    );
    mysqli_stmt_bind_param($stmt, "ss", $number, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $name = htmlspecialchars($row['name']);
        $user_id = $row['id'];
    } else {
        die("User not found");
    }

    // Handle POST requests after getting user data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (isset($input['message'])) {
            // Insert into support_queries table
            $insertStmt = mysqli_prepare(
                $conn,
                "INSERT INTO support_queries 
                (user_id, message, status, created_at) 
                VALUES (?, ?, 'pending', NOW())"
            );
            mysqli_stmt_bind_param($insertStmt, "is", $user_id, $input['message']);
            mysqli_stmt_execute($insertStmt);
            
            exit;
        }
    }
} else {
    die("Please login first");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Support Center</title>
    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #e0e7ff;
            --secondary: #f8fafc;
            --success: #10b981;
            --error: #ef4444;
            --text: #1e293b;
            --light-text: #64748b;
            --border: #cbd5e1;
        }

        body {
            font-family: 'Inter', sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #f8fafc;
        }

        .support-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .support-header {
            background: linear-gradient(135deg, var(--primary), #4f46e5);
            color: white;
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .support-header h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: -0.025em;
        }

        .support-header p {
            margin: 0.5rem 0 0;
            opacity: 0.9;
            font-size: 0.875rem;
        }

        .chat-container {
            height: 600px;
            display: flex;
            flex-direction: column;
        }

        .chat-messages {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
            background-color: var(--secondary);
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .message {
            max-width: 75%;
            padding: 0.875rem 1.25rem;
            border-radius: 1.25rem;
            line-height: 1.5;
            position: relative;
            animation: fadeIn 0.3s ease-out;
            font-size: 0.9375rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .user-message {
            background: var(--primary);
            color: white;
            margin-left: auto;
            border-bottom-right-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(99, 102, 241, 0.1);
        }

        .support-message {
            background: white;
            margin-right: auto;
            border: 1px solid var(--border);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .message-time {
            display: block;
            font-size: 0.75rem;
            margin-top: 0.5rem;
            opacity: 0.7;
        }

        .chat-input-area {
            padding: 1rem;
            background: white;
            border-top: 1px solid var(--border);
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .chat-input {
            flex: 1;
            padding: 0.75rem 1.25rem;
            border: 1px solid var(--border);
            border-radius: 1.5rem;
            font-size: 0.9375rem;
            transition: all 0.2s;
            background: var(--secondary);
        }

        .chat-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .send-btn {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .send-btn:hover {
            background: #4f46e5;
            transform: scale(1.05);
        }

        .send-btn:active {
            transform: scale(0.95);
        }

        .status-message {
            padding: 0.75rem;
            text-align: center;
            font-size: 0.875rem;
            background: var(--secondary);
            border-top: 1px solid var(--border);
        }

        .error {
            color: var(--error);
        }

        .success {
            color: var(--success);
        }

        .typing-indicator {
            display: flex;
            padding: 0.75rem 1rem;
            background: white;
            border-radius: 1.25rem;
            margin-right: auto;
            border: 1px solid var(--border);
            width: fit-content;
            gap: 0.5rem;
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
            animation: bounce 1.4s infinite ease-in-out;
        }

        @keyframes bounce {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-4px); }
        }
    </style>
</head>
<body>
    <div class="support-card">
        <div class="support-header">
            <h1>Premium Support</h1>
            <p>Welcome <?php echo $name; ?>, we're here to help!</p>
        </div>
        
        <div class="chat-container">
            <div class="chat-messages" id="chat-area">
                <div class="message support-message">
                    Hi <?php echo $name; ?>, how can we assist you today?
                    <span class="message-time"><?php echo date('h:i A'); ?></span>
                </div>
            </div>
            
            <form class="chat-input-area" onsubmit="return false">
                <input type="text" class="chat-input" id="user-message" placeholder="Type your message here..." autocomplete="off">
                <button type="button" class="send-btn" id="send-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 2L11 13"></path>
                        <path d="M22 2l-7 20-4-9-9-4 20-7z"></path>
                    </svg>
                </button>
            </form>
            
            <div id="status-message" class="status-message"></div>
        </div>
    </div>

    <script>
        document.getElementById('send-btn').addEventListener('click', sendMessage);
        document.getElementById('user-message').addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });

        async function sendMessage() {
            const messageInput = document.getElementById('user-message');
            const message = messageInput.value.trim();
            const statusDiv = document.getElementById('status-message');
            
            statusDiv.textContent = '';
            statusDiv.className = 'status-message';
            
            if (!message) {
                statusDiv.textContent = 'Please enter your message';
                statusDiv.classList.add('error');
                return;
            }
            
            // Display user message
            displayMessage(message, 'user-message');
            
            try {
                // Send POST request
                await fetch('support.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ message: message })
                });
            } catch (error) {
                console.error('Error:', error);
            }
            
            messageInput.value = '';
            
            // Show typing indicator
            const typingIndicator = document.createElement('div');
            typingIndicator.className = 'typing-indicator';
            typingIndicator.innerHTML = `
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            `;
            document.getElementById('chat-area').appendChild(typingIndicator);
            document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
            
            // Simulate response
            setTimeout(() => {
                typingIndicator.remove();
                const response = `Dear ${"<?php echo $name; ?>"}, we've received your message! Our team will contact you within 72 working hours.`;
                displayMessage(response, 'support-message');
                statusDiv.textContent = 'Message sent successfully';
                statusDiv.classList.add('success');
            }, 1500);
        }

        function displayMessage(message, className) {
            const chatArea = document.getElementById('chat-area');
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${className}`;
            
            messageDiv.innerHTML = `
                ${message}
                <span class="message-time">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
            `;
            
            chatArea.appendChild(messageDiv);
            chatArea.scrollTo({
                top: chatArea.scrollHeight,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>