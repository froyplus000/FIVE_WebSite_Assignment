<?php include("./header.inc"); ?>


<title>Home</title>
</head>

<body>




	<!-- Navbar with HAM - OLD-->
	<nav id="main-nav" class="container">


		<h1 id="logo">Five-5</h1>
		<!-- Hamburger Menu -->
		<label class="hamburger_menu">
			<input type="checkbox">
		</label>
		<aside class="sidebar">

			<ul>
				<li><a href="index.php" class="active">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="jobs.php">Jobs Description</a></li>
				<li><a href="apply.php">Apply Now</a></li>
				<li><a href="manage.php">Management</a></li>
				<li><a href="enhancement.php">Our Website Enhancement</a></li>
			</ul>
		</aside>
	</nav>

	<!-- New navbar with HAM -->
	<!-- <nav id="main-nav" class="container">

		<ul class="nav-bar">
			<li>
				<h1 id="logo">Five-5</h1>
			</li>
			<li>
				<label class="hamburger_menu">
					<input type="checkbox">
				</label>
			</li>
			<li>
				<aside class="sidebar">
					<ul>
						<li><a href="index.php" class="active">Home</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="jobs.html">Jobs Description</a></li>
						<li><a href="apply.html">Apply Now</a></li>
						<li><a href="manage.php">Management</a></li>
						<li><a href="enhancement.html">Our Website Enhancement</a></li>
					</ul>
				</aside>
			</li>
		</ul> 



	</nav> -->



	<!-- Welcome Section -->
	<div id="welcome">
		<div class="container">
			<div>
				<h1 id="welcome_text">Welcome <br>To <br>Our Website</h1>
				<p id="welcome_p"><a href="https://youtu.be/96y7AZGqSPo"> -> Our Presentation</a></p>
			</div>
			<h1 id="five_icon">5</h1>
		</div>
	</div>



	<!-- About Us Section -->
	<section id="about_home" class="container">
		<!-- About Us Section Image (about_us.jpg) : https://unsplash.com/photos/vdXMSiX-n6M -->
		<img id="about_home_img" src="./styles/images/about_us.jpg" alt="Teams">

		<div id="about_home_content">
			<h2>About Us</h2>
			<p>
				Welcome to <span class="highlight_text">Five</span>, your pathway to a brighter technological future!
				<br>
				We are a dedicated team of tech enthusiasts united by a common goal: to play a vital role in propelling
				the world forward through the power of technology.
				We want to makes your days smoother, less stressful, and filled with happiness, courtesy of the
				innovative tech solutions we bring to life.
			</p>
			<a class="btn" href="./about.html">Learn More</a>
		</div>

	</section>


	<!-- Jobs Section -->

	<!-- Jobs Section Image (our_journey.jpg) : https://unsplash.com/photos/rxpThOwuVgE -->
	<div id="jobs_img"></div>
	<div id="jobs_home" class="container">
		<div id="jobs_home_content">
			<h2>Jobs</h2>
			<p>
				Are you ready to embark on a journey of innovation and positive impact? <br>
				At <span class="highlight_text">Five</span>, you'll have the opportunity to contribute to projects that
				matter, collaborate with experts, and constantly expand your horizons in an environment that values your
				growth. <br>
				Join us in creating technology that makes lives easier, reduces stress, and brings happiness to people's
				daily routines.
			</p>

			<a class="btn" href="./jobs.html">See all Avaliable Jobs</a>

		</div>
	</div>


	<!-- Contacts Section -->
	<div id="contacts_home">
		<h1>Our Contacts</h1>
		<div>
			<div class="contacts">
				<h2>Our Office</h2>
				<p>123 Innovation Street, Melbourne, Australia</p>
			</div>
			<div class="contacts">
				<h2>Email</h2>
				<p>info@fivetechmelbourne.com.au, 103883220@student.swin.edu.au</p>
			</div>
			<div class="contacts">
				<h2>Phone</h2>
				<p>+61 3 2389 8739</p>
			</div>
		</div>
	</div>



	<?php include("./footer.inc"); ?>