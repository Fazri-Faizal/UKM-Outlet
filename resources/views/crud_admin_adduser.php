<?php
include ('database.php');
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['addUser'])) {
    try {
        $stmt = $conn->prepare("INSERT INTO tbl_customer (username, user_email, passwords, Fullname, role, matrics, phone_number) VALUES (:username, :email, :password, :fullname, :role, :matric, :phonenum)");

        $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phonenum', $phonenum, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':matric', $matric, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        
        $fullname = $_GET['fullname'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        $phonenum = $_GET['phonenumber'];
        $password = $_GET['password'];
        $matric = $_GET['matric'];
        $role = $_GET['role'];
   
        $stmt->execute();
     
        echo "<script>
              window.onload = function() {
                  alert('User profile Added'); window.location.href='\admin_user'; 
              };
          </script>";
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}