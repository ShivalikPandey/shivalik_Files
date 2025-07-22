<?php
$userexist=false;
$login=true;
require 'conn.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    session_start();
    $number=$_POST['number'];
    $_SESSION['number']=$number;
    $password=$_POST['password']; // Added password field
    $_SESSION['password']=$password;
    $sqlfetch="SELECT * FROM `usersdata` WHERE number='$number' AND password='$password'"; // Added password check
    $result=mysqli_query($conn,$sqlfetch);
    $num=mysqli_num_rows($result);
    if($num==1){
        $login=true;
        $_SESSION['login']=true;
        header("Location: main.php");
        exit();
        }
    else{
        echo "<script>alert('You have entered wrong details or do not have an account, please signup first');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="index.php">
            <h2>Login Page</h2>
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <i class="fas fa-mobile-alt"></i>
                <input type="tel" id="phone" name="number" placeholder="Enter your phone number" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-btn">Log In</button>
            <p class="signup-text">Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>