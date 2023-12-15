<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_GET['forget'])) {

try {

        $cid = $_GET['username'];
        $email = $_GET['email'];
        $verificationq1=$_GET['verification1'];
        $answer1=$_GET['verifyanswer1'];
        $verificationq2=$_GET['verification2'];
        $answer2=$_GET['verifyanswer2'];
        session_start();
        $_SESSION['user_email']=$email;
        $_SESSION['username']=$cid;
        $_SESSION['verification1']= $verificationq1;
        $_SESSION['answer1']=$answer1;
        $_SESSION['verifyanswer2']= $verificationq2;
        $_SESSION['answer2']=$answer2;

        

        $stmt = $conn->prepare("SELECT * from tbl_customer WHERE username=:un AND user_email=:email AND verificationq1=:q1 AND answer1= :a1 AND verification2= :q2 AND answer2= :a2");

        
        $stmt->bindParam(':un', $cid, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':q1', $verificationq1, PDO::PARAM_STR);
        $stmt->bindParam(':a1',  $answer1, PDO::PARAM_STR);
        $stmt->bindParam(':q2', $verificationq2, PDO::PARAM_STR);
        $stmt->bindParam(':a2',  $answer2, PDO::PARAM_STR);
        
            $stmt->execute();
            $result = $stmt->fetchAll();
    if (count($result) == 0) {
        echo "<script>
            
        window.onload = function() {
            alert('Your NOT allowed to change password'); window.location.href='\login-web'; 
        };
        </script>";
        
        
        }else{   

         
           
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In - UKM Outlet</title>
        <link rel="stylesheet" href="/css/login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    </head>

    <body>
    <div class="wrapper"> 
            <div class="form-wrapper sign-in">
                <form action="/updatepassword" method="get">
                    <img src="/img/LOGO-MOBILE.png" alt="UKM Outlet Logo" style="width: 433px; margin-bottom: -130px; margin-top: -85px">
                    <h2 style="margin-top: 9px;">Login</h2>
                    <div class="input-group" style="width: 100%;margin-top: 20px;">
                        <input type="text" name="ps1" id="unm" required>
                        <label for="unm">Password</label>
                        <input type="hidden" name="username" value="<?php echo $cid ?>"> 
                        <input type="hidden" name="email" value="<?php echo $email ?>"> 
                        <input type="hidden" name="verification1" value="<?php echo  $verificationq1 ?>"> 
                        <input type="hidden" name="verifyanswer1" value="<?php echo  $answer1 ?>"> 
                        <input type="hidden" name="verification2" value="<?php echo  $verificationq2 ?>"> 
                        <input type="hidden" name="verifyanswer2" value="<?php echo  $answer2 ?>"> 

                    </div>
                    <div class="input-group" style="width: 100%;margin-bottom: 20px;">
                        <input type="text" name="ps2" id="psswrd" required>
                        <label for="psswrd">Re Enter Password</label>
                    </div>

                   
                    <button type="submit" name="change" class="btn">Change Password</button>

                    </form>
                <div id="message"></div>
            </div>
        </div>

        <script src="/js/login-web.js"></script>



</body>

</html>






<?php

    }


     
}
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}else{

    session_start();
    $email= $_SESSION['user_email'];
    $cid = $_SESSION['username'];
    $verificationq1 = $_SESSION['verification1'];
    $answer1=$_SESSION['answer1'];
    $verificationq2=$_SESSION['verifyanswer2'];
    $answer2=$_SESSION['answer2'];

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In - UKM Outlet</title>
        <link rel="stylesheet" href="/css/login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    </head>

    <body>
    <div class="wrapper"> 
            <div class="form-wrapper sign-in">
                <form action="/updatepassword" method="get">
                    <img src="/img/LOGO-MOBILE.png" alt="UKM Outlet Logo" style="width: 433px; margin-bottom: -130px; margin-top: -85px">
                    <h2 style="margin-top: 9px;">Login</h2>
                    <div class="input-group" style="width: 100%;margin-top: 20px;">
                        <input type="text" name="ps1" id="unm" required>
                        <label for="unm">Password</label>
                        <input type="hidden" name="username" value="<?php echo $cid ?>"> 
                        <input type="hidden" name="email" value="<?php echo $email ?>"> 
                        <input type="hidden" name="verification1" value="<?php echo  $verificationq1 ?>"> 
                        <input type="hidden" name="verifyanswer1" value="<?php echo  $answer1 ?>"> 
                        <input type="hidden" name="verification2" value="<?php echo  $verificationq2 ?>"> 
                        <input type="hidden" name="verifyanswer2" value="<?php echo  $answer2 ?>"> 

                    </div>
                    <div class="input-group" style="width: 100%;margin-bottom: 20px;">
                        <input type="text" name="ps2" id="psswrd" required>
                        <label for="psswrd">Re Enter Password</label>
                    </div>    
                    <button type="submit" name="change" class="btn">Change Password</button>
                </form>
                <div id="message"></div>
            </div>
        </div>
    <script src="/js/login-web.js"></script>
</body>
</html>
<?php


}
 

 