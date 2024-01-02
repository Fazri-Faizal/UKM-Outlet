<?php 

    $sellerId = $_GET['sellerId'];
    $report_type = $_GET['report_type'];
?>

<?php
    include_once 'session.php';
    include 'database.php';

    if($report_type == "Monthly") {

        // Create a single database connection for all the operations.
        $mysqli = new mysqli($servername, $username, $password, $dbname);

        $stmt = $mysqli->prepare("SELECT shop_name, Fullname, YEAR(NOW()) AS CurrentYear, MONTHNAME(NOW()) AS CurrentMonth, SUM(total_price) as total_sales FROM tbl_customer LEFT JOIN tbl_order ON id = seller_id WHERE id = '$sellerId' AND MONTH(NOW()) = MONTH(order_date)");

        $stmt->execute();

        $handler = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        foreach($handler as $info) {
            $shop_name = $info['shop_name'];
            $shop_owner = $info['Fullname'];
            $current_year = $info['CurrentYear'];
            $current_month = $info['CurrentMonth'];
            $total_sales = $info['total_sales'];
        }

        $stmt->close();

        $stmt2 = $mysqli->prepare("SELECT * FROM tbl_order LEFT JOIN tbl_products ON product_Id = prod_id WHERE seller_id = '$sellerId' AND MONTH(NOW()) = MONTH(order_date)");

        $stmt2->execute();

        $productlist = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <style>  
                * {
                box-sizing: border-box;
                }

                /* Create two equal columns that floats next to each other */
                .column {
                float: left;
                width: 50%;
                padding: 10px;
                height: 100px; /* Should be removed. Only for demonstration */
                }

                .column-title {
                float: left;
                width: 100%;
                padding: 10px;
                height: 300px; /* Should be removed. Only for demonstration */
                
                }

                .row{
                    margin-top: -24px ;
                }

                /* Clear floats after the columns */
                .row:after {
                content: "";
                display: table;
                clear: both;  
                }     

                h4{
                    width: 500px;
                    display: inline;
                    color: #543f1b;
                }

                h3{
                    color: #8b7e69;
                }

                p{
                    color: #8b7e69;
                    font-size: 23px;
                }

                /* TABLE */
                #report table {
                    font-family: Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                #report td,  #report th {
                    border: 1px solid #ddd;
                    padding: 8px;
                }

                #report tr:nth-child(even){background-color: #f2f2f2;}

                #report tr:hover {background-color: #ddd;}

                #report th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: left;
                    background-color: #5e4c2d;
                    color: white;
                }

                h1{
                    color: #8b7e69;
                    font-size: 23px;
                    display: flex;
                }
            </style>
        </head>
        <body>
            <div class="row">
                <div class="column-title" style="background-color: #aba395;margin-top: 17px;height: 40px;width: 500px;border-radius: 0px 30px 30px 0px;}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#543f1b" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16" style="margin-right: 4px;">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                    </svg>
                    <h4>SALES REPORT UKM OUTLET</h4>
                </div>
            </div>
            <div class="row">
                <div class="column-title" style="text-align: center; height: 219px;">
                    <img src="/img/LOGO-MOBILE.png" style="width: 357px;margin-top: -58px ">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <h3>Shop Name:</h3>
                    <p><?php echo $shop_name ?></p>
                    <!-- <p>Pendeta.official</p> -->
                </div>
                <div class="column" style="text-align: end;">
                    <h3>Sales Month:</h3>
                    <!-- <p>December 2024</p> -->
                    <p><?php echo $current_month ?> <?php echo $current_year ?></p>
                </div>
                <div class="column" style="width: 100%">
                    <h3>Shop Owner:</h3>
                    <p><?php echo $shop_owner ?></p>
                    <!-- <p>En. Amir Kashmiri Azmi</p> -->
                </div>
            </div>
            <hr style="border: solid 1px #8b7e69;">
            <div class="row">
                <div class="column-title" style="margin-top: 3px;text-align: center;height: 50px;color: #8b7e69;" > 
                    <?php if($total_sales != NULL) { ?>         
                        <h3>Total Sales : RM <?php echo $total_sales ?></h3>
                    <?php } else { ?>
                        <h3>Total Sales : RM 0.00</h3>
                    <?php } ?>
                    <!-- <h3>Total Sales : RM 250.00</h3> -->
                </div>
            </div>

            <!-- TABLE -->
            <div>
                <h3>Category Sales</h3>
                <table id="report">
                <tr>
                    <th style="width: 400px"></th>
                    <th style="width: 56px;text-align: center;">Qty</th>
                    <th style="text-align: center;">Amount</th>
                </tr>
                <?php

                    if($productlist != NULL) {

                    
                        foreach($productlist as $product) {
                ?>
                        <tr>
                            <td><?php echo $product['product_Name'] ?></td>
                            <td style="text-align: center;"><?php echo $product['prod_qty'] ?></td>
                            <td style="text-align: center;">RM <?php echo ($product['prod_qty']*$product['product_price']) ?></td>
                        </tr>
                <?php
                        }
                    } else { 
                ?>
                    <tr style="text-align: center"><td colspan="3">No Order Record</td></tr>
                <?php
                    }
                    
                    $stmt2->close();
                ?>
                <!-- <tr>
                    <td>T-Shirt Varsiti UKM 2024</td>
                    <td style="text-align: center;">1</td>
                    <td style="text-align: center;">RM 40.00</td>
                </tr>
                <tr>
                    <td>Jacket Varsiti UKM (Red Ver.)</td>
                    <td style="text-align: center;">2</td>
                    <td style="text-align: center;">RM 60.00</td>
                </tr> -->
                </table>
            </div>
        </body>
        </html>
<?php } else {

    // Create a single database connection for all the operations.
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    $stmt = $mysqli->prepare("SELECT shop_name, Fullname, YEAR(NOW()) AS CurrentYear, SUM(total_price) as total_sales FROM tbl_customer LEFT JOIN tbl_order ON id = seller_id WHERE id = '$sellerId' AND YEAR(order_date) = YEAR(NOW())");

    $stmt->execute();

    $handler = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach($handler as $info) {
        $shop_name = $info['shop_name'];
        $shop_owner = $info['Fullname'];
        $current_year = $info['CurrentYear'];
        $total_sales = $info['total_sales'];
    }

    $stmt->close();

    $stmt2 = $mysqli->prepare("SELECT * FROM tbl_order LEFT JOIN tbl_products ON product_Id = prod_id WHERE seller_id = '$sellerId' AND YEAR(NOW()) = YEAR(order_date)");

    $stmt2->execute();

    $productlist = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>  
        * {
        box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
        float: left;
        width: 50%;
        padding: 10px;
        height: 100px; /* Should be removed. Only for demonstration */
        }

        .column-title {
        float: left;
        width: 100%;
        padding: 10px;
        height: 300px; /* Should be removed. Only for demonstration */
        
        }

        .row{
            margin-top: -24px ;
        }

        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;  
        }     

        h4{
            width: 500px;
            display: inline;
            color: #543f1b;
        }

        h3{
            color: #8b7e69;
        }

        p{
            color: #8b7e69;
            font-size: 23px;
        }

        /* TABLE */
        #report table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #report td,  #report th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #report tr:nth-child(even){background-color: #f2f2f2;}

        #report tr:hover {background-color: #ddd;}

        #report th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #5e4c2d;
            color: white;
        }

        h1{
            color: #8b7e69;
            font-size: 23px;
            display: flex;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="column-title" style="background-color: #aba395;margin-top: 17px;height: 40px;width: 500px;border-radius: 0px 30px 30px 0px;}" >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#543f1b" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16" style="margin-right: 4px;">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
            </svg>
            <h4>SALES REPORT UKM OUTLET</h4>
        </div>
    </div>
    <div class="row">
        <div class="column-title" style="text-align: center; height: 219px;">
            <img src="/img/LOGO-MOBILE.png" style="width: 357px;margin-top: -58px ">
        </div>
    </div>
    <div class="row">
        <div class="column">
            <h3>Shop Name:</h3>
            <p><?php echo $shop_name ?></p>
            <!-- <p>Pendeta.official</p> -->
        </div>
        <div class="column" style="text-align: end;">
            <h3>Sales Year:</h3>
            <!-- <p>December 2024</p> -->
            <p><?php echo $current_year ?></p>
        </div>
        <div class="column" style="width: 100%">
            <h3>Shop Owner:</h3>
            <p><?php echo $shop_owner ?></p>
            <!-- <p>En. Amir Kashmiri Azmi</p> -->
        </div>
    </div>
    <hr style="border: solid 1px #8b7e69;">
    <div class="row">
        <div class="column-title" style="margin-top: 3px;text-align: center;height: 50px;color: #8b7e69;" > 
            <?php if($total_sales != NULL) { ?>         
                <h3>Total Sales : RM <?php echo $total_sales ?></h3>
            <?php } else { ?>
                <h3>Total Sales : RM 0.00</h3>
            <?php } ?>
            <!-- <h3>Total Sales : RM 250.00</h3> -->
        </div>
    </div>

    <!-- TABLE -->
    <div>
        <h3>Category Sales</h3>
        <table id="report">
        <tr>
            <th style="width: 400px"></th>
            <th style="width: 56px;text-align: center;">Qty</th>
            <th style="text-align: center;">Amount</th>
        </tr>
        <?php

            if($productlist != NULL) {

            
                foreach($productlist as $product) {
        ?>
                <tr>
                    <td><?php echo $product['product_Name'] ?></td>
                    <td style="text-align: center;"><?php echo $product['prod_qty'] ?></td>
                    <td style="text-align: center;">RM <?php echo ($product['prod_qty']*$product['product_price']) ?></td>
                </tr>
        <?php
                }
            } else { 
        ?>
            <tr style="text-align: center"><td colspan="3">No Order Record</td></tr>
        <?php
            }
            
            $stmt2->close();
        ?>
        <!-- <tr>
            <td>T-Shirt Varsiti UKM 2024</td>
            <td style="text-align: center;">1</td>
            <td style="text-align: center;">RM 40.00</td>
        </tr>
        <tr>
            <td>Jacket Varsiti UKM (Red Ver.)</td>
            <td style="text-align: center;">2</td>
            <td style="text-align: center;">RM 60.00</td>
        </tr> -->
        </table>
    </div>
</body>
</html>

<?php } ?>
