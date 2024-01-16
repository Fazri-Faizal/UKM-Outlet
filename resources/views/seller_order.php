
<head>

    <style>
        /* Webpixels CSS */
/* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
/* URL: https://github.com/webpixels/css */



@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);



/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.form-group label {
    width: 100px;
    text-align: right;
    margin-right: 10px;
}

.form-group input[type="text"], 
.form-group input[type="number"], 
.form-group select {
    flex: 1;
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group span {
    margin: 0 10px;
}
.button-group {
    display: flex;
    justify-content: flex-end;
}

button {
    padding: 10px 20px;
    margin-left: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="reset"] {
    background-color: #ccc;
    color: #333;
}

button:not([type="reset"]) {
    background-color: #ff4b4b;
    color: #fff;
}

button:hover {
    background-color: #d43a3a;
}

.button-view {
    background-color: #47362f;
    color: #fff8f8;
    width: 165px;
    border-radius:10px;
}

.button-view:hover {
    background-color: #c0b093;
}
    </style>
</head>
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
            </div>
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
                            <h1 class="h2 mb-0 ls-tight">Orders</h1>
                        </div>
                        <!-- Actions -->
                        <!-- <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>Edit</span>
                                </a>
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create</span>
                                </a>
                            </div>
                        </div> -->
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        <li class="nav-item ">
                            <a href="seller_order" class="nav-link active">All Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="seller_order_toship" class="nav-link font-regular">To Ship</a>
                        </li>
                        <li class="nav-item">
                            <a href="seller_order_completed" class="nav-link font-regular">Completed</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <!-- <form action="" method="get">   
                <div class="row g-6 mb-6">
                    <div class="col-xl-12 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="form-group">                                       
                                    <label>Order ID</label>
                                    <input type="text" name="inputId" placeholder="Please input order ID">
                                
                                    <div class="button-group">
                                        <button type="submit" name="searchorder">Search</button>
                                            <button type="reset">Reset</button>
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </form> -->
                
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
                                        
                                        $count = 0;
                                        
                                        foreach ($result4 as $row) {

                                            $count++;
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
                                        </tr>
                                    <?php } } 
                                        
                                    
                                    else
                                    {
                                        $count = 0;
                                        foreach ($result as $row) {
                                            $count++;

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
                                                
                                                if ($orderstatus == "Shipped"){

                                                    echo '<i class="bg-success"></i>Shipped';
                                                }
                                                else if ($orderstatus == "To Ship"){

                                                    echo '<i class="bg-warning"></i>To Ship';
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
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing <?php echo $count; ?> items out of <?php echo $count; ?> results found</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" data-keyboard="false" data-backdrop="false">
	    <div class="modal-dialog modal-lg">
	    
	        <!-- Modal content-->
	        <div class="modal-content">
	            <!-- <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <h4 class="modal-title">Generated Report</h4>
	            </div> -->
	            <div class="modal-body">

	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            </div>
	        </div>
	    </div>
	</div>