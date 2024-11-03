<?php require_once 'handleforms.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getsellerByID = getsellerByID($pdo, $_GET['seller_id']); ?>
	<h1>Edit the Seller</h1>
	<form action="handleforms.php?seller_id=<?php echo $_GET['seller_id']; ?>" method="POST">
		<p>
			<label for="sellername">Seller Name</label> 
			<input type="text" name="sellername" value="<?php echo $getsellerByID['sellername']; ?>">
		</p>
		<p>
			<label for="lastname">Last Name</label> 
			<input type="text" name="lastname" value="<?php echo $getsellerByID['lastname']; ?>">
		</p>
		<p>
			<label for="contact_no">Contact Number</label> 
			<input type="text" name="contact_no" value="<?php echo $getsellerByID['contact_no']; ?>">
		</p>
		<p>
			<label for="specialization">Specialization</label> 
			<input type="text" name="specialization" value="<?php echo $getsellerByID['specialization']; ?>">
			<input type="submit" name="editsellerbtn">
		</p>
	</form>
</body>
</html>
