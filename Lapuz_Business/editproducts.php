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
	<a href="viewprojects.php?products_id=<?php echo $_GET['products_id']; ?>">View The Products</a>
	<h1>Revise the project</h1>
	<?php $getproductsByID = getproductsByID($pdo, $_GET['products_id']); ?>
	<form action="handleforms.php?products_id=<?php echo $_GET['products_id']; ?>
	&seller_id=<?php echo $_GET['seller_id']; ?>" method="POST">
		<p>
			<label for="productsname">Product Name</label> 
			<input type="text" name="productsname" 
			value="<?php echo $getproductsByID['productsname']; ?>">
		</p>
		<p>
			<label for="materialused">Material Used</label> 
			<input type="text" name="materialused" 
			value="<?php echo $getproductsByID['materialused']; ?>">
			<input type="submit" name="editproductsbtn">
		</p>
	</form>
</body>
</html>
