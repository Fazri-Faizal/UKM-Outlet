<?php 
  include_once 'session.php';
  include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);
    $mysqli2 = new mysqli($servername, $username, $password, $dbname);
    try {
      $stmt1 = $mysqli1->prepare("SELECT * FROM tbl_customer WHERE username = '$sessionname'");
      $stmt1->execute();
      $handler = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
      if(count($handler) == 0) {
        header("Location: \login-web");
      }
      
      $custId = 0;
      
      foreach($handler as $cust) {
        $custId = $cust['id'];
        $custname=$cust['username'];
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

    $mysqli4 = new mysqli($servername, $username, $password, $dbname);

    // Combined query to fetch all relevant chat messages
    $stmt15 = $mysqli4->prepare(" SELECT * FROM tbl_chatlog WHERE chat_with = $custId ");

    $stmt15->execute();
    $chatMessages = $stmt15->get_result()->fetch_all(MYSQLI_ASSOC);
    $unreadmessages=0;
    foreach ($chatMessages as $message) {
    
        if($message['chatstauts']=="unread"){
          $unreadmessages++;

        }
    }
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
         <!-- <div class="noti-icon" style="margin-right: 1px">
            <a href="\user-profile">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-bell" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
            </svg>
            </a>
         </div> --> 
        <div class="noti-icon" style="margin-right: 6px">
          <a href="#" id="myBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-bell" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
            </svg>
          </a>
          <!-- Modal Structure -->
          <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
              <?php
                $mysqli4 = new mysqli($servername, $username, $password, $dbname);

                $stmt3 = $mysqli4->prepare("SELECT order_id, prod_status FROM tbl_order WHERE cust_id = ? AND prod_status IN ('Completed', 'Cancelled', 'To Ship')");
                $stmt3->bind_param("i", $custId);
                $stmt3->execute();
                $orderUpdates = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

                // Prepare the notifications HTML using PHP
                $notificationsHTML = '';
                foreach ($orderUpdates as $update) {
                    $statusMessage = "Your order {$update['order_id']} status is: {$update['prod_status']}";
                    $notificationsHTML .= "<div>{$statusMessage}<span class='close'>&times;</span></div>";
                }

                $stmt3->close();
                $mysqli4->close();
              ?>
              <div class="notification-list">
                <div><?php echo $notificationsHTML; // Output the notifications ?><span class="close">&times;</span></div>
              </div>
            </div>
          </div> 
        </div>
        <div class="cart-icon" style="margin-right: -13px;">
          <?php if($cartNum == 0) { ?>
              <a href="#" onclick="noitem()">
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
            <?php } else { ?>
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
            <?php } ?>          
        </div>
        <div class="chat-icon" style="margin-right: 0px;">
            <a href="\chat" >
        
            <div class="icon">
                  <?php if($unreadmessages == 0) { ?>
                    <div class="itemsCount"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-chat" viewBox="0 0 16 16">
            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
            </svg>
                  <?php } else { ?>
                    <div class="itemsCount appear" style="display: block"><?php echo $unreadmessages ?></div>

                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-chat flicker" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    </svg>
                  
                  <?php } ?>
                </div>
            </a>
        </div>
        <div class="user-icon" style="margin-left: 5px">
            <a href="\user-profile">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            </a>
        </div>
        <div class="user-icon" style="margin-left: 25px">
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
      // NOTIFICATIONS ----------------------------------------------



      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get all <span> elements that close the modals
      var spans = document.getElementsByClassName("close");

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      Array.from(spans).forEach(function(span) {
      span.onclick = function() {
        this.parentElement.style.display = "none";
      }
       }); 

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
      
      function noitem() {
        alert("There are no item(s) in your cart!");
      }


      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on the button, open the modal 
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
      </script>
   </body>
</html>