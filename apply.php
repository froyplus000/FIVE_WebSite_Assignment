<!--
	Group Name		: FIVE
	Group Number	: 5
    
    Author			: Pattarapol Tantechasa		Student ID:	103883220
    Author			: Sam Anderson 				Student ID:	104465030
    Author			: Ngoc Huy Duong 			Student ID:	104471956


-->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Apply Page" />
	<meta name="keywords" content="HTML, Form, tags" />
	<meta name="author" content="FIVE" />
	<link rel="stylesheet" href="./styles/style_1.css">
	<link rel="stylesheet" href="customUploadStyle.css">
	<link rel="stylesheet" href="https://font.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
	<title>Apply Form</title>
</head>
<?php
require_once('processEOI.php');
if (isset($_REQUEST['submit'])){
	$Programming_language = implode(", ",$_REQUEST['Programming_Language']);
	$insert_query = mysqli_query($con,"insert into ApplyForm_Assignment2 set Programming_Language=$Programming_language");
}

?>
<body class="apply">

	<!-- Navbar -->
	<nav id="main-nav" class="container">
		<h1 id="logo">Five-5</h1>
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="about.html">About Us</a></li>
			<li><a href="jobs.html">Jobs Description</a></li>
			<li><a href="apply.html" class="active">Apply Now</a></li>
			<li><a href="enhancement.html">Our Website Enhancement</a></li>
		</ul>
	</nav>

	<div class="container">

		<h1 class="apply_title">Job Application</h1>
		<form action="processEOI.php" method="post">
			<fieldset class="personal_info">
				<legend><strong> Personal information </strong></legend>
				<p><label class="required" for="first name">First Name:</label><br>
					<input class="texts" type="text" name="Firstname" id="firstname" maxlength="20" size="20"
						placeholder="max is 20 alpha characters" pattern="[A-Z\s]+" required>
				</p>
				<p>
					<label class="required" for="last name">Last Name:</label><br>

					<input class="texts" type="text" name="Lastname" id="lastname" maxlength="20" size="20"
						placeholder="max is 20 alpha characters" pattern="[A-Z]]+" required>
				</p>
				<p>
					<label class="required" for="dob">Date of birth:</label><br>
					<input class="texts" type="date" name="Dob" id="dob" webkitdirectory style="cursor: pointer"
						required>
				<p class="required"> Gender:</p>
				<label for="male">Male</label>
				<input type="radio" name="Gender" value="Male" required>
				<label for="female">Female</label>
				<input type="radio" name="Gender" Value="Female" required>
				</p>
				<p>
					<label class="required" for="email">Email:</label><br>
					<input class="texts" type="email" id="email" name="Email" placeholder="username@gmail.com" required>
				</p>
				<p> <label class="required" for="phone">Phone number:</label><br>
					<input class="texts" type="text" id="phone" maxlength="12" name="Phone"
						placeholder="only 8-12 digits" pattern=[0-9]+ required>
				</p>
			</fieldset>
			<fieldset class="house_address">

				<legend><strong>Housing information</strong></legend>

				<p>
					<label class="required" for="address">Street Address:</label><br>
					<input class="texts" type="text" id="address" maxlength="40" name="Address"
						placeholder="max is 40 characters" required>
				</p>
				<p>
					<label class="required" for="suburb">Suburb/Town:</label><br>
					<input class="texts" type="text" id="suburb" maxlength="40" name="Suburb"
						placeholder="max is 40 characters" required>
				</p>
				<p>
					<label class="required" for="state">State:</label><br>
					<select class="a" name="State" id="state" required>
						<option class="a" value="">Please select</option>
						<option class="a" value="vic">VIC</option>
						<option class="a" value="nsw">NSW</option>
						<option class="a" value="qld">QLD</option>
						<option class="a" value="nt">NT</option>
						<option class="a" value="wa">WA</option>
						<option class="a" value="sa">SA</option>
						<option class="a" value="tas">TAS</option>
						<option class="b" value="act">ACT</option>
					</select>
				</p>
				<p>
					<label class="required" for="postcode">Postcode:</label><br>
					<input class="texts" type="tel" id="postcode" maxlength="4" name="Postcode"
						placeholder="Only put 4 digits" required pattern="[0-9\s]{4}">
				</p>
			</fieldset>
			<fieldset class="job_info">
				<legend><strong>Position information</strong></legend>
				<label class="required" for="pick_job">Which job prefer to choose in our company:</label><br>
				<select name="Job_prefer" id="state" required>
					<option value="">Please select</option>
					<option value="Softwar Developer">Software Developer</option>
					<option value="IT Support Associate">IT Support Associate</option>
				</select>
				<p class="word">
					Click here if you want to read again about the
					<a href="jobs.html">Job Description</a>
				</p>
				<p>
					<label class="required" for="jobnumber">Job reference number:</label>
					<input class="texts" type="text" id="jobnumber" maxlength="5" name="Job_reference_number"
						placeholder="Only put 5 characters" required pattern="[a-zA-Z0-9\s]+">
				</p>
				<hr>
				<p class="required"> Which programming languague you have most experience with (required): </p>
				<p>
					<label for="python">Python</label>
					<input type="checkbox" name="Programming_Language[]" value="Python" id="python">
					<label for="java">Java</label>
					<input type="checkbox" value="Java" name="Programming_Language[]" id="java">
				</p>
				<p>
					<label for="html">Html</label>
					<input type="checkbox" id="html" name="Programming_Language[]" value="Html">
					<label for="c">C/C++</label>
					<input type="checkbox" id="c" name="Programming_Language[]" value="C/C+">
				</p>
				<p>
					<label for="other">Other programming languagues:</label><br>
					<textarea id="others" name="Programiing_Languages[]" rows="4" cols="50"
						placeholder="Please write other programming languagues that you good at in here..."></textarea>
				</p>
				<hr>
				<p class="required">Skill List (required):</p>
				<p>
					<label for="maths">Math and numerical reasoning skills</label>
					<input type="checkbox" id="maths" name="Skills[]" value="Math and numerical reasoning skills">
				</p>
				<p>
					<label for="tech">Technology knowledge and skills</label>
					<input type="checkbox" id="tech" name="Skills[]" value="Technology knowledge and skills">
				</p>
				<p>
					<label for="prob">Analyse and trace problems</label>
					<input type="checkbox" id="prob" name="Skills[]" value="Analyse and trace problems">
				</p>
				<p>
					<label for="detail">Meticulous attention to details</label>
					<input type="checkbox" id="detail" name="Skills[]" value="Meticulous attention to details">
				</p>
				<p>
					<label for="organise">Organise and classify large amounts of information</label>
					<input type="checkbox" id="organise" name="Skills[]"
						value="Organise and classify large amounts of information">
				</p>
				<p>
					<label for="others"> Other Skills:</label><br>
					<textarea id="others" name="Skills[]" rows="4" cols="50"
						placeholder="Please write other skills that you good at in here..."></textarea>
				</p>
			</fieldset>
			<fieldset class="sumbit">
				<legend><strong>Submit your resume</strong></legend>
				<div>
					<input type="file" class="upload-box" required>
				</div>
			</fieldset>
			<hr>
			<div class="tacbox">
				<input id="check" type="checkbox" required />
				<label for="check"><strong>Please tick the box after read the <a href="terms_and_conditions.html"> terms
							and conditions </a></strong></label>
			</div>

			<button class="submit" name="submit">Apply</button>
			<button type="reset" class="redo">Reset form</button>
		</form>
		<a href="#" class="back-to-top">
			<span class="material-icons">arrow_upward</span>
		</a>
	</div>
	<!-- Footer -->
	<footer>
		<div class="footer_made">
			<p>Copyright &copy; 2023 Five-5. All rights reserved</p>
			<p>Australia</p>
		</div>
	</footer>
</body>

</html>