<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="utf-8"> 
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
    
        $mysqli = new mysqli($servername, $username, $password,$dbname); 
 
        $stmt = $mysqli->prepare("SELECT * FROM tbl_products WHERE seller_ids=1"); 
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
        $stmt2 = $mysqli->prepare("SELECT * FROM tbl_customer WHERE shop_name LIKE 'Sumbul Shop'"); 
        $stmt2->execute(); 
 
        $arr2 = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC); 
 
        if(!$arr2) exit('no rows'); 
 
        $stmt2->close(); 
        foreach($arr2 as $ownerinfo) {  
          $shopname=$ownerinfo['shop_name'];
          $bio=$ownerinfo['shop_bio'];
          $joneddate=$ownerinfo['joineddate'];
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
      <h1><?php echo $shopname; ?></h1> 
                         
      <p><?php echo  $bio;?></p> 
                        <span class="chat-btn" onclick="window.location.href='chat'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16"> 
                        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/> 
                        </svg> Chat seller </span> 
                    </div> 
     <div class="col2 last"> 
      <div class="grid clearfix"> 
       <div class="col3 first"> 
        <h1><?php echo $counting;?></h1> 
        <span>Products</span> 
       </div> 
       <div class="col3"><h1><?php  echo $diff->format("%a days");?></h1> 
       <span>Joined</span></div> 
       <div class="col3 last"><h1><?php echo $averagerating;?></h1> 
       <span>Rating</span></div> 
      </div> 
     </div> 
    </div> 
   </div> 
   <!-- <span class="smalltri"> 
     
   <i class="fa fa-star"></i> 
   </span> --> 
  </section> 
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
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 20px;" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                            </p>
                            <img src="/img/<?php echo $ukmweb['pic'] ?>" alt="Denim Jeans" style="width: 206px; height: 264px;">
                            <p style="margin-left: 230px">
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
                   