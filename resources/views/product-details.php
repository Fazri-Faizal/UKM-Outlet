<?php 
include_once 'session.php';
include 'database.php';

// Single Database Connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get Customer ID
$stmt1 = $mysqli->prepare("SELECT id FROM tbl_customer WHERE username = ?");
$stmt1->bind_param("s", $sessionname);
$stmt1->execute();
$result = $stmt1->get_result();
$custId = $result->fetch_assoc()['id'];
$stmt1->close();

// Get Cart Count
$stmt2 = $mysqli->prepare("SELECT COUNT(cart_id) AS Count FROM tbl_cart WHERE customer_id = ?");
$stmt2->bind_param("i", $custId);
$stmt2->execute();
$result2 = $stmt2->get_result();
$cartNum = $result2->fetch_assoc()['Count'];
$stmt2->close();

// Your HTML and other PHP code continues here...

// Always close your connection at the end of your script
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="/css/header.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
   <hr class="header2">
      <nav style="display: flex">
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
          <a href="" >
            <img src="/img/UKM OMELET LOGO 4.png" width="250" alt="">
          </a>
         </div>
         <div class="nav-items" style="color: #804444;">
            <li><a onclick="window.location.href='index'">Home</li>
            <li><a onclick="window.location.href='faculty-list-web'">Faculty</a></li>
            <li><a onclick="window.location.href='college-list-web'">College</a></li>
            <li><a onclick="window.location.href='product-list-ukm-web'">UKM</a></li>
            
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form action="/search" method="get">
            <input type="text" name="ProductSearchBar" class="search-data" placeholder="Search UKM Outlet" required>
            <button type="submit" class="fas fa-search" ></button>
         </form> 
         <div class="cart-icon" style="margin-right: 2px">
            <a href="\cart">
                <div class="icon">
                  <?php if($cartNum == 0) { ?>
                    <div class="itemsCount"></div>
                    <i class="fas fa-shopping-cart cartIcon"></i>
                  <?php } else { ?>
                    <div class="itemsCount appear" style="display: block"><?php echo $cartNum ?></div>
                    <i class="fas fa-shopping-cart cartIcon flicker"></i>
                  <?php } ?>
                </div>
              </a>

        </div>
        <div class="chat-icon">
            <a href="\chat">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-chat" viewBox="0 0 16 16">
            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
            </svg>
            </a>
        </div>
        <div class="user-icon">
            <a href="\user-profile">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            </a>
        </div>
        <div class="user-icon" style="margin-left: 18px">
            <a href="/destroy">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg>
            </a>
        </div>
      </nav>
      <hr class="header2">
      <script src="app.js"></script>
      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }

         let itemsCountDiv = document.querySelector(".itemsCount");
          let cartIcon = document.querySelector(".cartIcon");
          let itemsCount = <?php $cartNum ?>;
          function displayItemsCount() {
            itemsCountDiv.style.display = "block";
            itemsCountDiv.classList.add("appear");
            cartIcon.classList.add("flicker");
            itemsCountDiv.innerHTML = itemsCount;
            setTimeout(() => {
              itemsCountDiv.classList.remove("appear");
              cartIcon.classList.remove("flicker");
              }, 250);
            
            itemsCount++;
          }
      </script>
   </body>
</html>

<?php 
    // include 'header.php';

    include 'database.php';
    $id=$_GET['id'];
    $mysqli1 = new mysqli($servername, $username, $password,$dbname);
    
    $stmt1 = $mysqli1->prepare("SELECT * FROM tbl_product_variation where fld_product_id=$id");
    $stmt1->execute();
   
    $variation1 = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
   
    if(!$variation1) {
      $mysqli2 = new mysqli($servername, $username, $password,$dbname);
    
      $stmt12 = $mysqli2->prepare("SELECT  * FROM tbl_products where product_Id =$id");
      $stmt12->execute();
    
      $variation2 = $stmt12->get_result()->fetch_all(MYSQLI_ASSOC);
      foreach($variation2 as $pname){
        $productname=$pname['product_Name'];
        $productpic=$pname['pic'];
        $sellerid=$pname['seller_ids'];
        $shopname=$pname['shop_name'];
        $productrating=$pname['product_Rating'];
        $productprice=$pname['product_price'];
        $producttype=$pname['product_Type'];
    }
    $mysqli3 = new mysqli($servername, $username, $password,$dbname);
    
    $stmt13 = $mysqli3->prepare("SELECT  * FROM tbl_product_3d_pic where fld_product_id=$id");
    $stmt13->execute();
   
    $variation3 = $stmt13->get_result()->fetch_all(MYSQLI_ASSOC);
   
  
    $stmt13->close();

    $stmt14 = $mysqli->prepare("SELECT COUNT(rating) AS reviewCount FROM tbl_product_review WHERE product_id = $id;");
    $stmt14->execute();
    $ratecount = $stmt14->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach($ratecount as $arrreview) {
      $ratingcount = $arrreview['reviewCount'];
    }

    $stmt14->close();

    $stmt15 = $mysqli->prepare("SELECT COUNT(prod_id) AS soldCount FROM tbl_order WHERE prod_id = $id;");
    $stmt15->execute();
    $sellcount = $stmt15->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach($sellcount as $arrsold) {
      $soldcount = $arrsold['soldCount'];
    }

    $stmt15->close();
      
       ?>
       <!DOCTYPE html>
<html>
  <head>
    <style>
      /* shop name */
.nama_kedai {
  display: block;
}

.sname {
  margin-left: 150px;
  background-color: transparent;
  border: none;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  color:#612c2c;
}

.sname:hover {
  color:#ab8262;
}

.titleseller {
  margin-left: 150px;
  font-size: 17px;
}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product details</title>

    <!-- CSS -->
    <link href="/css/product-details.css" rel="stylesheet">


  </head>
         <body>
    <form action="\function_addtocart" method="get">
      <input type="hidden" name="prodId" value="<?php echo $id; ?>">
      <input type="hidden" name="custId" value="<?php echo $custId; ?>">
  
      <input type="hidden" name="prodPrice" value="<?php echo $productprice; ?>">
      <input type="hidden" name="SellerId" value="<?php echo $sellerid; ?>">


      <table class="container-custom">
        <tr>
            <td class="left-column">
              <div class="left-column">
                <!-- Product Description -->
                <div class="product-description">
                  <span><?php echo $producttype ?></span>
                  <h1 style="margin-bottom: -112px;"><?php echo $productname ?></h1>
                  <input type="hidden" name="prodName" value="<?php echo $productname; ?>">
                  <p style="visibility:hidden;">The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
                  <!-- Product Pricing -->
                  <div class="product-price">
                      <span>RM <?php echo $productprice;?></span>
                  </div>
                </div>
            </td>
            <td class="mid-column">
              <img class="img-custom" id="pic" src="/img/<?php echo $productpic ?>" width="100">
              <?php   if(!$variation3){  

              }else{
    ?>
              <input type="range" class="slider" name="height" id="heightId" min = "1" max = "24" value = "12" oninput="myFunction()" ></td><td><output id="outputId" ></output><br>
              <?php }?>
            </td>
            <td class="right-column">
                <!-- rating -->
                <div style=" color: #86939E; font-size: 17px; margin-top: 20px;">
                  <?php 
                    $rate = $productrating;
                    $wholenumrate = floor($rate);

                    if($rate - $wholenumrate == 0)
                      echo $wholenumrate;
                    else if($rate - $wholenumrate == 0.5)
                      echo $productrating;
                    else
                      echo $productrating;

                    echo " ";

                    for($i=1; $i<=$wholenumrate; $i++) {
                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="26" fill="#FEC20C" class="bi bi-star-fill" viewBox="0 0 16 12"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';
                    }

                    if($rate - $wholenumrate >= 0.5)
                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="26" fill="#FEC20C" class="bi bi-star-half" viewBox="0 0 16 12"><path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/></svg>';
                  ?><br> 
                </div>

                <div style=" color: #86939E; font-size: 14px; margin-top: 20px;">
                  <?php echo $ratingcount?> ratings | <?php echo $soldcount?> sold
                </div>
                
                <div style="margin: 20px"></div>
              

                <div style="margin: 20px; margin-left: 0px;">
                  <!--START Button Counter-->
                    <head>
                      <link rel="stylesheet" href="/css/button_counter.css">
                    </head>
                    <div class="wrapper">
                      <span class="minus">-</span>
                      <span class="num" id="prodQuantity" value="00">01</span>
                      <!-- <input class="num" name="prodQuantity" value="01" readonly> -->
                      <span class="plus">+</span>
                    </div>
                    
                    <script>
                      $prodQuantity = 1;
                      const plus = document.querySelector(".plus"),
                      minus = document.querySelector(".minus"),
                      num = document.querySelector(".num");
                      let a = 1;
                      plus.addEventListener("click", ()=>{
                        a++;
                        a = (a < 10) ? "0" + a : a;
                        num.innerText = a;
                        document.getElementById("quantHidden").value = a;
                      });
                      minus.addEventListener("click", ()=>{
                        if(a > 1){
                          a--;
                          a = (a < 10) ? "0" + a : a;
                          num.innerText = a;
                          document.getElementById("quantHidden").value = a;
                        }
                      });
                    </script>
                    <input type="hidden" id="quantHidden" name="prodQuantity" value="01">
                  <!--END Button Counter-->
                </div>
                <div style="width: 400px">
                  <!--START Button Add To Cart-->
                    <head>
                        <link rel="stylesheet" href="/css/button_addtocartv1.scss.css" />
                    </head>
                    <button class="button" name="addToCart" onclick="displayItemsCount()" type="submit">
                        <span>Add to cart</span>
                        <div class="cart">
                            <svg viewBox="0 0 36 26">
                                <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5"></polyline>
                                <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                            </svg>
                        </div>
                    </button>
                    <script type="text/javascript" src="/js/button_addtocartv1.js"></script>
                  <!--END Button Add To Cart-->
                  
                  |
                  <!--START Button Place Order-->
                  <head>
                    <link rel="stylesheet" href="/css/button_place_order.scss.css" />
                  </head>
                  <button class="place-order place-order--default" name="placeOrder">
                      <div class="default text">Place Order</div>
                      <div class="forklift">
                          <div class="upper"></div>
                          <div class="lower"></div>
                      </div>
                      
                      <div class="box animation"></div>
                      <div class="done text">Done</div>
                  </button>
                  <script type="text/javascript" src="/js/button_place_order.js"></script>
                  <!--END Button Place Order-->
                </div>
            </td>
        </tr>
      </table>
    </form>

    <form method="GET" action="/seller_shop" class="nama_kedai">
      <input type="hidden" name="sellerId" value="<?php echo $sellerid; ?>">
      <h5 class="titleseller">Seller:</h5>
      <button type="submit" class="sname"><?php echo $shopname ?></button>
    </form>

    <?php include 'product-description.php' ?>

    <?php include 'footer.php'?>
  </body>
      <?php
    }
    else{

   
   
    $stmt1->close();  
    // $min = 99999999;
    // $max=0;
    //  foreach( $variation1  as $row2) {
                                    
    //   if($row2['fld_producy_price']<$min){
    //      $min=$row2['fld_producy_price'];
    //     }
    //     if($row2['fld_producy_price']>$max){
    //         $max=$row2['fld_producy_price'];
    //        }
    //  }
    $mysqli2 = new mysqli($servername, $username, $password,$dbname);
    
    $stmt12 = $mysqli2->prepare("SELECT  * FROM tbl_products LEFT JOIN tbl_customer ON seller_ids = id where product_Id =$id");
    $stmt12->execute();
   
    $variation2 = $stmt12->get_result()->fetch_all(MYSQLI_ASSOC);
   
    if(!$variation2) exit('No rows');
   
    $stmt12->close();  
    $productname="";
    $productpic="";
    $productrating=0;
    foreach($variation2 as $pname){
        $productname=$pname['product_Name'];
        $sellerid=$pname['seller_ids'];
        $shopname=$pname['shop_name'];
        $productpic=$pname['pic'];
        $productrating=$pname['product_Rating'];
        $productprice = $pname['product_price'];
        $producttype = $pname['product_Type'];
    }

    $mysqli3 = new mysqli($servername, $username, $password,$dbname);
    
    $stmt13 = $mysqli3->prepare("SELECT  * FROM tbl_product_3d_pic where fld_product_id=$id");
    $stmt13->execute();
   
    $variation3 = $stmt13->get_result()->fetch_all(MYSQLI_ASSOC);
   
  
    $stmt13->close();

    $mysqli4 = new mysqli($servername, $username, $password,$dbname);
    $stmt14 = $mysqli4->prepare("SELECT COUNT(rating) AS reviewCount FROM tbl_product_review WHERE product_id = $id;");
    $stmt14->execute();
    $ratecount = $stmt14->get_result()->fetch_all(MYSQLI_ASSOC);
    foreach($ratecount as $arrreview) {
      $ratingcount = $arrreview['reviewCount'];
    }

    $stmt14->close();

    $mysqli5 = new mysqli($servername, $username, $password,$dbname);
    $stmt15 = $mysqli5->prepare("SELECT COUNT(prod_id) AS soldCount FROM tbl_order WHERE prod_id = $id;");
    $stmt15->execute();
    $sellcount = $stmt15->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach($sellcount as $arrsold) {
      $soldcount = $arrsold['soldCount'];
    }

    $stmt15->close();
      
?>

<!DOCTYPE html>
<html>
  <head>
  <style>
      /* shop name */
.nama_kedai {
  display: block;
}

.sname {
  margin-left: 150px;
  background-color: transparent;
  border: none;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  color:#612c2c;
}

.sname:hover {
  color:#ab8262;
}

.titleseller {
  margin-left: 150px;
  font-size: 17px;
}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product details</title>

    <!-- CSS -->
    <link href="/css/product-details.css" rel="stylesheet">


  </head>

  <body>
    <form action="\function_addtocart" method="get">
      <input type="hidden" name="prodId" value="<?php echo $id; ?>">
      <input type="hidden" name="custId" value="<?php echo $custId; ?>">
      <input type="hidden" name="prodPrice" value="<?php echo $productprice; ?>">
      <input type="hidden" name="SellerId" value="<?php echo $sellerid; ?>">

      <table class="container-custom">
        <tr>
            <td class="left-column">
              <div class="left-column">
                <!-- Product Description -->
                <div class="product-description">
                  <span><?php echo $producttype ?></span>
                  <h1 style="margin-bottom: -112px;"><?php echo $productname ?></h1>
                  <input type="hidden" name="prodName" value="<?php echo $productname; ?>">
                  <p style="visibility:hidden;">The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
                  <!-- Product Pricing -->
                  <div class="product-price">
                      <span>RM <?php echo number_format($productprice, 2);?></span>
                  </div>
                </div>
            </td>
            <td class="mid-column">
              <img class="img-custom" id="pic" src="/img/<?php echo $productpic ?>" width="100">
              <?php   if(!$variation3){  

              }else{
    ?>
              <input type="range" class="slider" name="height" id="heightId" min = "1" max = "24" value = "12" oninput="myFunction()" ></td><td><output id="outputId" ></output><br>
              <?php }?>
            </td>
            <td class="right-column">
                <!-- rating -->
                <div style=" color: #86939E; font-size: 17px; margin-top: 20px;">
                  <?php
                    $rate = $productrating;
                    $wholenumrate = floor($rate);

                    if($rate - $wholenumrate == 0)
                      echo $wholenumrate;
                    else if($rate - $wholenumrate == 0.5)
                      echo $productrating;
                    else
                      echo $productrating;

                    echo " ";

                    for($i=1; $i<=$wholenumrate; $i++) {
                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="26" fill="#FEC20C" class="bi bi-star-fill" viewBox="0 0 16 12"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';
                    }

                    if($rate - $wholenumrate >= 0.5)
                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="26" fill="#FEC20C" class="bi bi-star-half" viewBox="0 0 16 12"><path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/></svg>';
                  ?><br> 
                </div>

                <div style=" color: #86939E; font-size: 14px; margin-top: 20px;">
                <?php echo $ratingcount?> ratings | <?php echo $soldcount?> sold
                </div>
                
                <div style="margin: 20px"></div>
                <!--START Button Size-->
                  <?php 
                  include 'database.php';
                  $mysqli = new mysqli($servername, $username, $password,$dbname);
                  
                  $stmt = $mysqli->prepare("SELECT DISTINCT fld_product_size FROM tbl_product_variation where fld_product_id=$id");
                  $stmt->execute();
                  $size = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                  if(!$size) exit('No rows');
                  $stmt->close();    
                  ?>
                  <head>
                      <link rel="stylesheet" href="/css/button_size.scss.css">
                  </head>
                  <?php foreach($size as $index) { ?>
                      <?php $lol1=$index['fld_product_size'];
                          ?>
                          <a  href="#" class="button-size button-size-white button-size-animate text-box size" onclick="chooseSize(<?php echo $lol1 ?>)" <?php echo "id = '$lol1'" ?>><?php echo $lol1; ?></a>
                          <?php
                      ?>
                  <?php } ?>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                  <?php foreach($size as $index) { ?>
                      <?php $lol=$index['fld_product_size'];?>
                      <script>
                          $('<?php echo "#".$lol?>').on('click', function(){
                              if(document.getElementById("<?php echo "$lol" ?>").classList.contains('selected') == true) {
                                  $(this).removeClass('selected');
                              }
                              else if(document.getElementById("<?php echo "$lol" ?>").classList.contains('selected') == false) {
                                  $(this).addClass('selected');
                              }
                          });
                      </script>
                  <?php } ?>
                  <script>
                    function chooseSize(size) {
                      if(this.document.getElementById(size.id).classList.contains('selected') == true) {
                      } else {
                        if(size.id == 'S'){
                          document.getElementById("addsize").innerHTML += '<input type="hidden" name="prodSize" value="S">';
                        } else if(size.id == 'M') {
                          document.getElementById("addsize").innerHTML += '<input type="hidden" name="prodSize" value="M">';
                        } else if(size.id == 'L') {
                          document.getElementById("addsize").innerHTML += '<input type="hidden" name="prodSize" value="L">';
                        } else if(size.id == 'XL') {
                          document.getElementById("addsize").innerHTML += '<input type="hidden" name="prodSize" value="XL">';
                        }
                      }
                    }
                  </script>
                  <div id="addsize"></div>
                <!--END Button Size-->

                <div style="margin: 20px; margin-left: 0px;">
                  <!--START Button Counter-->
                    <head>
                      <link rel="stylesheet" href="/css/button_counter.css">
                    </head>
                    <div class="wrapper">
                      <span class="minus">-</span>
                      <span class="num" id="prodQuantity" value="00">01</span>
                      <!-- <input class="num" name="prodQuantity" value="01" readonly> -->
                      <span class="plus">+</span>
                    </div>
                    
                    <script>
                      $prodQuantity = 1;
                      const plus = document.querySelector(".plus"),
                      minus = document.querySelector(".minus"),
                      num = document.querySelector(".num");
                      let a = 1;
                      plus.addEventListener("click", ()=>{
                        a++;
                        a = (a < 10) ? "0" + a : a;
                        num.innerText = a;
                        document.getElementById("quantHidden").value = a;
                      });
                      minus.addEventListener("click", ()=>{
                        if(a > 1){
                          a--;
                          a = (a < 10) ? "0" + a : a;
                          num.innerText = a;
                          document.getElementById("quantHidden").value = a;
                        }
                      });
                    </script>
                    <input type="hidden" id="quantHidden" name="prodQuantity" value="01">
                  <!--END Button Counter-->
                </div>
                <div style="width: 400px">
                  <!--START Button Add To Cart-->
                    <head>
                        <link rel="stylesheet" href="/css/button_addtocartv1.scss.css" />
                    </head>
                    <button class="button" name="addToCart" onclick="displayItemsCount()" type="submit">
                        <span>Add to cart</span>
                        <div class="cart">
                            <svg viewBox="0 0 36 26">
                                <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5"></polyline>
                                <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                            </svg>
                        </div>
                    </button>
                    <script type="text/javascript" src="/js/button_addtocartv1.js"></script>
                  <!--END Button Add To Cart
                  
                  | -->
                  <!--START Button Place Order-->
                  <!-- <head>
                    <link rel="stylesheet" href="/css/button_place_order.scss.css" />
                  </head>
                  <button class="place-order place-order--default" name="placeOrder">
                      <div class="default text">Place Order</div>
                      <div class="forklift">
                          <div class="upper"></div>
                          <div class="lower"></div>
                      </div>
                      
                      <div class="box animation"></div>
                      <div class="done text">Done</div>
                  </button>
                  <script type="text/javascript" src="/js/button_place_order.js"></script> -->
                  <!--END Button Place Order-->
                </div>
            </td>
        </tr>
      </table>
    </form>
    <!-- shop name -->
    <form method="GET" action="/seller_shop" class="nama_kedai">
      <input type="hidden" name="sellerId" value="<?php echo $sellerid; ?>">
      <h5 class="titleseller">Seller:</h5>
      <button type="submit" class="sname"><?php echo $shopname ?></button>
    </form>


    <?php include 'product-description.php' ?>

    <?php include 'footer.php'?>
  </body>
  <?php }?>

  <script>
    <?php foreach( $variation3 as $another) {?>
      function myFunction() {
        var num=document.getElementById("heightId").value;
        var num =parseInt(num);
        
        if(num==1){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_1']?>";
        }
        if(num==2){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_2']?>";
        }
        if(num==3){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_3']?>";
        }
        if(num==4){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_4']?>";
        }
        if(num==5){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_5']?>";
        }
        if(num==6){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_6']?>";
        }
        if(num==7){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_7']?>";
        }
        if(num==8){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_8']?>";
        }  
        if(num==9){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_9']?>";
        }  
        if(num==10){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_10']?>";
        }  
        if(num==11){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_11']?>";
        }  
        if(num==12){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_12']?>";
        }  
        if(num==13){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_13']?>";
        }  
        if(num==14){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_14']?>";
        }  
        if(num==15){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_15']?>";
        }  
        if(num==16){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_16']?>";
        }  
        if(num==17){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_17']?>";
        }  
        if(num==18){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_18']?>";
        }  
        if(num==19){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_19']?>";
        }  
        if(num==20){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_20']?>";
        }  
        if(num==21){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_21']?>";
        }  
        if(num==22){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_22']?>";
        }  
        if(num==23){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_23']?>";
        } 
        if(num==24){
            document.getElementById("pic").src = "/img/<?php echo $another['fld_image_24']?>";
        }   

      }
    <?php } ?>
  </script>
</html>