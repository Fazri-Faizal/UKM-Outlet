<?php 
    include_once'session.php';
    include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);
    $stmt1 = $mysqli1->prepare("SELECT id FROM tbl_customer WHERE username = '$sessionname'");
    $stmt1->execute();

    $handler = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach($handler as $cust) {
      $custId = $cust['id'];
    }

    $stmt1->close();
?>

<!-- Statement to count order placed -->
<?php 
    include_once'session.php';
    include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);

    $stmt2 = $mysqli1->prepare("SELECT COUNT(order_id) AS order_placed FROM tbl_order WHERE prod_status = 'Processed' AND cust_id = $custId;");
    $stmt2->execute();   
    $result = $stmt2->get_result();
    $row = $result->fetch_assoc();

    $stmt2->close();

    $order_placed = $row['order_placed'];

?>

<!-- Statement to get order info -->
<?php
    $mysqli1 = new mysqli($servername, $username, $password,$dbname);

    $stmt3 = $mysqli1->prepare("SELECT * FROM tbl_order LEFT JOIN tbl_products ON tbl_order.prod_id = tbl_products.product_Id WHERE tbl_order.cust_id = $custId;");
    $stmt3->execute();
    
    $handler2 = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach($handler2 as $orderdetail) {
      $orderId = $orderdetail['order_id'];
      $prod_name = $orderdetail['product_Name'];
      $order_status = $orderdetail['prod_status'];
      $order_date = $orderdetail['order_date'];
    }
    
    $stmt3->close();
?>

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
        <link rel="stylesheet" href="css/user-profile.css">
        <title>User Profile</title>
    </head>

    <?php 
        include('header.php');
    ?>
   
<body style="background: #f2f2f2;">
<div class="container mt-4 mb-4">
        <div class="row">
            <!-- Navbar -->
            <div class="col-lg-3 my-lg-0 my-md-1">
                <div id="sidebar" class="bg-purple">
                    <div class="h4 text-white">Account</div>
                    <ul>
                        <li id="navprofile" class="active">
                            <a class="text-decoration-none d-flex align-items-start" onclick="navprofile()">
                                <div class="far fa-user pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Profile</div>
                                    <div class="link-desc">Change your profile details & password</div>
                                </div>
                            </a>
                        </li>
                        <li id="navaddress">
                            <a class="text-decoration-none d-flex align-items-start" onclick="navaddress()">
                                <div class="far fa-address-book pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Address Book</div>
                                    <div class="link-desc">View & Manage Addresses</div>
                                </div>
                            </a>
                        </li>
                        <li id="navorder">
                            <a class="text-decoration-none d-flex align-items-start" onclick="navorder()">
                                <div class="fas fa-box-open pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Orders</div>
                                    <div class="link-desc">View & Manage orders and returns</div>
                                </div>
                            </a>
                        </li>
                        <li id="navsellcenter">
                            <a class="text-decoration-none d-flex align-items-start" onclick="navsellcenter()">
                                <div class="fas fa-shopping-bag pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Seller Center</div>
                                    <div class="link-desc">View & Manage Seller Account</div>
                                </div>
                            </a>
                        </li>
                        <li id="navlogout">
                            <a class="text-decoration-none d-flex align-items-start" onclick="navlogout()">
                                <div class="fas fa-arrow-right pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Log Out</div>
                                    <div class="link-desc">Exit Your Account</div>
                                </div>
                            </a>
                        </li>
                        <!-- Not needed -->
                        <!-- <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-headset pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Help & Support</div>
                                    <div class="link-desc">Contact Us for help and support</div>
                                </div>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>

            <!-- My Profile -->
            
                <div class="col-lg-9 my-lg-0 my-1" id="id-profile" style="display: ">
                    <div id="main-content" class="bg-white border">
                        <div class="d-flex flex-column">
                            <div class="h5">Hello <?= ($_SESSION['sessionname'])?>,</div>
                            <div>Logged in as : <?= ($_SESSION['role'])?></div>
                            <button class="button-edit" id="buttonEdit" onclick="editProfile()">Change Profile Information
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>
                        </div>

                        <form action="/crud_update_profile" method="get">
                            <div>
                                <img src="/img/user.jpg" class="profile" alt="profile picture">
                            </div>
                            <div class="bg-white border" style="border-radius: 20px;margin-top: 20px;">
                                <input type="hidden" name="custId" value="<?php echo $custId; ?>">

                                <div class="info-group">
                                    <label>Name</label>
                                    <p id="displayname"><?= ($_SESSION['fullname'])?></p>
                                    <!-- edit profile mode -->  
                                    <p id="editname" style="display:none"><input type="text" name="fullname" value='<?= ($_SESSION['fullname'])?>'></p>    
                                </div>

                                <div class="info-group">
                                    <label>Username</label>
                                    <p id="displayusername"><?= ($_SESSION['sessionname'])?></p>
                                    <!-- edit profile mode -->  
                                    <p id="editusername" style="display:none"><input type="text" name="username" value='<?= ($_SESSION['sessionname'])?>'></p>    
                                </div>

                                <div class="info-group">
                                    <label>Password</label>

                                    <br>

                                    <span id="spanpassword" style="display: inline-flex">
                                        <p style="width: fit-content" id="displaypassword">********</p>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16" style="cursor: pointer; margin-left: 10px; margin-top: 2px;" onclick="showPassword()" id="iconclosed">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16" style="display: none; cursor: pointer; margin-left: 10px; margin-top: 6px;" onclick="hidePassword()" id="iconopen">
                                            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                        </svg>
                                    </span>
                                    
                                    <!-- edit profile mode -->
                                    <p id="editpassword" style="display:none"><input name="userpassword" value='<?= ($_SESSION['passwords'])?>' type="text"></p>

                                </div>

                                <div class="info-group">
                                    <label>Phone Number</label>
                                    <p id="displayphone"><?= ($_SESSION['phone_number'])?></p>
                                    <!-- edit profile mode -->
                                    <p id="editphone" style="display:none"><input name="phone" value='<?= ($_SESSION['phone_number'])?>' type="text"></p>
                                </div>

                                <div class="info-group">
                                    <label>Email</label>
                                    <p id="displayemail"><?= ($_SESSION['user_email'])?></p>
                                    <!-- edit profile mode -->
                                    <p id="editemail" style="display:none"><input name="email" value='<?= ($_SESSION['user_email'])?>' type="text"></p>
                                </div>

                                <div id="button-save" style="display:none">
                                    <?php 
                                        include('button_save.php');
                                    ?>
                                </div>   
                            </div>
                        </form>
                    </div>
                </div>
            

            <!-- My address -->
            <div class="col-lg-9 my-lg-0 my-1" id="id-address" style="display: none">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <div class="h5">Hello Abu Ahmad,</div>
                        <div>Logged in as: abu&ahmad@gmail.com</div>         
                    </div>
                    <div class="address-section">
                        <h2 class="customh2">Saved Addresses</h2>

                        <div class="address-card">
                            <div id="displayAddress">
                                <p>No 34 Jalan Laman Delfina 1/4, Laman Delfina,</p>
                                <p>Nilai Impian,</p>
                                <p>Nilai, 05, 71800</p>
                                <input type="radio" name="default-address" id="address1" checked>
                                <label for="address1">Default Delivery Address</label>
                            </div>
                            <!-- Edit Address -->
                            <div id="editAddress" style="display:none; text-align: center;">
                                <input type="radio" name="default-address" id="address1"checked>
                                <label for="address1">Default Delivery Address</label>
                                <textarea id="address" cols="90" rows="5" placeholder='No 34 Jalan Laman Delfina 1/4, Laman Delfina,71800 Nilai Impian'></textarea><br>
                                <div id="button-save-add">
                                    <?php 
                                        include('button_save_address.php');
                                    ?>
                                </div>
                            </div>

                            <p id="btnEditAdd" onclick="editAddress()">
                                <?php 
                                    include('button_edit.php');
                                ?>
                            </p>
                            <p id="btndeleteAdd">
                                <?php 
                                    include('button-delete-2.php');
                                ?>
                            </p>  
                        </div>

                        <button class="add-new" id="buttonnewaddress">+ Add New Address</button>
                        <div class="info-group"  style="display:none">
                            <label>Address</label>
                            <!-- <p><input placeholder='No 34 Jalan Laman Delfina 1/4, Laman Delfina,71800 Nilai Impian' style="width:100%" type="text" id=address></p> -->
                            <p id="newaddress"><textarea id=address cols="90" rows="5" placeholder='No 34 Jalan Laman Delfina 1/4, Laman Delfina,71800 Nilai Impian'></textarea></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Orders -->
            <div class="col-lg-9 my-lg-0 my-1" id="id-order" style="display: none">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <div class="h5">Hello Abu Ahmad,</div>
                        <div>Logged in as: abu&ahmad@gmail.com</div>
                    </div>
                    <div class="d-flex my-4 flex-wrap">
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Orders placed</div>
                                <div class="ms-auto number"><?php echo ($order_placed); ?></div>
                            </div>
                        </div>
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Items in Cart</div>
                                <div class="ms-auto number"><?php echo $cartNum ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="text-uppercase">My recent orders</div>

                    <div class="order my-3 bg-light" id="info-order">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                        <div class="text-uppercase">Order #OU001</div>
                                    </div>

                                    <?php
                                        foreach($handler2 as $displayorder) {    
                                    ?>
                                    <div class="fs-8"><?php echo $displayorder['product_Name']?></div>
                                    <?php
                                        }
                                    ?>

                                    <div class="fs-8"><?php echo date('d M Y | h:i A', strtotime($displayorder['order_date'])); ?></div>
                                    

                                    <!-- <div class="rating d-flex align-items-center pt-1">
                                        <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png"
                                            alt=""><span class="px-2">Rating:</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                    <div class="status">Status : Delivered</div>
                                    <div class="blue-label ms-auto text-uppercase" style="margin-right: 186px;margin-top: 2px;"><?php echo $order_status ?></div>
                                    <div class="btn btn-primary text-uppercase" id="btnOrderinfo" onclick="displayInfoOrder()">order info</div>
                                </div>
                                <div class="progressbar-track">
                                    <ul class="progressbar">
                                        <li id="step-1" class="text-muted green">
                                            <span class="fas fa-gift"></span>
                                        </li>
                                        <li id="step-2" class="text-muted green">
                                            <span class="fas fa-check"></span>
                                        </li>
                                        <li id="step-3" class="text-muted green">
                                            <span class="fas fa-box"></span>
                                        </li>
                                        <li id="step-4" class="text-muted green">
                                            <span class="fas fa-truck"></span>
                                        </li>
                                        <li id="step-5" class="text-muted green">
                                            <span class="fas fa-box-open"></span>
                                        </li>
                                    </ul>
                                    <div id="tracker"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order my-3 bg-light" style="display:none;" id="info-order-detail">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                        <div class="text-uppercase">Order #OU001</div>
                                    </div>
                                    <div class="fs-8" style="margin-top: 2px;">Item : </div>
                                    <?php
                                        foreach($handler2 as $displayorder) {    
                                    ?>
                                    <div class="fs-8"><?php echo $displayorder['product_Name']." x ".$displayorder['prod_qty']." (RM".$displayorder['total_price'].")"?></div>
                                    <?php
                                        }
                                    ?>
                                    <hr><div class="fs-8">Total Price: RM 120.90</div>
                                    <!-- <div class="status">Status : Delivered</div> -->
                                    
                                    
                                </div>
                            </div>
                                                     
                            <div class="col-lg-4" style="visibility:hidden">
                                <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                    <div class="status">Status : Delivered</div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="d-sm- align-items-sm-start justify-content-sm-between">
                                    <div class="fs-8" style="margin-top: 2px;">Order Date : 2<?php echo date('d M Y | h:i A', strtotime($displayorder['order_date'])); ?></div>
                                    <div class="status">Status : Delivered</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

    <?php include 'footer.php' ?>
  </body>

  <script>
    function navprofile() {
        if(document.getElementById("navprofile").classList.contains("active")) {
            document.getElementById("navaddress").classList.remove('active');
            document.getElementById("navorder").classList.remove('active');
            document.getElementById("navsellcenter").classList.remove('active');
            
            document.getElementById("id-profile").style.display = "";
            document.getElementById("id-address").style.display = "none";
            document.getElementById("id-order").style.display = "none";
        } else {
            document.getElementById("navprofile").classList.add('active');
            document.getElementById("navaddress").classList.remove('active');
            document.getElementById("navorder").classList.remove('active');
            document.getElementById("navsellcenter").classList.remove('active');

            document.getElementById("id-profile").style.display = "";
            document.getElementById("id-address").style.display = "none";
            document.getElementById("id-order").style.display = "none";
        }
    }

    function navaddress() {
        if(document.getElementById("navaddress").classList.contains("active")) {
            document.getElementById("navprofile").classList.remove('active');
            document.getElementById("navorder").classList.remove('active');
            document.getElementById("navsellcenter").classList.remove('active');

            document.getElementById("id-address").style.display = "";
            document.getElementById("id-profile").style.display = "none";
            document.getElementById("id-order").style.display = "none";
        } else {
            document.getElementById("navaddress").classList.add('active');
            document.getElementById("navprofile").classList.remove('active');
            document.getElementById("navorder").classList.remove('active');
            document.getElementById("navsellcenter").classList.remove('active');

            document.getElementById("id-address").style.display = "";
            document.getElementById("id-profile").style.display = "none";
            document.getElementById("id-order").style.display = "none";
        }
    }

    function navorder() {
        if(document.getElementById("navorder").classList.contains("active")) {
            document.getElementById("navprofile").classList.remove('active');
            document.getElementById("navaddress").classList.remove('active');
            document.getElementById("navsellcenter").classList.remove('active');

            document.getElementById("id-order").style.display = "";
            document.getElementById("id-profile").style.display = "none";
            document.getElementById("id-address").style.display = "none";
        } else {
            document.getElementById("navorder").classList.add('active');
            document.getElementById("navprofile").classList.remove('active');
            document.getElementById("navaddress").classList.remove('active');
            document.getElementById("navsellcenter").classList.remove('active');

            document.getElementById("id-order").style.display = "";
            document.getElementById("id-profile").style.display = "none";
            document.getElementById("id-address").style.display = "none";
        }
    }

    function navsellcenter() {
        if(document.getElementById("navsellcenter").classList.contains("active")) {
            document.getElementById("navprofile").classList.remove('active');
            document.getElementById("navaddress").classList.remove('active');
            document.getElementById("navorder").classList.remove('active');
            
            document.getElementById("id-profile").style.display = "none";
            document.getElementById("id-address").style.display = "none";
            document.getElementById("id-order").style.display = "none";

            window.location.href="/seller_registration";
        } else {
            document.getElementById("navsellcenter").classList.add('active');
            document.getElementById("navprofile").classList.remove('active');
            document.getElementById("navaddress").classList.remove('active');
            document.getElementById("navorder").classList.remove('active');
            document.getElementById("navsellcenter").classList.remove('active');

            document.getElementById("id-profile").style.display = "none";
            document.getElementById("id-address").style.display = "none";
            document.getElementById("id-order").style.display = "none";

            let role = "<?php echo $_SESSION['role']; ?>";
                if (role === 'Seller') {
                    window.location.href = "/seller_dashboard"; // Replace with your seller page URL
                } else if (role === 'Customer') {
                    window.location.href = "/seller_registration"; // Replace with your customer page URL
                }
        }
    }

    function navlogout() {
        if(document.getElementById("navsellcenter").classList.contains("active")) {
            document.getElementById("navprofile").classList.remove('active');
            document.getElementById("navaddress").classList.remove('active');
            document.getElementById("navorder").classList.remove('active');
            
            document.getElementById("id-profile").style.display = "none";
            document.getElementById("id-address").style.display = "none";
            document.getElementById("id-order").style.display = "none";
            window.location.href="/destroy";
        } else {
            document.getElementById("navsellcenter").classList.add('active');
            document.getElementById("navprofile").classList.remove('active');
            document.getElementById("navaddress").classList.remove('active');
            document.getElementById("navorder").classList.remove('active');
            document.getElementById("navsellcenter").classList.remove('active');
            document.getElementById("id-profile").style.display = "none";
            document.getElementById("id-address").style.display = "none";
            document.getElementById("id-order").style.display = "none";
            window.location.href="/destroy";
        }
    }

    function editProfile() {
        if(document.getElementById("buttonEdit").classList.contains("editactive")) {

            document.getElementById("displayname").style.display = "none";
            document.getElementById("displayusername").style.display = "none";
            document.getElementById("displaypassword").style.display = "none";
            document.getElementById("displayphone").style.display = "none";
            document.getElementById("displayemail").style.display = "none";
            
            document.getElementById("spanpassword").style.display = "none";

            document.getElementById("editname").style.display = "";
            document.getElementById("editusername").style.display = "";
            document.getElementById("editpassword").style.display = "";
            document.getElementById("editphone").style.display = "";
            document.getElementById("editemail").style.display = "";
            document.getElementById("button-save").style.display = "";
            
            document.getElementById("buttonEdit").style.visibility = "hidden";
        } else {
            document.getElementById("buttonEdit").classList.add('editactive');
            editProfile();
        }
    }

    function showPassword() {
        document.getElementById("displaypassword").innerHTML = '<?= ($_SESSION['passwords'])?>';
        
        document.getElementById("iconclosed").style.display = "none";
        document.getElementById("iconopen").style.display = "";
    }

    function hidePassword() {
        document.getElementById("displaypassword").innerHTML = "********";;

        document.getElementById("iconopen").style.display = "none";
        document.getElementById("iconclosed").style.display = "";
    }

    function editAddress() {
        if(document.getElementById("btnEditAdd").classList.contains("editAddactive")) {

            document.getElementById("displayAddress").style.display = "none";
            document.getElementById("btnEditAdd").style.display = "none";
            document.getElementById("btndeleteAdd").style.display = "none";

            document.getElementById("editAddress").style.display = "";
        } else {
            document.getElementById("btnEditAdd").classList.add('editAddactive');
            editAddress();
        }
    }

    function displayInfoOrder() {
        if(document.getElementById("btnOrderinfo").classList.contains("infoactive")) {

            document.getElementById("info-order").style.display = "none";

            document.getElementById("info-order-detail").style.display = "";
        } else {
            document.getElementById("btnOrderinfo").classList.add('infoactive');
            displayInfoOrder();
        }
    }
    </script>
</html>