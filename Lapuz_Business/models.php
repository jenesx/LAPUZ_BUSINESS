<?php  

require_once 'dbconfig.php';

function insertseller($pdo, $sellername, $lastname, $contact_no, $specialization) {

	$sql = "INSERT INTO seller (sellername, lastname, 
		contact_no, specialization) VALUES(?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$sellername, $lastname, 
		$contact_no, $specialization]);

	if ($executeQuery) {
		return true;
	}
}

#Updating the seller

function updateseller($pdo, $sellername, $lastname, $contact_no, $specialization, $seller_id) {

	$sql = "UPDATE seller
				SET sellername = ?,
					lastname = ?, 
                    contact_no = ?,
					specialization = ?
				WHERE seller_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$sellername, $lastname, $contact_no, $specialization, $seller_id]);
	
	if ($executeQuery) {
		return true;
	}

}

#Deleting a seller

function deleteseller($pdo, $seller_id) {
	$deleteseller = "DELETE FROM seller WHERE seller_id = ?";
	$deleteStmt = $pdo->prepare($deleteseller);
	$executeDeleteQuery = $deleteStmt->execute([$seller_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM seller WHERE seller_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$seller_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

#Getting all the seller

function getAllseller($pdo) {
	$sql = "SELECT * FROM seller";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

#Getting seller by their ID

function getsellerByID($pdo, $seller_id) {
	$sql = "SELECT * FROM seller WHERE seller_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$seller_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

#Getting the products

function getproductsByseller($pdo, $seller_id) {
	
	$sql = "SELECT 
				products.products_id AS products_id,
				products.productsname AS productsname,
				products.materialused AS materialused,
				products.date_added AS date_added,
				CONCAT(seller.sellername,' ',seller.lastname) AS products_owner
			FROM products
			JOIN seller ON products.seller_id = seller.seller_id
			WHERE products.seller_id = ? 
			GROUP BY products.productsname;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$seller_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

#Inserting data on products

function insertproducts($pdo, $productsname, $materialused, $seller_id) {
	$sql = "INSERT INTO products (productsname, materialused, seller_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$productsname, $materialused, $seller_id]);
	if ($executeQuery) {
		return true;
	}

}

#Getting the products by ID

function getproductsByID($pdo, $products_id) {
	$sql = "SELECT 
				products.products_id AS products_id,
				products.productsname AS productsname,
				products.materialused AS materialused,
				products.date_added AS date_added,
				CONCAT(seller.sellername,' ',seller.lastname) AS products_owner
			FROM products
			JOIN seller ON products.seller_id = seller.seller_id
			WHERE products.products_id  = ? 
			GROUP BY products.productsname";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$products_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

#Updating the products

function updateproducts($pdo, $productname, $materialused, $products_id) {
	$sql = "UPDATE products
			SET productsname = ?,
				materialused = ?
			WHERE products_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$productname, $materialused, $products_id]);

	if ($executeQuery) {
		return true;
	}
}

#Deleting a product

function deleteproducts($pdo, $products_id) {
	$sql = "DELETE FROM products WHERE products_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$products_id]);
	if ($executeQuery) {
		return true;
	}
}

#Inserting a USER

function insertNewUser($pdo, $username, $password) {

	$checkUserSql = "SELECT * FROM user_passwords WHERE username = ?";
	$checkUserSqlStmt = $pdo->prepare($checkUserSql);
	$checkUserSqlStmt->execute([$username]);

	if ($checkUserSqlStmt->rowCount() == 0) {

		$sql = "INSERT INTO user_passwords (username,password) VALUES(?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$username, $password]);

		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted";
			return true;
		}
		else {
			$_SESSION['message'] = "An error occured from the query";
		}

	}
	else {
		$_SESSION['message'] = "User already exists";
	}

	
}

#Loging in the User

function loginUser($pdo, $username, $password) {
	$sql = "SELECT * FROM user_passwords WHERE username=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$username]); 

	if ($stmt->rowCount() == 1) {
		$userInfoRow = $stmt->fetch();
		$usernameFromDB = $userInfoRow['username']; 
		$passwordFromDB = $userInfoRow['password'];

		if ($password == $passwordFromDB) {
			$_SESSION['username'] = $usernameFromDB;
			$_SESSION['message'] = "Login successful!";
			return true;
		}

		else {
			$_SESSION['message'] = "Password is invalid, but user exists";
		}
	}

	
	if ($stmt->rowCount() == 0) {
		$_SESSION['message'] = "Username doesn't exist from the database. You may consider registration first";
	}

}

#Getting all the users

function getAllUsers($pdo) {
	$sql = "SELECT * FROM user_passwords";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}

}

#Getting the user by their ID

function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM user_passwords WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

?>