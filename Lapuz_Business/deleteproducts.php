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
	<?php $getproductsByID = getproductsByID($pdo, $_GET['products_id']); ?>
	<h1>Would you really like to remove this product?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Product Name: <?php echo $getproductsByID['productsname'] ?></h2>
		<h2>Material Used: <?php echo $getproductsByID['materialused'] ?></h2>
		<h2>Product Owner: <?php echo $getproductsByID['products_owner'] ?></h2>
		<h2>Date Added: <?php echo $getproductsByID['date_added'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="handleforms.php?products_id=<?php echo $_GET['products_id']; ?>&seller_id=<?php echo $_GET['seller_id']; ?>" method="POST">
				<input type="submit" name="deleteproductsbtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>
