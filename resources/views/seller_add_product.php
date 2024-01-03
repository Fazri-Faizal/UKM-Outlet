<?php 
    include_once'session.php';
    include 'database.php';
    
    $mysqli1 = new mysqli($servername, $username, $password, $dbname);
    $stmt1 = $mysqli1->prepare("SELECT * FROM tbl_customer WHERE username = '$sessionname'");
    $stmt1->execute();

    $handler = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);

    foreach($handler as $seller) {
      $sellerId = $seller['id'];
    }

    $stmt1->close();
?>

<head>
    <title>UKM Outlet Seller Products</title>
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

        /* Checkbox CSS START */
        body {
            background-color: #f7f2f2;
        }

        .box {
            padding: 2em;
        }

        .item {
            margin-bottom: 2em;
        }

        /* checkbox-rect2 */
        .checkbox-rect2 input[type="checkbox"] {
            display: none;
        }
        
        .checkbox-rect2 input[type="checkbox"] + label {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 20px;
            font: 14px/20px "Open Sans", Arial, sans-serif;
            /*cursor: pointer;*/
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        .checkbox-rect2 input[type="checkbox"]:hover + label:before { 
            border: 1px solid #343a3f;
            box-shadow: 2px 1px 0 #804444;
        }

        .checkbox-rect2 input[type="checkbox"] + label:last-child {
            margin-bottom: 0;
        }

        .checkbox-rect2 input[type="checkbox"] + label:before {
            content: "";
            display: block;
            width: 1.4em;
            height: 1.4em;
            border: 1px solid #343a3f;
            border-radius: 0.2em;
            position: absolute;
            left: 0;
            top: 0;
            -webkit-transition: all 0.2s, background 0.2s ease-in-out;
            transition: all 0.2s, background 0.2s ease-in-out;
            background: rgba(255, 255, 255, 0.03);
            box-shadow: -2px -1px 0 #804444;
            background: #f3f3f3;
        }

        .checkbox-rect2 input[type="checkbox"]:checked + label:before {
            border: 2px solid #fff;
            border-radius: 0.3em;
            background: #804444;
            box-shadow: 2px 1px 0 #804444;
        }
        /* checkbox-rect2 end */
        /* Checkbox CSS END */

        /* Dropdown CSS START */
        body {
            background: #111;
            /* font-family: 'Noto Sans', sans-serif; */
        }
        body .inner-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 50vh;
            gap: 20px;
        }
        body .white-wrapper {
            min-height: 50vh;
        }
        
        .hex-select {
            position: relative;
            display: inline-block;
            padding: 0.75rem 0;
            cursor: pointer;
        }
        .hex-select:after {
            content: '';
            width: 0.35rem;
            height: 0.35rem;
            display: block;
            position: absolute;
            inset: 50% 1rem auto auto;
            translate: 0 -75% 0;
            rotate: 0 0 1 45deg;
            border-right: 0.125rem solid #804444;
            border-bottom: 0.125rem solid #804444;
        }
        .hex-select select, .hex-select .custom-select {
            position: relative;
            appearance: none;
            background: transparent;
            color: #804444;
            font-family: inherit;
            height: 3.5rem;
            line-height: 3.5rem;
            outline: none;
            padding: 0 1.5rem;
            transition: all 0.35s ease-in-out;
            width: 400px;
            font-size: 14px;
            font-weight: 750;
            text-transform: uppercase;
            box-sizing: border-box;
            border: 1px solid #804444;
            border-radius: 0.35rem;
            cursor: pointer;
        }
        .hex-select .select-options {
            position: absolute;
            inset: 100% 0 auto;
            display: flex;
            flex-direction: column;
            background: #222;
            border: 1px solid #444;
            border-radius: 0.35rem;
            list-style: none;
            padding: 0;
            margin: 0.75rem 0;
            translate: 0 1rem 0;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            max-height: 250px;
            overflow-y: auto;
            transition: 0.35s ease-in-out all;
        }
        .hex-select .select-options li {
            height: 3rem;
            line-height: 3rem;
            outline: none;
            padding: 0 1.5rem;
            text-transform: none;
            letter-spacing: 0.025rem;
            border-bottom: 1px solid #333;
            cursor: pointer;
            transition: 0.35s ease-in-out all;
        }
        /* Dropdown CSS END */
    </style>
</head>

<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical" >
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="seller_dashboard" >
                <img src="\img\UKM OMELET LOGO 4.png"  alt="...">
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
                   
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <?php 
                include('seller_sidebar.php');

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
                            <h1 class="h2 mb-0 ls-tight">Products</h1>
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
                            <a href="seller_products" class="nav-link font-regular">My Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="seller_add_product" class="nav-link active">Add Products</a>
                        </li>
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
                    
                        <h2>Add New Product</h2>
                        <form action="/crud_add_product" method="get" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="productName">Product Name:</label>                       
                                <input type="text" id="productName" name="productName" style="width: 100%; border: 1px solid #804444;" required>
                            </div>

                            <div class="form-group" id="divPrice">
                                <label for="productPrice">Product Price:</label>
                                <input type="number" step="0.01" id="productPrice" name="productPrice" style="border: 1px solid #804444;" required>
                            </div>

                            <div class="form-group">
                                <label for="productType">Product Type:</label>

                                <div class="hex-select">
                                    <select id="productType" name="productType" style="width: 200px">
                                        <option value="Jersey">Jersey</option>
                                        <option value="Lanyard">Lanyard</option>
                                        <option value="Hoodie">Hoodie</option>
                                        <option value="Cap">Cap</option>
                                        <option value="ToteBag">ToteBag</option>
                                    </select>
                                </div>
                            </div>

                            <label for="productSize">Product Size:</label>

                            <div class="form-group" style="display: grid; grid-template-columns: auto auto auto auto auto auto auto; text-align: center; margin-bottom: -50px;">
                                <div>
                                    <div class="box">
                                        <div class="item">
                                            <div class="checkbox-rect2">
                                                <input type="checkbox" id="xs" name="size[]" value="XS">
                                                <label for="xs">XS</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="box">
                                        <div class="item">
                                            <div class="checkbox-rect2">
                                                <input type="checkbox" id="s" name="size[]" value="S">
                                                <label for="s">S</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="box">
                                        <div class="item">
                                            <div class="checkbox-rect2">
                                                <input type="checkbox" id="m" name="size[]" value="M">
                                                <label for="m">M</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="box">
                                        <div class="item">
                                            <div class="checkbox-rect2">
                                                <input type="checkbox" id="l" name="size[]" value="L">
                                                <label for="l">L</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="box">
                                        <div class="item">
                                            <div class="checkbox-rect2">
                                                <input type="checkbox" id="xl" name="size[]" value="XL">
                                                <label for="xl">XL</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="box">
                                        <div class="item">
                                            <div class="checkbox-rect2">
                                                <input type="checkbox" id="xxl" name="size[]" value="XXL">
                                                <label for="xxl">XXL</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="box">
                                        <div class="item">
                                            <div class="checkbox-rect2">
                                                <input type="checkbox" id="xxxl" name="size[]" value="XXXL">
                                                <label style="display: inline" for="xxxl">XXXL</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <!-- <br> -->
                            <!-- <br> -->

                            <label for="productStock" id="labelStock" style="display: none">Product Stock: </label>

                            <br>
                            <br>

                            <div class="form-group" style="display: grid; grid-template-columns: auto auto auto auto auto auto auto; text-align: center; margin-bottom: -50px;">
                                <div id="productStockXS" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputXS" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center; border: 1px solid #804444;" placeholder="Stock (XS)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockS" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputS" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center; border: 1px solid #804444;" placeholder="Stock (S)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockM" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputM" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center; border: 1px solid #804444;" placeholder="Stock (M)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockL" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputL" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center; border: 1px solid #804444;" placeholder="Stock (L)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockXL" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputXL" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center; border: 1px solid #804444;" placeholder="Stock (XL)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockXXL" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputXXL" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center; border: 1px solid #804444;" placeholder="Stock (XXL)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockXXXL" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputXXXL" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center; border: 1px solid #804444;" placeholder="Stock (XXXL)">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                let xs = document.getElementById("xs");
                                let s = document.getElementById("s");
                                let m = document.getElementById("m");
                                let l = document.getElementById("l");
                                let xl = document.getElementById("xl");
                                let xxl = document.getElementById("xxl");
                                let xxxl = document.getElementById("xxxl");

                                xs.addEventListener( "change", () => {
                                    let labeldoc = document.getElementById("labelStock");
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( xs.checked ) {
                                        document.getElementById("productStockXS").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " XS ";

                                        if(labeldoc.style.display = "none") {
                                            showlabel();
                                        }
                                    } else {
                                        document.getElementById("productStockXS").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' XS ', '');

                                        if(!s.checked && !m.checked && !l.checked && !xl.checked && !xxl.checked && !xxxl.checked) {
                                            hidelabel();
                                        }
                                    }
                                });

                                s.addEventListener( "change", () => {
                                    let labeldoc = document.getElementById("labelStock");
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( s.checked ) {
                                        document.getElementById("productStockS").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " S ";

                                        if(labeldoc.style.display = "none") {
                                            showlabel();
                                        }
                                    } else {
                                        document.getElementById("productStockS").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' S ', '');

                                        if(!xs.checked && !m.checked && !l.checked && !xl.checked && !xxl.checked && !xxxl.checked) {
                                            hidelabel();
                                        }
                                    }
                                });

                                m.addEventListener( "change", () => {
                                    let labeldoc = document.getElementById("labelStock");
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( m.checked ) {
                                        document.getElementById("productStockM").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " M ";

                                        if(labeldoc.style.display = "none") {
                                            showlabel();
                                        }
                                    } else {
                                        document.getElementById("productStockM").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' M ', '');

                                        if(!xs.checked && !s.checked && !l.checked && !xl.checked && !xxl.checked && !xxxl.checked) {
                                            hidelabel();
                                        }
                                    }
                                });

                                l.addEventListener( "change", () => {
                                    let labeldoc = document.getElementById("labelStock");
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( l.checked ) {
                                        document.getElementById("productStockL").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " L ";

                                        if(labeldoc.style.display = "none") {
                                            showlabel();
                                        }
                                    } else {
                                        document.getElementById("productStockL").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' L ', '');

                                        if(!xs.checked && !s.checked && !m.checked && !xl.checked && !xxl.checked && !xxxl.checked) {
                                            hidelabel();
                                        }
                                    }
                                });

                                xl.addEventListener( "change", () => {
                                    let labeldoc = document.getElementById("labelStock");
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( xl.checked ) {
                                        document.getElementById("productStockXL").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " XL ";

                                        if(labeldoc.style.display = "none") {
                                            showlabel();
                                        }
                                    } else {
                                        document.getElementById("productStockXL").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' XL ', '');

                                        if(!xs.checked && !s.checked && !m.checked && !l.checked && !xxl.checked && !xxxl.checked) {
                                            hidelabel();
                                        }
                                    }
                                });

                                xxl.addEventListener( "change", () => {
                                    let labeldoc = document.getElementById("labelStock");
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( xxl.checked ) {
                                        document.getElementById("productStockXXL").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " XXL ";

                                        if(labeldoc.style.display = "none") {
                                            showlabel();
                                        }
                                    } else {
                                        document.getElementById("productStockXXL").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' XXL ', '');

                                        if(!xs.checked && !s.checked && !m.checked && !l.checked && !xl.checked && !xxxl.checked) {
                                            hidelabel();
                                        }
                                    }
                                });

                                xxxl.addEventListener( "change", () => {
                                    let labeldoc = document.getElementById("labelStock");
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( xxxl.checked ) {
                                        document.getElementById("productStockXXXL").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " XXXL ";

                                        if(labeldoc.style.display = "none") {
                                            showlabel();
                                        }
                                    } else {
                                        document.getElementById("productStockXXXL").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' XXXL ', '');

                                        if(!xs.checked && !s.checked && !m.checked && !l.checked && !xl.checked && !xxl.checked) {
                                            hidelabel();
                                        }
                                    }
                                });

                                function hidelabel() {
                                    document.getElementById("labelStock").style.display = "none";
                                }

                                function showlabel() {
                                    document.getElementById("labelStock").style.display = "";
                                }
                            </script>

                            <div class="form-group">
                                <label for="productOrigin">Product Origin:</label>

                                <div class="hex-select">
                                    <select id="productOrigin" name="productOrigin">
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
                            </div>
                            <div class="form-group">
                                <label for="productDescription">Product Description:</label>
                                <textarea id="productDescription" name="productDescription" rows="4" style="border: 1px solid #804444;" required></textarea>
                            </div>

                            <!-- <label for="productImage">Product Image:</label>
                            <div class="upload-container" id="uploadFile" onclick="uploadFile()">
                                <label for="file-upload">
                                    <div class="upload-box">
                                        <div class="icon">📸</div>
                                        Add Image
                                        <div class="counter">(0/24)</div>
                                    </div>
                                </label>
                                <input type="file" id="file-upload" name="uploadfile" multiple>    
                            </div> -->

                            <!-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#video-about-us">
                                @icon('oi oi-play-circle') Watch a video about us
                            </button>

                            <x-modal id="video-about-us" title="Modal with embed video">
                                <x-slot name="body">
                                <x-embed src="https://www.youtube.com/embed/1La4QzGeaaQ" format="21x9"/>

                                <div class="text-muted mt-3">
                                    We are Unify a creative studio focusing on culture, luxury,
                                    editorial & art. Somewhere between sophistication and simplicity
                                </div>
                                </x-slot>

                                <x-slot name="footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </x-slot>
                            </x-modal> -->

                            <input type="hidden" name="sellerId" value="<?php echo $sellerId ?>"> 

                            <button type="submit" name="insertProduct">Add Product</button>
                        </form>

                        <script> 
                            function uploadFile() {
                                window.location.href='/upload'; 
                            }
                        </script>
                    
                </div>
            </div>
        </main>
    </div>
</div>