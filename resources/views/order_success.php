
<?php 
include_once 'session.php';
include 'database.php';

$mysqli1 = new mysqli($servername, $username, $password, $dbname);
try {
  // Get the customer id based on the session name
  $stmt1 = $mysqli1->prepare("SELECT id FROM tbl_customer WHERE username = ?");
  $stmt1->bind_param('s', $sessionname);
  $stmt1->execute();
  $result = $stmt1->get_result();
  $custRow = $result->fetch_assoc();
  
  if (!$custRow) {
    header("Location: /login-web");
    exit;
  }
  
  $custId = $custRow['id'];

  // Get the maximum checkout_session_id from tbl_order
  $stmt2 = $mysqli1->prepare("SELECT MAX(checkout_session_id) as max_session_id FROM tbl_order");
  $stmt2->execute();
  $result2 = $stmt2->get_result();
  $row = $result2->fetch_assoc();
  $maxSessionId = $row ? (int)$row['max_session_id'] : 0;

  // Increment the session id
  $newSessionId = $maxSessionId + 1;

  // Insert new order with incremented checkout_session_id
  $stmt3 = $mysqli1->prepare("INSERT INTO tbl_order (cust_id, prod_id, total_price, prod_qty, seller_id, checkout_session_id) SELECT customer_id, product_id, product_Price, quantity, seller_Id, ? FROM tbl_cart WHERE customer_id = ?");
  $stmt3->bind_param('ii', $newSessionId, $custId);
  $stmt3->execute();

  // Delete the cart items after placing the order
  $stmt4 = $mysqli1->prepare("DELETE FROM tbl_cart WHERE customer_id = ?");
  $stmt4->bind_param('i', $custId);
  $stmt4->execute();

  $stmt1->close();
  $stmt2->close();
  $stmt3->close();
  $stmt4->close();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="4; URL=/user-profile" />
    <title>Order Succesful</title>
    <style>
        .check{fill:none;
  stroke:green;
  stroke-linecap:round;
  stroke-linejoin:round;
  stroke-miterlimit:10;
}

.check {
	stroke-dasharray: 60 200;
	animation: check 2.75s cubic-bezier(0.5, 0, 0.6, 1) forwards 0.0s; 
	opacity: 0;
}

@-webkit-keyframes check {
	from {stroke-dashoffset: 60;
  opacity: 1;}

	to {stroke-dashoffset: 293;
	opacity: 1;}
}


.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #f6f6f6));
	background:-moz-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:-webkit-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:-o-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:-ms-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0);
	background-color:#ffffff;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #dcdcdc;
	display:inline-block;
	cursor:pointer;
	color:#1E4164;
	font-family:Arial;
	font-size:15px;
	font-weight:regular;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 2px 0px #ffffff;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f6f6f6), color-stop(1, #ffffff));
	background:-moz-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
	background:-webkit-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
	background:-o-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
	background:-ms-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
	background:linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#ffffff',GradientType=0);
	background-color:#f6f6f6;
}
.myButton:active {
	position:relative;
	top:1px;
}

.smaller {
  width: 20%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 10%;
}

/* #Layer_1 {
    width: 50%;
    margin-left: auto;
  margin-right: auto;
} */
    </style>
</head>
<body>
<div class="smaller"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
            <style type="text/css">
             </style>
            <path class="check" d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314
              c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042
              c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578"/>
          </svg>
</div>
	<div style="text-align: center; margin: auto; padding: 25px;">	
		<h3>Order Succesful!</h3>
        <p> Redirecting to user profile page in <span id="countdowntimer">4</span> Seconds</p>
        <?php if (isset($_SESSION['totprice'])): ?>
        <p>Total Price: <?php echo htmlspecialchars($_SESSION['totprice']); ?></p>
    <?php endif; ?>
	</div>
</body>
</html>
<script type="text/javascript">
    var timeleft = 4;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000);
</script>
