<?php
    include 'database.php';
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Create
    if (isset($_GET['editPickupLocation'])) {

            // Set the value of $myDropdown before binding it
        $myDropdown = $_GET['myDropdown']; 
        $seller_id = $_GET['seller_id'];

        try {
            $stmt = $conn->prepare("UPDATE tbl_customer SET pickup_location = :myDropdown WHERE id = :seller_id");

            // Now bind the parameters
            $stmt->bindParam(':myDropdown', $myDropdown, PDO::PARAM_STR);
            $stmt->bindParam(':seller_id', $seller_id, PDO::PARAM_INT); // Assuming id is an integer

            $stmt->execute();

            echo "<script> alert('Pickup location updated!'); window.location.href='/seller_profile'; </script>";
        }
        catch(PDOException $e) {
            echo "<script> alert('Error updating pickup location!');  </script>";
            echo "Error: " . $e->getMessage();
        }
        }
 

 