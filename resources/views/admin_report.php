<?php 
    include_once'session.php';
    include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);
    $stmt1 = $mysqli1->prepare("SELECT * FROM tbl_customer WHERE role = 'Seller'");
    $stmt1->execute();

    $arr = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);

    $stmt1->close();
    
?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/css/admin_user.css">

     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Seller Report</title> 

    <style>
        /* Bootstrap Icons */
        @import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");
        @import url("https://fonts.googleapis.com/css?family=Roboto:400,500,300,700");
    </style>
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
                    <span class="link-name">Dashboard</span>
                </a></li>   
                <li><a href="admin_report">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name" style="color: #2c1414; text-decoration: underline #804444 1.5px;">Report</span>
                </a></li>
                <li><a href="admin_user">
                    <i class="uil uil-user"></i>
                    <span class="link-name">User</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="/destroy">
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
                </div> -->
            </li>
            </ul>
        </div>
    </nav>

    <section>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <span class="text">Seller Report</span>
                </div>
            </div>

            <form action="" method="get" id="search">  
                <div class="boxes">
                    <div class="box box1">
                        <div class="form-group">                                       
                            <label>User ID</label>
                            <input type="text" name="inputId" placeholder="Enter User Name" >                                  
                            <div class="button-group">
                                <button type="submit" name="searchUser">Search</button>
                                <button type="reset" onclick="location.href='\admin_report'">Reset</button>
                            </div>                                  
                        </div>                        
                    </div>
                </div>
            </form>

          

        </div>

        <!-- <div style="margin-left: 1388px;">
            <button class="button-add" id="buttonadd" onclick="addnew()">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg> 
                Add New Account
            </button>      
        </div> -->

        <div id="displayList" style="margin-top: 18px;margin-left: 37px;margin-right: 57px;border: 2px solid rgb(187 145 145 / 30%); height: 555px;">
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col" style="text-align: center">Username</th>
                            <th scope="col" style="text-align: center">Email</th>
                            <th scope="col" style="text-align: center">Seller Type</th>
                            <th scope="col" style="text-align: center">Shop Name</th>
                            <th scope="col" style="text-align: center">Shop Address</th>
                            <!-- <th scope="col" style="text-align: center">Password</th> -->
                            <!-- <th scope="col" style="text-align: center">Role</th> -->
                            <!-- <th scope="col" style="text-align: center">Status</th> -->
                            <th></th>
                        </tr>
                    </thead>
                </table> 
            </div>
            <div class="tbl-content" id="search">
                <table cellpadding="0" cellspacing="0" border="0">  
                    <tbody>
                        <?php
                        if(isset($_GET['searchUser']))
                        {
                            $Id = $_GET['inputId'];
                            
                            $stmt2 =  $mysqli1->prepare("SELECT * from tbl_customer WHERE id = '$Id' OR username='$Id' OR Fullname LIKE '%$Id%' OR role='$Id'");
        
                            $stmt2->execute();
                            $result2 = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

                            
                            $count = 0;
                            
                            foreach ($result2 as $row) {
        
                                $count++;
                                $fullname = $row['Fullname'];
                                $username = $row['username'];
                                $email = $row['user_email'];
                                $matric = $row['matrics'];
                                $phonenumber = $row['phone_number'];
                                $password = $row['passwords'];
                                $role = $row['role'];
                                $userId= $row['id']; 

                                $type = $row['seller_type'];
                                $shopname = $row['shop_name'];
                                $shopaddress = $row['shop_add'];
                                ?>
                            <tr>
                                <form action="" method="get">
                                    <!-- <input type="hidden" name="fullname" value="<?php //echo $row['Fullname'] ?>">
                                    <input type="hidden" name="username" value="<?php //echo $row['username'] ?>">
                                    <input type="hidden" name="email" value="<?php //echo $row['user_email'] ?>">
                                    <input type="hidden" name="matrics" value="<?php //echo $row['matrics'] ?>">
                                    <input type="hidden" name="phonenum" value="<?php //echo $row['phone_number'] ?>">
                                    <input type="hidden" name="password" value="<?php //echo $row['passwords'] ?>">
                                    <input type="hidden" name="role" value="<?php //echo $row['role'] ?>"> -->
                                    <input type="hidden" name="userId" value="<?php echo $row['id'] ?>">

                                    <td>
                                        <?php echo $fullname?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $username ?>
                                    </td>
                                    <td style="text-align: center">
                                            <?php echo $email?>
                                    </td>
                                    <!-- <td style="text-align: center"> -->
                                    <?php //echo $password ?>
                                    <!-- </td> -->
                                    <td style="text-align: center">
                                            <?php echo $type?>
                                    </td>
                                    <td style="text-align: center">
                                            <?php echo $shopname?>
                                    </td>
                                    <td style="text-align: left">
                                            <?php echo $shopaddress?>
                                    </td>
                                    <!-- <td style="text-align: center">
                                            <?php //echo $role ?>
                                    </td> -->
                                    <td class="text-end" style="text-align: center">
                                        <a style="display: contents" href='/delete_user?id=<?=$userId;?>'>
                                            <button class="button-report">
                                                Generate Report
                                                <!-- <i class="bi bi-trash" style="margin:-10px; font-size: 15px;"></i> -->
                                            </button>
                                        </a>
                                        <!-- <button type="submit" class="button-edit" id="buttonedit" name="edituser">
                                            <i class="bi bi-pencil" style="margin:-10px; font-size: 15px;"></i>
                                        </button>     -->
                                    </td>
                                </form>
                            </tr>
                                    <?php
                            } 
                        }         else{
                            foreach($arr as $userlist) {
                                $fullname = $userlist['Fullname'];
                                $username = $userlist['username'];
                                $email = $userlist['user_email'];
                                $matric = $userlist['matrics'];
                                $phonenumber = $userlist['phone_number'];
                                $password = $userlist['passwords'];
                                $role = $userlist['role'];
                                $userId= $userlist['id']; 

                                $type = $userlist['seller_type'];
                                $shopname = $userlist['shop_name'];
                                $shopaddress = $userlist['shop_add'];
                        ?>
                        <tr>
                            <form action="" method="get">
                                <!-- <input type="hidden" name="fullname" value="<?php //echo $userlist['Fullname'] ?>">
                                <input type="hidden" name="username" value="<?php //echo $userlist['username'] ?>">
                                <input type="hidden" name="email" value="<?php //echo $userlist['user_email'] ?>">
                                <input type="hidden" name="matrics" value="<?php //echo $userlist['matrics'] ?>">
                                <input type="hidden" name="phonenum" value="<?php //echo $userlist['phone_number'] ?>">
                                <input type="hidden" name="password" value="<?php //echo $userlist['passwords'] ?>">
                                <input type="hidden" name="role" value="<?php //echo $userlist['role'] ?>"> -->
                                <input type="hidden" name="userId" value="<?php echo $userlist['id'] ?>">

                                <td>
                                    <?php echo $userlist['Fullname'] ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $userlist['username'] ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $userlist['user_email'] ?>
                                </td>
                                <!-- <td style="text-align: center"> -->
                                    <?php //echo $userlist['passwords'] ?>
                                <!-- </td> -->
                                <td style="text-align: center">
                                    <?php echo $type?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $shopname?>
                                </td>
                                <td style="text-align: left">
                                    <?php echo $shopaddress?>
                                </td>
                                <!-- <td style="text-align: center">
                                    <?php //echo $userlist['role'] ?>
                                </td> -->

                                <td class="text-end" style="text-align: center">
                                    <a style="display: contents">
                                        <div class="button-report divmodal" id="myModalBtn" href="javascript:void(0);" data-href="admin_report_generate?userId=<?=$userId;?>">Generate Report</div>
                                        <!-- <button class="button-report" id="myModalBtn">Generate Report</button> -->
                                        </div>
                                    </a>

                                    <script>
                                        $(document).ready(function(){
                                            $('.button-report').on('click',function(){
                                                var dataURL = $(this).attr('data-href');
                                                $('.modal-body').load(dataURL,function(){
                                                    $('#myModal').modal({show:true});
                                                });
                                            }); 
                                        });
                                    </script>
                                </td>
                            </form>
                        </tr>
                        <?php
                            }}
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

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

    <script>
        // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
        $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();
    </script>
</body>
</html>