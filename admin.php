<?php
session_start();
include("connection.php");
if(isset($_SESSION['id'])){
    
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>home</title>
    <style>
        .filter{
            margin: 10px;
            padding: 1px 1px 1px 10px;
            display : inline-block;
        }
    </style>
</head>
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<div>
    
    <form method="POST" action="">
    Filter
    <select name="filter" onchange="this.form.submit()">
        <option value="" disabled selected>--select--</option>
        <option value="All">All</option>
        <option value="techtalk">TechTalk</option>
        <option value="blindcoding">Blind Coding</option>
        <option value="treasurehunt">Treasure Hunt</option>
        <option value="codingcontest">Coding Contest</option>
        <option value="ipidea">Idea/Project Expo</option>
        <option value="debate">Debate</option>
        <option value="typingtest">Typing Test</option>
        <option value="memorytest">Memory Test</option>
        <option value="fastestfinger">Fastest Finger</option>
        <option value="photography">Photography</option>


    </select>
    <a class="btn btn-primary" style="float:right;margin-right:10px;" href="cert.php" role="button">Certificates</a>
    <a class="btn btn-primary" style="float:right;margin-right:10px;" href="logout.php" role="button">logout</a>
    <a class="btn btn-primary" style="float:right;background-color:green" href="scripts/export.py" role="button">export</a>


    </form>

</div>

    <?php
                    // Include config file
                    // require_once "connection.php";
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db( $connection,"dept") or die("Unable to connect to MySQL"); 

                    //check for techtalk
                    if(isset($_POST["filter"])&& $_POST["filter"]=='techtalk'){

                    $sql = "select * from sub where techtalk<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Sno.</th>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";
                                        echo "<th>Paid</th>";


                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $count . "</td>";
                                        $count+=1;
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['techtalk'] . "</td>";
                                        echo "<td>" . $row['paid'] . "</td>";


                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                //blindcoding
                elseif(isset($_POST["filter"])&& $_POST["filter"]=='blindcoding'){

                    $sql = "select * from sub where blindcoding<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Sno.</th>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";

                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $count . "</td>";
                                    $count+=1;
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['blindcoding'] . "</td>";

                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                //treasurehunt
                elseif(isset($_POST["filter"])&& $_POST["filter"]=='treasurehunt'){

                    $sql = "select * from sub where treasurehunt<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Sno.</th>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";

                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $count . "</td>";
$count+=1;
                                        echo "<td>" . $row['id'] . "</td>";

                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['treasurehunt'] . "</td>";

                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                //coding contest
                elseif(isset($_POST["filter"])&& $_POST["filter"]=='codingcontest'){

                    $sql = "select * from sub where codingcontest<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Sno.</th>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";

                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $count . "</td>";
                                    $count+=1;
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['codingcontest'] . "</td>";

                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                ////ipidea
                elseif(isset($_POST["filter"])&& $_POST["filter"]=='ipidea'){

                    $sql = "select * from sub where ipidea<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Sno.</th>";                                      
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";

                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $count . "</td>";
$count+=1;
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['ipidea'] . "</td>";

                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                //debate
                elseif(isset($_POST["filter"])&& $_POST["filter"]=='debate'){

                    $sql = "select * from sub where debate<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Sno.</th>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";

                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $count . "</td>";
                                    $count+=1;
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['debate'] . "</td>";

                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                //typing test
                elseif(isset($_POST["filter"])&& $_POST["filter"]=='typingtest'){

                    $sql = "select * from sub where typingtest<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Sno.</th>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";

                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $count. "</td>";
                                    $count+=1;
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['typingtest'] . "</td>";

                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                //memorytest
                elseif(isset($_POST["filter"])&& $_POST["filter"]=='memorytest'){

                    $sql = "select * from sub where memorytest<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Sno.</th>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";

                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $count . "</td>";
                                    $count+=1;
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['memorytest'] . "</td>";

                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                //fastestfinger
                elseif(isset($_POST["filter"])&& $_POST["filter"]=='fastestfinger'){

                    $sql = "select * from sub where fastestfinger<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Sno.</th>";
                
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";

                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $count . "</td>";
                                    $count+=1;
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['fastestfinger'] . "</td>";

                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                //photography
                elseif(isset($_POST["filter"])&& $_POST["filter"]=='photography'){

                    $sql = "select * from sub where photography<>' '"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Sno.</th>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Dept</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Event</th>";

                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $count . "</td>";
                                    $count+=1;
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['dept'] . "</td>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['photography'] . "</td>";

                                        // echo "<td>";
                                        //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                elseif((isset($_POST["filter"])&& $_POST["filter"]=='All')||!isset($_POST["filter"])){

                        $sql = "select * from sub"; 
                        // Attempt select query execution
                        //$query = "SELECT * FROM users";
                        // $sql=mysql_query("select * from users",)or die(mysql_error());
                        if($result = mysqli_query($connection, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Sno.</th>";
                                            echo "<th>Id</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Phone</th>";
                                            echo "<th>Email</th>";
                                            echo "<th>Dept</th>";
                                            echo "<th>Year</th>";
                                            echo "<th>Section</th>";
                                            echo "<th>techtalk</th>";
                                            echo "<th>blindcoding</th>";
                                            echo "<th>tresurehunt</th>";
                                            echo "<th>codingcontest</th>";
                                            echo "<th>idea/project expo</th>";
                                            echo "<th>debate</th>";
                                            echo "<th>typing test</th>";
                                            echo "<th>memory test</th>";
                                            echo "<th>fastest finger</th>";
                                            echo "<th>photography</th>";

    
                                            // echo "<th>Action</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    $count=1;
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $count . "</td>";
                                            $count+=1;
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['phone'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['dept'] . "</td>";
                                            echo "<td>" . $row['year'] . "</td>";
                                            echo "<td>" . $row['section'] . "</td>";
                                            echo "<td>" . $row['techtalk'] . "</td>";
                                            echo "<td>" . $row['blindcoding'] . "</td>";
                                            echo "<td>" . $row['treasurehunt'] . "</td>";
                                            echo "<td>" . $row['codingcontest'] . "</td>";
                                            echo "<td>" . $row['ipidea'] . "</td>";
                                            echo "<td>" . $row['debate'] . "</td>";
                                            echo "<td>" . $row['typingtest'] . "</td>";
                                            echo "<td>" . $row['memorytest'] . "</td>";
                                            echo "<td>" . $row['fastestfinger'] . "</td>";
                                            echo "<td>" . $row['photography'] . "</td>";

    
                                            // echo "<td>";
                                            //     echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            //     echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            //     echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                            // echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                
//                                 $filename = "test.xls"; // File Name
// // Download file
// header("Content-Disposition: attachment; filename=\"$filename\"");
// header("Content-Type: application/vnd.ms-excel");
// $user_query = mysqli_query($connection,'select * from sub');
// // Write data to file
// $flag = false;
// while ($row1 = mysqli_fetch_array($user_query)) {
//     if (!$flag) {
//         // display field/column names as first row
//         echo implode("\t", array_keys($row1)) . "\r\n";
//         $flag = true;
//     }
//     echo implode("\t", array_values($row1)) . "\r\n";
// }
                    


// header("Content-Type: application/xls");    
// header("Content-Disposition: attachment; filename=filename.xls");  
// header("Pragma: no-cache"); 
// header("Expires: 0");

// $result=mysqli_query($con,'select * from sub');
// echo '<table border="1">';
// //make the column headers what you want in whatever order you want
// echo '<tr><th>name</th><th>id</th><th>phone</th></tr>';
// //loop the query data to the table in same order as the headers
// while ($row = mysqli_fetch_assoc($result)){
//     echo "<tr><td>".$row['name']."</td><td>".$row['id']."</td><td>".$row['phone']."</td></tr>";
// }
// echo '</table>';
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                

                    // Close connection
                    mysqli_close($connection);
                    ?>
</body>
</html>
                
            
    <?php
}    
else{
    echo "Login to continue";
    echo "<a class='btn btn-primary' href='index.html' role='button'>login</a>
    ";
}
?>

