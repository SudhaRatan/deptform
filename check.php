<?php 
include('connection.php');
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
$sql="select * from sub where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if($row['paid']=='YES'){
    header('location:form1.php');
}else{
    header('location:form2.php');
}}
else{
    header('location:error.html');
}
?>