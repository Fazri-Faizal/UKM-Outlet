<head>
    <style>
        
        @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

        /* Bootstrap Icons */
        @import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], 
        input[type="number"], 
        textarea, 
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #804444;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ab8262;
        }
        .upload-container {
            position: relative;
        }

        .upload-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 150px;
            height: 80px;
            padding: 10px;
            background-color: #fff;
            border: 2px dashed #ff7d7d;
            border-radius: 8px;
            color: #ff7d7d;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .upload-box:hover {
            background-color: #f2f2f2;
        }

        .icon {
            font-size: 24px;
        }

        .counter {
            font-weight: bold;
        }

        input[type="file"] {
            display: none;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input { 
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #804444;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #804444;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
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
                $prod_Id = $_GET['editProduct'];

                $mysqli = new mysqli($servername, $username, $password,$dbname);


                $stmt = $mysqli->prepare("SELECT * FROM tbl_products WHERE product_Id = '$prod_Id'");
                $stmt->execute();
                
                $arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                
                if(!$arr) exit('no rows');

                foreach ($arr as $row) {
                    $row['product_Name'];
                    $row['product_Type'];
                    $row['origin_id']; 
                    $row['product_Description'];  
                    $row['product_price'];  
                    // If you want to echo the entire row as a string, you can use print_r($row);
                }
                
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
                            <h1 class="h2 mb-0 ls-tight">Edit Product</h1>
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

                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                    
                        <h2>Edit Product</h2>
                        <form action="/crud_update_product" method="get">
                            <input type="hidden" id="prod_Id" value="<?php echo $prod_Id; ?>" name="prod_Id" >
                            <div class="form-group">
                                <label for="productName">Product Name:</label>                       
                                <input type="text" id="productName" value="<?php echo $row['product_Name'] ?>" name="productName" style="width: 100%" required>
                            </div>
                            <div class="form-group" id="divPrice">
                                <label for="productPrice">Product Price:</label>
                                <input type="number" step="0.01" id="productPrice" value="<?php echo $row['product_price'] ?>" name="productPrice" required>
                            </div>
                            <div class="form-group">
                                <label for="productType">Product Type:</label>
                                <select id="productType" name="productType">
                                    <option value="<?php echo $row['product_Type'] ?>" selected><?php echo $row['product_Type'] ?></option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Lanyard">Lanyard</option>
                                    <option value="Hoodie">Hoodie</option>
                                    <option value="Cap">Cap</option>
                                    <option value="ToteBag">ToteBag</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="productOrigin">Product Origin:</label>
                                <select id="productOrigin" name="productOrigin">
                                    <option value="<?php echo $row['origin_id'];   ?>" selected><?php echo $row['origin_id'];?></option>
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
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                    
                            <div class="form-group">
                                <label for="productDescription">Product Description:</label>
                                <textarea id="productDescription" name="productDescription" rows="4"  required><?php echo $row['product_Description']; ?></textarea>
                            </div>
                            <label for="productImage">Product Image:</label>
                            <div class="upload-container">
                                <label for="file-upload">
                                    <div class="upload-box">
                                        <div class="icon">📸</div>
                                        Add Image
                                        <div class="counter">(0/24)</div>
                                    </div>
                                </label>
                                <input type="file" id="file-upload" multiple>
                            </div>
                            <button type="submit" name="updateProduct">Update Product</button>
                        </form>
                    
                </div>
            </div>
        </main>
    </div>
</div>
 <?php 
/* function origin(){
    if ($row['origin_id'] == 'KIY'){
        echo 'Kolej Ibrahim Yaakub';
    } elseif ($row['origin_id'] == 'KBH'){
        echo 'Kolej Burhanuddin Helmi';
    } elseif ($row['origin_id'] == 'FTSM'){
        echo 'Fakulti Teknologi dan Sains Maklumat';
    } elseif ($row['origin_id'] == 'KAB'){
        echo 'Kolej Aminuddin Baki';
    } elseif ($row['origin_id'] == 'FKAB'){
        echo 'Fakulti Kejuruteraan dan Alam Bina';
    } elseif ($row['origin_id'] == 'FPEND'){
        echo 'Fakulti Pendidikan';
    } elseif ($row['origin_id'] == 'FEP'){
        echo 'Fakulti Ekonomi dan Pengurusan';
    } elseif ($row['origin_id'] == 'FSSK'){
        echo 'Fakulti Sains Sosial dan Kemanusiaan';
    } elseif ($row['origin_id'] == 'FARMASI'){
        echo 'Fakulti Farmasi';
    } elseif ($row['origin_id'] == 'FPERG'){
        echo 'Fakulti Pergigian';
    } elseif ($row['origin_id'] == 'KDO'){
        echo 'Kolej Dato Onn';
    } elseif ($row['origin_id'] == 'KIZ'){
        echo 'Koleb Ibu Zain';
    } elseif ($row['origin_id'] == 'KKM'){
        echo 'Kolej Keris Mas';
    } elseif ($row['origin_id'] == 'KPZ'){
        echo 'Kolej Pendeta Zaaba';
    } elseif ($row['origin_id'] == 'KRK'){
        echo 'Kolej Rahim Kajai';
    } elseif ($row['origin_id'] == 'KTDI'){
        echo 'Kolej Tun Dr Ismail';
    } elseif ($row['origin_id'] == 'KTHO'){
        echo 'Kolej Tun Hussein Onn';
    } elseif ($row['origin_id'] == 'KTSN'){
        echo 'Kolej Tun Syed Nasir';
    } elseif ($row['origin_id'] == 'KUO'){
        echo 'Kolej Ungku Omar';
    } elseif ($row['origin_id'] == 'FUU'){
        echo 'Kolej Ibrahim Yaakub';
    } elseif ($row['origin_id'] == 'FST'){
        echo 'Fakulti Undang Undang';
    } elseif ($row['origin_id'] == 'FPI'){
        echo 'Fakulti Pendidikan Islam';
    } elseif ($row['origin_id'] == 'FSK'){
        echo 'Fakulti Sains Kesihatan';
    } elseif ($row['origin_id'] == 'GSB'){
        echo 'Pusat Pengajian Siswazah Perniagaan, UKM-GSB';
    } else {
        echo 'Pusat Pengajian Citra Universiti';
    }
}
*/
?> 

