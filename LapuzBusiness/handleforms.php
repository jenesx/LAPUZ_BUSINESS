<?php 

require_once 'dbconfig.php'; 
require_once 'models.php';

if (isset($_POST['insertSellerbtn'])) {

	$query = insertSellerbtn($pdo, $_POST['sellername'], $_POST['lastname'], 
		$_POST['contact_no'], $_POST['specialization']);

	if ($query) {
		header("Location: index.php");
	}
	else {
		echo "Insertion failed";
	}

}

#Updating a Seller

if (isset($_POST['editSellerbtn'])) {
	$query = updateSellerbtn($pdo, $_POST['sellername'], $_POST['lastname'], 
		$_POST['contact_no'], $_POST['specialization'], $_GET['seller_id']);

	if ($query) {
		header("Location: index.php");
	}

	else {
		echo "Edit failed";
	}

}

#Deleting a Seller

if (isset($_POST['deleteSellerbtn'])) {
	$query = deleteSellerbtn($pdo, $_GET['seller_id']);

	if ($query) {
		header("Location: index.php");
	}

	else {
		echo "Deletion failed";
	}
}

#Inserting a NEW TABLE

if (isset($_POST['insertBuyerbtn'])) {
	$query = insertBuyer($pdo, $_POST['buyername'], $_POST['lastname'], $_POST['contact_no'], $_POST['address'], $_GET['buyer_id']);

	if ($query) {
		header("Location: viewprojects.php?web_dev_id=" .$_GET['buyer_id']);
	}
	else {
		echo "Insertion failed";
	}
}

#Updating a Buyer

if (isset($_POST['editBuyerbtn'])) {
	$query = updateBuyer($pdo, $_POST['buyername'], $_POST['lastname'], $_POST['contact_no'], $_POST['adress'], $_GET['buyer_id']);

	if ($query) {
		header("Location: viewprojects.php?web_dev_id=" .$_GET['buyer_id']);
	}
	else {
		echo "Update failed";
	}

}

#Deleting a Buyer

if (isset($_POST['deletebuyerbtn'])) {
	$query = deleteBuyer($pdo, $_GET['buyer_id']);

	if ($query) {
		header("Location: viewprojects.php?web_dev_id=" .$_GET['buyer_id']);
	}
	else {
		echo "Deletion failed";
	}
}

?>



