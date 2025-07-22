<?php
require 'conn.php';

session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("Location: login.php");
    exit();
}

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get credentials from session
$number = $_SESSION['number'];
$user_password = $_SESSION['password'];

// Fetch user data
$sql = "SELECT id, name, balance ,transaction FROM usersdata WHERE `number` = '$number' AND `password` = '$user_password'";
$result = mysqli_query($conn, $sql);


if (!$result || mysqli_num_rows($result) === 0) {
    die("Error fetching user data: " . mysqli_error($conn));
}

$userData = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet UI</title>
    <link rel="stylesheet" href="css/wallet.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .wallet-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .wallet-header {
            margin-bottom: 25px;
        }

        .profile {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .profile img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .profile-info h2 {
            font-size: 1.4rem;
            color: #2d3436;
        }

        .profile-info p {
            font-size: 0.9rem;
            color: #636e72;
        }

        .balance-card {
            background: #ffffff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .balance-card h3 {
            color: #636e72;
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .amount {
            font-size: 2.2rem;
            color: #2d3436;
            font-weight: 700;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 25px 0;
        }

        .action-btn {
            padding: 18px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: white !important;
        }

        .deposit {
            background: #2ecc71;
        }

        .withdraw {
            background: #e74c3c;
        }

        .transaction-history {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
        }

        .transaction-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .transaction-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .deposit-icon { background: #e8f6ee; color: #2ecc71; }
        .withdraw-icon { background: #fdedec; color: #e74c3c; }

        .transaction-details {
            flex-grow: 1;
        }

        .transaction-title {
            font-weight: 500;
            color: #2d3436;
        }

        .transaction-date {
            font-size: 0.85rem;
            color: #636e72;
        }

        .transaction-amount {
            font-weight: 600;
        }

        .quick-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 25px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .stat-title {
            color: #636e72;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2d3436;
        }

        

        .action-card {
            background: white;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
            cursor: pointer;
        }

        .action-card:active {
            transform: scale(0.98);
        }

        .action-card i {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="wallet-container">
        <div class="wallet-header">
            <div class="profile">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User Profile">
                <div class="profile-info">
                    <h2><?php echo htmlspecialchars($userData['name']); ?></h2>
                    <p>ID: <?php echo htmlspecialchars($userData['id']); ?></p>
                </div>
            </div>
            
            <div class="balance-card">
                <h3>Available Balance</h3>
                <p class="amount">₹<?php echo number_format($userData['balance'], 2); ?></p>
            </div>
        </div>
        
        <div class="action-buttons">
            <button class="action-btn deposit" onclick="window.location.href='deposit.php'">
                <i class="fas fa-plus-circle"></i> Deposit
            </button>
            <button class="action-btn withdraw" onclick="window.location.href='withdraw.php'">
                <i class="fas fa-minus-circle"></i> Withdraw
            </button>
        </div>

        <div class="quick-stats">
            <div class="stat-card">
                <div class="stat-title">Spend Today</div>
                <div class="stat-value">₹ --</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Total earning</div>
                <div class="stat-value">₹ --</div>
            </div>
        </div>

        <div class="transaction-history">
            <h3>Latest Transaction</h3>
            <div class="transaction-item">
                <div class="transaction-icon deposit-icon">
                    <i class="fas fa-rupee-sign"></i>
                </div>
                <div class="transaction-details">
                    <div class="transaction-title">UPI Deposit</div>
                    <div class="transaction-date">Today, 11:45 AM</div>
                </div>
                <div class="transaction-amount deposit-amount">₹<?php echo htmlspecialchars($userData['transaction']);  ?></div>
            </div>
        </div>

       
        </div>
    </div>
</body>
</html>