<?php
require 'conn.php';
if($_SERVER['REQUEST_METHOD']=='POST'){ 

    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password']; // Added password field
  
    //fetching data to verify it is already exist or not
    $sqlfetch="SELECT * FROM `usersdata` WHERE email='$email' AND number='$number'";
    $result=mysqli_query($conn,$sqlfetch);
    $num=mysqli_num_rows($result);

    if($num==1){
        echo "<script>alert('you already have an account,please try to login');</script>";
        }
    else{
            $sqlinsert="INSERT INTO `usersdata` (`id`, `name`, `email`, `number`, `password`, `timestamp`) VALUES (NULL, '$name', '$email', '$number', '$password', current_timestamp());";
            $result1=mysqli_query($conn,$sqlinsert);
            
            if($result1){
                echo "<script>alert('Your are successfully signup.now continue to login');</script>";
              
            }
            else{
                echo "<script>alert('please try with different email or number or connect to administrater');</script>";
              
            }
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <!-- Background bubbles -->
    <div class="bg-bubble"></div>
    <div class="bg-bubble"></div>
    <div class="bg-bubble"></div>
    <div class="bg-bubble"></div>
    
    <div class="container">
        <div class="header">
            <h2>colorwin</h2>
            <p>Please register by your  phone number</p>
        </div>
        
        <form id="signup-form" method="POST" action="signup.php">
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" id="name" placeholder="Full Name" required>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-phone-alt"></i>
                    <input type="tel" name="number" id="mobile" placeholder="Mobile Number" required>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
            </div>
            <!--
            <div class="otp-section">
                <div class="otp-input-container">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                </div>
                <button type="button" class="otp-button" onclick="sendOtp()">
                    <i class="fas fa-paper-plane"></i> Send OTP
                </button>
            </div>
-->
            <button type="submit" class="submit-btn">
                <i class="fas fa-user-plus"></i> Submit
            </button>
            
        </form>
        
        <div class="footer">
            Already have an account? <a href="index.php">Login</a>
        </div>
    </div>
<script>
function handleOtpInput(e) {
    // Get the current input element
    const input = e.target;
    
    // If input is not empty and there's a next sibling input
    if (input.value && input.nextElementSibling && input.nextElementSibling.classList.contains('otp-input')) {
        input.nextElementSibling.focus(); // Move to next input
    }
    
    // If backspace is pressed and input is empty and there's a previous sibling input
    if (e.key === 'Backspace' && !input.value && input.previousElementSibling && input.previousElementSibling.classList.contains('otp-input')) {
        input.previousElementSibling.focus(); // Move to previous input
    }
}

// Add event listeners to all OTP inputs
document.addEventListener('DOMContentLoaded', function() {
    const otpInputs = document.querySelectorAll('.otp-input');
    otpInputs.forEach(input => {
        input.addEventListener('input', handleOtpInput);
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace') {
                handleOtpInput(e);
            }
        });
    });
});
</script>

    
</body>
</html>