        <?php
    include_once 'database.php';
    session_start();
    if (isset($_GET['change'])) {
        
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $password1= $_GET['ps1']; 
        $password2=$_GET['ps2'];
        $cid = $_GET['username'];
        $email = $_GET['email'];
        $verificationq1=$_GET['verification1'];
        $answer1=$_GET['verifyanswer1'];
        $verificationq2=$_GET['verification2'];
        $answer2=$_GET['verifyanswer2'];
        
        if($password1==$password2){
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt2 = $conn->prepare("UPDATE tbl_customer SET passwords=:password1 WHERE username=:un AND user_email=:email AND verificationq1=:q1 AND answer1=:a1 AND verification2=:q2 AND answer2=:a2");

                $stmt2->bindParam(':un', $cid, PDO::PARAM_STR);
                $stmt2->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt2->bindParam(':q1', $verificationq1, PDO::PARAM_STR);
                $stmt2->bindParam(':a1', $answer1, PDO::PARAM_STR);
                $stmt2->bindParam(':q2', $verificationq2, PDO::PARAM_STR);
                $stmt2->bindParam(':a2', $answer2, PDO::PARAM_STR);
                $stmt2->bindParam(':password1', $password1, PDO::PARAM_STR);


            $stmt2->execute();
            $result = $stmt2->fetchAll();

            echo "<script>
            
            window.onload = function() {
                alert('Your password has been updated'); window.location.href='\login-web'; 
            };
            </script>";
        }
        else{
  
           
            echo "<script>
            
            window.onload = function() {
                alert('make sure both pasword is the same');
                
                window.location.href='/forgotpassword'; 
            };
            </script>";
        }
  
     }

    catch(PDOException $e) {
        echo "salahhhhhhhh";
    }

}

?>