<?php
 
 include_once 'session.php';
include_once 'database.php';

 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_GET['insertReview'])) {
 
  try {
    $stmt = $conn->prepare("INSERT INTO tbl_product_review(cust_id, product_id, rating, subject, review) VALUES(:id, :prodid, :rating, :subjectReview, :review)");

    $stmt->bindParam(':rating', $prodRate, PDO::PARAM_STR);
    $stmt->bindParam(':subjectReview', $prodSubject, PDO::PARAM_STR);
    $stmt->bindParam(':review', $prodReview, PDO::PARAM_STR);
    $stmt->bindParam(':id', $userId, PDO::PARAM_STR);
    $stmt->bindParam(':prodid', $productId, PDO::PARAM_STR);
    
    $prodRate = $_GET['rate'];
    // $prodSubjectReview = $_GET['subject_review'];
    $prodReview = $_GET['review'];
    $prodSubject = $_GET['subjectReview'];
    $userId = $_GET['userid'];
    $productId = $_GET['prodid'];
 
    $stmt->execute();

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    $stmt2 = $mysqli->prepare("SELECT Count(rating) AS count, AVG(rating) AS avgreview FROM `tbl_product_review` WHERE product_id = $productId");
    $stmt2->execute();

    $result = $stmt2->get_result();
    
    foreach($result as $average) {
      $avg = $average['avgreview'];
      $count = $average['count'];
    }
    
    $stmt2->close();

    $stmt3 = $conn->prepare("UPDATE tbl_products SET product_Rating = :avgrating WHERE product_Id = $productId");

    $stmt3->bindParam(':avgrating', $avg, PDO::PARAM_STR);
 
    $stmt3->execute();
   
    echo "
        <script>
            window.onload = function() {
                alert('You review already sent!'); window.location.href='\product-details?id=$productId'; 
            };
        </script>";
    }
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 

 