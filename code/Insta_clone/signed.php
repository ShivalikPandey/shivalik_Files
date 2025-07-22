<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<?php
require 'conn.php';
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){ 
    if(!isset($_SESSION['name'])){
        $name=$_POST['name'];
        $_SESSION['name']=$name;
        echo "<div id='body'><form id='form' action='signed.php' method='post'><label id='label'>Password</label><input type='password' class='details' name='password' minlength=5><div><input type='submit'  value='Next' class='buttoncl' id='button'></div></form><p style='font-size:2vmax; margin-top:2vmax; margin-bottom:5vh;'>Already have an account-<a href='login.php' style='text-decoration:none; font-size:2vmax; color:blue;''> login</a></p></div>";
       }
       elseif(isset($_SESSION['name']) && !isset($_SESSION['password'])){
          $password=$_POST['password'];
          $_SESSION['password']=$password;

          echo "<div id='body'><form id='form' action='signed.php' method='post'><label id='label'>Number</label><input type='number' class='details' name='number' min=1000000000 max=9999999999><div><input type='submit'  value='Next' class='buttoncl' id='button'></div></form><p style='font-size:2vmax; margin-top:2vmax; margin-bottom:5vh;'>Already have an account-<a href='login.php' style='text-decoration:none; font-size:2vmax; color:blue;''> login</a></p></div>";
       }
       elseif(isset($_SESSION['password']) && !isset($_SESSION['number'])){
        $number=$_POST['number'];
        $_SESSION['number']=$number;
        echo "<div id='body'><form id='form' action='signed.php' method='post'><label id='label'>dob</label><input type='date' class='details' name='dob'><div><input type='submit'  value='Next' class='buttoncl' id='button'></div></form><p style='font-size:2vmax; margin-top:2vmax; margin-bottom:5vh;'>Already have an account-<a href='login.php' style='text-decoration:none; font-size:2vmax; color:blue;''> login</a></p></div>";
       }
       elseif(isset($_SESSION['number']) && !isset($_SESSION['dob'])){
        $dob=$_POST['dob'];
        $_SESSION['dob']=$dob;
        echo "<div id='body'><form id='form' action='signed.php' method='post'><label id='label'>Email</label><input type='email' class='details' name='email'><div><input type='submit'  value='Next' class='buttoncl' id='button'></div></form><p style='font-size:2vmax; margin-top:2vmax; margin-bottom:5vh;'>Already have an account-<a href='login.php' style='text-decoration:none; font-size:2vmax; color:blue;''> login</a></p></div>";
       }
       elseif(isset($_SESSION['dob']) && !isset($_SESSION['email'])){
        $email=$_POST['email'];
        $name=$_SESSION['name'];
        $password=$_SESSION['password'];
        $number=$_SESSION['number'];
        $dob=$_SESSION['dob'];
        $sql2="SELECT * FROM `instatab` WHERE name='$name' AND password='$password' AND number=$number;";
        $result=mysqli_query($conn,$sql2);
        $num=mysqli_num_rows($result);
           if($num==1){
        echo "<script>alert('You already have an account');</script>";
        session_unset();
        session_destroy();
        echo "<h1 style='text-align:center; margin:3vmax; margin-top:15vh; color:red;'>Welcome to instagram<h1><p style='text-align:center; margin:vmax;'>Find the others follow them and make new friends</p><div style='text-align:center; margin:2vmax;'><a href='login.php' >Continue to login</a></div><p style='text-align:center; margin:2vmax;'>Thank you.</p>";
        }
        else{
            $check="SELECT * FROM `instatab` WHERE password='$password'";
            $checkpass=mysqli_query($conn,$check);
            $passrow=mysqli_num_rows($checkpass);
           
              $checknum="SELECT * FROM `instatab` WHERE number=$number";
              $checknumber=mysqli_query($conn,$checknum);
              $numrows=mysqli_num_rows($checknumber);
            if($numrows==1 || $passrow==1){
                session_unset();
                session_destroy();
                echo "<script>alert('This number or password already exist pleasetry with another number or password');</script>";
                echo "<h1 style='text-align:center; margin:3vmax; margin-top:15vh; color:red;'>Try again to login<h1><p style='text-align:center; margin:vmax;'>click on the link to continue signup once again</p><div style='text-align:center; margin:2vmax;'><a href='login.php' >Signup</a></div><p style='text-align:center; margin:2vmax;'>Thank you.</p>";
                }
            else{
                $path="details/$name";
                if(file_exists($path)){
                    null;
                } 
                else{
                    mkdir("details/$name");
                }
                $sql="INSERT INTO `instatab` (`s.no`, `name`, `password`, `number`, `dob`, `email`, `datetime`) VALUES (NULL, '$name', '$password', '$number', '$dob', '$email', current_timestamp());";
                $result1=mysqli_query($conn,$sql);
                $imagetable="INSERT INTO `images` (`s.no`, `name`, `password`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`, `image11`, `image12`, `image13`, `image14`, `image15`, `image16`, `image17`, `image18`, `image19`, `image20`, `image21`, `image22`, `image23`, `image24`, `image25`, `image26`, `image27`, `image28`, `image29`, `image30`, `image31`, `image32`, `image33`, `image34`, `image35`, `image36`, `image37`, `image38`, `image39`, `image40`, `image41`, `image42`, `image43`, `image44`, `image45`, `image46`, `image47`, `image48`, `image49`, `image50`, `image51`, `image52`, `image53`, `image54`, `image55`, `image56`, `image57`, `image58`, `image59`, `image60`, `image61`, `image62`, `image63`, `image64`) VALUES (NULL, '$name', '$password', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
                $imagetablerun=mysqli_query($conn,$imagetable);
        
        
        
        echo "<script>alert('Your are successfully signup.now continue to login');</script>";
        session_unset();
        session_destroy();
        echo "<h1 style='text-align:center; margin:3vmax; margin-top:15vh; color:red;'>Welcome to instagram<h1><p style='text-align:center; margin:vmax;'>Find the others follow them and make new friends</p><div style='text-align:center; margin:2vmax;'><a href='login.php' >Continue to login</a></div><p style='text-align:center; margin:2vmax;'>Thank you.</p>";
        }
      }
    }
}
?>
    <script src="signup.js"></script>
</body>
</html>