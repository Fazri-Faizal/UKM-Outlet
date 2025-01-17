<?php
include_once 'session.php';
include 'database.php';

// Create a single mysqli object for the database connection.
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare the statement to select customer details.
$stmt1 = $mysqli->prepare("SELECT * FROM tbl_customer WHERE username = ?");
$stmt1->bind_param("s", $sessionname); // Bind $sessionname as a string parameter.
$stmt1->execute();
$result1 = $stmt1->get_result();

// Check if we got a result.
if ($seller = $result1->fetch_assoc()) {
    $sellerId = $seller['id'];
    $shop_name = $seller['shop_name'];
    $shop_bio = $seller['shop_bio'];
    $shop_address = $seller['shop_add'];
} else {
    exit('No seller found');
}

$stmt1->close();

// Prepare the statement to select products.
$stmt2 = $mysqli->prepare("SELECT * FROM tbl_products WHERE seller_ids = ?");
$stmt2->bind_param("i", $sellerId); // Bind $sellerId as an integer parameter.
$stmt2->execute();
$result2 = $stmt2->get_result();

if (!$arr = $result2->fetch_all(MYSQLI_ASSOC)) {
    
}

$stmt2->close();

// Prepare the statement to select product reviews.
$stmt3 = $mysqli->prepare("SELECT * FROM tbl_product_review LEFT JOIN tbl_customer ON tbl_product_review.cust_Id = tbl_customer.Id WHERE id = $sellerId ");
$stmt3->execute();
$result3 = $stmt3->get_result();

if (!$arrview = $result3->fetch_all(MYSQLI_ASSOC)) {
    
}

$stmt3->close();

$stmt4 = $mysqli->prepare("SELECT * FROM tbl_customer WHERE id = $sellerId");
$stmt4->execute();
$result4 = $stmt4->get_result();

if ($pickup = $result4->fetch_assoc()) {
    $pickupVariable = $pickup['pickup'];
    $pickupLocation = $pickup['pickup_location'];
} else {
    exit('No pickup data found');
}

$stmt4->close();

// Close the database connection.
$mysqli->close();
?>
<html>
<head>
    <style>
     /* Webpixels CSS */
    /* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
    /* URL: https://github.com/webpixels/css */

    @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

    /* Bootstrap Icons */
    @import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

    :root {
    --switches-bg-color: goldenrod;
    --switches-label-color: white ;
    --switch-bg-color: white;
    --switch-text-color: goldenrod ;
}

    .profile{
        height: 200px;
        width: 200px;
        border-radius: 50%;
        border: 1px solid #d5cdc0;
        padding: 7px;
        background: #fbfbfa
    }

    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        gap: 58px;
        /* background-color: #2196F3; */
        /* padding: 24px; */
        position: space-between;
        margin-top: 52px;
        /* margin-right: 20px; */
        justify-content: start;
        align-items: stretch;
    }

    .profile-pic{
        /* margin-right: 20px; */
    }

    .container {
        width: 3090px;
        border: 1px solid #ccc;
        padding: 15px;
        background: #ffffff;
        border-radius: 10px;
        /* margin: auto; */
        margin-top: 20px;
    }

    .header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .icon {
        width: 50px;
        margin-right: 10px;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-left: 22px;
    }

    .info .description {
        color: #555;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .info .location {
        color: #777;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .info .details {
        color: #777;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .rating {
        display: flex;
        align-items: center;
    }

    .stars {
        color: #e5a524;
        font-size: 14px;
        margin-right: 5px;
    }

    .reviews {
        color: #333;
        font-size: 14px;
    }

    .button-edit {
        width: 283px;
        height: 34px;
        font-family: 'Roboto', sans-serif;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        margin-left: 69%;
    }
  
    .button-edit:hover {
        background-color: #a5998c;
        box-shadow: 0px 15px 20px rgba(155, 150, 106, 0.4);
        transform: translateY(-7px);
    }

    .card-product {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 314px;
        margin-left: 71px;
        text-align: center;
        font-family: arial;
        border-radius: 13px;
        margin-top: 20px;
        gap: 10px;
    }

    .card-product:hover {
        box-shadow: 10px 10px 10px 2px #ab8262;
        cursor: pointer;
    }
    
    .price {
        color: grey;
        font-size: 16px;
        text-align: center;
        padding-left: 10px;
    }
  
    .card-product button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }
  
    .card-product button:hover {
        opacity: 0.7;
    }

    .product-list {
        align-items: center;
        justify-content: center;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 10%;
    }

    /* .h3 {
        text-align: left;
        padding-left: 10px;
    } */

    .reviews-container {
        max-width: 1500px;
        margin-left: 27px;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .review-item {
        border-bottom: 1px solid #eee;
        padding: 20px 0;
    }

    .review-header {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }

    .reviewer-name {
        font-weight: bold;
        margin-right: 10px;
    }

    .verified-buyer {
        background-color: #ddd;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 12px;
    }

    .review-rating {
        color: #e5a524; /* Or use a web font for stars */
        margin-bottom: 5px;
    }

    .review-title {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .review-text {
        color: #555;
    }

    .read-more {
        color: #0066cc;
        text-decoration: none;
        font-size: 14px;
    }

/* container for all of the switch elements 
    - adjust "width" to fit the content accordingly 
*/

.form-container {
  background-color: #fff;
  max-width: 90%;
  margin: 40px auto;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.form-container label {
  display: block;
  margin-bottom: 10px;
  color: #333;
  font-size: 14px;
}

.form-container input[type="checkbox"] {
  margin-right: 10px;
}

.form-container select {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: white;
  color: #333;
  font-size: 14px;
  transition: all 0.3s ease;
}

.form-container select:disabled {
  background-color: #e9ecef;
  color: #6c757d;
}

.form-container select:not(:disabled) {
  cursor: pointer;
}

.form-container select:not(:disabled):hover {
  border-color: #aaa;
}

.form-container input[type="checkbox"]:hover + label {
  color: #000;
}

/* Style the dropdown arrow */
.form-container select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background-image: url('data:image/svg+xml;charset=US-ASCII,<svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg"><path d="M6 9l-4-5h8z" fill="%23333"/></svg>');
  background-repeat: no-repeat;
  background-position: right 10px top 50%;
  background-size: 12px 12px;
}

    </style>
    <title>UKM Outlet Seller Profile</title>
</head>
<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="seller_dashboard">
                    <img src="img/UKM OMELET LOGO 4.png"  height="73" alt="...">
                </a>
                <!-- User menu (mobile) -->
                <div class="navbar-user d-lg-none"></div>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <?php 
                        include('seller_sidebar.php');
                        include ('database.php');
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT * from tbl_order WHERE seller_id = $sellerId");

                        $stmt->execute();
                        $result = $stmt->fetchAll();
                    ?>
                </div>
            </div>
        </nav>

        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Seller Profile</h1>
                            </div>
                            <!-- Nav -->
                            <ul class="nav nav-tabs mt-4 overflow-x border-0"></ul>
                        </div>       
                    </div> 
                </div>               
            </header>

            <!-- main -->
            <div class="container-fluid">
                <div class="container">
                    <div class="header">
                        <img src="/img/fazri.png" class="profile" alt="profile picture">
                        <div class="title"><?php echo $shop_name ?></div>
                    </div>
                    <div class="info">
                        <p class="description"><?php echo $shop_bio ?></p>
                        <p class="location">📍 <?php echo $shop_address ?></p>
                    </div>
                    <div class="rating">
                        <!-- <span class="stars">★★★★☆</span>
                        <span class="reviews">(4)</span> -->
                        <!-- <button class="button-edit" id="buttonEdit" onclick="editProfile()">Change Profile Information
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>  -->
                    </div>    
                </div>

                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item" id="products">
                        <a href="#" class="nav-link" id="activeProduct" onclick="displayProduct()">All Product</a>
                    </li>
                    <li class="nav-item" id="orders">
                        <a href="#" class="nav-link" id="activeOrder" onclick="displayOrders()">All Orders</a>
                    </li>
                    <li class="nav-item" id="reviews">
                        <a href="#" class="nav-link" id="activeReview" onclick="displayReviews()">All Reviews</a>
                    </li>
                    <li class="nav-item" id="delivery">
                        <a href="#" class="nav-link" id="activeDelivery" onclick="displayDelivery()">Delivery Options</a>
                    </li>
                    
                </ul> 
                
                
                <!-- All Products -->
                <div class="table-responsive" style="margin-top: 20px;" id="display-products">
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col" style="text-align: center">Price</th>
                                <th scope="col" style="text-align: center">Product Type</th>
                                <th scope="col" style="text-align: center">Product Origin</th>
                                <th scope="col" style="text-align: center">Product Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($arr as $productlist) {
                            ?>
                            <tr>
                                <td>
                                    <img alt="..." src="img/<?php echo $productlist['pic'] ?>" style="width: 80" alt="No picture">
                                    &nbsp;&nbsp;
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $productlist['product_Name'] ?>
                                    </a>
                                </td>
                                <td style="text-align: center">RM 
                                <?php echo $productlist['product_price'] ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $productlist['product_Type'] ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $productlist['origin_id'] ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $productlist['product_Description'] ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- All Orders -->
                <div class="table-responsive" id="display-orders" style="display: none; margin-top: 20px;" >
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                if(isset($_GET['searchorder']))
                                    {

                                        $Id = $_GET['inputId'];
                                        if($Id==""){
                                            $stmt4 = $conn->prepare("SELECT * from tbl_order WHERE seller_id = $sellerId");

                                        }
                                        else{
                                       
                                        $stmt4 = $conn->prepare("SELECT * from tbl_order WHERE order_Id = '$Id'");
                                        }
                                        $stmt4->execute();
                                        $result4 = $stmt4->fetchAll();
                                        foreach ($result4 as $row) {

                                            $orderId = $row['order_id'];
                                            $sellerId = $row['seller_id'];
                                            $orderdate = $row['order_date'];
                                            $totalprice = $row['total_price'];
                                            $orderstatus = $row['prod_status'];
                                            $quantity= $row['prod_qty'];
                                            $customerId= $row['cust_id'];  
                                            $productId= $row['prod_id']; 
                                            
                                            $stmt2 = $conn->prepare("SELECT * from tbl_customer WHERE id = '$customerId' ");
    
                                            $stmt2->execute();
                                            $result2 = $stmt2->fetchAll();
    
                                            foreach ($result2 as $row2)
                                            {
                                                $fullname = $row2['Fullname'];
                                                $shopname = $row2['shop_name'];
                                            }
    
                                            $stmt3 = $conn->prepare("SELECT * from tbl_products WHERE product_id = '$productId' ");
    
                                            $stmt3->execute();
                                            $result3 = $stmt3->fetchAll();
    
                                            foreach ($result3 as $row3)
                                            {
                                                $productname = $row3['product_Name'];
                                                $picture = $row3['pic'];
                                            }
                                                                               
                                ?>
                                        <tr>
                                            <td >
                                                <?php echo $fullname ?>
                                            </td>                                   
                                            <td >
                                                <?php echo $orderdate ?>
                                            </td>
                                            <td >
                                                <img alt="..." src="img/<?php echo $picture ?>" style="width: 80" alt="No picture">
                                                 &nbsp;&nbsp;
                                                <?php echo $productname ?> 
                                            </td>
                                            <td >
                                                <?php echo $quantity ?>
                                            </td>
                                            <td >
                                                <?php echo $totalprice ?>                                                    
                                            </td>
                                            <td >
                                                <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    <?php echo $orderstatus ?>   
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } } 
                                        
                                    
                                    else
                                    {
                                        foreach ($result as $row) {

                                            $orderId = $row['order_id'];
                                            $sellerId = $row['seller_id'];
                                            $orderdate = $row['order_date'];
                                            $totalprice = $row['total_price'];
                                            $orderstatus = $row['prod_status'];
                                            $quantity= $row['prod_qty'];
                                            $customerId= $row['cust_id'];  
                                            $productId= $row['prod_id']; 
                                            
                                            $stmt2 = $conn->prepare("SELECT * from tbl_customer WHERE id = '$customerId' ");
    
                                            $stmt2->execute();
                                            $result2 = $stmt2->fetchAll();
    
                                            foreach ($result2 as $row2)
                                            {
                                                $fullname = $row2['Fullname'];
                                            }
    
                                            $stmt3 = $conn->prepare("SELECT * from tbl_products WHERE product_id = '$productId' ");
    
                                            $stmt3->execute();
                                            $result3 = $stmt3->fetchAll();
    
                                            foreach ($result3 as $row3)
                                            {
                                                $productname = $row3['product_Name'];
                                                $picture = $row3['pic'];
                                            }
                                                                               
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $fullname ?>
                                            </td>                                   
                                            <td>
                                                <?php echo $orderdate ?>
                                            </td>
                                            <td>
                                                <img alt="..." src="img/<?php echo $picture ?>" style="width: 80" alt="No picture">
                                                 &nbsp;&nbsp;
                                                <?php echo $productname ?> 
                                            </td>
                                            <td>
                                                <?php echo $quantity ?>
                                            </td>
                                            <td>
                                                <?php echo $totalprice ?>                                                    
                                            </td>
                                            <td>
                                                <span class="badge badge-lg badge-dot">
                                                <?php 
                                                
                                                if ($orderstatus == "Processed"){

                                                    echo '<i class="bg-success"></i>Processed';
                                                }
                                                else if ($orderstatus == "To Process"){

                                                    echo '<i class="bg-warning"></i>To Process';
                                                }
                                                else {
                                                    echo '<i class="bg-dark"></i>Cancelled';
                                                }

                                            ?>  
                                                </span>
                                            </td>
                                        </tr>
                                    <?php } } ?>                                  
                            </tbody>
                        </table>
                    </div>
                </div>   

                <!-- All Reviews -->
                <div class="reviews-container" id="display-reviews" style="display: none; margin-top: 20px;" >
                    <?php
                        foreach($arrview as $reviewlist) {
                    ?>

                    <!-- Review Item -->
                    <div class="review-item">
                        <div class="review-header">
                            <span class="reviewer-name"><?php echo $reviewlist['Fullname'] ?></span>
                            <span class="verified-buyer">Verified Buyer</span>
                        </div>
                        <div class="review-rating">★★★☆☆</div>
                        <div class="review-title"><?php echo $reviewlist['subject'] ?></div>
                        <div class="review-text"><?php echo $reviewlist['review'] ?></div>
                    </div>
                    <?php
                        }
                    ?>
                </div> 
                <!-- Delivery Options -->
                <div class="table-responsive" style="margin-top: 20px;" id="display-delivery">
                    <div class="form-container">
                        <form action="/update_delivery" method=get>
                            <label for="enableDropdown">
                            <?php
                            // Assuming you've already fetched the 'pickup' value into $pickupVariable
                            // For example, $pickupVariable might have been set like this:
                            // $pickupVariable = $seller['pickup']; (after fetching the $seller from the database)

                            // Check if the pickup value is 1 and set the checkbox checked attribute accordingly
                            $isChecked = $pickupVariable == '1' ? 'checked' : '';
                            ?>
                            <input type="hidden" id="seller_id" value="<?php echo $sellerId ?>" name="seller_id" >
                            <input type="checkbox"  id="enableDropdown" name="enableDropdown" onchange="toggleDropdown()" <?php echo $isChecked; ?>>Choose Pickup Location
                            </label>
                            <select id="myDropdown" name="myDropdown" <?php echo $isChecked ? '' : 'disabled'; ?>>
                            <option value="<?php echo $pickupLocation?>" selected ><?php echo $pickupLocation?></option>
                            <option value="NP">No Pickup</option>
                            <option value="KAB">Kolej Aminuddin Baki</option>
                            <option value="KBH">Kolej Burhanuddin Helmi</option>
                            <option value="KDO">Kolej Dato' Onn</option>
                            <option value="KIY">Kolej Ibrahim Yaakub</option>
                            <option value="KIZ">Koleb Ibu Zain</option>
                            <option value="KKM">Kolej Keris Mas</option>
                            <option value="KPZ">Kolej Pendeta Za'aba</option>
                            <option value="KRK">Kolej Rahim Kajai</option>
                            <option value="KTDI">Kolej Tun Dr Ismail</option>
                            <option value="KTHO">Kolej Tun Hussein Onn</option>
                            <option value="KTSN">Kolej Tun Syed Nasir</option>
                            <option value="KUO">Kolej Ungku Omar</option>
                            <option value="FSSK">Fakulti Sains Sosial dan Kemanusiaan</option>
                            <option value="FUU">Fakulti Undang-Undang</option>
                            <option value="FPERG">Fakulti Pergigian</option>
                            <option value="FKAB">Fakulti Kejuruteraan dan Alam Bina</option>
                            <option value="FST">Fakulti Sains dan Teknologi</option>
                            <option value="FPEND">Fakulti Pendidikan</option>
                            <option value="FEP">Fakulti Ekonomi dan Pengurusan</option>
                            <option value="FPER">Fakulti Perubatan</option>
                            <option value="FARMASI">Fakulti Farmasi</option>
                            <option value="FTSM">Fakulti Teknologi dan Sains Maklumat</option>
                            <option value="FPI">Program yang ditawarkan</option>
                            <option value="FSK">Fakulti Sains Kesihatan</option>
                            <option value="GSB">Pusat Pengajian Siswazah Perniagaan, UKM-GSB</option>
                            <option value="CITRA">Pusat Pengajian Citra Universiti</option>
                            </select>
                            <button type="submit" name="editPickupLocation" >Save</button>
                        </form>
                    </div>
                </div>
        
    </div>
    </body>
    
    <script>
        function displayProduct() {
            if(document.getElementById("products").classList.contains("productactive")) {

                document.getElementById("display-orders").style.display = "none";
                document.getElementById("display-reviews").style.display = "none";
                document.getElementById("display-delivery").style.display = "none";

                document.getElementById("display-products").style.display = "";
                
            } else {
                document.getElementById("products").classList.add('productactive');
                displayProduct();
            }

            document.getElementById("activeProduct").classList.add('active');
            document.getElementById("activeOrder").classList.remove('active');
            document.getElementById("activeReview").classList.remove('active');
            document.getElementById("activeDelivery").classList.remove('active');
        }

        function displayOrders() {
            if(document.getElementById("orders").classList.contains("orderactive")) {

                document.getElementById("display-products").style.display = "none";
                document.getElementById("display-reviews").style.display = "none";
                document.getElementById("display-delivery").style.display = "none";

                document.getElementById("display-orders").style.display = "";
                
            } else {
                document.getElementById("orders").classList.add('orderactive');
                displayOrders();
            }

            document.getElementById("activeProduct").classList.remove('active');
            document.getElementById("activeOrder").classList.add('active');
            document.getElementById("activeReview").classList.remove('active');
            document.getElementById("activeDelivery").classList.remove('active');
        }

        function displayReviews() {
            if(document.getElementById("reviews").classList.contains("reviewsactive")) {

                document.getElementById("display-products").style.display = "none";
                document.getElementById("display-orders").style.display = "none";
                document.getElementById("display-delivery").style.display = "none";

                document.getElementById("display-reviews").style.display = "";
                
            } else {
                document.getElementById("reviews").classList.add('reviewsactive');
                displayReviews();
            }

            document.getElementById("activeProduct").classList.remove('active');
            document.getElementById("activeOrder").classList.remove('active');
            document.getElementById("activeReview").classList.add('active');
            document.getElementById("activeDelivery").classList.remove('active');
        }
        function displayDelivery() {
            if(document.getElementById("delivery").classList.contains("deliveryactive")) {

                document.getElementById("display-products").style.display = "none";
                document.getElementById("display-orders").style.display = "none";
                document.getElementById("display-reviews").style.display = "none";

                document.getElementById("display-delivery").style.display = "";
            } else {
                document.getElementById("delivery").classList.add('deliveryactive');
                displayReviews();
            }

            document.getElementById("activeProduct").classList.remove('active');
            document.getElementById("activeOrder").classList.remove('active');
            document.getElementById("activeReview").classList.remove('active');
            document.getElementById("activeDelivery").classList.add('active');
        }
        function toggleDropdown() {
        var checkbox = document.getElementById('enableDropdown');
        var dropdown = document.getElementById('myDropdown');

        dropdown.disabled = !checkbox.checked;

        // Optional: Send the new state to the server to update the database
        // updateDatabase(checkbox.checked); // You would define this function to make an AJAX call
        }
    </script>
</html>
