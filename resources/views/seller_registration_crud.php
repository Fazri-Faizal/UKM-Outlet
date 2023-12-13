<?php
    include_once 'session.php';
    include 'database.php';
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Create
    if (isset($_GET['registerSeller'])) {
    
    try {
        $stmt = $conn->prepare("UPDATE tbl_customer SET seller_type = :sellerType, Fullname = :fullname, matrics = :matric, phone_number = :phone, shop_name = :shopname, shop_add = :shopaddr, shop_bio = :shopbio, role = :userrole WHERE id = :sellerId");

        $stmt->bindParam(':sellerType', $sellertype, PDO::PARAM_STR); 
        $stmt->bindParam('fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':matric', $matric, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':shopname', $shopname, PDO::PARAM_STR);
        $stmt->bindParam(':shopaddr', $shopaddr, PDO::PARAM_STR);
        $stmt->bindParam(':shopbio', $shopbio, PDO::PARAM_STR);
        $stmt->bindParam(':sellerId', $sellerId, PDO::PARAM_STR);
        $stmt->bindParam(':userrole', $userrole, PDO::PARAM_STR);

        $sellertype = $_GET['sellerType'];
        $fullname = $_GET['fullname'];
        $matric = $_GET['matric'];
        $phone = $_GET['phone'];
        $shopname = $_GET['shopname'];
        $shopaddr = $_GET['shopaddr'];
        $shopbio = $_GET['shopbio'];
        $sellerId = $_GET['sellerId'];
        $userrole = $_GET['userrole'];

        $_SESSION["role"] = "Seller";
    
        $stmt->execute();

        echo "<script> alert('Seller Registered!'); window.location.href='/seller_dashboard'; </script>";
        }
    catch(PDOException $e)
    {
        alert('Error registering seller!');
        echo "Error: " . $e->getMessage();
    }
}