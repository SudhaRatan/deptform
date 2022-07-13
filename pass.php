<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Title Page-->
    <title>TECH CRESCITA</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <body>
        <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
            <div class="wrapper wrapper--w790">
                <div class="card card-5">
                    <div class="card-heading">
                        <h2 class="title">TECH CRESCITA LOGIN PAGE</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <center>
                                <div class="form-row">
                                    <div class="name">Enter your Phone Number</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="phone" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <button class="btn btn--radius-2 btn--red" type="submit">Proceed</button>


                                

                        </center>
                        </form>

</form>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->


<?php 

include('connection.php');
session_start();

// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $id=$_POST['id'];
//     $sql="select * from sub where id='$id'";
//     $result=mysqli_query($con,$sql);
//     $row=mysqli_fetch_array($result);
//     if(isset($row['id'])){
//     if($row['id']==$id){
//     $_SESSION['id']=$id;
//     echo $_SESSION['id'];
//     if($row['paid']=='YES'){
//         header('location:form1.php');
//     }else{
//         header('location:form2.php');

//     }
//     }}else{
//         header('location:error.html');
// }
// }


if($_SERVER['REQUEST_METHOD']=="POST"){
    $phone=$_POST['phone'];
    $id=$_SESSION['id'];
    $sql="select * from sub where phone='$phone' and id = '$id'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    if(isset($row['phone'])){
        $_SESSION['id']=$row['id'];
        $_SESSION['paid']=$row['paid'];
        echo $_SESSION['id'];
        $count=0;
        if($row['techtalk']=='techtalk'||$row['blindcoding']=='blindcoding'||$row['tresurehunt']=='tresurehunt'||$row['codingcontest']=='codingcontest'||$row['ipidea']=='ipidea'||$row['debate']=='debate'||$row['typingtest']=='typingtest'||$row['memorytest']=='memorytest'||$row['fastestfinger']=='fastestfinger'||$row['photography']=='photography'){
            $count=1;
        }
    if($count==1){
        header('location:pre.php');
        }else{
        if($row['paid']=='YES'){
            header('location:form1.php');
        }else{
            header('location:form2.php');
    
        }
        }}else{
            header('location:phn.php');
    } 
    }


?>

