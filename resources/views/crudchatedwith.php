<?php
  include_once 'session.php';
  include 'database.php';
    
if (isset($_GET['startchat'])) {
        

    $cid =  $_GET['cid'];
    $cun = $_GET['cn'];
    $shn=$_GET['hn'];
    $sid= $_GET['sid'];
    $sun=$_GET['sn'];

    $mysqli3 = new mysqli($servername, $username, $password,$dbname);
    
    $stmt13 = $mysqli3->prepare("SELECT  * FROM tbl_chatedwith where customerid= $cid AND seller_id= $sid");
    $stmt13->execute();
   
    $variation3 = $stmt13->get_result()->fetch_all(MYSQLI_ASSOC);
   $count=0;
  foreach($variation3 as $row){
    $count++;
  }
 if($count!=0){
    echo "<script>
        
    window.location.href='\chat'; 
   
   </script>";
 }else{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt2 = $conn->prepare("INSERT INTO tbl_chatedwith (customerid,username,seller_id,customerusername) VALUES(:cid,:shn,:sids,:cun)");
   
        $stmt2->bindParam(':cid', $cid, PDO::PARAM_STR);
        $stmt2->bindParam(':cun', $cun, PDO::PARAM_STR);
        $stmt2->bindParam(':sids', $sid, PDO::PARAM_STR);
        $stmt2->bindParam(':shn', $shn, PDO::PARAM_STR);

        
           

       
           
        $stmt2->execute();
        $stmt2->closeCursor();

        echo "<script>
        
        window.location.href='\chat'; 
       
       </script>";

 }
    

   
    
    }
        
      
        ?>