
<?php 
    include('header.php');
    include('database.php');
    try {
        $mysqli = new mysqli($servername, $username, $password, $dbname);

        $stmt = $mysqli->prepare("SELECT * FROM tbl_products Limit 3");

        $stmt->execute();

        $arr=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if(!$arr) exit('No rows');
        $stmt->close();
    }
    catch(PDOException $e) {
        echo "Ada error siot: " . $e->getMessage();
    }

    $conn = null;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="css/home.css">   
         
    </head>
   
<body>
<title>Home Page</title>

<div class="bg-top" style="margin-top: 0px">
    <img src="/img/LOGO-MOBILE.png" class="img">
</div>

<!-- <h1>Shop Our Special Deals</h1>
>

<div class="grid-container">
 
  <div class="slider">
  </div>
    <image src="/img/vouchers/voucher5.jpg" class="img1">

  <image src="/img/vouchers/vouche4.jpg" class="img2">
</div> -->


<nav style="text-align: center; display: inline-block; background-color:#ffffff; margin-left: 19%; margin-top: 2%;" >
    <ul>
        <form action="/product-list-ukm-filter" method="get" style="border:none; filter:none">
            <button name="prodtype" value="Jersey" style="cursor:pointer;"><li>Jersey<span></span><span></span><span></span><span></span></li></button>
            <button name="prodtype" value="Lanyard"style="cursor:pointer;"><li>Lanyard<span></span><span></span><span></span><span></span></li></button>
            <button name="prodtype" value="Tote Bag" style="cursor:pointer;"><li>Tote Bag<span></span><span></span><span></span><span></span></li></button>
            <button name="prodtype" value="Hoodie" style="cursor:pointer;"><li>Hoodie<span></span><span></span><span></span><span></span></li></button>
            <button name="prodtype" value="Cap" style="cursor:pointer;"><li>Cap<span></span><span></span><span></span><span></span></li></button>
            <button name="prodtype" value="" style="cursor:pointer;"><li>Others<span></span><span></span><span></span><span></span></li></button>
        </form>
    </ul>
</nav>

<div class="bg-top-2" >
    <img src="/img/LOGO-MOBILE.png" class="img" style="visibility: hidden">
</div>


<h1><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
  <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z"/>
</svg><i class="bi bi-fire"></i> Hot Products</h1>
<div  class="seeall">
    <h4 style="cursor:pointer"class="seeall" onclick="window.location.href='/product-list-ukm-web'"> See all <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 13 13">
  <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
</svg> <h4>
</div>

<table class="product-list">
    <tr class="rowlist">
        <?php 
            $count = 1;
            foreach($arr as $row) {

                if($count == 4) {
                    $count = 1;
                    echo '</tr>';
                    echo '<tr>';
                }
                $id=$row['product_Id'];
                $count++;
        ?>
                <td>
                <form action="/product-details" method="get">
                        <button onclick="window.location.href='product-details'" name="id" <?php echo "value = $id"?>>
                            <div class="card">
                                <p style="margin-left: 250px"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 20px;" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                </p>
                                <div class="prodimg">
                                    <img src="img/<?php echo $row['pic']; ?>" alt="zuhairi" style="width: 206px; height: 264px;">
                                </div>
                                
                                <p style="margin-left: 230px; display: inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEC20C" class="bi bi-star-fill" viewBox="0 0 16 16" style="margin-right: 5px">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg> <?php echo $row['product_Rating']?>
                                </p>
                                <h3><?php echo $row['product_Name']?></h3>
                                <?php 
                                    $id = $row['product_Id'];
                                    $stmt2 = $mysqli->prepare("SELECT fld_producy_price FROM tbl_product_variation WHERE fld_product_id = $id");
                                    $stmt2->execute();
                                    $arr2 = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

                                    // if(!$arr2) exit('No rows');
                                    $stmt2->close();
                                    $min = 99999999;
                                    foreach($arr2 as $row2) {
                                        
                                        if($row2['fld_producy_price']<$min){
                                            $min=$row2['fld_producy_price'];
                                        }
                                    }                                  
                                ?>
                                <p class="price">RM<?php echo $min;?></p><br>
                            </div>
                        </button>
                    </form>
                </td> 
        <?php } ?>
    </tr>  
</table>

    <?php include 'footer.php' ?>
  </body>

</html>

<script>
    function sendVal(letter){
     alert(letter);
     header('Location: /product-list-ukm-filter');
        exit;
  }
</script>