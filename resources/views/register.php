<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_GET['register'])) {
 
  try {
    $pass = $_GET['password'];
    $cpass = $_GET['confirmpass'];
    if($pass==$cpass){
    $stmt = $conn->prepare("INSERT INTO tbl_customer(username,email,passwords) VALUES(:un,:email,:pass)");
   
    $stmt->bindParam(':un', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    
       
    $cid = $_GET['username'];
    $email = $_GET['email'];
    
   
       
    $stmt->execute();
   
    echo "<script>
        
        window.onload = function() {
            alert('You have registered'); window.location.href='\login-web'; 
        };
        </script>";
    
    }
    else{
        echo '<script>alert("Make sure your password is same as confirm password")</script>';
        header("Location: \login-web");
    }
     
}
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 

 