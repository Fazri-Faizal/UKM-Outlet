<?php 

include 'database.php';
include 'header.php';
$q = $_GET['ProductSearchBar'];
    $mysqli = new mysqli($servername, $username, $password,$dbname);

    $stmt = $mysqli->prepare("SELECT * FROM tbl_products where product_Name LIKE '%$q%'");
    $stmt->execute();

    $arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    if(!$arr) exit('No rows');

    $stmt->close();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/product-list-search.css"/>
    <title><?php echo $_GET['ProductSearchBar']; ?> - Product List</title>
</head>
<body style="text-align:center;">
    <table class="product-list">
        <tr style="bgcolor: #556B2F;" >
            <h2 style="color: #804444; face: verdana; text-align: center; padding-top: 20px; padding-bottom: 20px; ">Showing result for '<?php echo $_GET['ProductSearchBar']; ?>' </h2>
        </tr>

<table class="product-list">
    <tr class="rowlist">
    <?php 
        foreach($arr as $row) { 
                   $id=$row['product_Id'];
                   
            ?>
                    <td>
                        <form action="/product-details" method="get">
                        <button onclick="window.location.href='product-details'" name="id" <?php echo "value = $id"?>>
                            <div class="card">
                                <p style="margin-left: 250px"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 20px; margin-right:5px;" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                </p>
                                <div class="prodimg">
                                    <img src="img/<?php echo $row['pic']; ?>" alt="zuhairi" height="264px" width="206px">
                                </div>
                                
                                <p style="margin-left: 230px; display: inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEC20C" class="bi bi-star-fill" viewBox="0 0 16 16" style="margin-right: 5px">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg> <?php echo $row['product_Rating']?>
                                </p>
                                <h3><?php echo $row['product_Name']?></h3>
                                <?php 
                                    $id = $row['product_Id'];
                                    $min = $row['product_price'];
                                    // $stmt2 = $mysqli->prepare("SELECT fld_producy_price FROM tbl_product_variation WHERE fld_product_id = $id");
                                    // $stmt2->execute();
                                    // $arr2 = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

                                    // // if(!$arr2) exit('No rows');
                                    // $stmt2->close();
                                    // $min = 99999999;
                                    // foreach($arr2 as $row2) {
                                    
                                    //     if($row2['fld_producy_price']<$min){
                                    //         $min=$row2['fld_producy_price'];
                                    //     }
                                    // }
                                
                                ?>
                                <p class="price">RM<?php echo number_format($min, 2);?></p><br><br>
                            </div>
                </button>
             </form>
            </td> 
        <?php } ?>
    </tr>  
</table> 
    <?php include 'footer.php' ?>
</body>
<script type="text/javascript" src="javascript.js"></script>
</html>