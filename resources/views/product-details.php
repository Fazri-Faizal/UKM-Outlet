<?php 
    include 'header.php'; 

    include 'database.php';
    $conn = new mysqli($servername, $username, $password,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
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
    <table class="container">
      <tr>
          <td class="left-column">
            <div class="left-column">              
              <!-- Product Description -->
              <div class="product-description">
                <span>Jersey</span>
                <h1>JERSEY UKM 2022</h1>
                <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
                <!-- Product Pricing -->
                <div class="product-price">
                    <span>RM 40</span>
                </div>
              </div>
          </td>
          <td class="mid-column">
            <img id="pic" src="/img/3d/1.png">
            <input type="range" class="slider" name="height" id="heightId" min = "1" max = "9" value = "3" oninput="myFunction()" ></td><td><output id="outputId" ></output><br>
          </td>
          <td class="right-column">
              <!-- rating -->
              <div style=" color: #86939E; font-size: 17px; margin-top: 20px;">
                4.5
                <?php
                  $rate = 4.5;
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
              <div class="product-color">
                <span>Color</span><br>
                  <?php include 'button_color.php' ?>  
              </div>

              <!-- Product Size -->
              <div class="product-size">
                <span>Size</span><br>
                  <?php include 'button_size.php' ?><br><br><br>
              </div>

              <!-- button -->
              <div style="display: inline;">
                  <?php include 'button_addtocartv1.php' ?> | <?php include 'button_place_order.php' ?>
              </div> 
          </td>
      </tr>
    </table>
    <?php include 'footer.php'?>
  </body>

  <!-- Scripts -->
  <script>
      function myFunction() {
          var num=document.getElementById("heightId").value;
          var num =parseInt(num);
          if(num==1){
              document.getElementById("pic").src = "/img/3d/1.png";
          }
          if(num==2){
              document.getElementById("pic").src = "/img/3d/2.png";
          }
          if(num==3){
              document.getElementById("pic").src = "/img/3d/3.png";
          }
          if(num==4){
              document.getElementById("pic").src = "/img/3d/4.png";
          }
          if(num==5){
              document.getElementById("pic").src = "/img/3d/5.png";
          }
          if(num==6){
              document.getElementById("pic").src = "/img/3d/6.png";
          }
          if(num==8){
              document.getElementById("pic").src = "/img/3d/8.png";
          }
          if(num==9){
              document.getElementById("pic").src = "/img/3d/9.png";
          }  
      }
  </script>
</html>
