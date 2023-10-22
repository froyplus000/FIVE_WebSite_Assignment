 <style>
    .mycss1{
     color: green;
    border:10px solid #000;
    padding: 25px;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    width: 500px; height:200px;
    margin: 50px auto;
    font-size: 9vw;
    }
    *{
    margin: 0;
    padding: 0;
    background-color:#e6dcce;
}
</style> 
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
    $sql="INSERT INTO ApplyForm_Assignment2(Firstname, Lastname, Dob, Gender, Email, Phone, Address, Suburb, State, Postcode, Job_prefer, Job_reference_number, Programming_Language, Skills) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result = mysqli_query($con, $sql);
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        die(mysqli_error($con));
    }   
    mysqli_stmt_bind_param($stmt, "ssssssssssssss", $Firstname, $Lastname, $Dob, $Gender, $Email, $Phone, $Address, $Suburb, $State, $Postcode, $Job_prefer, $Job_reference_number, $Programming_language, $Skills);
    mysqli_stmt_execute($stmt);
// Generate a ID
$query = "SELECT * FROM ApplyForm_Assignment2 ORDER BY ID ASC";
$result = mysqli_query($con,$query);
if (!$result) {
    echo "Query failed: " . mysqli_error($con);
} else {
    // Initialize $id before the while loop
    $id = null;
    
    // Fetch the data
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["ID"];
    }

    // Close the database connection
    mysqli_close($con);
    //Print out the message
    if ($id !== null) {
        echo "<p class='mycss1'>Sending successfully <br> Your Application ID is: $id</br>After receive the Application ID, please wait until there is a email send to you to let you know you are hire or not.</p>";
    } else {
        echo "No ID found in the database.";
    }
}
?>
