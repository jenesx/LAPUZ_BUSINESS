<?php 
require_once 'models.php'; 
require_once 'handleforms.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LogIn</title>
	<style>
		body {
	font-family: "Times New Roman";
	}
	input {
		font-size: 1.5em;
		height: 50px;
		width: 200px;
	}
	table, th, td {
		border:1px solid black;
	}
	</style>
</head>
<body>
<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
	<?php } unset($_SESSION['message']); ?>
	<h1>Login Now</h1>
	<form action="handleforms.php" method="POST">
		<p>
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>
		</p>
		<p>
			<label for="username">Password</label>
			<input type="password" id="password" name="password" required>
			<button type="submit" name="loginUserBtn">Login</button>
		</p>
	</form>
	<p>Don't have an account? You may register <a href="register.php">here</a></p>
</body>
</html>