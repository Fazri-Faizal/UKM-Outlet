<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_GET['insertProduct'])) {
 
  try {
    $stmt = $conn->prepare("INSERT INTO tbl_products(product_Name, product_Type, origin_id, product_Description) VALUES(:productName, :productType, :productOrigin, :productDescription)");

    $stmt->bindParam(':productName', $prodName, PDO::PARAM_STR);
    $stmt->bindParam(':productType', $prodType, PDO::PARAM_STR);
    $stmt->bindParam(':productOrigin', $prodOrigin, PDO::PARAM_STR);
    $stmt->bindParam(':productDescription', $prodDesc, PDO::PARAM_STR);

    $prodName = $_GET['productName'];
    $prodType = $_GET['productType'];
    $prodOrigin = $_GET['productOrigin'];
    $prodDesc = $_GET['productDescription'];
 
    $stmt->execute();
   
    echo "
        <script>
            window.onload = function() {
                alert('New Product Registered'); window.location.href='\seller_products'; 
            };
        </script>";
    }
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 

 