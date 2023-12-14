<?php
    include 'database.php';
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Create
    if (isset($_GET['updateProduct'])) {
    
    try {
        $stmt = $conn->prepare("UPDATE tbl_products SET product_Name = :productName, product_price = :productPrice, 
        product_Type = :productType, origin_id = :productOrigin, product_Description = :productDescription WHERE product_Id = :prod_Id");

        $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
        $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_STR);
        $stmt->bindParam(':productType', $productType, PDO::PARAM_STR);
        $stmt->bindParam(':productOrigin', $productOrigin, PDO::PARAM_STR);
        $stmt->bindParam(':productDescription', $productDescription, PDO::PARAM_STR);
        $stmt->bindParam(':prod_Id', $prod_Id, PDO::PARAM_STR);

        $productName = $_GET['productName'];
        $productPrice = $_GET['productPrice'];
        $productType = $_GET['productType'];
        $productOrigin = $_GET['productOrigin'];
        $productDescription = $_GET['productDescription'];
        $prod_Id = $_GET['prod_Id'];

        $stmt->execute();

        echo "<script> alert('Product updated!'); window.location.href='/seller_products'; </script>";
        }
        catch(PDOException $e)
        {
           echo "<script> alert('Error updating Product!');  </script>";
            echo "Error: " . $e->getMessage();
        }
}
 

 