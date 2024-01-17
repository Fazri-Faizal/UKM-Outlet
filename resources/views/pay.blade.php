
@php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ukm_outlet";
 
  $totprice = $_GET['totprice'];  
  $prodname = $_GET['prodname'];  
  $prodqty = $_GET['prodqty'];



$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
    $deliverymethod = $_GET['deliverymethod'];
    $cid = $_GET['cid'];    

    // Start a transaction
    $conn->beginTransaction();

    try {
      
        // Prepare the UPDATE statement for tbl_cart
        $stmt2 = $conn->prepare("UPDATE tbl_cart SET delivery =:deliverymethod WHERE cart_id = :cid");
        $stmt2->bindParam(':deliverymethod', $deliverymethod, PDO::PARAM_STR);
        $stmt2->bindParam(':cid', $cid);

        // Execute the UPDATE statement
        $stmt2->execute();

        // Commit the transaction
        $conn->commit();

        
    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollback();
        exit('Error processing your request: ' . $e->getMessage());
    }
$conn = null;
  
@endphp
<head>
  <style>
    body {
  margin: 0;
  background-color: white;
}

.wrapper {
  display: flex;
  flex-direction: column;
  height: 360px;
  width: 100%;
  justify-content: center;
  align-items: center;
}

.loader-box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  content-alignment: center;
  align-items: center;
  background-color: #804444;
  border-radius: 5px;
  height: 200px;
  width: 300px;
  box-shadow: 1px 1px 1px 0px darkslategrey;
}

.loader {
  border: 1px solid white;
  border-radius: 50%;
  border-right-color: transparent;
  border-bottom-color: transparent;
  width: 80px;
  height: 80px;
  animation-name: loading;
  animation-duration: 700ms;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}

.loader-text {
  margin-top: 10px;
  padding-top: 10px;
  color: lightgrey;
  font-family: 'Lato', sans-serif;
  font-size: 18px;
  animation-name: fading;
  animation-duration: 1500ms;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}

.description-box{
  margin-top: 10px;
  paddin: 10px 5px 10px 5px;
  font-family: 'Lato', sans-serif;
  font-size: 18px;
  height: 35px;
  line-height: 35px;
  width: 500px;
  background-color: #fff;
  text-align: center;
  border-radius: 5px;
}

@keyframes loading{
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

@keyframes fading {
  0%, 100% {
    opacity: 0.05;
  }
  50% {
    opacity: 0.95;
  }
}
  </style>
</head>
<form action="/session" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="totprice" value="@php echo $totprice; @endphp">
    <input type="hidden" name="prodname" value="@php echo $prodname; @endphp">
    <input type="hidden" name="prodqty" value="@php echo $prodqty; @endphp">
    <input type="hidden" name="deliverymethod" value="@php echo $deliverymethod; @endphp">
    <button type="submit" id="checkout-live-button" style="visibility: hidden"></button>
</form>
<div class="wrapper">
  <div class="loader-box">
    <div class="loader">
      
    </div>
    <div class="loader-text">
      Redirecting to Payment
    </div>
  </div>
  
</div>
<script>
    document.getElementById('checkout-live-button').dispatchEvent(new MouseEvent("click"));
</script>