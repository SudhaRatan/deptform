<?php 
session_start();
    include("connection.php");
$id=$_POST['id'];
$pass=$_POST['pass'];
$sql="select id,password from admin where id='$id' and password='$pass' ";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$res=mysqli_num_rows($result);
$_SESSION['id']=$id;
if($res==1){
    
    header("location:admin.php");
}



?>