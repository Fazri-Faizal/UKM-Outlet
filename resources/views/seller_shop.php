<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="utf-8"> 
        <title>Seller Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"> 
        <link rel="stylesheet" href="css/seller_shop.css"> 
    </head> 
    <?php  
        include('header.php'); 
        include('database.php'); 

        $sellerid = $_GET['sellerId'];
        $mysqli = new mysqli($servername, $username, $password,$dbname); 
 
        $stmt = $mysqli->prepare("SELECT * FROM tbl_products WHERE seller_ids='$sellerid'"); 
        $stmt->execute(); 
 
        $arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 
 
        if(!$arr) exit('no rows'); 
 
        $stmt->close(); 
        $counting = 0; 
        $totalrating=0;   

        foreach($arr as $umweb) {  

          $counting= $counting+1;
          $totalrating=$totalrating+$umweb['product_Rating'];
        }
        $averagerating= $totalrating/$counting;
        $stmt2 = $mysqli->prepare("SELECT * FROM tbl_customer WHERE id='$sellerid'"); 
        $stmt2->execute(); 
 
        $arr2 = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC); 
 
        if(!$arr2) exit('no rows'); 
 
        $stmt2->close(); 
        foreach($arr2 as $ownerinfo) {  
          $shopname=$ownerinfo['shop_name'];
          $bio=$ownerinfo['shop_bio'];
          $joneddate=$ownerinfo['joineddate'];
          $sellername=$ownerinfo['username'];
        }
        $currentdate= date("Y/m/d");
        $date1=date_create("$joneddate");
        $date2=date_create("$currentdate");
        
        $diff=date_diff($date1,$date2);    
        ?> 
    
<body style="text-align:center;"> 
<div class="container"> 
 <div class="innerwrap"> 
  <section class="section1 clearfix"> 
   <div> 
    <div class="row grid clearfix"> 
     <div class="col2 first"> 
      <h1 style="font-size:35px; font-weight:500;"><?php echo $shopname; ?></h1> 
                        
      <p class="bio"><?php echo  $bio;?></p> 

       <form action="\crudchatedwith" method="get">
        <input type="hidden" name="sid" value="<?php echo $sellerid?>">
        <input type="hidden" name="sn" value="<?php echo $sellername?>">
        <input type="hidden" name="hn" value="<?php echo $shopname?>">
        <input type="hidden" name="cid" value="<?php echo $custId?>">
        <input type="hidden" name="cn" value="<?php echo $custname?>">
        <span class="chat-btn" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16"> 
        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/> 
        </svg> <Input class="chat-btn" name="startchat" type="submit" value="Chat seller"> </span> 
       </form>
    </div> 
     <div class="col2 last"> 
      <div class="grid clearfix"> 
       <div class="col3 first"> 
        <h1><?php echo $counting;?></h1> 
        <span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16" style="margin-right:5px; margin-bottom: 5px;">
        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5"/>
        </svg>Products</span> 
       </div> 
       <div class="col3"><h1><?php  echo $diff->format("%a days");?></h1> 
       <span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16" style="margin-right:5px; margin-bottom: 5px;">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
        </svg>Joined</span></div> 
       <div class="col3 last"><h1><?php echo number_format($averagerating,2);?></h1> 
       <span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="margin-right:5px; margin-bottom: 5px;">
        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
        </svg>Rating</span></div> 
      </div> 
     </div> 
    </div> 
   </div> 
   <!-- <span class="smalltri"> 
     
   <i class="fa fa-star"></i> 
   </span> --> 
  </section> 
  <hr style="margin-top:50px; margin-bottom:50px">
  <h1 style="color: #804444; face: verdana; text-align: center; padding-bottom: 10px; font-weight:bold">PRODUCTS</h1>
        <table  class="product-list"> 
        <tr> 
            <?php 
                $count = 1; 
                 
                foreach($arr as $ukmweb) {  
 
                    if($count == 4) { 
                        $count = 1; 
                        echo '</tr>'; 
                        echo '<tr>'; 
                    } 
 
                    $id=$ukmweb['product_Id']; 
                    $count++;
                    ?>
                    <td> 
                    <form action="/product-details" method="get"> 
                        <button onclick="window.location.href='product-details'" name="id" <?php echo "value = $id"?>> 
                        <div class="card">
                            <p style="margin-left: 250px;margin-top: 20px;margin-right: 5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 20px; margin-right: 10px;" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                            </p>
                            <img src="/img/<?php echo $ukmweb['pic'] ?>" alt="Denim Jeans" style="width: 206px; height: 264px;">
                            <p style="margin-left: 210px; font-size: 15px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEC20C" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg> <?php echo $ukmweb['product_Rating'] ?>
                            </p>
                            <h3><?php echo $ukmweb['product_Name'] ?></h3>
                            <p class="price">RM 40.00</p><br>
                        </div>
                    </form>
                    <td>
                    <?php
                    }
            ?>