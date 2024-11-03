<?php require_once 'models.php'; ?>
<?php require_once 'dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Would you really like to remove this seller?</h1>
	<?php $getsellerByID = getsellerByID($pdo, $_GET['seller_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Seller Name: <?php echo $getsellerByID['sellername']; ?></h2>
		<h2>Last Name: <?php echo $getsellerByID['lastname']; ?></h2>
		<h2>Contact Number: <?php echo $getsellerByID['contact_no']; ?></h2>
		<h2>Specialization: <?php echo $getsellerByID['specialization']; ?></h2>
		<h2>Date Added: <?php echo $getsellerByID['date_added']; ?></h2>

		<div class="deletebtn" style="float: right; margin-right: 10px;">
			<form action="handleforms.php?seller_id=<?php echo $_GET['seller_id']; ?>" method="POST">
				<input type="submit" name="deletesellerbtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
