
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
echo "<div id='body'><form id='form' action='fornum.php' method='post'><label id='label'>Number</label><input type='Number' class='details' name='number' min=1000000000 max=9999999999><div><input type='submit'  value='Next' class='buttoncl' id='button'></div></form></div>";
}
    elseif(isset($_SESSION['name']) && !isset($_SESSION['number'])){
       if(!isset($_SESSION['number'])){
    $number=$_POST['number'];
    $_SESSION['number']=$number;
    
    echo "<div id='body'><form id='form' action='fornum.php' method='post'><label id='label'>New pasword</label><input type='password' class='details' name='pass' minlength=5><div><input type='submit'  value='Next' class='buttoncl' id='button'></div></form></div>";
       }
      }
    
    elseif(isset($_SESSION['name']) && isset($_SESSION['number'])){
        $passforget=$_POST['pass'];
        $name=$_SESSION['name'];
        $number=$_SESSION['number'];
        $fetch="SELECT * FROM `instatab` WHERE name='$name' AND number=$number;";
        $fresult=mysqli_query($conn,$fetch);
        $rows=mysqli_num_rows($fresult);
        if($rows==1){ 
            $sql="UPDATE instatab SET password='$passforget' WHERE name='$name' AND number=$number;";
            $result=mysqli_query($conn,$sql);
            session_unset();
            session_destroy();
            echo "<script>alert('Your password updated successfuly');</script>";
            echo "<h1 style='text-align:center; margin:3vmax; margin-top:15vh; color:red;'>Welcome to instagram<h1><p style='text-align:center; margin:vmax;'>Find the others follow them and make new friends</p><div style='text-align:center; margin:2vmax;'><a href='login.php' >Continue to login</a></div><p style='text-align:center; margin:2vmax;'>Thank you.</p>";
        }
        else{
        echo "<script>alert('You are entered some wrong details');</script>";
        echo "<h1 style='text-align:center; margin:3vmax; margin-top:15vh; color:red;'>Try again<h1><p style='text-align:center; margin:vmax;'>After successful the proccess you can find the others follow them and make new friends</p><div style='text-align:center; margin:2vmax;'><a href='login.php' >Try again</a></div><p style='text-align:center; margin:2vmax;'>Thank you.</p>";
       }
       
    }
}
   ?>
</body>
</html>
<!--
    http://localhost/insta/login.php

    INSERT INTO `instatab` (`s.no`, `name`, `password`, `number`, `dob`, `email`, `datetime`) VALUES (NULL, 'shourav', '9411837404', '8266808125', '2003-11-15', 'shouravshivalik@gmail.com', current_timestamp());

     $number=$_POST['number'];
    $name=$_POST['name'];
    $sql="UPDATE instatab SET  password="" WHERE name='$name' AND number=$number";

/*    

require 'conn.php';
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
   if(!isset($_SESSION['name'])){
    $name=$_POST['name'];
    $_SESSION['name']=$name;
echo "<div id='body'><form id='form' action='fornum.php' method='post'><label id='label'>Number</label><input type='Number' class='details' name='number'><div><input type='submit'  value='Next' class='buttoncl' id='button'></div></form></div>";
}
elseif(isset($_SESSION['name'])){
    if(!isset($_SESSION['number'])){
    $number=$_POST['number'];
    $_SESSION['number']=$number;
    }
    echo "<div id='body'><form id='form' action='fornum.php' method='post'><label id='label'>New pasword</label><input type='password' class='details' name='pass'><div><input type='submit'  value='Next' class='buttoncl' id='button'></div></form></div>";
}
elseif($_SERVER['REQUEST_METHOD']=='POST' && isset($number)){
    $pass=$_POST['pass'];
    $sql='UPDATE instatab SET password="$pass" WHERE number=$number AND name="$name"';
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Your password updated successfuly');</script>";
    }
    else{
        echo "<script>alert('Your password are not updated successfuly.something is wrong');</script>";
    }
}
}
*/
-->