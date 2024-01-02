<?php 
    include_once'session.php';
    include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);
    $stmt1 = $mysqli1->prepare("SELECT * FROM tbl_customer WHERE role ='seller'");
    $stmt1->execute();

    $arr = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);

    $stmt1->close();
    
?>

<?php 
    include_once'session.php';
    include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);
    $stmt2 = $mysqli1->prepare("SELECT * FROM tbl_customer");
    $stmt2->execute();

    $arr2 = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

    $stmt2->close(); 
?>

<?php 
    include_once'session.php';
    include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);

    //Statement to count All Customer
    $stmt3 = $mysqli1->prepare("SELECT COUNT(id) AS total_customers FROM tbl_customer WHERE role = 'Customer'");
    $stmt3->execute();   
    $result = $stmt3->get_result();
    $row = $result->fetch_assoc();

    $stmt3->close();

    $total_customers = $row['total_customers'];

    //Statement to count All Seller
    $stmt4 = $mysqli1->prepare("SELECT COUNT(id) AS total_seller FROM tbl_customer WHERE role = 'Seller'");
    $stmt4->execute();   
    $result2 = $stmt4->get_result();
    $row2 = $result2->fetch_assoc();

    $stmt4->close();

    $total_seller = $row2['total_seller'];

    //Statement to count All Seller
    $stmt5 = $mysqli1->prepare("SELECT COUNT(id) AS total_user FROM tbl_customer");
    $stmt5->execute();   
    $result3 = $stmt5->get_result();
    $row3 = $result3->fetch_assoc();

    $stmt5->close();

    $total_user = $row3['total_user'];
?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/css/admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-image">
            <img src="/img/UKM OMELET LOGO.png" alt="">
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin_dashboard">
                    <i class="uil uil-estate"></i>
                    <span class="link-name" style="color: #2c1414; text-decoration: underline #804444 1.5px;">Dashboard</span>
                </a></li>   
                <li><a href="admin_report">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Report</span>
                </a></li>
                <li><a href="admin_user">
                    <i class="uil uil-user"></i>
                    <span class="link-name">User</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="/destroy-admin">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <!-- <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                    <span class="switch"></span>
                    </div>
                </li> -->
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <h1>Admin Dashboard</h1>
        <!-- <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div> -->

        <div class="dashboard-test">     
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Total Customer</span>
                    <span class="card-value"><?php echo ($total_customers); ?></span>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <span class="card-title">Total Seller</span>
                    <span class="card-value"><?php echo ($total_seller); ?></span>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <span class="card-title">User Active</span>
                    <span class="card-value"><?php echo ($total_user); ?></span>
                </div>
            </div>

            <!-- <div class="card">
                <div class="card-content">
                    <span class="card-title">New User</span>
                    <span class="card-value">63</span>
                </div>
            </div> -->

            <div class="card large">
                <div class="card-content">
                    <span class="card-title">Total User</span>
                    <span class="card-value"><?php echo ($total_user); ?></span>
                    <!-- Include chart here if necessary -->
                </div>
            </div>


            <!-- TOP SELLER -->
            <div class="card large2">
                <div class="table">
                    <div class="tbl-header">
                        <div style="font-size: 22px;color: #745c4e;text-align:center;height: 43px;display: grid;align-content: space-around;">
                            <span>Top Seller</span>
                        </div><hr style="margin-top: 10px;color: #804444;">                     
                        <table cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col" style="text-align: center">Type</th>
                                    <th scope="col" style="text-align: center">Shop Name</th>
                                    <!-- <th scope="col" style="text-align: center">Status</th> -->
                                </tr>
                            </thead>
                        </table> 
                    </div>
                    <div class="tbl-content">
                        <table cellpadding="0" cellspacing="0">  
                            <tbody>
                                <?php
                                    foreach($arr as $sellerlist) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $sellerlist['Fullname'] ?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $sellerlist['seller_type'] ?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $sellerlist['shop_name'] ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            

            <!-- ALL USER -->
            <div class="card large2">
                <div class="table">
                    <div class="tbl-header">
                        <div style="font-size: 22px;color: #745c4e;text-align:center;height: 43px;display: grid;align-content: space-around;">
                            <span>User Account</span>
                        </div><hr style="margin-top: 10px;color: #804444;">
                        <table cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col" style="text-align: center">Username</th>
                                    <th scope="col" style="text-align: center">Email</th>
                                    <th scope="col" style="text-align: center">Matric</th>
                                    <!-- <th scope="col" style="text-align: center">Status</th> -->
                                </tr>
                            </thead>
                        </table> 
                    </div>
                    <div class="tbl-content">
                        <table cellpadding="0" cellspacing="0">  
                            <tbody>
                                <?php
                                    foreach($arr2 as $userlist) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $userlist['Fullname'] ?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $userlist['username'] ?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $userlist['user_email'] ?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $userlist['matrics'] ?>
                                    </td>
                                    <!-- <td style="text-align: center">
                                        
                                    </td> -->
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
         </div>
    </section>

    <script src="/js/admin.js"></script>
</body>
</html>
