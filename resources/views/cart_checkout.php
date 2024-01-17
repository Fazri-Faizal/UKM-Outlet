<?php
include('database.php');

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['cust_id'], $_GET['qty'], $_GET['subtotal'], $_GET['orgid'], $_GET['cid'])) {
    $cust_id = $_GET['cust_id'];
    $qty = $_GET['qty'];
    $subtotal = $_GET['subtotal'];
    $orgid = $_GET['orgid'];
    $prodsize = isset($_GET['prodsize']) ? $_GET['prodsize'] : "no size";
    $cid = $_GET['cid'];
    // $deliverymethod = $_GET['deliverymethod'];  

    // Start a transaction
    $conn->beginTransaction();

    try {
        // Get the current maximum checkout_session_id
        $maxIdStmt = $conn->query("SELECT MAX(checkout_session_id) AS max_id FROM tbl_checkout");
        $maxIdRow = $maxIdStmt->fetch(PDO::FETCH_ASSOC);
        $maxId = $maxIdRow['max_id'] ? $maxIdRow['max_id'] + 1 : 1; // If no current max, start at 1

        // Prepare the INSERT statement with the new checkout_session_id
        $stmt = $conn->prepare("INSERT INTO tbl_checkout(customer_id, quantity, subtotal, cart_id, origin_id, product_size, checkout_session_id) VALUES (:cust_id, :qty, :subtotal, :cid, :orgid, :prodsize, :checkout_session_id)");

        $stmt->bindParam(':cust_id', $cust_id);
        $stmt->bindParam(':qty', $qty, PDO::PARAM_INT);
        $stmt->bindParam(':subtotal', $subtotal);
        $stmt->bindParam(':orgid', $orgid);
        $stmt->bindParam(':prodsize', $prodsize);
        $stmt->bindParam(':checkout_session_id', $maxId, PDO::PARAM_INT);
        $stmt->bindParam(':cid', $cid);

        // Execute the INSERT statement
        $stmt->execute();
       
        // Prepare the UPDATE statement for tbl_cart
        $stmt2 = $conn->prepare("UPDATE tbl_cart SET quantity = :qty, checkout_session_id = :checkout_session_id WHERE cart_id = :cid");
        $stmt2->bindParam(':qty', $qty, PDO::PARAM_INT);
        $stmt2->bindParam(':checkout_session_id', $maxId, PDO::PARAM_INT);
        $stmt2->bindParam(':cid', $cid);

        // Execute the UPDATE statement
        $stmt2->execute();

        // $stmt3 = $conn->prepare("INSERT INTO tbl_cart (delivery) VALUES (:deliverymethod) ");

        // $stmt3->bindParam(':deliverymethod', $deliverymethod);      


        // // Execute the INSERT statement
        // $stmt3->execute();

        // Commit the transaction
        $conn->commit();

        header('Location: /checkout');
        exit;
    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollback();
        exit('Error processing your request: ' . $e->getMessage());
    }
} else {
    exit('Required parameters not set');
}

$conn = null;
?>
