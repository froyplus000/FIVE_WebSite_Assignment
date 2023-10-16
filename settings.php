<?php
    $host = "feenix-mariadb.swin.edu.au";
    $user = "s104471956";
    $pwd = "2882005";
    $sql_db = "s104471956_db";

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
    //connection//
    $con = mysqli_connect($host, $user, $pwd, $sql_db);

    if(mysqli_connect_errno()){
		echo "$con->connect_error";
		die("Connection Failed : ". mysqli_connect_error());
	} 
        $sql=("insert into ApplyForm_Assign2(Firstname, Lastname, Dob, Gender, Email, Phone, Address, Suburb, State, Postcode, Job_prefer, Job_reference_number, Programming_Language, Skills) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($con));
}   
mysqli_stmt_bind_param($stmt, "ssssssssssssss", $Firstname, $Lastname, $Dob, $Gender, $Email, $Phone, $Address, $Suburb, $State, $Postcode, $Job_prefer, $Job_reference_number, $Programming_language, $Skills);
mysqli_stmt_execute($stmt);
?>