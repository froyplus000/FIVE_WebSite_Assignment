<?php include("./header.inc"); ?>

<title>Management</title>
</head>

<body>



	<!-- Navbar -->
	<nav id="main-nav" class="container">


		<h1 id="logo">Five-5</h1>
		<!-- Hamburger Menu -->
		<label class="hamburger_menu">
			<input type="checkbox">
		</label>
		<aside class="sidebar">

			<!-- <div><a href="index.html" class="active">Home</a></div>
			<div><a href="about.html">About Us</a></div>
			<div><a href="jobs.html">Jobs Description</a></div>
			<div><a href="apply.html">Apply Now</a></div>
			<div><a href="enhancement.html">Our Website Enhancement</a></div> -->

			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="jobs.html">Jobs Description</a></li>
				<li><a href="apply.php">Apply Now</a></li>
				<li><a href="manage.php" class="active">Management</a></li>
				<li><a href="enhancement.html">Our Website Enhancement</a></li>
			</ul>
		</aside>


	</nav>

	<?php


	include('settings.php');
	// Variable
	// $Firstname = $_POST['Firstname'];
	// $Lastname = $_POST['Lastname'];
	// $Dob = $_POST['Dob'];
	// $Gender = $_POST['Gender'];
	// $Email = $_POST['Email'];
	// $Phone = $_POST['Phone'];
	// $Address = $_POST['Address'];
	// $Suburb = $_POST['Suburb'];
	// $State = $_POST['State'];
	// $Postcode = $_POST['Postcode'];
	// $Job_prefer = $_POST['Job_prefer'];
	// $Job_reference_number = $_POST['Job_reference_number'];
	// $Programming_language = $_POST['Programming_Language'];
	// $Skills = $_POST['Skills'];
	


	$conn = mysqli_connect($host, $user, $pwd, $sql_db);

	if (!$conn) {
		echo "<p>Database connection failure</p>";
	} else {

		$sql_table = "ApplyForm_Assignment2";
		$query = "SELECT * FROM $sql_table ORDER BY ID DESC";
		$result = mysqli_query($conn, $query);

		if (!$result) {
			echo "<p>Something is wrong with" . $query . "</p>";
		} else {
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
				. "<th scope=\"col\">Accept</th>\n"
				. "<th scope=\"col\">Decline</th>\n"
				. "<th scope=\"col\">Submit</th>\n"
				. "<tr>\n";

			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>\n";
				echo "<td>", $row["ID"], "</td>";

				if ($row["Status"]) {
					echo "<td>", $row["Status"], "</td>";
				} else {
					echo "<td>Pending</td>";
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
				echo "<td><input type='radio' name=", $row["ID"], " value='Accept'</td>";
				echo "<td><input type='radio' name=", $row["ID"], " value='Decline'></td>";
				echo "<td><input class='btn' type='submit' name='submit' value='Submit'></td>";
				echo "<tr>\n";
			}
			echo "</table>\n";
			echo "</div>\n";
			echo "</div>\n";
			echo "</div>\n";
			mysqli_free_result($result);
		}
		mysqli_close($conn);

	}





	include("./footer.inc");
	?>