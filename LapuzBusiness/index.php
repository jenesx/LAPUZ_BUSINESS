<?php require_once 'core/dbconfig.php'; ?>
<?php require_once 'core/models.php'; ?>
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
	<form action="core/handleforms.php" method="POST">
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
			<input type="submit" name="insertSellerbtn">
		</p>
	</form>
	<?php $getAllWebDevs = getAllWebDevs($pdo); ?>
	<?php foreach ($getAllWebDevs as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Username: <?php echo $row['username']; ?></h3>
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Specialization: <?php echo $row['specialization']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewprojects.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">View Projects</a>
			<a href="editwebdev.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">Edit</a>
			<a href="deletewebdev.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>