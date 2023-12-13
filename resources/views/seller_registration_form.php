<?php 
    include_once'session.php';
    include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);
    $stmt1 = $mysqli1->prepare("SELECT id FROM tbl_customer WHERE username = '$sessionname'");
    $stmt1->execute();

    $handler = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach($handler as $seller) {
      $sellerId = $seller['id'];
    }

    $stmt1->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UKM Outlet Seller Registration</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap');

body {
	font-family: Montserrat,Arial, Helvetica, sans-serif;
	background-color:#f7f7f7;
}
* {box-sizing: border-box}

/* Add padding to container elements */
.container {

padding: 20px;
width:900px;
position: absolute;
left: 50%;
top: 70%;
transform: translate(-50%, -50%);
border:1px solid #ccc;
border-radius:5px;
background:white;
-webkit-box-shadow: 2px 1px 21px -9px rgba(0,0,0,0.38);
-moz-box-shadow: 2px 1px 21px -9px rgba(0,0,0,0.38);
box-shadow: 2px 1px 21px -9px rgba(0,0,0,0.38);
display: flex;
flex-direction: column; /* Stack child elements vertically */
justify-content: center; /* Center children vertically */
  }

  .container img {
    margin: 0 auto; /* Optional: Center the image horizontally */
    margin-bottom: 30px;
  }

  p {
    align-items: center;   /* Center children horizontally */
justify-content: center; /* Center children vertically */
    font-size: 25px;
    font-family: 'Arial', sans-serif;
  }
  
  label {
    align-items: left;   /* Center children horizontally */
justify-content: center; /* Center children vertically */
  }



/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f7f7f7;
	font-family: Montserrat,Arial, Helvetica, sans-serif;
    
}

textarea {
    
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f7f7f7;
      font-family: Montserrat,Arial, Helvetica, sans-serif;
  }

select {
  width: 18%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f7f7f7;
	font-family: Montserrat,Arial, Helvetica, sans-serif;
}

input[type=phone] {
  width: 81%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f7f7f7;
}

input[type=text]:focus, input[type=password]:focus, input[type=phone]:focus, select:focus {
  background-color: #ddd;
  outline: none;
}



/* Set a style for all buttons */
button {
  background-color: #804444;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 200px;
  opacity: 0.9;
	font-size:16px;
	font-family: Montserrat,Arial, Helvetica, sans-serif;
	border-radius:10px;
}

button:hover {
  opacity:10;
}


/* Change styles for signup button on extra small screens */
@media screen and (max-width: 300px) {
  .signupbtn {
     width: 100%;
  }
}

.radio-group {
    font-family: Arial, sans-serif;
    margin-top: 30px;
    margin-bottom: 30px;
}

.radio-group span {
    color: #d9534f; /* Red color for the 'Seller Type' text */
    margin-right: 20px;
}

.radio-group input[type="radio"] {
    display: none; /* Hide the default radio buttons */
}

.radio-group label {
    margin-right: 20px;
    cursor: pointer;
    position: relative;
    padding-left: 25px; /* Space for custom radio circle */
}

.radio-group label:before {
    content: "";
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 16px; 
    height: 16px;
    border: 2px solid #804444;
    border-radius: 50%;
    background-color: white;
}

.radio-group input[type="radio"]:checked + label:after {
    content: "";
    position: absolute;
    left: 5px;
    top: 50%;
    transform: translateY(-50%);
    width: 10px; 
    height: 10px;
    border-radius: 50%;
    background-color: #804444; /* Red color for the selected option */
}

@keyframes youtubeAnim{
  0%,100%{
    color:#c9110f;
  }
  50%{
    color:#ff0000;
  }
}
    </style>
</head>
<body>
    <form action="/seller_registration_crud" method="get">

      <input type="hidden" name="sellerId" value="<?php echo $sellerId; ?>">
      <input type="hidden" name="userrole" value="Seller">

        <div class="container">
          <img src="\img\UKM OMELET LOGO 4.png" alt="">
          <p style="margin-bottom: 50px; margin-top: 30px">Seller Info</p>
            
        
          <label for="seller_type"><b>Seller Type</b></label>
          <div class="radio-group">
            <input type="radio" id="individual" name="sellerType" value="individual" checked>
            <label for="individual">Individual</label>
              
            <input type="radio" id="business" name="sellerType" value="business">
            <label for="business">Registered Business</label>
          </div>

          <label for="name"><b>Full Name as per IC</b></label>
          <input type="text" placeholder="Enter Name" name="fullname" required>
            
          <label for="matric"><b>Matric Number / Staff ID</b></label>
          <input type="text" placeholder="Enter ID" name="matric" required>

          <label for="phone"><b>Phone Number</b></label>
          <input type="phone" name="phone" placeholder="012-3456789" required>

          <p style="margin-bottom: 50px; margin-top: 30px;">Shop Info</p>
            
          <label for="shopname"><b>Shop Name</b></label>
          <input type="text" placeholder="Enter Shop Name" name="shopname" required>

          <label for="shopaddr"><b>Shop Address</b></label>
          <textarea name="shopaddr" id="" cols="20" rows="10" placeholder="Enter Shop Address" required ></textarea>

          <label for="shopbio"><b>Shop Bio</b></label>
          <textarea name="shopbio" cols="20" rows="3" placeholder="Enter Shop Bio" required ></textarea>
        
          <label>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</label>
        
          <div class="clearfix">
            <button type="submit" class="btn" name="registerSeller">Register</button>
          </div>
        </div>
      </form>

  <!-- <div class="youtubeBtn">
  <a target="_blank" href="https://www.youtube.com/watch?v=7k8kKRQa9jY">
      <span>Watch on YouTube</span>
  <i class="fab fa-youtube"></i>
    </a>

</div> -->
</body>
</html>