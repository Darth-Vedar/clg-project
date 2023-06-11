<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<link rel="stylesheet" type="text/css" href="Admin-panal.css">
</head>
<body>

	<header>
		<h1>Welcome to GITS Admin Panel</h1> <br>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Students</a></li>
				<li><a href="#">Faculty</a></li>
				<li><a href="#">Settings</a></li>
			</ul>
		</nav>
	</header>
	<main>
        <img src="/CODING/GITS LOGO.png" alt="" height="100">
		<h2>Welcome, <?php echo $user_data['user_name']; ?> </h2>
		<p>It is the admin panel for managing The Students Data.</p>
	</main>
	<footer>
		<p>&copy; 2023 GITS - Students Admin Panel. All rights reserved.</p>
	</footer>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>
	<br><br>
	<a href="logout.php">Logout</a>
</body>
</html>