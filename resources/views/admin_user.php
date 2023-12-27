<?php 
    include_once'session.php';
    include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);
    $stmt1 = $mysqli1->prepare("SELECT * FROM tbl_customer");
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
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/css/admin_user.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin User Activity</title> 

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
                <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Report</span>
                </a></li>
                <li><a href="admin_user">
                    <i class="uil uil-user"></i>
                    <span class="link-name">User</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <span class="text">User Activity</span>
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
                                <!-- <button type="reset">Reset</button> -->
                            </div>                                  
                        </div>                        
                    </div>
                </div>
            </form>

          

        </div>

        <div style="margin-left: 1388px;">
            <button class="button-add" id="buttonadd" onclick="addnew()">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg> -->
                Add New Account
            </button>      
        </div>

        <div id="displayList" style="margin-top: 18px;margin-left: 37px;margin-right: 57px;border: 2px solid rgb(187 145 145 / 30%); height: 555px;">
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col" style="text-align: center">Username</th>
                            <th scope="col" style="text-align: center">Email</th>
                            <th scope="col" style="text-align: center">Password</th>
                            <th scope="col" style="text-align: center">Role</th>
                            <!-- <th scope="col" style="text-align: center">Status</th> -->
                            <th></th>
                        </tr>
                    </thead>
                </table> 
            </div>
            <div class="tbl-content">
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
                                ?>
                            <tr>
                                <td>
                                        <?php echo  $fullname?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $username ?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $email?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $password ?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $role ?>
                                    </td>
                                    <td class="text-end" style="text-align: center">
                                    <a href='/delete_user?id=<?=$userId;?>'>
                                <button class="button-delete">
                                    <i class="bi bi-trash" style="margin:-10px; font-size: 15px;"></i>
                                </button>
                                </a>
                                <button class="button-edit" onclick="editAccount()" id="buttonedit">
                                    <i class="bi bi-pencil" style="margin:-10px; font-size: 15px;"></i>
                                </button>    
                            </td>
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
                                <?php echo $userlist['passwords'] ?>
                            </td>
                            <td style="text-align: center">
                                <?php echo $userlist['role'] ?>
                            </td>
                            <!-- <td style="text-align: center">
                                
                            </td> -->
                            <td class="text-end" style="text-align: center">
                            <a href='/delete_user?id=<?=$userId;?>'>
                                <button class="button-delete">
                                    <i class="bi bi-trash" style="margin:-10px; font-size: 15px;"></i>
                                </button>
                                </a>
                                <button class="button-edit" onclick="editAccount()" id="buttonedit">
                                    <i class="bi bi-pencil" style="margin:-10px; font-size: 15px;"></i>
                                </button>    
                            </td>
                        </tr>
                        <?php
                            }}
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="addnew" style="display:none;" class="addnew-content">
            <h1>Add New Account</h1>
            <form method="get">
                <div class="bg-white border" style="border-radius: 20px;margin-top: 20px;display: flex;flex: 2;flex-wrap: wrap;justify-content: space-around;">
                    <div class="info-group">
                        <label>Full Name</label>
                        <p><input type="text" id="fullname" name="fullname" placeholder="Full name"></p>    
                        <!-- edit account mode -->  
                        <p><input type="text" style="display:none" id="editfullname" name="fullname" placeholder=<?php echo $userlist['Fullname'] ?>></p>    
                    </div>

                    <div class="info-group">
                        <label>Username</label>
                        <p><input type="text" id="username" name="Username" placeholder="Username"></p>    
                        <!-- edit account mode -->
                        <p><input type="text" style="display:none" id="editusername" name="Username" placeholder=<?php echo $userlist ['username'] ?>></p>  
                    </div>

                    <div class="info-group">
                        <label>Email</label>
                        <p><input type="text" id="email" name="email" placeholder="Email"></p>    
                        <!-- edit account mode -->
                        <p><input type="text" style="display:none" id="editemail" name="email" placeholder=<?php echo $userlist ['user_email'] ?>></p>
                    </div>

                    <div class="info-group">
                        <label>Phone Number</label>
                        <p><input type="text" id="phonenumber" name="phonenumber" placeholder="Phone Number"></p>    
                        <!-- edit account mode -->
                        <p><input type="text" style="display:none" id="editphonenumber" name="phonenumber" placeholder=<?php echo $userlist ['phone_number'] ?>></p>  
                    </div>

                    <div class="info-group">
                        <label>Password</label>
                        <p><input type="text" id="password" name="password" placeholder="Password"></p>    
                        <!-- edit account mode -->
                        <p><input type="text" style="display:none" id="editpassword" name="password" placeholder=<?php echo $userlist ['passwords'] ?>></p>    
                    </div>

                    <div class="info-group">
                        <label>Matrics</label>
                        <p><input type="text" id="matric" name="matric" placeholder="Matrics"></p>    
                        <!-- edit account mode -->
                        <p><input type="text" style="display:none" id="editmatric" name="matric" placeholder=<?php echo $userlist ['matrics'] ?>></p>
                    </div>
                    
                    <!-- <div class="info-group">
                        <label>Role</label>
                        <p><input type="text" name="matrics" placeholder="Role"></p>    
                    </div>      -->

                    <div class="info-group dropdown">
                        <label for="user_role">Role</label>
                        <select name="user_role" id="user_role" class="dropbtn">
                            <option class="dropdown-content" selected>Select Role</option>
                            <option value="customer" class="dropdown-content">Customer</option>
                            <option value="seller" class="dropdown-content">Seller</option>
                        </select>
                    </div> 
                </div>     
            </form>
            <div class="info-group" style="right:700px;">
                <button class="button-update">
                    <i style="margin:-10px; font-size: 15px;">Update User Account</i>
                </button> 
            </div>
        </div>
        



        <!-- <h1>Add New Account</h1>

        <div class="grid-container" id="addnew" style="display:none;">   
            <form method="get">
                <div class="grid-item">
                    <label>Full Name</label>
                    <p><input type="text" name="fullname" placeholder="Full name"></p>    
                </div>
                <div class="grid-item">
                    <label>Username</label>
                    <p><input type="text" name="Username" placeholder="Username"></p>    
                </div>
                <div class="grid-item">
                    <label>Email</label>
                    <p><input type="text" name="Email" placeholder="Email"></p>    
                </div>
                <div class="grid-item">
                    <label>Phone Number</label>
                    <p><input type="text" name="Phone Number" placeholder="Phone Number"></p>  
                </div>
                <div class="grid-item">
                    <label>Password</label>
                    <p><input type="text" name="Password" placeholder="Password"></p>  
                </div>
                <div class="grid-item">
                    <label>Matrics</label>
                    <p><input type="text" name="matrics" placeholder="Matrics"></p> 
                </div>
                <div class="grid-item">
                    <label>Role</label>
                    <p><input type="text" name="matrics" placeholder="Role"></p>    
                </div> 
            </form>
        </div> -->
    </section>



    <script>
        // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
        $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();

        function addnew() {
        if(document.getElementById("buttonadd").classList.contains("addactive")) {

            document.getElementById("displayList").style.display = "none";

            document.getElementById("addnew").style.display = "";

            document.getElementById("buttonadd").style.visibility = "hidden";
        } else {
            document.getElementById("buttonadd").classList.add('addactive');
            addnew();
        }
    }

    function editAccount() {
        if(document.getElementById("buttonedit").classList.contains("editactive")) {

            document.getElementById("displayList").style.display = "none";
            document.getElementById("search").style.display = "none";
            document.getElementById("fullname").style.display = "none";
            document.getElementById("username").style.display = "none";
            document.getElementById("phonenumber").style.display = "none";
            document.getElementById("matrics").style.display = "none";
            document.getElementById("password").style.display = "none";
            document.getElementById("email").style.display = "none";

            document.getElementById("addnew").style.display = "";
            document.getElementById("editfullname").style.display = "";
            document.getElementById("editusername").style.display = "";
            document.getElementById("editphonenumber").style.display = "";
            document.getElementById("editmatrics").style.display = "";
            document.getElementById("editpassword").style.display = "";
            document.getElementById("editemail").style.display = "";

            document.getElementById("buttonadd").style.visibility = "hidden";
        } else {
            document.getElementById("buttonedit").classList.add('editactive');
            editAccount();
        }
    }

    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>
</html>