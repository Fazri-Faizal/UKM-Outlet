<head>
    <style>
        /* Webpixels CSS */
/* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
/* URL: https://github.com/webpixels/css */

@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

    </style>
    <title>UKM Outlet Seller Dashboard</title>
</head>

<!-- Banner -->


<!-- Dashboard -->
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
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <?php
                include ('seller_sidebar.php');
                include ('database.php');

                    $mysqli = new mysqli($servername, $username, $password,$dbname);


                    $stmt = $mysqli->prepare("SELECT * FROM tbl_order LEFT JOIN tbl_customer ON tbl_order.cust_id = tbl_customer.id LEFT JOIN tbl_products on tbl_order.prod_id = tbl_products.product_id WHERE seller_id = $sellerId ");
                    $stmt->execute();
                    

                    $arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


                    if(!$arr) exit('no rows');

                    // Prepare the SQL query to calculate the sum of total_price
                    $result = $mysqli->query("SELECT SUM(total_price) AS total_sum FROM tbl_order WHERE seller_id = $sellerId ");
                                        
                    // Fetch the result
                    $row = $result->fetch_assoc();

                     // Prepare the SQL query to calculate the sum of order
                     $tot_order = $mysqli->query("SELECT COUNT(prod_status) AS total_order FROM tbl_order WHERE seller_id = $sellerId ");
                                        
                     // Fetch the result
                     $tot_Order = $tot_order->fetch_assoc();

                      // Prepare the SQL query to calculate the sum of order
                      $act_order = $mysqli->query("SELECT COUNT(prod_status) AS act_order FROM tbl_order WHERE prod_status = 'To Process' AND seller_id = $sellerId");
                                        
                      // Fetch the result
                      $act_Order = $act_order->fetch_assoc();

                      $proc_order = $mysqli->query("SELECT COUNT(prod_status) AS act_order FROM tbl_order WHERE prod_status = 'Processed' AND seller_id = $sellerId");
                                        
                      // Fetch the result
                      $proc_Order = $proc_order->fetch_assoc();
                    

                    $stmt->close();

                    
                ?>

                <ul class="navbar-nav mb-md-4">
                </ul>
                <!-- Push content down -->
                
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
                            <h1 class="h2 mb-0 ls-tight">Seller Dashboard</h1> Welcome Back, <?= ($_SESSION['sessionname'])?>
                        
                        </div>
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Sales</span>
                                        <span class="h3 font-bold mb-0"><?php echo "RM " . $row['total_sum']; ?>

                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>13%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Processed Order(s)</span>
                                        <span class="h3 font-bold mb-0"><?php echo $proc_Order['act_order']; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>30%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Order(s)</span>
                                        <span class="h3 font-bold mb-0"><?php echo $tot_Order['total_order']; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                        <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Active Product(s)</span>
                                        <span class="h3 font-bold mb-0"><?php echo $act_Order['act_order']; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                            <i class="bi bi-minecart-loaded"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>10%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Recent Order(s)</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                        foreach($arr as $ukmseller) {
                                    ?>
                                <tr>
                                    <td>
                                        <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                        <?php echo $ukmseller['username']; ?>
                                        </a>
                                    </td>
                                    <td>
                                    <?php echo $ukmseller['order_date'] ?>
                                    </td>
                                    <td>
                                        <img alt="..." src="img/<?php echo $ukmseller['pic']; ?>" width="80">
                                        <a class="text-heading font-semibold" href="#">
                                        <?php echo $ukmseller['product_Name']; ?>
                                        </a>
                                    </td>
                                    <td>
                                    <?php echo $ukmseller['prod_qty']; ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                        
                                            <?php 
                                                
                                                if ($ukmseller["prod_status"] == "Processed"){

                                                    echo '<i class="bg-success"></i>Processed';
                                                }
                                                else if ($ukmseller["prod_status"] == "To Process"){

                                                    echo '<i class="bg-warning"></i>To Process';
                                                }
                                                else {
                                                    echo '<i class="bg-dark"></i>Cancelled';
                                                }

                                            ?>
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 4 items out of 4 results found</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
 
</div>