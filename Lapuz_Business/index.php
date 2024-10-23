<?php require_once 'dbconfig.php'; ?>
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
	<h1>Online Seller Registration. Input your details here.</h1>
	<form action="handleforms.php" method="POST">
		<p>
			<label for="sellername">SELLER NAME</label> 
			<input type="text" name="sellername">
		</p>
		<p>
			<label for="lastname">LAST NAME</label> 
			<input type="text" name="lastname">
		</p>
		<p>
			<label for="contact_no">CONTACT NUMBER</label> 
			<input type="text" name="contact_no">
		</p>
		<p>
			<label for="specialization">Specialization</label> 
			<input type="text" name="specialization">
			<input type="submit" name="insertsellerbtn">
		</p>
	</form>
	<?php $getAllseller = getAllseller($pdo); ?>
	<?php foreach ($getAllseller as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Seller Name: <?php echo $row['sellername']; ?></h3>
		<h3>Last Name: <?php echo $row['lastname']; ?></h3>
		<h3>Contact Number: <?php echo $row['contact_no']; ?></h3>
		<h3>Specialization: <?php echo $row['specialization']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>

		<div class="editAnddelete" style="float: right; margin-right: 20px;">
			<a href="viewproducts.php?seller_id=<?php echo $row['seller_id']; ?>">View Products</a>
			<a href="editseller.php?seller_id=<?php echo $row['seller_id']; ?>">Edit</a>
			<a href="deleteseller.php?seller_id=<?php echo $row['seller_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>