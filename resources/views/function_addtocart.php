<?php 
  include_once 'database.php';
  include 'session.php';

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Create
	if (isset($_GET['addToCart'])) {
		try {
		
			$stmt = $conn->prepare("INSERT INTO tbl_cart(product_id, product_size, quantity, customer_id) VALUES(:prodId, :prodSize, :prodQuantity, :custId)");
		
			$stmt->bindParam(':prodId', $id, PDO::PARAM_STR);
			$stmt->bindParam(':prodSize', $prodSize, PDO::PARAM_STR);
			$stmt->bindParam(':prodQuantity', $prodQuantity, PDO::PARAM_STR);
			$stmt->bindParam(':custId', $custId, PDO::PARAM_STR);
			
			$id = $_GET['prodId'];
			$prodSize = $_GET['prodSize'];
			$prodQuantity = $_GET['prodQuantity'];
			$custId = $_GET['custId'];

			$stmt->execute();

			echo "<script> window.location.href='/product-details?id=' + $id; </script>";
			}
		
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	} else if(isset($_GET['placeOrder'])) {
		try {
	 
			$stmt = $conn->prepare("INSERT INTO tbl_cart(product_id, product_name, customer_id, product_size, quantity) VALUES(:prodId, :prodName, :userId, :prodSize, :prodQuantity)");
		   
			$stmt->bindParam(':prodId', $id, PDO::PARAM_STR);
			$stmt->bindParam(':prodName', $prodName, PDO::PARAM_STR);
			$stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
			$stmt->bindParam(':prodSize', $prodSize, PDO::PARAM_STR);
			$stmt->bindParam(':prodQuantity', $prodQuantity, PDO::PARAM_STR);
			   
			$id = $_GET['prodId'];
			$prodName = $_GET['prodName'];
			$userId = $sessionname;
			$prodSize = $_GET['prodSize'];
			$prodQuantity = $_GET['prodQuantity'];
	
			$stmt->execute();
	
			echo "<script> window.location.href='/product-details?id=' + $id; </script>";
			}
		 
		  catch(PDOException $e)
		  {
			  echo "Error: " . $e->getMessage();
		  }
	}
?>