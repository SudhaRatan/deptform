<?php 
include('connection.php');
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
$sql="select * from sub where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

?>

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

    <style>
        h4{
            color: #A200FF;
        }
        li{
            color:green;
        }
    </style>
<style>
    li{
        display:block;
    }
</style>
    <body>
        <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
            <div class="wrapper wrapper--w790">
                <div class="card card-5">
                    <div class="card-heading">
                        <h2 class="title">TECH CRESCITA LOGIN PAGE</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.html">
                            <center>
                                
                             <h3 style="COLOR:GREEN"><b>YOU HAVE SUCCESSFULLY REGISTRED FOR TECH CRESCITA</b></h3><br>
                             <h4>Name : <?php echo $row['name']; ?></h4><br>
                             <h4>Regd No : <?php echo $row['id']; ?></h4><br>
                             <h4>Phone No : <?php echo $row['phone']; ?></h4><br>
                             <h4>Email : <?php echo $row['email']; ?></h4><br>
                             <h4>Year : <?php echo $row['year']; ?></h4><br>
                             <h4>Section : <?php echo $row['section']; ?></h4><br>
                             <h4><ul> Events Participated : <li><?php echo $row['techtalk']; ?></li><li><?php echo $row['blindcoding']; ?></li><li><?php echo $row['treasurehunt']; ?></li><li><?php echo $row['codingcontest']; ?></li><li><?php echo $row['ipidea']; ?></li><li><?php echo $row['debate']; ?></li><li><?php echo $row['typingtest']; ?></li><li><?php echo $row['memorytest']; ?></li><li><?php echo $row['fastestfinger']; ?></li><li><?php echo $row['photography']; ?></li></ul></h4><br>
                             <button class="btn btn--radius-2 btn--red" type="submit">Goto Homepage</button><br><br>
                             <p style="font-size: 20px;">Submitted wrong information ?</p>
                             <a class="btn btn--red"  href='check.php'>Submit Again</a>


                        </center>
                        </form></div>

</form>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<?php 
// session_unset();
// session_destroy();

    }
    else{
        ?>
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

    <style>
        h4{
            color: #A200FF;
        }
        li{
            color:green;
        }
    </style>

    <body>
        <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
            <div class="wrapper wrapper--w790">
                <div class="card card-5">
                    <div class="card-heading">
                        <h2 class="title">TECH CRESCITA LOGIN PAGE</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.html">
                            <center>
                                
                             <h3 style="COLOR:GREEN"><b>Error Please try again</b></h3><br>
                            <button class="btn btn--radius-2 btn--red" type="submit">Goto Homepage</button>


                        </center>
                        </form></div>

</form>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
        <?php
    }
?>

    