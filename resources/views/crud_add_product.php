<?php
 
include_once 'database.php';
$mysqli = new mysqli($servername, $username, $password, $dbname);
$stmt3 = $mysqli->prepare("SELECT * FROM tbl_product_pic ");
    $stmt3->execute();

    $handler = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);
    $count=0;
    $image=array(); 
    foreach($handler as $row) {
     $image[$count]=$row['foldername'];
    $count++;
    }
$imagenum= $count;
  if($count<24){
    $uploadimage=$image[0];
  }else{
    $uploadimage=$image[12];
  }
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_GET['insertProduct'])) {
  try {
    $stmt = $conn->prepare("INSERT INTO tbl_products(product_Name, product_Type, origin_id, product_Description, product_price, seller_ids,pic) VALUES(:productName, :productType, :productOrigin, :productDescription, :productPrice, :sellerId ,:pic)");

    $stmt->bindParam(':productName', $prodName, PDO::PARAM_STR);
    $stmt->bindParam(':productType', $prodType, PDO::PARAM_STR);
    $stmt->bindParam(':productOrigin', $prodOrigin, PDO::PARAM_STR);
    $stmt->bindParam(':productDescription', $prodDesc, PDO::PARAM_STR);
    $stmt->bindParam(':productPrice', $prodPrice, PDO::PARAM_STR);
    $stmt->bindParam(':sellerId', $sellerId, PDO::PARAM_STR);
    $stmt->bindParam(':pic', $uploadimage, PDO::PARAM_STR);
    


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

if($imagenum<24) {

}
elseif($imagenum>=24) {
      
      $stmt4 = $conn->prepare("INSERT INTO tbl_product_3d_pic(fld_product_id , fld_image_1,fld_image_2,fld_image_3,fld_image_4,fld_image_5,fld_image_6,fld_image_7,fld_image_8,fld_image_9,fld_image_10,fld_image_11,fld_image_12,fld_image_13,fld_image_14,fld_image_15,fld_image_16,fld_image_17,fld_image_18,fld_image_19,fld_image_20,fld_image_21,fld_image_22,fld_image_23,fld_image_24) VALUES(:productId,:img1, :img2, :img3, :img4, :img5,:img6,:img7,:img8,:img9,:img10,:img11,:img12,:img13,:img14,:img15,:img16,:img17,:img18,:img19,:img20,:img21,:img22,:img23,:img24)");

      $stmt4->bindParam(':productId', $prodId, PDO::PARAM_STR);
      $stmt4->bindParam(':img1', $image[0], PDO::PARAM_STR);
      $stmt4->bindParam(':img2', $image[1], PDO::PARAM_STR);
      $stmt4->bindParam(':img3', $image[2], PDO::PARAM_STR);
      $stmt4->bindParam(':img4', $image[3], PDO::PARAM_STR);
      $stmt4->bindParam(':img5', $image[4], PDO::PARAM_STR);
      $stmt4->bindParam(':img6', $image[5], PDO::PARAM_STR);
      $stmt4->bindParam(':img7', $image[6], PDO::PARAM_STR);
      $stmt4->bindParam(':img8', $image[7], PDO::PARAM_STR);
      $stmt4->bindParam(':img9', $image[8], PDO::PARAM_STR);
      $stmt4->bindParam(':img10', $image[9], PDO::PARAM_STR);
      $stmt4->bindParam(':img11', $image[10], PDO::PARAM_STR);
      $stmt4->bindParam(':img12', $image[11], PDO::PARAM_STR);
      $stmt4->bindParam(':img13', $image[12], PDO::PARAM_STR);
      $stmt4->bindParam(':img14', $image[13], PDO::PARAM_STR);
      $stmt4->bindParam(':img15', $image[14], PDO::PARAM_STR);
      $stmt4->bindParam(':img16', $image[15], PDO::PARAM_STR);
      $stmt4->bindParam(':img17', $image[16], PDO::PARAM_STR);
      $stmt4->bindParam(':img18', $image[17], PDO::PARAM_STR);
      $stmt4->bindParam(':img19', $image[18], PDO::PARAM_STR);
      $stmt4->bindParam(':img20', $image[19], PDO::PARAM_STR);
      $stmt4->bindParam(':img21', $image[20], PDO::PARAM_STR); 
      $stmt4->bindParam(':img22', $image[21], PDO::PARAM_STR); 
      $stmt4->bindParam(':img23', $image[22], PDO::PARAM_STR);
      $stmt4->bindParam(':img24', $image[23], PDO::PARAM_STR);  
      
      $stmt4->execute();
}

    $stmt5 = $mysqli->prepare("DELETE FROM tbl_product_pic");
    $stmt5->execute();

   
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
 

 