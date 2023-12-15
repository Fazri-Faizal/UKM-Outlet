<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_GET['register'])) {
 
  try {
    $pass = $_GET['password'];
    $cpass= $_GET['confirmpass'];
    if($pass==$cpass){
    $stmt = $conn->prepare("INSERT INTO tbl_customer(username,user_email,passwords,verificationq1,answer1,verification2,answer2,role) VALUES(:un,:email,:pass,:q1,:a1,:q2,:a2,'Customer')");
   
    $stmt->bindParam(':un', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindParam(':q1', $verificationq1, PDO::PARAM_STR);
    $stmt->bindParam(':a1',  $answer1, PDO::PARAM_STR);
    $stmt->bindParam(':q2', $verificationq2, PDO::PARAM_STR);
    $stmt->bindParam(':a2',  $answer2, PDO::PARAM_STR);
    
       
    $cid = $_GET['username'];
    $email = $_GET['email'];
    $verificationq1=$_GET['verification1'];
    $answer1=$_GET['verifyanswer1'];
    $verificationq2=$_GET['verification2'];
    $answer2=$_GET['verifyanswer2'];
   
       
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
 

 