


<head>


    <style>
        /* Webpixels CSS */
/* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
/* URL: https://github.com/webpixels/css */

@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

.grid-container {
    display: grid;
    grid-template-columns: auto auto;
    gap: 24px;
    /* background-color: #2196F3; */
    /* padding: 24px; */
    position: space-between;
    margin-top: 60px;
  }

    </style>
    <title>UKM Outlet Seller Analytics</title>
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
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="seller_analytics">
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


                    // if(!$arr) exit('no rows');

                    // Prepare the SQL query to calculate the sum of total_price
                    $result = $mysqli->query("SELECT SUM(total_price) AS total_sum FROM tbl_order WHERE seller_id = $sellerId ");
                                        
                    // Fetch the result
                    $row = $result->fetch_assoc();

                    if(!$row)
                        $row = 0;

                    // Prepare the SQL query to calculate the sum of order
                    $tot_order = $mysqli->query("SELECT COUNT(prod_status) AS total_order FROM tbl_order WHERE seller_id = $sellerId ");
                                        
                    // Fetch the result
                    $tot_Order = $tot_order->fetch_assoc();

                    if(!$tot_Order)
                        $tot_Order = 0;

                    // Prepare the SQL query to calculate the sum of order
                    $act_order = $mysqli->query("SELECT COUNT(prod_status) AS act_order FROM tbl_order WHERE prod_status = 'To Process' AND seller_id = $sellerId");
                                        
                    // Fetch the result
                    $act_Order = $act_order->fetch_assoc();

                    if(!$act_Order)
                        $act_Order = 0;

                    $proc_order = $mysqli->query("SELECT COUNT(prod_status) AS act_order FROM tbl_order WHERE prod_status = 'Processed' AND seller_id = $sellerId");
                                        
                    // Fetch the result
                    $proc_Order = $proc_order->fetch_assoc();

                    if(!$proc_order)
                        $proc_order = 0;
                    

                    $stmt->close();

                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $stmt2 = $conn->prepare("SELECT * FROM tbl_products where seller_ids = $sellerId");

                    $stmt2->execute();
                    $result2 = $stmt2->fetchAll();
                    $i=0;
                    foreach ($result2 as $row2)
                    {
                       $i=$i+1;
                    }

                                
                    $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $stmt3 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-01-%'");

                    $stmt3->execute();
                    $result3 = $stmt3->fetchAll();
                    $jan=0;
                    foreach ($result3 as $row3)
                    {
                        $jan=$jan+1;
                    }

                
                    $stmt4 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-02-%'");

                    $stmt4->execute();
                    $result4 = $stmt4->fetchAll();
                    $feb=0;
                    foreach ($result4 as $row4)
                    {
                        $feb=$feb+1;
                    }

                    $stmt5 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-03-%'");

                    $stmt5->execute();
                    $result5 = $stmt5->fetchAll();
                    $mar=0;
                    foreach ($result5 as $row5)
                    {
                        $mar=$mar+1;
                    }

                    $stmt6 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-04-%'");

                    $stmt6->execute();
                    $result6 = $stmt6->fetchAll();
                    $apr=0;
                    foreach ($result6 as $row6)
                    {
                        $apr=$apr+1;
                    }

                    $stmt7 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-05-%'");

                    $stmt7->execute();
                    $result7 = $stmt7->fetchAll();
                    $may=0;
                    foreach ($result7 as $row7)
                    {
                        $may=$may+1;
                    }

                    $stmt8 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-06-%'");

                    $stmt8->execute();
                    $result8 = $stmt8->fetchAll();
                    $jun=0;
                    foreach ($result8 as $row8)
                    {
                        $jun=$jun+1;
                    }

                    $stmt9 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-07-%'");

                    $stmt9->execute();
                    $result9 = $stmt9->fetchAll();
                    $jul=0;
                    foreach ($result9 as $row9)
                    {
                        $jul=$jul+1;
                    }

                    $stmt10 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-08-%'");

                    $stmt10->execute();
                    $result10 = $stmt10->fetchAll();
                    $aug=0;
                    foreach ($result10 as $row10)
                    {
                        $aug=$aug+1;
                    }

                    $stmt11 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-09-%'");

                    $stmt11->execute();
                    $result11 = $stmt11->fetchAll();
                    $sep=0;
                    foreach ($result11 as $row11)
                    {
                        $sep=$sep+1;
                    }

                    $stmt12 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-10-%'");

                    $stmt12->execute();
                    $result12 = $stmt12->fetchAll();
                    $oct=0;
                    foreach ($result12 as $row12)
                    {
                        $oct=$oct+1;
                    }

                    $stmt13 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-11-%'");

                    $stmt13->execute();
                    $result13 = $stmt13->fetchAll();
                    $nov=0;
                    foreach ($result13 as $row13)
                    {
                        $nov=$nov+1;
                    }

                    $stmt14 = $conn2->prepare("SELECT * FROM tbl_order where seller_id = $sellerId AND order_date LIKE '%-12-%'");

                    $stmt14->execute();
                    $result14 = $stmt14->fetchAll();
                    $des=0;
                    foreach ($result14 as $row14)
                    {
                        $des=$des+1;
                    }

                    $stmt15 = $conn2->prepare("SELECT * FROM tbl_products where seller_ids = $sellerId AND product_Type LIKE 'Jersey'");

                    $stmt15->execute();
                    $result15 = $stmt15->fetchAll();
                    $jersey=0;
                    foreach ($result15 as $row15)
                    {
                        $jersey= $jersey+1;
                    }
                    $stmt16 = $conn2->prepare("SELECT * FROM tbl_products where seller_ids = $sellerId AND product_Type LIKE 'Hoodie'");

                    $stmt16->execute();
                    $result16 = $stmt16->fetchAll();
                    $hoodie=0;
                    foreach ($result16 as $row16)
                    {
                        $hoodie= $hoodie+1;
                    }
                    $stmt17 = $conn2->prepare("SELECT * FROM tbl_products where seller_ids = $sellerId AND product_Type LIKE 'Cap'");

                    $stmt17->execute();
                    $result17 = $stmt17->fetchAll();
                    $cap=0;
                    foreach ($result17 as $row17)
                    {
                        $cap= $cap+1;
                    }

                    $stmt18 = $conn2->prepare("SELECT * FROM tbl_products where seller_ids = $sellerId AND product_Type LIKE 'Tote Bag'");

                    $stmt18->execute();
                    $result18 = $stmt18->fetchAll();
                    $tote=0;
                    foreach ($result18 as $row18)
                    {
                        $tote= $tote+1;
                    }

                    $stmt19 = $conn2->prepare("SELECT * FROM tbl_products where seller_ids = $sellerId AND product_Type LIKE 'Lanyard'");

                    $stmt19->execute();
                    $result19 = $stmt19->fetchAll();
                    $lanyard=0;
                    foreach ($result19 as $row19)
                    {
                        $lanyard= $lanyard+1;
                    }

                    $stmt20 = $conn2->prepare("SELECT * FROM tbl_products where seller_ids = $sellerId AND product_Type LIKE 'Others'");

                    $stmt20->execute();
                    $result20 = $stmt20->fetchAll();
                    $others=0;
                    foreach ($result20 as $row20)
                    {
                        $others= $others+1;
                    }
                ?>
                  
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales'],
          ['Jan', <?php echo $jan?>],
          ['Feb', <?php echo $feb?>],
          ['Mar',  <?php echo $mar?>],
          ['Apr',  <?php echo $apr?>],
          ['May', <?php echo $may?>],
          ['Jun',  <?php echo $jun?>],
          ['Jul',  <?php echo $jul?>],
          ['Aug',  <?php echo $aug?>],
          ['Sep', <?php echo $sep?>],
          ['Oct',  <?php echo $oct?>],
          ['Nov',  <?php echo $nov?> ],
          ['Dec',  <?php echo $des?>]
        ]);

        var options = {
          title: 'Shop Performance',
          curveType: 'function',
          colors:['saddlebrown','#804444'],
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
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
                            <h1 class="h2 mb-0 ls-tight">Seller Analytics</h1> Welcome Back, <?= ($_SESSION['sessionname'])?>
                        
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
                                        <?php if(!$row['total_sum']) { ?>
                                            <span class="h3 font-bold mb-0"><?php echo "RM 0.00"; ?>
                                        <?php } else { ?>
                                            <span class="h3 font-bold mb-0"><?php echo "RM " . $row['total_sum']; ?>
                                        <?php } ?>

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
                                        <span class="h3 font-bold mb-0"><?php echo $i; ?></span>
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
                        <h5 class="mb-0">Statistics(s)</h5>
                    </div>
                    <div class="grid-container">
                    <div>
                    <div id="curve_chart" style="width: 900px; height: 500px"></div>
                    </div>
                    <div>
                     <div id="donutchart" style="width: 900px; height: 500px;"></div>
                     </div>
                     </div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Product Type', 'sold'],
                            ['Jearsy',    <?php echo $jersey; ?>],
                            ['Lanyard',   <?php echo  $lanyard;?>],
                            ['Hoodie',  <?php echo  $hoodie;?>],
                            ['Cap', <?php echo  $cap;?>],
                            ['Tote Bag',<?php  echo $tote;?>],
                            ['Others', <?php echo $others;?>]
                            ]);

                            var options = {
                            title: 'My Daily Activities',
                            pieSliceTextStyle: {
                               color: 'black',
                            },
                            slices: {
                               0: { color: 'saddlebrown' },
                               1: { color: 'sienna' },
                               2: { color: 'peru' },
                               3: { color: 'sandybrown' },
                               4: { color: 'burlywood' },
                               5: { color: 'tan' }
                               },
                            pieHole: 0.4,
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                            chart.draw(data, options);
                        }
                        </script>

                
             
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
                                        $count = 0;
                                        foreach($arr as $ukmseller) {
                                            $count++;
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
                        <span class="text-muted text-sm">Showing <?php echo $count; ?> items out of <?php echo $count; ?> results found</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
 
</div>