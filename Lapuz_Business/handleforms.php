<?php 

require_once 'dbconfig.php'; 
require_once 'models.php';

session_start();

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

#Inserting a product

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


# Login Registration
if (isset($_POST['registerUserBtn'])) {

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username) && !empty($password)) {
		$insertQuery = insertNewUser($pdo, $username, $password);

		if ($insertQuery) {
			header("Location: login.php");
			exit();
		} else {
			header("Location: register.php");
			exit();
		}
	} else {
		$_SESSION['message'] = "Please make sure the input fields are not empty for registration.";
		header("Location: register.php");
		exit();
	}
}

# Login
if (isset($_POST['loginUserBtn'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username) && !empty($password)) {
		$loginQuery = loginUser($pdo, $username, $password);
	
		if ($loginQuery) {
			$_SESSION['username'] = $username;
			header("Location: index.php");
			exit();
		} else {
			$_SESSION['message'] = "Invalid username or password.";
			header("Location: login.php");
			exit();
		}
	} else {
		$_SESSION['message'] = "Please make sure the input fields are not empty for the login.";
		header("Location: login.php");
		exit();
	}
}

# Logout
if (isset($_GET['logoutAUser'])) {
	unset($_SESSION['username']);
	header('Location: login.php');
	exit();
}

?>

