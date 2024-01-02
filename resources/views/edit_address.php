<?php
    include_once 'session.php';
    include 'database.php';
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Edit
    if (isset($_GET['address_id'])) {
    
    try {
        $stmt = $conn->prepare("UPDATE tbl_address SET address_line1 = :addline1, address_line2 = :addline2, 
        city = :ct, states = :st, postal_code = :pc WHERE address_id = :addressId");

        $stmt->bindParam(':addline1', $addline1, PDO::PARAM_STR);
        $stmt->bindParam(':addline2', $addline2, PDO::PARAM_STR);
        $stmt->bindParam(':ct', $ct, PDO::PARAM_STR);
        $stmt->bindParam(':st', $st, PDO::PARAM_STR);
        $stmt->bindParam(':pc', $pc, PDO::PARAM_STR);
        $stmt->bindParam(':addressId', $addressId, PDO::PARAM_STR);

        $addline1 = $_GET['addline1'];
        $addline2 = $_GET['addline2'];
        $ct = $_GET['ct'];
        $st = $_GET['st'];
        $pc = $_GET['pc'];
        $addressId = $_GET['addressId'];

        $stmt->execute();

        echo "<script> alert('Address updated!'); window.location.href='/user-profile'; </script>";
        }
        catch(PDOException $e)
        {
           echo "<script> alert('Error updating address!');  </script>";
            echo "Error: " . $e->getMessage();
        }
}
 

 