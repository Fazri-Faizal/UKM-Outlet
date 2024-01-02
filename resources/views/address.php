<?php 
    include_once 'session.php';
    include 'database.php';

  
    
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the INSERT statement
    $stmt3 = $conn->prepare("INSERT INTO tbl_address(cust_id, address_line1, address_line2, city, states, postal_code) VALUES(:id, :address1, :address2, :ct, :st, :pc)");
    
    // Bind parameters to the prepared statement
    $stmt3->bindParam(':id', $cid, PDO::PARAM_STR);
    $stmt3->bindParam(':address1', $al1, PDO::PARAM_STR);
    $stmt3->bindParam(':address2', $al2, PDO::PARAM_STR);
    $stmt3->bindParam(':ct', $Ct, PDO::PARAM_STR);
    $stmt3->bindParam(':st', $St, PDO::PARAM_STR);
    $stmt3->bindParam(':pc', $Pc, PDO::PARAM_STR);

    // Retrieve data from GET request
    $cid = $_GET['custid'];
    $al1 = $_GET['addLine1'];
    $al2 = $_GET['addLine2'];
    $Ct = $_GET['city'];
    $St = $_GET['state'];
    $Pc = $_GET['postcode'];

    // Execute the prepared statement
    $stmt3->execute();
    // Redirect to the user-profile page
    header("Location: /user-profile");
    exit; // Ensure no further execution after redirection

    // }
?>
