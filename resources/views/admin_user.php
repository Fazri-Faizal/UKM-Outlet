<?php 
    include_once'session.php';
    include 'database.php';
    
    if(isset($_GET['edituser'])) { 
        $role=$_GET['role'] ;
        $matrics= $_GET['matrics'];    
        
        $mysqli1 = new mysqli($servername, $username, $password, $dbname);
        $stmt1 = $mysqli1->prepare("SELECT * FROM tbl_customer");
        $stmt1->execute();

        $arr = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);

        $stmt1->close(); 
    ?>

        <!DOCTYPE html>
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
                            <span class="text">User Activity</span>
                        </div>
                    </div>
                </div>

                <br>
                <br>

                <div id="addnew" class="addnew-content">
                    <h1>Edit User Account</h1>
                    <form action="/crud_admin_edituser" method="get">
                        <div class="bg-white border" style="border-radius: 20px;margin-top: 20px;display: flex;flex: 2;flex-wrap: wrap;justify-content: space-around;">
                            <div class="info-group">
                                <label>Full Name</label>
                                <p><input type="text" id="editfullname" name="fullname" value="<?php echo $_GET['fullname'] ?>"></p>    
                            </div>

                            <div class="info-group">
                                <label>Username</label>
                                <p><input type="text" id="editusername" name="username" value="<?php echo $_GET['username'] ?>"></p>  
                            </div>

                            <div class="info-group">
                                <label>Email</label>
                                <p><input type="text" id="editemail" name="email" value="<?php echo $_GET['email'] ?>"></p>
                            </div>

                            <div class="info-group">
                                <label>Phone Number</label>
                                <p><input type="text" id="editphonenumber" name="phonenumber" value="<?php echo $_GET['phonenum'] ?>"></p>  
                            </div>

                            <div class="info-group">
                                <label>Password</label>
                                <p><input type="text" id="editpassword" name="password" value="<?php echo $_GET['password'] ?>"></p>    
                            </div>

                            <div class="info-group">
                                <label>Matrics</label>
                                <p><input type="text" id="editmatrics" name="matric" value="<?php echo $matrics ?>"></p>
                            </div>

                            <input type="hidden" name="userId" value="<?php echo $_GET['userId'] ?>">

                            <div class="info-group dropdown">
                                <label for="user_role">Role</label>
                                <select name="role" id="user_role" class="dropbtn" value=" <?php echo $_GET['role'] ?> ">
                                    <option class="dropdown-content">Select Role</option>
                                    <option <?php if($role=="Customer"){ echo "selected";} ?> value="Customer" class="dropdown-content">Customer</option>
                                    <option <?php if($role=="Seller"){ echo "selected";} ?> value="Seller" class="dropdown-content">Seller</option>
                                    <option <?php if($role=="Admin"){ echo "selected";} ?> value="Admin" class="dropdown-content">Admin</option>
                                </select>
                            </div> 
                        </div>
                        
                        <div class="info-group" style="right:700px;">
                        <button type="submit" class="button-update" name="updateUser">
                            <i style="margin:-10px; font-size: 15px;">Update User Account</i>
                        </button> 
                    </div>     
                    </form>
                </div>
            </section>
        </body>
        </html>
    
    <?php
    
    } else {
    
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
                    <span class="link-name" style="color: #2c1414">User</span>
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
                                ?>
                            <tr>
                                <form action="" method="get">
                                    <input type="hidden" name="fullname" value="<?php echo $row['Fullname'] ?>">
                                    <input type="hidden" name="username" value="<?php echo $row['username'] ?>">
                                    <input type="hidden" name="email" value="<?php echo $row['user_email'] ?>">
                                    <input type="hidden" name="matrics" value="<?php echo $row['matrics'] ?>">
                                    <input type="hidden" name="phonenum" value="<?php echo $row['phone_number'] ?>">
                                    <input type="hidden" name="password" value="<?php echo $row['passwords'] ?>">
                                    <input type="hidden" name="role" value="<?php echo $row['role'] ?>">
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
                                    <td style="text-align: center">
                                            <?php echo $password ?>
                                    </td>
                                    <td style="text-align: center">
                                            <?php echo $role ?>
                                    </td>
                                    <td class="text-end" style="text-align: center">
                                        <a style="display: contents" href='/delete_user?id=<?=$userId;?>'>
                                            <button class="button-delete">
                                                <i class="bi bi-trash" style="margin:-10px; font-size: 15px;"></i>
                                            </button>
                                        </a>
                                        <button type="submit" class="button-edit" id="buttonedit" name="edituser"> <!-- onclick="editAccount()" -->
                                            <i class="bi bi-pencil" style="margin:-10px; font-size: 15px;"></i>
                                        </button>    
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
                        ?>
                        <tr>
                            <form action="" method="get">
                                <input type="hidden" name="fullname" value="<?php echo $userlist['Fullname'] ?>">
                                <input type="hidden" name="username" value="<?php echo $userlist['username'] ?>">
                                <input type="hidden" name="email" value="<?php echo $userlist['user_email'] ?>">
                                <input type="hidden" name="matrics" value="<?php echo $userlist['matrics'] ?>">
                                <input type="hidden" name="phonenum" value="<?php echo $userlist['phone_number'] ?>">
                                <input type="hidden" name="password" value="<?php echo $userlist['passwords'] ?>">
                                <input type="hidden" name="role" value="<?php echo $userlist['role'] ?>">
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
                                <td style="text-align: center">
                                    <?php echo $userlist['passwords'] ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $userlist['role'] ?>
                                </td>

                                <td class="text-end" style="text-align: center">
                                    <a style="display: contents" href='/admin_delete_user?id=<?=$userId;?>'>
                                        <button class="button-delete">
                                            <i class="bi bi-trash" style="margin:-10px; font-size: 15px;"></i>
                                        </button>
                                    </a>
                                    <button class="button-edit" type="submit" id="buttonedit" name="edituser"> <!-- onclick="editAccount()" -->
                                        <i class="bi bi-pencil" style="margin:-10px; font-size: 15px;"></i>
                                    </button>
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

        <div id="addnew" style="display:none;" class="addnew-content">
            <h1>Add New Account</h1>
            <form action="/crud_admin_adduser" method="get">
                <div class="bg-white border" style="border-radius: 20px;margin-top: 20px;display: flex;flex: 2;flex-wrap: wrap;justify-content: space-around;">
                    <div class="info-group">
                        <label>Full Name</label>
                        <p><input type="text" id="fullname" name="fullname" placeholder="Full name"></p>   
                    </div>

                    <div class="info-group">
                        <label>Username</label>
                        <p><input type="text" id="username" name="username" placeholder="Username"></p>
                    </div>

                    <div class="info-group">
                        <label>Email</label>
                        <p><input type="text" id="email" name="email" placeholder="Email"></p>
                    </div>

                    <div class="info-group">
                        <label>Phone Number</label>
                        <p><input type="text" id="phonenumber" name="phonenumber" placeholder="Phone Number"></p>
                    </div>

                    <div class="info-group">
                        <label>Password</label>
                        <p><input type="text" id="password" name="password" placeholder="Password"></p>
                    </div>

                    <div class="info-group">
                        <label>Matrics</label>
                        <p><input type="text" id="matric" name="matric" placeholder="Matrics"></p>
                    </div>

                    <div class="info-group dropdown">
                        <label for="role">Role</label>
                        <select name="role" id="user_role" class="dropbtn">
                            <option class="dropdown-content" selected>Select Role</option>
                            <option value="Customer" class="dropdown-content">Customer</option>
                            <option value="Seller" class="dropdown-content">Seller</option>
                            <option value="Admin" class="dropdown-content">Admin</option>
                        </select>
                    </div> 
                </div>  
                
                <div class="info-group" style="right:700px;">
                <button type="submit" class="button-update" name="addUser">
                    <i style="margin:-10px; font-size: 15px;">Add User Account</i>
                </button> 
            </div>   
            </form>
        </div>

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

            document.getElementById("search").style.display = "none";

            document.getElementById("addnew").style.display = "";

            document.getElementById("buttonadd").style.visibility = "hidden";
        } else {
            document.getElementById("buttonadd").classList.add('addactive');
            addnew();
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

<?php 
    }
?>