<?php
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
$Programming = $_POST['Programming_Language'];
$Skills = $_POST['Skills'];

// Database connection
$host = "ictstu-db1.cc.swin.edu.au";
$dbname = "s104471956_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    die("Connection error: ". mysqli_connect_error());
}
echo "Connection successful.";
?>
