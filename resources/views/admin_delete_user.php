<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include ('database.php');
$mysqli = new mysqli($servername, $username, $password,$dbname);
$userId=$_GET['id'];

$stmt = $mysqli->prepare("DELETE FROM tbl_customer WHERE id='".$userId."'");
$stmt->execute();
$deleteSuccess = $stmt->execute();
// Ensure that this is before any HTML or echo statements.
if ($deleteSuccess) {
    // Redirect to cart.php if the delete was successful.
    header('Location: /admin_user');
    exit; // Always call exit after a redirect header.
} else {
    // Handle error here if the deletion was not successful.
    exit('Error deleting row');
}

$stmt->close();
