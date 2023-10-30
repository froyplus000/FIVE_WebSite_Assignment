<?php include("./header.inc"); ?>
<title>Home</title>
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
				<li><a href="manage.php">Management</a></li>
				<li><a href="enhancement.php" class="active">Our Website Enhancement</a></li>
			</ul>
		</aside>


	</nav>

	<div id="enhancement" class="container">
		<div>
			<h1>Animation</h1>
			<p>
				Small animation and transition had been added to the website <br>
				This helps enhance user experience and web nacigation from the initial brief
			</p>
			<br>
			<a href="" class="btn">Example of Hovering Animation</a>
		</div>
		<div>
			<h1>Responsive Design</h1>
			<p>
				Responsive design had been added to the website <br>
				This helps enhance user interface and user experience on all device screen sizes <br>
				Try Shrinking the window to see responsive design
			</p>
		</div>


	</div>



	<?php include("./footer.inc"); ?>