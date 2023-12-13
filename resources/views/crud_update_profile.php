<?php
    include_once 'session.php';
    include 'database.php';
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Create
    if (isset($_GET['updateProfile'])) {
    
    try {
        $stmt = $conn->prepare("UPDATE tbl_customer SET Fullname = :fullname, username = :username, passwords = :userpassword, phone_number = :phone, user_email = :email WHERE id = :custId");

        $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':userpassword', $userpassword, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':custId', $custId, PDO::PARAM_STR);

        $fullname = $_GET['fullname'];
        $username = $_GET['username'];
        $userpassword = $_GET['userpassword'];
        $phone = $_GET['phone'];
        $email = $_GET['email'];
        $custId = $_GET['custId'];

        //Update Session
        $_SESSION["sessionname"] = $username;
        $_SESSION["user_email"] = $email;
        $_SESSION["fullname"] = $fullname;
        $_SESSION["passwords"]= $userpassword;
        $_SESSION["phone_number"] = $phone;
    
        $stmt->execute();

        echo "<script> alert('User Profile updated!'); window.location.href='/user-profile'; </script>";
        }
    catch(PDOException $e)
    {
        alert('Error updating User Profile!');
        echo "Error: " . $e->getMessage();
    }
}