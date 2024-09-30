<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>f698ead8 - Rock Paper Scissors</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Rock Paper Scissors</h1>
		<?php if (!isset($_SESSION['username'])) { ?>
			<form action="login.php" method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<button>Login</button>
			</form>
			<a href="register.php">Register</a>
		<?php } else { ?>
			<p>Welcome, <?php echo $_SESSION['username']; ?></p>
			<a href="game.php">Play Game</a>
			<a href="logout.php">Logout</a>
		<?php } ?>
	</div>
</body>
</html>


