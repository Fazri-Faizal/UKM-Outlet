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
         <div class="nav-items">
            <li><a onclick="window.location.href='home'">Home</li>
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
         <div class="cart-icon">
            <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            </a>
        </div>
        <div class="chat-icon">
            <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-chat" viewBox="0 0 16 16">
            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
            </svg>
            </a>
        </div>
        <div class="user-icon">
            <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
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
   
    if(!$variation1) exit('No rows');
   
    $stmt1->close();  
    $min = 99999999;
    $max=0;
     foreach( $variation1  as $row2) {
                                    
      if($row2['fld_producy_price']<$min){
         $min=$row2['fld_producy_price'];
        }
        if($row2['fld_producy_price']>$max){
            $max=$row2['fld_producy_price'];
           }
     }
    $mysqli2 = new mysqli($servername, $username, $password,$dbname);
    
    $stmt12 = $mysqli2->prepare("SELECT  * FROM tbl_products where product_Id =$id");
    $stmt12->execute();
   
    $variation2 = $stmt12->get_result()->fetch_all(MYSQLI_ASSOC);
   
    if(!$variation2) exit('No rows');
   
    $stmt12->close();  
    $productname="";
    $productpic="";
    $productrating=0;
    foreach($variation2 as $pname){
        $productname=$pname['product_Name'];
        $productpic=$pname['pic'];
        $productrating=$pname['product_Rating'];
    }

    $mysqli3 = new mysqli($servername, $username, $password,$dbname);
    
    $stmt13 = $mysqli3->prepare("SELECT  * FROM tbl_product_3d_pic where fld_product_id=$id");
    $stmt13->execute();
   
    $variation3 = $stmt13->get_result()->fetch_all(MYSQLI_ASSOC);
   
  
    $stmt13->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product details</title>

    <!-- CSS -->
    <link href="/css/product-details.css" rel="stylesheet">


  </head>

  <body>
    <table class="container-custom">
      <tr>
          <td class="left-column">
            <div class="left-column">
              <!-- Product Description -->
              <div class="product-description">
                <span>Jersey</span>
                <h1><?php echo $productname ?></h1>
                <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
                <!-- Product Pricing -->
                <div class="product-price">
                    <span>RM <?php if($min==$max){ echo $max;}else { echo $min.' - RM'.$max;}?></span>
                </div>
              </div>
          </td>
          <td class="mid-column">
            <img class="img-custom" id="pic" src="/img/<?php echo $productpic ?>">
            <?php   if(!$variation3){  

            }else{
   ?>
            <input type="range" class="slider" name="height" id="heightId" min = "1" max = "24" value = "12" oninput="myFunction()" ></td><td><output id="outputId" ></output><br>
            <?php }?>
          </td>
          <td class="right-column">
              <!-- rating -->
              <div style=" color: #86939E; font-size: 17px; margin-top: 20px;">
                <?php echo $productrating ?>
                
                <?php
                  $rate = $productrating;

                  for($i=1; $i<=$rate; $i++) {
                    if($i>0.5)
                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#FEC20C" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';

                    if(($rate-$i) == 0.5)
                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#FEC20C" class="bi bi-star-half" viewBox="0 0 16 16"><path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/></svg>';
                  }
                ?><br> 
              </div>

              <div style=" color: #86939E; font-size: 14px; margin-top: 20px;">
                95 ratings | 100 sold
              </div>

              <!-- Product Color -->
              

              <!-- Product Size -->
              <div class="product-size">
                <span>Size</span><br>
                  <?php include 'button_size.php' ?><br><br><br>
              </div>

              <!-- button -->
              <div style="width: 400px">
                  <?php include 'button_addtocartv1.php' ?> | <?php include 'button_place_order.php' ?>
              </div> 
          </td>
      </tr>
    </table>

    <?php include 'product-description.php' ?>

    <?php include 'footer.php'?>
  </body>

  <script>
    <?php foreach( $variation3 as $another) {?>
      function myFunction() {
        var num=document.getElementById("heightId").value;
        var num =parseInt(num);
        
        if(num==1){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_1']?>";
        }
        if(num==2){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_2']?>";
        }
        if(num==3){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_3']?>";
        }
        if(num==4){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_4']?>";
        }
        if(num==5){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_5']?>";
        }
        if(num==6){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_6']?>";
        }
        if(num==7){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_7']?>";
        }
        if(num==8){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_8']?>";
        }  
        if(num==9){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_9']?>";
        }  
        if(num==10){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_10']?>";
        }  
        if(num==11){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_11']?>";
        }  
        if(num==12){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_12']?>";
        }  
        if(num==13){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_13']?>";
        }  
        if(num==14){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_14']?>";
        }  
        if(num==15){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_15']?>";
        }  
        if(num==16){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_16']?>";
        }  
        if(num==17){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_17']?>";
        }  
        if(num==18){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_18']?>";
        }  
        if(num==19){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_19']?>";
        }  
        if(num==20){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_20']?>";
        }  
        if(num==21){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_21']?>";
        }  
        if(num==22){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_22']?>";
        }  
        if(num==23){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_23']?>";
        } 
        if(num==24){
            document.getElementById("pic").src = "/img/3d/<?php echo $another['fld_image_24']?>";
        }   

      }
    <?php } ?>
  </script>
</html>
