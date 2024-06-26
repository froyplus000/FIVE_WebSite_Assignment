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
        height: max-content;
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

    .mycss1 {
        margin-top: 10rem;
        text-align: center;
        font-family: var(--font_content);
        font-size: 25px;
        color: #474143;
    }

    .mycss2 {
        font-family: var(--font_content);
        font-size: 25px;
        color: #FF0000;
    }

    .goback-button {
        background-color: #474143;
        color: #eedfc7;
        border: 3px solid #eedfc7;
        margin: 4px 2px;
        padding: 12px 24px;
        border-radius: 8px;
        text-align: center;
        display: inline-block;
        font-family: var(--font_content);
        font-size: 15px;
        cursor: pointer;
    }

    .goback-button:hover {
        background-color: #7c7a7a;
        text-shadow: #7c5802;
        transform: scale(1.05);
    }

    * {
        margin: 0;
        padding: 0;
        background-color: #e6dcce;
    }
</style>
<?php

if (!isset($_POST["submit"])) {
    header("Location: ./apply.php");
} else {
    include('settings.php');
    include('clean.php');
    //Insert name//
    $Firstname = clean($_POST['Firstname']);
    $Lastname = clean($_POST['Lastname']);
    $Dob = clean($_POST['Dob']);
    $Gender = clean($_POST['Gender']);
    $Email = clean($_POST['Email']);
    $Phone = clean($_POST['Phone']);
    $Address = clean($_POST['Address']);
    $Suburb = clean($_POST['Suburb']);
    $State = $_POST['State'];
    $Postcode = clean($_POST['Postcode']);
    $Job_prefer = clean($_POST['Job_prefer']);
    $Job_reference_number = clean($_POST['Job_reference_number']);
    $Programming_language = clean($_POST['Programming_Language']);
    $Skills = clean($_POST['Skills']);
    $Status = "Pending";

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
    if (isset($_REQUEST['submit'])) {
        $Skills = implode(", ", $_REQUEST['Skills']);
        $insert_query = mysqli_query($con, "insert into ApplyForm_Assignment2 set Skills=$Skills");
    }

    if (mysqli_connect_errno()) {
        echo "$con->connect_error";
        die("Connection Failed : " . mysqli_connect_error());
    }
    $sql = "INSERT INTO ApplyForm_Assignment2(Firstname, Lastname, Dob, Gender, Email, Phone, Address, Suburb, State, Postcode, Job_prefer, Job_reference_number, Programming_Language, Skills, Status) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    $result = mysqli_query($con, $sql);
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, "sssssssssssssss", $Firstname, $Lastname, $Dob, $Gender, $Email, $Phone, $Address, $Suburb, $State, $Postcode, $Job_prefer, $Job_reference_number, $Programming_language, $Skills, $Status);
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
            echo "<p class='mycss1'>Sending successfully<br>Your Application ID is: $id</p>";
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

            // while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>\n";
            echo "<td>", $id, "</td>";

            // echo "<td>", $row["Status"], "</td>";
            // if (!$row["Status"]) {
            echo "<td>Pending</td>";
            // } else {
            //     echo "<td>", $row["Status"], "</td>";
            // }

            echo "<td>", $Job_prefer, "</td>";
            echo "<td>", $Job_reference_number, "</td>";
            echo "<td>", $Firstname, "</td>";
            echo "<td>", $Lastname, "</td>";
            echo "<td>", $Gender, "</td>";
            echo "<td>", $Dob, "</td>";
            echo "<td>", $Programming_language, "</td>";
            echo "<td>", $Skills, "</td>";
            echo "<td>", $Email, "</td>";
            echo "<td>", $Phone, "</td>";
            echo "<td>", $Address, "</td>";
            echo "<td>", $Suburb, "</td>";
            echo "<td>", $State, "</td>";
            echo "<td>", $Postcode, "</td>";
        }
        echo "</table>\n";
        echo "</div>\n";
        echo "</div>\n";
        echo "</div>\n";
        mysqli_free_result($result);
    }
    mysqli_close($con);
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<a href='$url' class='goback-button'>Go Back</a>";
    echo "<p class='mycss2'>Notice: After receive the Application ID, please wait until there is a email send to you to let you know you are hire or not</p>";
}
?>