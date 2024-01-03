<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include ('database.php');
$mysqli = new mysqli($servername, $username, $password,$dbname);
$orderId=$_GET['order_id'];

$stmt = $mysqli->prepare("UPDATE tbl_order SET prod_status = 'Shipped' WHERE order_id = $orderId AND prod_status = 'To Ship';");
$stmt->execute();
$updateStatusSuccess = $stmt->execute();
// Ensure that this is before any HTML or echo statements.
if ($updateStatusSuccess) {
    // Redirect to cart.php if the delete was successful.
    header('Location: /seller_order_completed');
    exit; // Always call exit after a redirect header.
} else {
    // Handle error here if the deletion was not successful.
    exit('Error updating row');
}

$stmt->close();

?>
