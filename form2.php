<?php
include('connection.php');
session_start();
// Include config file
$connection = mysqli_connect("localhost", "root","","dept");
 $phone_err='';
// Define variables and initialize with empty values
$name = $dept= $email= $phone=$year=$interest="";

//$id_err = $name_err = $password_err = $email_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Id as input
    // $id=trim($_POST["id"]);
    // $section=$_POST["section"];
    // // Validate name
    // $input_name = trim($_POST["name"]);
    // if(empty($input_name)){
    //     $name_err = "Please enter a name.";
    // } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $name_err = "Please enter a valid name.";
    // } else{
    //     $name = $input_name;
    // }
    // assign phone::
    // $phone=$_POST["phone"];

    //val phone::
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter your Phone Number.";
    } elseif(is_numeric($input_phone)){
        $phone = $input_phone;
        
    } else{
        $phone_err = "Please enter a valid Phone Number.";
    }
    // Validate password
    $dept = trim($_POST["dept"]);
    // if(empty($input_password)){
    //     $password_err = "Please enter a password.";     
    // } else{
    //     $password = $input_password;
    // }
    
    // Validate email
    $email = trim($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_err = "Invalid email format";
    }
    $year=trim($_POST["year"]);
$sum=300;
    if(isset($_POST["techtalk"])){
        $techtalk="techtalk";
        $sum = $sum + 30; 
    }
    else{
        $techtalk=" ";
    }
    if(isset($_POST["blindcoding"])){
        $blindcoding="blindcoding";
        $sum = $sum + 30;}
        else{
            $blindcoding=" ";
        }
    if(isset($_POST["treasurehunt"])){
        $treasurehunt="treasurehunt";
        $sum = $sum + 30;}
        else{
            $treasurehunt=" ";
        }
    if(isset($_POST["codingcontest"])){
        $codingcontest="codingcontest";
        $sum = $sum + 30;}
        else{
            $codingcontest=" ";
        }
    if(isset($_POST["ipidea"])){
        $ipidea="ipidea";
        $sum = $sum + 30;}
        else{
            $ipidea=" ";
        }
    if(isset($_POST["debate"])){
        $debate="debate";
        $sum = $sum + 30;}
        else{
            $debate=" ";
        }
    if(isset($_POST["typingtest"])){
        $typingtest="typingtest";
        $sum = $sum + 30;}
        else{
            $typingtest=" ";
        }
    if(isset($_POST["memorytest"])){
        $memorytest="memorytest";
        $sum = $sum + 30;}
        else{
            $memorytest=" ";
        }
    if(isset($_POST["fastestfinger"])){
        $fastestfinger="fastestfinger";
        $sum = $sum + 30;}
        else{
            $fastestfinger=" ";
        }
    if(isset($_POST["photography"])){
        $photography="photography";
        $sum = $sum + 30;}
        else{
            $photography=" ";
        }
    if(isset($_POST["mode"])){
        $mode=$_POST["mode"];}
        else{
            $mode=" ";
        }
        if(isset($_POST['section'])){
    $section=$_POST['section'];}
    else{$section=' ';}
if(isset($_POST['transaction_id'])){   
$tran=$_POST['transaction_id'];}
else{$tran=NULL;}
$id=$_SESSION['id'];

    // $blindcoding
    // $treasurehunt
    // $codingcontest
    // $ipidea
    // $debate
    // $typingtest
    // $memorytest
    // $fastestfinger
    // $photography


    $target_dir = "images/";
    $filename=$id.".jpg";
    $target_file = $target_dir.basename($filename);
    $_SESSION["file"]=$target_file;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check input errors before inserting in database
    if(empty($phone_err) && empty($name_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "update sub set phone='$phone',email='$email',dept='$dept',year='$year',section='$section',techtalk='$techtalk',blindcoding='$blindcoding',treasurehunt='$treasurehunt',codingcontest='$codingcontest',ipidea='$ipidea',debate='$debate',typingtest='$typingtest',memorytest='$memorytest',fastestfinger='$fastestfinger',photography='$photography',mode='$mode',payment='$sum',verification='0',transaction_id='$tran' where id='$id'";
    
        
         if($stmt = mysqli_prepare($con,$sql)){
         // Bind variables to the prepared statement as parameters
            
        //     // Set parameters
             $param_dept = $dept;
             $param_phone=$phone;
             $param_email=$email;
             $param_year=$year;
             
             //create mac::

            //alert::
            ?><?php
            // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                   // Records created successfully. Redirect to landing page
                 header("location: success.php");
                 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
                 
                 exit();
                 } else{
                     echo "Oops! Something went wrong. Please try again later.";
                 }
             }
    }
        // Close statement
    //     mysqli_stmt_close($stmt);
    // }
    
    // Close connection
//     mysqli_close($connection);
// }
            }

$id=$_SESSION['id'];

$sql2="select * from sub where id='$id'";
$res=mysqli_query($con,$sql2);
$ro=mysqli_fetch_array($res);
if($ro['email']==NULL || $ro['email']==' '){
    $emaill='';
    $emaillph='Enter your Email';

}else{$emaill=$ro['email'];$emaillph='Enter your Email';}
if($ro['phone']==NULL || $ro['phone']==' '){
    $phonee='';
    $phoneeph='Enter your Phone Number';
}else{$phonee=$ro['phone'];$phoneeph='Enter your Phone Number';}
if($ro['dept']==NULL || $ro['dept']==' '){
    $deptt='Choose Dept';
}else{$deptt=$ro['dept'];}
if($ro['year']==NULL || $ro['year']==' '){
    $yearr='Choose Year';
}else{$yearr=$ro['year'];}
if($ro['section']==NULL || $ro['section']==' '){
    $sectionn='Choose Section';
}else{$sectionn=$ro['section'];}

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
<script>
    let sum=300;
function myFunction() {
  // Get the checkbox
  var techBox = document.getElementById("tech");
  var nontechBox = document.getElementById("nontech");
  // Get the output text
  var text = document.getElementById("text");
  var para = document.getElementById("para");

  // If the checkbox is checked, display the output text
  if (techBox.checked == true && nontechBox.checked == false){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
  if (nontechBox.checked == true && techBox.checked == false){
    para.style.display = "block";
  } else {
    para.style.display = "none";
  }
  if (nontechBox.checked == true && techBox.checked == true){
    text.style.display = "block";
    para.style.display = "block";
  } 
}

function calculate(){

    var sum = 300;
  var ttalk = document.getElementById("techtalk");
  var bcoding = document.getElementById("blindcoding");
  var thunt = document.getElementById("treasurehunt");
  var ccontest = document.getElementById("codingcontest");
  var ipideas = document.getElementById("ipidea");
  var dbate = document.getElementById("debate");
  var ttest = document.getElementById("typingtest");
  var mtest = document.getElementById("memorytest");
  var ff = document.getElementById("fastestfinger");
  var pgraphy = document.getElementById("photography");

  if (ttalk.checked == true){
    sum = sum+30;
  }
  if (bcoding.checked == true){
    sum = sum+30;
  }
  if (thunt.checked == true){
    sum = sum+30;
  }
  if (ccontest.checked == true){
    sum = sum+30;
  }
  if (ipideas.checked == true){
    sum = sum+30;
  }
  if (dbate.checked == true){
    sum = sum+30;
  }
  if (ttest.checked == true){
    sum = sum+30;
  }
  if (mtest.checked == true){
    sum = sum+30;
  }
  if (ff.checked == true){
    sum = sum+30;
  }
  if (pgraphy.checked == true){
    sum = sum+30;
  }

  

  document.getElementById("paysum").innerHTML = String(sum);
  
}
function pmodefunc(){
  
  // Get the checkbox
  var omode = document.getElementById("pmode");
  // Get the output text

  // If the checkbox is checked, display the output text
  if (omode.checked == true){
    modedisplayonline.style.display = "block";
    modedisplayoffline.style.display = "none";
     
  }
  else {
    modedisplayonline.style.display = "none";
    modedisplayoffline.style.display = "block";
        
    

  }
 
}
  </script>
</head>
<body>
    <script>
        calculate();
    </script>
    <form method = "post" autocomplete="off" name="google-sheet" enctype="multipart/form-data">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">CSE-DEPARTMENT DAY REGISTRATION FORM</h2>
                </div>

                <div class="card-body">
                    <form method="POST">
                        <center>
                    <div class="container-fluid"><b>Welcome : <?php echo $_SESSION['id']; ?></b></div><br>
                        </center>

                        <div class="form-row">

                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" value="<?php echo $emaill ?>" placeholder="<?php echo $emaillph ?>" required>
                                    <div class="container-fluid" style="color:blue;">Certificates will be sent to this email</div>

                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    
                                    <div class="col-9">
                                        <div class="input-group-desc"><div style="color:red;"><?php echo $phone_err; ?></div>
                                            <input class="input--style-5" type="tel" value="<?php echo $phonee ?>" name="phone" minlength="10" maxlength="10" placeholder="<?php echo $phoneeph ?>" >
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Department</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="dept" required>
                                            <option hidden selected="selected" value="<?php echo $deptt ?>"><?php echo $deptt ?></option>
                                            <option>CSE</option>
                                            <option>IT</option>
                                            <option>ECE</option>
                                            <option>EEE</option>
                                            <option>CIVIL</option>
                                            <option>CHEMICAL</option>
                                            <option>MECHANICAL</option>
                                            <option>MBA</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
                      
                        
                        <div class="form-row">
                            <div class="name">Year</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="year" required>
                                            <option selected="selected" hidden="hidden" value='<?php echo $yearr ?>'><?php echo $yearr ?></option>
                                            <option value="1">1st Year</option>
                                            <option value="2">2nd Year</option>
                                            <option value="3">3rd Year</option>
                                            <option value="4">4th Year</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Section</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="section" required>
                                            <option selected="selected" value="<?php echo $sectionn ?>"><?php echo $sectionn ?></option>
                                            <option value = "A">A</option>
                                            <option value = "B">B</option>
                                            <option value = "C">C</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            
                        <h5 style="font-weight:bold;">Field of Interest</h5><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="tech" id="tech" name="tech" onclick="myFunction()">
                                <label class="form-check-label" for="tech">TECHNICAL</label>
                            </div><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="nontech" id="nontech" name="nontech" onclick="myFunction()">
                                <label class="form-check-label" for="nontech">NON-TECHNICAL</label>
                            </div><br><br>
                        
                        <div id="text" style="display:none">
                        
                            <h5 style="font-weight:bold;">Tech Events</h5><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="techtalk" id="techtalk" name="techtalk" onclick="calculate()">
                                <label class="form-check-label">TECH TALK</label>
                            </div><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="blindcoding" id="blindcoding" name="blindcoding" onclick="calculate()">
                                <label class="form-check-label"> BLIND CODING</label>
                            </div><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="treasurehunt" id="treasurehunt" name="treasurehunt" onclick="calculate()">
                                <label class="form-check-label">TREASURE HUNT</label>
                            </div><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="codingcontest" id="codingcontest" name="codingcontest" onclick="calculate()">
                                <label class="form-check-label">CODING CONTEST</label>
                            </div><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="ipidea" id="ipidea" name="ipidea" onclick="calculate()">
                                <label class="form-check-label">IDEA/PROJECT EXPO</label>
                            </div>
                        
                        </div>
                        <br>
                        <div id="para" style="display:none">
                        
                            <h5 style="font-weight:bold;">Non-Tech Events</h5><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="debate" id="debate" name="debate" onclick="calculate()">
                                <label class="form-check-label">DEBATE </label>
                            </div><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="typingtest" id="typingtest" name="typingtest" onclick="calculate()">
                                <label class="form-check-label">TYPING TEST</label>
                            </div><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="memorytest" id="memorytest" name="memorytest" onclick="calculate()">
                                <label class="form-check-label">MEMORY TEST</label>
                            </div><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="fastestfinger" id="fastestfinger" name="fastestfinger" onclick="calculate()">
                                <label class="form-check-label">FASTEST FINGER</label>
                            </div><br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="photography" id="photography" name="photography" onclick="calculate()">
                                <label class="form-check-label">PHOTOGRAPHY CONTEST</label>
                            </div>
                        <br><br>
                        </div>
                        
                            <h5 style="display: inline-block;font-weight:bold;">Your total Payment: </h5>
                            <h5 style="display: inline-block;font-weight:bold; color: green;" name="paysum" id="paysum" onclick="calculate()">&nbsp;.</h5><h5 style="display: inline-block;font-weight:bold;">&nbsp;Rs</h5><br><br>
                            
                        <br>
                        <p style="font-weight:bold;">Payment Mode: </p><br><br>
                      <div class="form-check">
                                <input class="form-check-input" type="radio" id="pmode" name="mode" value="online" onclick="return onlinetext()">
                                <label class="form-check-label" for="tech">Online</label>
                            </div><br>
                            <DIV>
                                <script>
                                    function onlinetext(){
                                        document.getElementById("offlinee").innerHTML="";
                                        document.getElementById("onlinee").innerHTML+="<p style=' color: green; font-weight: bold;'>You can pay through this <a href='upi://pay?pa=jayrampothuraju@axl&pn=jayram%20pothuraju&mc=0000&mode=02&purpose=00'>link</a> (only on mobile) or <br> Pay to the UPI ID : jayrampothuraju@ybl</p>Enter transaction id(Required)<input name='transaction_id' class='input--style-5' style='border : 1px solid;' type='text'>"
                                    }
                                    function offlinetext(){
                                        document.getElementById("onlinee").innerHTML="";
                                        document.getElementById("offlinee").innerHTML+="<p  style=' color: green; font-weight: bold;'>You can pay in the CSE department<br>Name: Dheeraj<br>Ph.no: +91 6301117473</p><br>"
                                    }

                                </script>
                            <p id="onlinee"></p>
                            </DIV>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="pmode" name="mode" value="offline" onclick="return offlinetext()">
                                <label class="form-check-label" for="nontech">Offline</label>
                            </div><br><p id="offlinee"></p><br>
                            <div class="mb-3">
                        <label class="form-label">Upload Screenshot if paid in online : </label>
                        <input class="form-control" type="file" id="formFile" name="fileToUpload">
                        </div>
                          
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</form>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

<?php session_abort() ?>