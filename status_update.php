<?php
include("./settings.php");

if (isset($_POST['submit'])) {

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    // Loop through the POST data to get the status of each application
    foreach ($_POST as $key => $value) {
        if ($key !== 'submit') {
            // $key is the application ID
            // $value is the status ("Accept" or "Decline")

            // You can update the database with the status here
            // Example: Update the status for the application with ID $key
            $query = "UPDATE ApplyForm_Assignment2 SET Status = '$value' WHERE ID = $key";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "Error updating status for application with ID $key";
            } else {
                header("Location: manage.php");
            }
        }
    }
} else {
    echo ('Something wrong with the code');
}
?>