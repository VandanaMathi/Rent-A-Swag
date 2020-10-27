<!DOCTYPE html>
<?php
session_start();

?>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="nav.css">
</head>

<body>
	<div class="logo"><a href="index.php" target="_blank"><img src="Images/rent.png" alt="logo" height="45" width="170"></a></div>
	<nav>
		<ul>
		<?php if(!isset($_SESSION["username"])){?>
			<li><a href="Login.php">Login</a></li>
			<li><a href="Registration.php">Registration</a></li>
		<?php }
		else{
		?>
			<li><a href="cart.php" target="_self">Cart</a></li>
			<li><a href="Logout.php">Logout</a></li>
		<?php } ?>
			<li><a href="chat.php" target="_self">Feedback</a></li>
			<li><a href="about.php" target="_self">About</a></li>
			<li><a href="profile.php" target="_self">My Profile</a></li>
			<li><a href="index.php" target="_self">Home</a></li>
			<li>
				<form class="search-form">
					<input type="text" placeholder="Search">
					<button>Search</button>
				</form>
			</li>
		</ul>
		</nav>
</body>

</html>