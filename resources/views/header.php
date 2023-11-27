<?php 
  include_once 'session.php';
  include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);
    $mysqli2 = new mysqli($servername, $username, $password, $dbname);
    try {
      $stmt1 = $mysqli1->prepare("SELECT id FROM tbl_customer WHERE username = '$sessionname'");
      $stmt1->execute();
      $handler = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
      if(count($handler) == 0) {
        header("Location: \login-web");
      }
      
      $custId = 0;
      
      foreach($handler as $cust) {
        $custId = $cust['id'];
      }
      
      $stmt2 = $mysqli2->prepare("SELECT COUNT(cart_id) AS Count FROM tbl_cart WHERE customer_id = '$custId'");
      $stmt2->execute();
      $holder = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
    
      foreach($holder as $num) {
        $cartNum = $num['Count'];
      }
      $stmt1->close();
      $stmt2->close();
    
    } catch(PDOException $e) {
      echo "salahhhhhhhh";
    }
?>       
   
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="/css/header.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  
}

/* Modal Content */
.modal-content {
  /* background-color: #fefefe; */
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 100%;
  position: relative;
 
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
 
   </head>
   <body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.map"></script>
   <hr class="header2">
      <nav>
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
            <input type="text" name="ProductSearchBar" class="search-data" placeholder="Search UKM Product" required>
            <button type="submit" class="fas fa-search" ></button>
         </form> 
         <div class="cart-icon" style="margin-right: 1px">
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
        <div class="chat-icon" >
            <a href="\chat" >
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

<!-- The Modal -->

      <hr class="header2">
      <!-- <script src="app.js"></script> -->
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
           
      <script>
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }

      // Test Cart
      let itemsCountDiv = document.querySelector(".itemsCount");
            let cartIcon = document.querySelector(".cartIcon");
            // let itemsCount = 1;
            
            if(<?php echo $cartNum ?> != null)
              itemsCount = <?php echo $cartNum ?>;
            else
              itemsCount = 0;

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