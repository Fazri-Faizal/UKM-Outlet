
<?php
  include_once 'session.php';
  include 'database.php';
    
if (isset($_GET['sendmessage'])) {
        
        
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt2 = $conn->prepare("INSERT INTO tbl_chatlog(username,chat,date_time,chat_with,currentid,chatstauts) VALUES(:un,:chat,NOW(),:chatwith,:cid,'unread')");
   
        $stmt2->bindParam(':un', $username, PDO::PARAM_STR);
        $stmt2->bindParam(':chat', $chat, PDO::PARAM_STR);
        $stmt2->bindParam(':chatwith', $cw, PDO::PARAM_STR);
        $stmt2->bindParam(':cid', $currentid, PDO::PARAM_STR);

        
           
        $username =   $_SESSION['userchatedwith'];
        $chat = $_GET['chat'];
        $cw=$_SESSION['chatedid'];
        $currentid=$_GET['curentid'];

       
           
        $stmt2->execute();
        $stmt2->closeCursor();
        $userchatedwith=$_SESSION['userchatedwith'] ;

        echo "<script>
        
         window.location.href='\chat'; 
        
        </script>";
    
    }
        
      
        ?>