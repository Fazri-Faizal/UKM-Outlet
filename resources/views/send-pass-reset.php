<?php
include 'database.php';

if(isset($_GET['send']))
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $email = $_GET["sendemail"];

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_customer WHERE user_email = '$email'");

    $stmt->execute();
    $result = $stmt->fetchAll();
 
    if($result)
    {
        if (count($result) == 1) {
            // email found
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $date = date('Y-m-d'); //Returns IST
            $stmt = $conn->prepare("UPDATE tbl_customer SET reset_token='$reset_token',reset_token_expires='$date' WHERE user_email = '$_GET[sendemail]'");
             $stmt->execute();
            // $result = $stmt->fetchAll();
           
                echo "
                <script>
                    alert('Password for reset link already sent to your mail'); 
                    window.location.href='/forgot_pass'; 
                </script>"; 
        }
           
         
        else {
            // email not found
            echo "
            <script>
                alert('Email not found'); 
                window.location.href='/home'; 
            </script>";             
        }
    }
    else {
        // email not found
        echo "
        <script>
            alert('tak dapat'); 
            window.location.href='/home'; 
        </script>";          
    }
}


?>
