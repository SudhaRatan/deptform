<?php 
include('connection.php');
session_start();
session_unset();
session_destroy();
if(isset($_SESSION['id'])){
    echo "Something went wrong";
}else{
    header('location:index.html');
}
?>