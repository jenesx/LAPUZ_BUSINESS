<?php require_once 'models.php'; ?>
<?php require_once 'dbconfig.php'; 
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php">Return to home</a>
	<h1>Add New Product</h1>
	<form action="handleforms.php?seller_id=<?php echo $_GET['seller_id']; ?>" method="POST">
		<p>
			<label for="products">Products Name</label> 
			<input type="text" name="productsname">
		</p>
		<p>
			<label for="materialused">Material Used</label> 
			<input type="text" name="materialused">
			<input type="submit" name="insertproductsbtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Product ID</th>
	    <th>Products Name</th>
	    <th>Material Used</th>
	    <th>Product Owner</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getproductsByseller = getproductsByseller($pdo, $_GET['seller_id']); ?>
	  <?php foreach ($getproductsByseller as $row) { ?>
	  <tr>
	  	<td><?php echo $row['products_id']; ?></td>	  	
	  	<td><?php echo $row['productsname']; ?></td>	  	
	  	<td><?php echo $row['materialused']; ?></td>	  	
	  	<td><?php echo $row['products_owner']; ?></td>	  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editproducts.php?products_id=<?php echo $row['products_id']; ?>&seller_id=<?php echo $_GET['seller_id']; ?>">Edit</a>
	  		<a href="deleteproducts.php?products_id=<?php echo $row['products_id']; ?>&seller_id=<?php echo $_GET['seller_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>