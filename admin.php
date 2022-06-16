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
    <div class="filter">Filter</div>
    <select class = "filter" name="filter" value="filter" id="">
        <option value="a">All</option>
        <option value="bs">b</option>
        <option value="c">c</option>
    </select>
</div>

    <?php
                    // Include config file
                    // require_once "connection.php";
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db( $connection,"dept") or die("Unable to connect to MySQL"); 
                    $sql = "select * from sub"; 
                    // Attempt select query execution
                    //$query = "SELECT * FROM users";
                    // $sql=mysql_query("select * from users",)or die(mysql_error());
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                       
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        // echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
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
 
                    // Close connection
                    mysqli_close($connection);
                    ?>
<a class="btn btn-primary" href="logout.php" role="button">logout</a>
</body>
</html>

    <?php

}
else{
    echo "Login to continue";
    echo "<a class='btn btn-primary' href='adminlogin.html' role='button'>login</a>
    ";
}
?>

