<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="login">
       <h1>Instagram<h1>
        <form action="login.php" method="post">
            <div>
               <input type="text" placeholder="Username or number" class="form" name="username" minlength=5>
            </div>
            <input type="password" placeholder="Password" class="form" name="password" minlength=5>
            <div>
               <input type="submit" value="Log in" id="button">
            </div>
        </form>
       <a href="forget.php" style="text-decoration:none; font-size:2vmax; color:blue; margin-left:30vw;">Forgot password</a>
       <p style="font-size:2vmax; margin-top:2vmax; margin-bottom:5vh;">Don't have an account?<a href="signup.php" style="text-decoration:none; font-size:2vmax; color:blue;">Sign up</a></p>
    </div>
    <div>
        <?php
        $userexist=false;
        $login=true;
        require 'conn.php';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            session_start();
            $name=$_POST['username'];
            $password=$_POST['password'];
            $_SESSION['password']=$password;

            $verify="SELECT * FROM `instatab` WHERE name='$name'";
            $result=mysqli_query($conn,$verify);
            $row=mysqli_num_rows($result);
           /* $verifynum="SELECT * FROM `instatab` WHERE number='$name'";
            $resultnum=mysqli_query($conn,$verifynum);
            $rownum=mysqli_num_rows($resultnum);
             || $rownum==1
            */
            if($row==1){
                $userexist=true;
                $pass="SELECT * FROM `instatab` WHERE password='$password'";
                $resultpass=mysqli_query($conn,$pass);
                $passrow=mysqli_fetch_assoc($resultpass);

                /*$hashedpassword=password_hash($password,PASSWORD_DEFAULT);
                $verifypass="SELECT * FROM `instatab`";
                $resultpass=mysqli_query($conn,$verifypass);
                $rowpass=mysqli_num_rows($resultpass);
                $fetch=mysqli_fetch_assoc($resultpass);
                $hashedpass=$fetch['password'];
                $verified=password_verify($password,$hashedpass);*/
                if($passrow){
                    $login=true;
                    $_SESSION['username']=$name;
                    $_SESSION['login']=true;

                    header("location: welcome.php");
                }
                else{
                    echo "<div id='alertdanger'>you entered invalid password</div>";
                }
                /*if($rowpass==1){
                    echo "second";
                    $fetch=mysqli_fetch_assoc($resultpass);
                    $hashedpass=$fetch['password'];
                    if($hashedpassword==$hashedpass){
                        $verified=true;
                        session_start();
                        $_SESSION['username']=$name;
                        $_SESSION['password']=true;
                        echo "success";
                    }
                    else{
                        echo "something is wrong try again letter";
                    }
                }
                else{
                    echo "you entered invalid password";
                }*/
            }
            else{
                echo "<div id='alertnormal'>you entered invalid username or number</div>";
            }
        }
        ?>
    </div>
</body>
</html>
<?php
?>