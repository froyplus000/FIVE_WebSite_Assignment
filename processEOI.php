<!--for the manage.php-->
<!-- ?php

require_once('settings.php');
$query = "SELECT * FROM ApplyForm_Assign2 ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con,$query);

?><
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Result from the apply form</title>
</head> 
<style>
*{
    margin: 0;
    padding: 0;
}
.background{
    background-color:#e6dcce;
}
.table-box{
    margin: 50px auto;
}
.table-header{
    text-align:center;
}
.table-row{
    display: table;
    width:80%;
    margin: 10px auto;
    font-family: sans-serif;
    background: transparent;
    padding: 12px 0;
    color: #555;
    font-size: 13px;
    box-shadow: 0 1px 4px 0 rgba(0,0,50,0.3);
}
.table-cell{
    display: table-cell;
    width: 30%;
    text-align: center;
    padding: 4px 0;
    border-right: 1px solid #d6d4d4;
    vertical-align: middle;
}
.table-head{
    background: #8665f7;
    box-shadow:none;
    color:#fff;
    font-weight:600;
}
.last-cell{
    border-right:none;
}
.table-head .table-cell{
    border-right:none;
}
</style>
<body class="background">
    <div class="table-box">
    <div class="table-header">
        <h2>Information results from the Application form</h2>
    </div>
    <div class="table-row table-head">
        <div class="table-cell">
            <p>ID</p>
        </div>
        <div class="table-cell">
            <p>Firstname</p>
        </div>
        <div class="table-cell">
            <p>Lastname</p>
        </div>
        <div class="table-cell">
            <p>Dob</p>
        </div>
        <div class="table-cell last-cell">
            <p>Gender</p>
        </div>
    </div>

    <div class="table-row">
        <!?php
            $row = mysqli_fetch_assoc($result);
        ?>
        <div class="table-cell">
            <p><!?php echo $row['Firstname']?></p>
        </div>      
        <!?php
            
        ?>
    </div>
</body>
</html>  -->
<!-- <style>
    .mycss{
    color: green;
    border:1px solid #000;
    padding: 10px;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    margin: 20px 0;
    width: 500px;
    max-width: 30%;
    height: 1000px;
    background:#fff;
    text-align: center;
    }
    *{
    margin: 0;
    padding: 0;
    background-color:#e6dcce;
}
</style> -->
<?php
include('settings.php');
//Insert name//
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$Dob = $_POST['Dob'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Address = $_POST['Address'];
$Suburb = $_POST['Suburb'];
$State = $_POST['State'];
$Postcode = $_POST['Postcode'];
$Job_prefer = $_POST['Job_prefer'];
$Job_reference_number = $_POST['Job_reference_number'];
$Programming_language = $_POST['Programming_Language'];
$Skills = $_POST['Skills'];


// Convert arrays to strings//
    if (is_array($_POST['Programming_Language']) && !empty($_POST['Programming_Language'])) {
   $Programming_language = implode(",", $_POST['Programming_Language']);
    } else {
     $Programming_language = ""; 
 }
    if (is_array($_POST['Skills']) && !empty($_POST['Skills'])) {
     $Skills = implode(",", $_POST['Skills']);
     } else {
     $Skills = "";  
 }
//connection//
$con = mysqli_connect($host, $user, $pwd, $sql_db);
if (isset($_REQUEST['submit'])){
	$Programming_language = implode(", ",$_REQUEST['Programming_Language']);
	$insert_query = mysqli_query($con,"insert into ApplyForm_Assignment2 set Programming_Language=$Programming_language");
}


if(mysqli_connect_errno()){
    echo "$con->connect_error";
    die("Connection Failed : ". mysqli_connect_error());
} 
    $sql="insert into ApplyForm_Assignment2(Firstname, Lastname, Dob, Gender, Email, Phone, Address, Suburb, State, Postcode, Job_prefer, Job_reference_number, Programming_Language, Skills) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result = mysqli_query($con, $sql);
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        die(mysqli_error($con));
    }   
    mysqli_stmt_bind_param($stmt, "ssssssssssssss", $Firstname, $Lastname, $Dob, $Gender, $Email, $Phone, $Address, $Suburb, $State, $Postcode, $Job_prefer, $Job_reference_number, $Programming_language, $Skills);
    mysqli_stmt_execute($stmt);
if(!$con){
    die('Connection Error'. mysqli_error($con));
}
else{
    if(isset($_POST['submit'])){
        $checkid = "SELECT * FROM 'ApplyForm_Assignment2' ORDER BY id DESC LIMIT 1 ";
        $checkresult = mysqli_query($con,$checkid);
    }
    if($row = mysqli_fetch_assoc($checkresult)){
        $uid = $row['User_ID'];
        $get_numbers = str_replace("FIVE","",$uid);
        $id_increase = $get_numbers+1;
        $get_string = str_pad($id_increase, 5,0, STR_PAD_LEFT);
        $id = "FIVE".$get_string;

        $insert_quy = "INSERT INTO 'ApplyForm_Assignment2'('User_ID') VALUES ('id')";
        $result = mysqli_query($con,$insert_quy);
        if($result){
            echo "Entry Added in Database".'<br>'."registration number: ".$id;
        }
        else{
            echo "error";
        }
    }
}   
    
// echo "<p class='mycss'> Sending successfully.</p>";
?>