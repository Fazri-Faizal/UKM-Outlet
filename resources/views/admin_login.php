<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - UKM Outlet</title>
    <link rel="stylesheet" href="/css/admin_login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>

<body>
<div class="wrapper"> 
        
    <div class="form-wrapper sign-in">
                <form action="" method="get">
                    <img src="/img/LOGO-MOBILE.png" alt="UKM Outlet Logo" style="width: 433px; margin-bottom: -130px; margin-top: -85px">
                    <h2 style="margin-top: 9px;">Admin Login</h2>
                    <div class="input-group" style="width: 100%;margin-top: 20px;">
                        <input type="text" name="un" id="unm" required>
                        <label for="unm">Username</label>
                    </div>
                    <div class="input-group" style="width: 100%;margin-bottom: 20px;">
                        <input type="password" name="pss" id="psswrd" required>
                        <label for="psswrd">Password</label>
                    </div>
                    <button type="submit" name="login" class="btn">Log in</button>
                    <a href="/home"><h2 style="margin-top: 15px; font-size:12px;">Back To Homepage</h2></a>
                    </form>                  
        <div id="message"></div>
    </div>
</div>

    <script src="/js/login-web.js"></script>
    <?php
include_once 'database.php';
session_start();
if (isset($_GET['login'])) {
    
   try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $testusername= $_GET['un']; 
    $testpassword=$_GET['pss'];
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * from tbl_customer WHERE username='$testusername' AND passwords='$testpassword' AND role = 'Admin'");
        $stmt->execute();
        $result = $stmt->fetchAll();
 
    
  if (count($result) == 0) {
    // No rows found
    header("Location: \Test3d");

    echo"<script>
    window.onload = function() {
    alert('Wrong Password');
    };
    </script>";
} else {
    // Rows found
    foreach ($result as $row) {

        $name = $row['username'];
        $role = $row['role'];
        $user_email = $row['user_email'];
        $fullname = $row['Fullname'];
        $password = $row['passwords'];
        $phone= $row['phone_number'];

        $_SESSION['role'] = $role;
        $_SESSION['sessionname'] = $name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['passwords'] = $password;
        $_SESSION['phone_number'] = $phone;

        echo "<script>
        
        window.onload = function() {
            alert('Welcome $name to UKM Outlet!'); window.location.href='/admin_dashboard'; 
        };
        </script>";
        // REDIRECT IF CORRECT
    }
}
}
catch(PDOException $e) {
    echo "salahhhhhhhh";
}
}
else{
    $_SESSION['sessionname'] ="";
}
$conn = null;

?>


</body>

</html>
