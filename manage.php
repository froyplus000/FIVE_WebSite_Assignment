<?php include("./header.php"); ?>

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
				<li><a href="jobs.php">Jobs Description</a></li>
				<li><a href="apply.php">Apply Now</a></li>
				<li><a href="manage.php" class="active">Management</a></li>
				<li><a href="enhancement.html">Our Website Enhancement</a></li>
			</ul>
		</aside>


	</nav>
	<!-- 
			This form helps the manager to sort / filter the results on the page.
			We will need to not allow results to be shown unless the search is completed first
			but will have to make this change once the table is talking with the script again.
		 -->
	<div class="container">
		<h2>Sort results</h2>
		<form action="manage.php" method="post">
			<select name="sort_options">
				<!-- this is the fields for which the manager can sort the results with. It will create a form, send to the server and then return the results on the same page. see below php -->
				<option value="Firstname">First name</option>
				<option value="Lastname">Last name</option>
				<option value="Job_reference_number">Job Reference number</option>
				<option value="Application_id">Application ID</option>
				<option value="Suburb">Suburb</option>
				<option value="Job_position">Job Position</option>

			</select>

			<input type="submit" name="submit_sort" value="Sort">
		</form>

		<?php

		// this provides the login details for the database
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
		}
		if (!$result) {
			echo "<p>Something is wrong with" . $query . "</p>";
		} else {
			//This is the SQL sort function. It will sort the results based on the field selected by the manager.
		
			//This is the SQL sort function. It will sort the results based on the field selected by the manager.
			if (isset($_POST['submit_sort']) && isset($_POST['sort_field'])) {
				$sort_field = $_POST['sort_field'];

				// These are the allowed fields. 
				//HuyNgocDuong Can we please check the Database has these ecxact fields listed?
				$allowed_fields = ['Firstname', 'Lastname,', 'Job_reference_number,', 'Application_id,', 'Suburb,', 'Job_position,'];


				//Here if the allowed fields are selected, it will sort the information in teh data base as results and return them to the screen. the below code runs the query.
				if (in_array($sort_field, $allowed_fields, true)) {
					$query = "SELECT * FROM ApplyForm_Assignment2 ORDER BY $sort_field ASC";
					$result = $mysqli->query($query);

					if ($result) {
						while ($row = $result->fetch_assoc()) {

							echo $row['your_field_name'];
						}
					} else {
						echo "Error: " . $mysqli->error;
					}
				} else {
					echo "Invalid sorting field selected.";
				}
			}

			//Displays based on the sort field selected in Ascending order.
		
			if ($result) {
				while ($row = $result->fetch_assoc()) {
					switch ($sortField) {

						case 'last_name':
							echo $row['last_name'] . " | " .
								$row['first_name'] . " | " .
								$row['Job_reference_number'] . " | " .
								$row['Application_id'] . " | " .
								$row['Email'] . " | " .
								$row['Suburb'] . " | " .
								$row['Job_position'] . " | " .
								$row['Dob'] . " | " .
								$row['Gender'] . " | " .
								$row['Phone'] . " | " .
								$row['Address'] . " | " .
								$row['State'] . " | " .
								$row['Postcode'] . " | " .
								$row['Job_prefer'] . " | " .
								$row['Programming_language'] . " | " .
								$row['skills'] . " | " .
								"<br>";
							break;

						case 'Job_reference_number':
							echo $row['Job_reference_number'] . " | " .
								$row['first_name'] . " | " .
								$row['last_name'] . " | " .
								$row['Application_id'] . " | " .
								$row['Email'] . " | " .
								$row['Suburb'] . " | " .
								$row['Job_position'] . " | " .
								$row['Dob'] . " | " .
								$row['Gender'] . " | " .
								$row['Phone'] . " | " .
								$row['Address'] . " | " .
								$row['State'] . " | " .
								$row['Postcode'] . " | " .
								$row['Job_prefer'] . " | " .
								$row['Programming_language'] . " | " .
								$row['skills'] . " | " .
								"<br>";
							break;

						case 'Application_id':
							echo $row['Application_id'] . " | " .
								$row['first_name'] . " | " .
								$row['last_name'] . " | " .
								$row['Job_reference_number'] . " | " .
								$row['Email'] . " | " .
								$row['Suburb'] . " | " .
								$row['Job_position'] . " | " .
								$row['Dob'] . " | " .
								$row['Gender'] . " | " .
								$row['Phone'] . " | " .
								$row['Address'] . " | " .
								$row['State'] . " | " .
								$row['Postcode'] . " | " .
								$row['Job_prefer'] . " | " .
								$row['Programming_language'] . " | " .
								$row['skills'] . " | " .
								"<br>";
							break;

						case 'Suburb':
							echo $row['Suburb'] . " | " .
								$row['first_name'] . " | " .
								$row['last_name'] . " | " .
								$row['Job_reference_number'] . " | " .
								$row['Application_id'] . " | " .
								$row['Email'] . " | " .
								$row['Job_position'] . " | " .
								$row['Dob'] . " | " .
								$row['Gender'] . " | " .
								$row['Phone'] . " | " .
								$row['Address'] . " | " .
								$row['State'] . " | " .
								$row['Postcode'] . " | " .
								$row['Job_prefer'] . " | " .
								$row['Programming_language'] . " | " .
								$row['skills'] . " | " .
								"<br>";
							break;

						case 'Job_position':
							echo $row['Job_position'] . " | " .
								$row['first_name'] . " | " .
								$row['last_name'] . " | " .
								$row['Job_reference_number'] . " | " .
								$row['Application_id'] . " | " .
								$row['Email'] . " | " .
								$row['Suburb'] . " | " .
								$row['Dob'] . " | " .
								$row['Gender'] . " | " .
								$row['Phone'] . " | " .
								$row['Address'] . " | " .
								$row['State'] . " | " .
								$row['Postcode'] . " | " .
								$row['Job_prefer'] . " | " .
								$row['Programming_language'] . " | " .
								$row['skills'] . " | " .
								"<br>";
							break;

						default:
							echo $row['first_name'] . " | " .
								$row['last_name'] . " | " .
								$row['Job_reference_number'] . " | " .
								$row['Application_id'] . " | " .
								$row['Email'] . " | " .
								$row['Suburb'] . " | " .
								$row['Dob'] . " | " .
								$row['Gender'] . " | " .
								$row['Phone'] . " | " .
								$row['Address'] . " | " .
								$row['State'] . " | " .
								$row['Postcode'] . " | " .
								$row['Job_prefer'] . " | " .
								$row['Programming_language'] . " | " .
								$row['skills'] . " | " .
								"<br>";
							break;

					}
				}
			} else {
				echo "Error: " . $mysqli->error;
			}

			// Close connection after finished?
			// mysqli_close($conn);
		
			//End of sort function - @HuyNgocDuong @froyplus000 I dont know how this will look once printed, are we able to put this into a table?
		
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
				echo "<td>", $row["Status"], "</td>";
				// if ($row["Status"]) {
				// } else {
				// 	echo "<td>Pending</td>";
				// }
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


		include("./footer.php");
		?>