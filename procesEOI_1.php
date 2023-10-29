<style>
    :root {
        --backgroud_light_color: #e6dcce;
        --main_dark_color: #474143;
        --main_shadow_color: #6B798C;
        --seccond_light_color: #384D68;
        --font_heading: 'IBM Plex Mono', monospace;
        --font_content: 'IBM Plex Mono', monospace;
        --font_higlight: 'Qwitcher Grypen', cursive;
    }

    .outer-wrapper {
        border: .15rem solid var(--main_dark_color);
    }

    .table-wrapper {
        margin: 2rem;
        overflow-y: auto;
        overflow-x: auto;
        height: 500px;
        border: .15rem solid var(--main_dark_color);
    }

    #m_table {

        border: .15rem solid var(--main_dark_color);
        min-width: 80vw;
        border-spacing: 0px;
        border-collapse: collapse;
        text-align: center;
        font-family: var(--font_content);
    }

    #m_table tr th,
    #m_table tr td {
        border: .15rem solid var(--main_dark_color);
        padding: 15px;
    }

    #m_table tr th {
        position: sticky;
        top: 0px;
        background-color: var(--main_shadow_color);
        color: var(--backgroud_light_color);
        font-size: 1.15rem;
    }

    #m_table tr td {
        padding: .25rem;
        border: .15rem solid var(--main_dark_color);
        font-size: .85rem;
    }

    #m_table tr td .btn {
        background-color: var(--main_shadow_color);
    }

    * {
        margin: 0;
        padding: 0;
        background-color: #e6dcce;
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
if (isset($_REQUEST['submit'])) {
    $Programming_language = implode(", ", $_REQUEST['Programming_Language']);
    $insert_query = mysqli_query($con, "insert into ApplyForm_Assignment2 set Programming_Language=$Programming_language");
}


if (mysqli_connect_errno()) {
    echo "$con->connect_error";
    die("Connection Failed : " . mysqli_connect_error());
}
$sql = "INSERT INTO ApplyForm_Assignment2(Firstname, Lastname, Dob, Gender, Email, Phone, Address, Suburb, State, Postcode, Job_prefer, Job_reference_number, Programming_Language, Skills) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$result = mysqli_query($con, $sql);
$stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($con));
}
mysqli_stmt_bind_param($stmt, "ssssssssssssss", $Firstname, $Lastname, $Dob, $Gender, $Email, $Phone, $Address, $Suburb, $State, $Postcode, $Job_prefer, $Job_reference_number, $Programming_language, $Skills);
mysqli_stmt_execute($stmt);
// Generate a ID
$query = "SELECT * FROM ApplyForm_Assignment2 ORDER BY ID ASC";
$result = mysqli_query($con, $query);
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
    //Print out the message
    if ($id !== null) {
        //echo "<p class='mycss1'>Sending successfully <br> Your Application ID is: $id</br>After receive the Application ID, please wait until there is a email send to you to let you know you are hire or not. </p>";
        echo "<form class=\"outter-wrapper\" action=\"status_update.php\" method=\"post\">";
        echo "<div class=\"outter-wrapper\">";
        echo "<div class=\"table-wrapper\">";
        echo "<table id=\"m_table\">\n";
        echo "<tr>\n"
            . "<th scope=\"col\">Application ID</th>\n"
            . "<th scope=\"col\">Status</th>\n"
            . "<th scope=\"col\">Job Position</th>\n"
            . "<th scope=\"col\">Job Reference No.</th>\n"
            . "<th scope=\"col\">Firstname</th>\n"
            . "<th scope=\"col\">Lastname</th>\n"
            . "<th scope=\"col\">Gender</th>\n"
            . "<th scope=\"col\">DOB</th>\n"
            . "<th scope=\"col\">Programming Language</th>\n"
            . "<th scope=\"col\">Skills</th>\n"
            . "<th scope=\"col\">Email</th>\n"
            . "<th scope=\"col\">Phone</th>\n"
            . "<th scope=\"col\">Address</th>\n"
            . "<th scope=\"col\">Suburb</th>\n"
            . "<th scope=\"col\">State</th>\n"
            . "<th scope=\"col\">Postcode</th>\n"
            . "<tr>\n";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>\n";
            echo "<td>", $row["ID"], "</td>";

            // echo "<td>", $row["Status"], "</td>";
            if (!$row["Status"]) {
                echo "<td>Pending</td>";
            } else {
                echo "<td>", $row["Status"], "</td>";
            }

            echo "<td>", $row["Job_prefer"], "</td>";
            echo "<td>", $row["Job_reference_number"], "</td>";
            echo "<td>", $row["Firstname"], "</td>";
            echo "<td>", $row["Lastname"], "</td>";
            echo "<td>", $row["Gender"], "</td>";
            echo "<td>", $row["Dob"], "</td>";
            echo "<td>", $row["Programming_Language"], "</td>";
            echo "<td>", $row["Skills"], "</td>";
            echo "<td>", $row["Email"], "</td>";
            echo "<td>", $row["Phone"], "</td>";
            echo "<td>", $row["Address"], "</td>";
            echo "<td>", $row["Suburb"], "</td>";
            echo "<td>", $row["State"], "</td>";
            echo "<td>", $row["Postcode"], "</td>";
        }
        echo "</table>\n";
        echo "</div>\n";
        echo "</div>\n";
        echo "</div>\n";
        mysqli_free_result($result);
    }
    mysqli_close($con);
}
?>