<?php 

require_once 'dbconfig.php'; 
require_once 'models.php';

if (isset($_POST['insertsellerbtn'])) {

	$query = insertseller($pdo, $_POST['sellername'], $_POST['lastname'], 
		$_POST['contact_no'], $_POST['specialization']);

	if ($query) {
		header("Location: index.php");
	}
	else {
		echo "Insertion failed";
	}

}

#Updating a Seller

if (isset($_POST['editsellerbtn'])) {
	$query = updateseller($pdo, $_POST['sellername'], $_POST['lastname'], 
		$_POST['contact_no'], $_POST['specialization'], $_GET['seller_id']);

	if ($query) {
		header("Location: index.php");
	}

	else {
		echo "Edit failed";
	}

}

#Deleting a Seller

if (isset($_POST['deletesellerbtn'])) {
	$query = deleteseller($pdo, $_GET['seller_id']);

	if ($query) {
		header("Location: index.php");
	}

	else {
		echo "Deletion failed";
	}
}

#Inserting a NEW TABLE

if (isset($_POST['insertproductsbtn'])) {
	$query = insertproducts($pdo, $_POST['productsname'], $_POST['materialused'], $_GET['seller_id']);

	if ($query) {
		header("Location: viewproducts.php?seller_id=" .$_GET['seller_id']);
	}
	else {
		echo "Insertion failed";
	}
}

#Editing a product

if (isset($_POST['editproductsbtn'])) {
	$query = updateproducts($pdo, $_POST['productsname'], $_POST['materialused'], $_GET['products_id']);

	if ($query) {
		header("Location: viewproducts.php?seller_id=" .$_GET['seller_id']);
	}
	else {
		echo "Update failed";
	}

}

#Deleting the products

if (isset($_POST['deleteproductsbtn'])) {
	$query = deleteproducts($pdo, $_GET['products_id']);

	if ($query) {
		header("Location: viewproducts.php?seller_id=" .$_GET['seller_id']);
	}
	else {
		echo "Deletion failed";
	}
}

?>


