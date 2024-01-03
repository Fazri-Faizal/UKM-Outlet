<?php 
include_once 'session.php';
include 'database.php';
var_dump($_GET);

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function redirectToProductDetails($productId) {
    echo "<script>window.location.href='/product-details?id=" . $productId . "';</script>";
    exit; // It's important to call exit here to ensure no further code is executed
}

// Check if the addToCart operation is set
if (isset($_GET['addToCart'], $_GET['prodId'], $_GET['prodQuantity'], $_GET['custId'], $_GET['prodPrice'], $_GET['SellerId'])) {
    $id = $_GET['prodId'];
    $prodQuantity = $_GET['prodQuantity'];
    $custId = $_GET['custId'];
    $prodPrice = $_GET['prodPrice'];
    $SellerId = $_GET['SellerId'];
    $prodSize = isset($_GET['prodSize']) ? $_GET['prodSize'] : 'no size'; // Default to 'no size' if not set

    try {
        $conn->beginTransaction();
        
        // Get the last checkout_session_id for this customer_id
        $sessionStmt = $conn->prepare("SELECT checkout_session_id FROM tbl_cart WHERE customer_id = :custId ORDER BY cart_id DESC LIMIT 1");
        $sessionStmt->bindParam(':custId', $custId, PDO::PARAM_STR);
        $sessionStmt->execute();
        $sessionRow = $sessionStmt->fetch(PDO::FETCH_ASSOC);
        
        // If the customer has a session, use that session_id, otherwise start a new one.
        $checkoutSessionId = $sessionRow ? (int)$sessionRow['checkout_session_id'] : null;
        
        if ($checkoutSessionId === null) {
            // Get the next checkout_session_id by finding the current max and adding 1
            $maxIdStmt = $conn->query("SELECT MAX(checkout_session_id) AS max_id FROM tbl_cart");
            $maxIdRow = $maxIdStmt->fetch(PDO::FETCH_ASSOC);
            $checkoutSessionId = $maxIdRow ? (int)$maxIdRow['max_id'] + 1 : 1;
        }

        // Insert into cart with the checkout_session_id
        $stmt = $conn->prepare("INSERT INTO tbl_cart(product_id, product_Price, product_size, quantity, customer_id, seller_Id, checkout_session_id) VALUES(:prodId, :prodPrice, :prodSize, :prodQuantity, :custId, :SellerId, :checkoutSessionId)");
        $stmt->bindParam(':prodId', $id, PDO::PARAM_STR);
        $stmt->bindParam(':prodPrice', $prodPrice, PDO::PARAM_STR);
        $stmt->bindParam(':prodSize', $prodSize, PDO::PARAM_STR);
        $stmt->bindParam(':prodQuantity', $prodQuantity, PDO::PARAM_INT);
        $stmt->bindParam(':custId', $custId, PDO::PARAM_STR);
        $stmt->bindParam(':SellerId', $SellerId, PDO::PARAM_STR);
        $stmt->bindParam(':checkoutSessionId', $checkoutSessionId, PDO::PARAM_INT);
        $stmt->execute();

        $conn->commit();
        redirectToProductDetails($id);
    } catch (PDOException $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Required parameters are not set or addToCart operation is not specified.";
}

$conn = null;
?>
