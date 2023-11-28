<?php
include_once 'database.php';
session_start();
if (isset($_GET['addtocart'])) {
    
   try {
    
    $psize = $_GET['size'];
    $stmt7 = $mysqli1->prepare("SELECT * FROM tbl_product_variation where fld_product_id=$id AND 	fld_product_size=$psize"); 
    $stmt7->execute();
    $result = $stmt7->fetchAll();
 
    
  if (count($result) == 0) {
   
    echo"<script>

    alert('Tak jadi ooiiiiiiiiiii');

    </script>";
   
}else{

  foreach ($result as $row) {
  echo $row['fld_product_color'];
  echo $row['fld_product_size'];
}
}
}

catch(PDOException $e) {
    echo "salahhhhhhhh";
}
}
?>
