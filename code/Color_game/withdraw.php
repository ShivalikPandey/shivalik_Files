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
$sql = "SELECT balance FROM usersdata WHERE `number` = '$number' AND `password` = '$user_password'";
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Withdraw Funds</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #3a1c71, #d76d77, #ffaf7b);
      background-size: 400% 400%;
      animation: gradientBG 15s ease infinite;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .withdrawal-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 2.5rem;
      border-radius: 20px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 500px;
      animation: fadeInUp 1s ease-out forwards;
      transform: translateY(30px);
      opacity: 0;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .title {
      text-align: center;
      font-size: 2.2rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 1.5rem;
      position: relative;
    }

    .title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background-color: #d76d77;
      border-radius: 5px;
    }

    .amount-input {
      position: relative;
      margin-bottom: 1.8rem;
    }

    .amount-input input {
      width: 100%;
      padding: 1.1rem 1.1rem 1.1rem 2.5rem;
      border: 2px solid #ccc;
      border-radius: 12px;
      font-size: 1.4rem;
      transition: 0.3s ease;
    }

    .amount-input input:focus {
      border-color: #d76d77;
      outline: none;
      box-shadow: 0 0 8px rgba(215, 109, 119, 0.3);
    }

    .currency {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.3rem;
      font-weight: 600;
      color: #d76d77;
    }

    .balance {
      text-align: center;
      font-size: 0.95rem;
      color: #666;
      margin-bottom: 1.5rem;
    }

    .quick-amounts {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 0.8rem;
      margin-bottom: 2rem;
    }

    .amount-btn {
      padding: 0.5rem 1.2rem;
      background: #fbe8e9;
      border: 2px solid #d76d77;
      border-radius: 10px;
      color: #d76d77;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .amount-btn:hover {
      background: #d76d77;
      color: #fff;
      transform: scale(1.05);
    }

    .withdraw-btn {
      width: 100%;
      padding: 1rem;
      font-size: 1.1rem;
      font-weight: 600;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #ff758c, #ff7eb3);
      color: white;
      cursor: pointer;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .withdraw-btn:hover {
      box-shadow: 0 10px 20px rgba(255, 117, 140, 0.3);
      transform: translateY(-2px);
    }

    .error-message,
    .success-message {
      text-align: center;
      margin-top: 1rem;
      font-weight: 500;
      display: none;
    }

    .error-message {
      color: #e74c3c;
      animation: shake 0.4s ease;
    }

    .success-message {
      color: #27ae60;
      animation: fadeIn 0.6s ease;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      75% { transform: translateX(5px); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @media (max-width: 500px) {
      .withdrawal-container {
        padding: 1.8rem;
      }
    }
  </style>
</head>
<body>

  <div class="withdrawal-container">
    <h1 class="title">Withdraw ₹ Funds</h1>

    <div class="amount-input">
      <input type="number" id="amount" placeholder="Minimum ₹500" min="500" />
      <div class="currency">₹</div>
    </div>

    <div class="balance">Available Balance: ₹<?php echo number_format($userData['balance']); ?></div>

    <div class="quick-amounts">
      <button class="amount-btn" onclick="setAmount(500)">₹500</button>
      <button class="amount-btn" onclick="setAmount(1000)">₹1,000</button>
      <button class="amount-btn" onclick="setAmount(2000)">₹2,000</button>
      <button class="amount-btn" onclick="setAmount(5000)">₹5,000</button>
    </div>

    <button class="withdraw-btn" onclick="handleWithdrawal()">Withdraw Now</button>
    <div class="error-message" id="errorMessage"></div>
    <div class="success-message" id="successMessage"></div>
  </div>

  <script>
    const MIN_AMOUNT = 500;
    const MAX_BALANCE = 25000;

    function setAmount(amount) {
      document.getElementById('amount').value = amount;
    }

    function handleWithdrawal() {
      const amountInput = document.getElementById('amount');
      const errorMessage = document.getElementById('errorMessage');
      const successMessage = document.getElementById('successMessage');
      const amount = parseFloat(amountInput.value);

      errorMessage.style.display = 'none';
      successMessage.style.display = 'none';

      if (!amount || amount < MIN_AMOUNT) {
        errorMessage.textContent = `⚠️ Minimum withdrawal is ₹${MIN_AMOUNT}.`;
        errorMessage.style.display = 'block';
        return;
      }

      if (amount > MAX_BALANCE) {
        errorMessage.textContent = "⚠️ Amount exceeds available balance.";
        errorMessage.style.display = 'block';
        return;
      }

      successMessage.textContent = "⏳ Processing withdrawal...";
      successMessage.style.display = 'block';

      setTimeout(() => {
        successMessage.textContent = "✅ Withdrawal successful! Funds will arrive shortly.";
        setTimeout(() => {
          successMessage.style.display = 'none';
          amountInput.value = '';
        }, 15000);
      }, 12000);
    }
  </script>

</body>
</html>
