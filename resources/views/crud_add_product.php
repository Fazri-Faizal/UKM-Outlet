<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_GET['insertProduct'])) {
  try {
    $stmt = $conn->prepare("INSERT INTO tbl_products(product_Name, product_Type, origin_id, product_Description, product_price, seller_ids) VALUES(:productName, :productType, :productOrigin, :productDescription, :productPrice, :sellerId)");

    $stmt->bindParam(':productName', $prodName, PDO::PARAM_STR);
    $stmt->bindParam(':productType', $prodType, PDO::PARAM_STR);
    $stmt->bindParam(':productOrigin', $prodOrigin, PDO::PARAM_STR);
    $stmt->bindParam(':productDescription', $prodDesc, PDO::PARAM_STR);
    $stmt->bindParam(':productPrice', $prodPrice, PDO::PARAM_STR);
    $stmt->bindParam(':sellerId', $sellerId, PDO::PARAM_STR);

    $prodName = $_GET['productName'];
    $prodType = $_GET['productType'];
    $prodOrigin = $_GET['productOrigin'];
    $prodDesc = $_GET['productDescription'];
    $prodPrice= $_GET['productPrice'];
    $sellerId = $_GET['sellerId'];
 
    $stmt->execute();

    $mysqli = new mysqli($servername, $username, $password, $dbname);
    $stmt2 = $mysqli->prepare("SELECT * FROM tbl_products WHERE product_Name = '$prodName'");
    $stmt2->execute();

    $handler = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach($handler as $product) {
      $prodId = $product['product_Id'];
    }

    $stmt2->close();

    $size = $_GET['size'];
    $stock = $_GET['stock'];

    $newStock=array(); 
 
    foreach($stock as $filterstock) {
      if($filterstock != null)
        array_push($newStock, $filterstock); 
    }

    $count = 0;

    foreach($size as $sizeProd) {
      $sizeStock = $newStock[$count];

      $stmt3 = $conn->prepare("INSERT INTO tbl_product_variation(fld_product_id, fld_product_size, fld_product_stock) VALUES(:productId, :productSize, :productStock)");

      $stmt3->bindParam(':productId', $prodId, PDO::PARAM_STR);
      $stmt3->bindParam(':productSize', $sizeProd, PDO::PARAM_STR);
      $stmt3->bindParam(':productStock', $sizeStock, PDO::PARAM_STR);

      $stmt3->execute();

      $count++;
    }
   
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
 

 