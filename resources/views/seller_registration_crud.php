<?php
include ('database.php');
include('session.php');
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cust_id = $_GET['cust_id'];

$stmt = $conn->prepare("INSERT INTO tbl_customer(seller_type,Fullname,student_id,phone,shop_name,shop_add) VALUES(:seller_Type,:fullname,:matric,:phone,:shopname,:shopaddr)");
$stmt2 = $conn->prepare("UPDATE tbl_customer SET role ='Seller' WHERE id = '$user_id'");

    $stmt->bindParam(':seller_Type', $sellertype, PDO::PARAM_STR); 
    $stmt->bindParam('fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':matric', $matric, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':shopname', $shopname, PDO::PARAM_STR);
    $stmt->bindParam(':shopaddr', $shopaddr, PDO::PARAM_STR);

    $sellertype = $_GET['seller_type'];
    $fullname = $_GET['Fullname'];
    $matric = $_GET['student_id'];
    $phone = $_GET['phone'];
    $shopname = $_GET['shop_name'];
    $shopaddr = $_GET['shop_add'];


$stmt2->execute();
$InsertSuccess = $stmt->execute();
// Ensure that this is before any HTML or echo statements.
if ($InsertSuccess) {
    // Redirect to cart.php if the delete was successful.
    header('Location: /seller_dashboard');
    exit; // Always call exit after a redirect header.
} else {
    // Handle error here if the deletion was not successful.
    exit('Error deleting row');
}

$stmt->close();