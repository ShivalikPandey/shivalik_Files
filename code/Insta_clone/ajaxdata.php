<?php
require 'conn.php';
session_start();
$path=$_SESSION['username'];
$password=$_SESSION['password'];
$selectsql="SELECT * FROM `images` WHERE name='$path' AND password='$password'";
$runselectsql=mysqli_query($conn,$selectsql);
$datas=array();
while($data=mysqli_fetch_assoc($runselectsql)){
   /* $x=1; 
    while($x<=64){
        $image=$data['image'.$x];
        $array=array_push($datas,$image);
     $x++;
    }*/
    $datas=$data;
}
echo json_encode($datas);
?>