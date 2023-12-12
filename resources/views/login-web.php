
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
        <div class="form-wrapper sign-up"> 
            <form action="/register" method="get"> 
                <h2 class="signup">Sign Up</h2> 
                <div class="grid-container">
                    <div>
                        <div class="input-group"> 
                            <input type="text" name="username" required> 
                            <label for="">Username</label> 
                        </div> 
                        <div class="input-group"> 
                            <input type="email" name="email" required> 
                            <label for="">Email</label> 
                        </div> 
                        <div class="input-group"> 
                            <input type="password" name="password" required> 
                            <label for="">Password</label> 
                        </div> 
                        <div class="input-group"> 
                            <input type="password" name="confirmpass"required> 
                            <label for="">Confirm Password</label> 
                        </div> 
                    </div>
                
                    <div class="question"> 
                        <label>Verification question</label> 

                        <div class="select-group" class="listbox"> 
                        <select id="q1" name="verification1"  onchange="choise1()" class="selection"> 
                            <option>Choose your question</option> 
                            <option value="Place of birth">Place of birth</option> 
                            <option value="Primary school">Primary school</option> 
                            <option value="Mother's name">Mother's name</option> 
                            <option value="Father's name">Father's name</option> 
                            <option value="Pet's name">Pet's name</option> 
                        </select> 
                        </div> 
                        <div class="input-group"> 
                            <input id="choiseq1" placeholder="Write your answer" type="text" name="verifyanswer1"required> 
                        
                        </div> 
                        <div class="select-group" class="listbox"> 
                            <select id="q2" name="verification2"  onchange="choise2()" class="selection"> 
                                <option>Choose your question</option> 
                                <option value="Place of birth">Place of birth</option> 
                                <option value="Primary school">Primary school</option> 
                                <option value="Mother's name">Mother's name</option> 
                                <option value="Father's name">Father's name</option> 
                                <option value="Pet's name">Pet's name</option> 
                            </select> 
                        </div> 

                        <div class="input-group"> 
                            <input id="choiseq2" placeholder="Write your answer" type="text" name="verifyanswer2"required> 
                        
                        </div> 
                        <!-- <div class="select-group" class="listbox"> 
                            <select id="q3" name="verification3"  onchange="choise3()" class="selection"> 
                                <option>Choose your question</option> 
                                <option value="Place of birth">Place of birth</option> 
                                <option value="Primary school">Primary school</option> 
                                <option value="Mother's name">Mother's name</option> 
                                <option value="Father's name">Father's name</option> 
                                <option value="Pet's name">Pet's name</option> 
                            </select> 
                        </div> 
                        <div class="input-group"> 
                            <input id="choiseq3" value="Choose Quetion" type="text" name="verifyanswer3"required> 
                        
                        </div>  -->
                    </div>    
                </div>
                    <button type="submit" name="register" class="btn">Sign Up</button> 
                    <div class="sign-link"> 
                        <p>Already have an account? <a href="#" class="signIn-link">Sign In</a></p> 
                    </div> 
                
                
                
<script>
function choise1() {
  var x = document.getElementById("q1").value;
  document.getElementById("choiseq1").placeholder = "What is your "+x+" ?";
}
function choise2() {
  var x = document.getElementById("q2").value;
  document.getElementById("choiseq2").placeholder = "What is your "+x+" ?";
}
function choise3() {
  var x = document.getElementById("q3").value;
  document.getElementById("choiseq3").value = "What is your "+x+" ?";
}
</script>
            </form> 
        </div>

        <div class="form-wrapper sign-in">
            <form action="" method="get">
                <img src="/img/LOGO-MOBILE.png" alt="UKM Outlet Logo" style="width: 433px; margin-bottom: -130px; margin-top: -85px">
                <h2 style="margin-top: 9px;">Login</h2>
                <div class="input-group" style="width: 100%;margin-top: 20px;">
                    <input type="text" name="un" id="unm" required>
                    <label for="unm">Username</label>
                </div>
                <div class="input-group" style="width: 100%;margin-bottom: 20px;">
                    <input type="password" name="pss" id="psswrd" required>
                    <label for="psswrd">Password</label>
                </div>
                <button type="submit" name="login" class="btn">Log in</button>

                <div class="forgot-pass" style="margin-top: 10px">
                    <a href="/forgot_pass" class="forgot-link">Forgot password?</a>
                </div>
                <div class="sign-link">
                    
                    <p>Don't have an account? <a href="#" class="signUp-link">Sign Up</a></p>
                </div>
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
          $stmt = $conn->prepare("SELECT * from tbl_customer WHERE username='$testusername' AND passwords='$testpassword'");
        $stmt->execute();
        $result = $stmt->fetchAll();
 
    
  if (count($result) == 0) {
    // No rows found
    header("Location: \login-web");

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
            alert('Welcome $name to UKM Outlet!'); window.location.href='/home'; 
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