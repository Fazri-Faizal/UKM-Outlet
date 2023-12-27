<?php
include ('database.php');
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$cust_id = $_GET['cust_id'];

$stmt = $conn->prepare("INSERT INTO tbl_checkout(customer_id,quantity,subtotal,cart_id,origin_id,product_size) VALUES(:cust_id,:qty,:subtotal,:cid,:orgid,:prodsize)");
$stmt = $conn->prepare("INSERT INTO tbl_checkout(customer_id,quantity,subtotal,cart_id,origin_id,product_size) VALUES(:cust_id,:qty,:subtotal,:cid,:orgid,:prodsize)");


    $stmt->bindParam(':cust_id', $cust_id, PDO::PARAM_STR); 
    $stmt->bindParam(':qty', $qty, PDO::PARAM_STR);
    $stmt->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
    $stmt->bindParam(':orgid', $orgid, PDO::PARAM_STR);
    $stmt->bindParam(':prodsize', $prodsize, PDO::PARAM_STR);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);

    $qty = $_GET['qty'];
    $subtotal = $_GET['subtotal'];
    $orgid = $_GET['orgid'];
    if (isset($_GET['prodsize']))
     {
        $prodsize=$_GET['prodsize'];
     }else{
        $prodsize="no size"; 
     }
    $cid = $_GET['cid'];
    $stmt2 = $conn->prepare("UPDATE tbl_cart SET quantity='$qty'WHERE cart_id='$cid' ");


$InsertSuccess = $stmt->execute();

$stmt2->execute();
// Ensure that this is before any HTML or echo statements.
if ($InsertSuccess) {
    // Redirect to cart.php if the delete was successful.
    header('Location: /checkout');
    exit; // Always call exit after a redirect header.
} else {
    // Handle error here if the deletion was not successful.
    exit('Error deleting row');
}

$stmt->close();