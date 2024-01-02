<?php include('header.php')?>
<html>
  <head>
    <link rel="stylesheet" href="/css/chat.css">
    <meta http-equiv="refresh" content="300">
    
    <!-- Your head content -->
     <script type="text/javascript">
        setTimeout(function(){
            window.location.reload(1);
        }, 20000); // 60000 milliseconds = 1 minute
    </script> 
</head>

  </head>

  <body>
 <div class="container">
      <div class="row">
    
        <section class="discussions">
          <div class="discussion search">
            <div class="searchbar">
              <i class="fa fa-search" aria-hidden="true"></i>
              <input type="text" placeholder="Search..."></input>
            </div>
          </div>

   <?php 
   
   $mysqli3 = new mysqli($servername, $username, $password, $dbname);

   // Use prepared statements to prevent SQL injection
   $stmt13 = $mysqli3->prepare("SELECT * FROM tbl_chatedwith WHERE customerid = ? OR seller_id = ?");
   $stmt13->bind_param("ii", $custId, $custId);
   $stmt13->execute();
   
   $variation3 = $stmt13->get_result()->fetch_all(MYSQLI_ASSOC);
   
   foreach ($variation3 as $row) {
       // Determine if the current user is the customer or seller
       $isCustomer = $custId == $row['customerid'];
       $otherPartyId = $isCustomer ? $row['seller_id'] : $row['customerid'];
       $otherPartyUsername = $isCustomer ? $row['username'] : $row['customerusername'];
   
       // Get unread messages
       $stmt16 = $mysqli4->prepare("SELECT * FROM tbl_chatlog WHERE chat_with = ? AND currentid = ?");
       $stmt16->bind_param("ii", $custId, $otherPartyId);
       $stmt16->execute();
       $chatMessages = $stmt16->get_result()->fetch_all(MYSQLI_ASSOC);
   
       $unreadmessages = 0;
       foreach ($chatMessages as $message) {
           if ($message['chatstauts'] == "unread") {
               $unreadmessages++;
           }
       }
   
       // Generate HTML
       echo '<form action="" method="get">
               <button type="submit" name="Message" value="Message" class="discussion">
                   <div class="icon">';
       
       if ($unreadmessages == 0) {
           echo '<div class="itemsCount"></div>';
       } else {
           echo '<div class="itemsCount appear" style="display: block">' . $unreadmessages . '</div>';
       }
   
       echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#804444" class="bi bi-chat" viewBox="0 0 16 16">
                       <!-- SVG Path here -->
                   </svg>
                   </div>
                   <div class="photo" style="background-image: url(\'https://i.pinimg.com/originals/a9/26/52/a926525d966c9479c18d3b4f8e64b434.jpg\');">
                       <div class="online"></div>
                   </div>
                   <div class="desc-contact">
                       <p class="name">' . htmlspecialchars($otherPartyUsername) . '</p>
                       <input type="hidden" name="userchatedwith" value="' . $otherPartyUsername . '">
                       <input type="hidden" name="chatedid" value="' . $otherPartyId . '">
                   </div>
               </button>
             </form>';
   }

    if (isset($_GET['Message'])||isset($_SESSION['userchatedwith'])  ) {
      if(isset($_GET['Message'])){
        $_SESSION['userchatedwith']=null;
      }
      if($_SESSION['userchatedwith']!=null){
        $userchatedwith=$_SESSION['userchatedwith'];
        
        $sellerid = $_SESSION['chatedid'];
        
      }else{
      $userchatedwith=$_GET['userchatedwith'];
      $_SESSION['userchatedwith'] =$userchatedwith;
      $sellerid = $_GET['chatedid'];
      $_SESSION['chatedid'] = $sellerid;
      }
      $currentid=$custId;
      $stmt19 = $mysqli4->prepare("UPDATE tbl_chatlog SET chatstauts = 'read' WHERE chat_with= $currentid AND currentid=$sellerid");
        $stmt19->execute();
      
      ?>
 

        </section>
        <section class="chat">

          <div class="header-chat">
            
            <i class="icon fa fa-user-o" aria-hidden="true"></i>
            <p class="name"><?php echo $userchatedwith?></p>
            <!-- <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i> -->
          </div>
        <?php 
      // ... [Your previous code]


  
    $mysqli4 = new mysqli($servername, $username, $password, $dbname);

    // Combined query to fetch all relevant chat messages
    $stmt15 = $mysqli4->prepare(" SELECT * FROM tbl_chatlog 
    WHERE (currentid = ? AND chat_with = ?) OR (currentid = ? AND chat_with = ?)
    ORDER BY date_time ASC");
    $stmt15->bind_param("iiii", $sellerid, $custId, $custId, $sellerid);
    $stmt15->execute();
    $chatMessages = $stmt15->get_result()->fetch_all(MYSQLI_ASSOC);
    
  
    foreach ($chatMessages as $message) {
        // Determine if the message was sent or received
        $isReceived = $message['currentid'] == $sellerid;
        
        ?>
        
        <div class="messages-chat">
        <?php
        if($message['currentid']== $sellerid){
         ?>
         

        <div class="message">
                <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80);">
                    <div class="online"></div>
                </div>
            </div>
            <div class="message text-only">
                <p class="text"><?php echo htmlspecialchars($message['chat']); ?></p>
            </div>
            <!-- Add other message details here -->
        </div>
        <?php
        }
        else{
        ?>
          <BR>
         <div class="message text-only" style="float:right">
          <p class="text"><?php echo htmlspecialchars($message['chat']);?></p>
        </div>
        <BR>
        
        <?php }
    }
    // ... [Rest of your code]
    }
    ?>

          <div class="footer-chat">  
           <form action="\chatcrud" method=get>
         
            <input type=hidden name="curentid" value=<?php echo $custId?>>
            <input type="text" class="write-message" placeholder="Type your message here" name="chat">
            <input type="submit" class="icon send fa fa-paper-plane-o clickable" aria-hidden="true" value="send" name="sendmessage">
           </form>
          </div>
        
        </section>

      <?php 
      
    ?>
       
      
             
      
      </div>
   
      </div>
  </div>
    <?php include('footer.php')?>
  </body>
 </html>


