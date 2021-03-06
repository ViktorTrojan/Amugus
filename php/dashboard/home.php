<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../../index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="../../css/home.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="shortcut icon" href="../../img/Logo-256px.ico" type="image/x-icon">
	<title>Home Page</title>
</head>

<body>
	<div class="login-container">
		<div class="top">
			<div class="logout">
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
			<h1>ProfilePicture</h1>
		</div>

		<p>User: <?= $_SESSION['name'] ?></p>
		<p>Password: *****</p>
		<p>E-Mail: <?= $_SESSION['email'] ?></p>
		<p>Account State: </p>
		<p>Account Type: </p>
		<p>Account Created: </p>
	</div>

	<nav class="navtop">
		<div>
			<h1>Amugus</h1>
			<a href="../../index.html"><i class="fas fa-sign-out-alt"></i>Back</a>
			<!-- <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a> -->
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
		</div>
	</nav>
	<div class="content">
		<h2>Home Page</h2>
		<p>Welcome back, <?= $_SESSION['name'] ?>!</p>

	</div>
</body>

</html>