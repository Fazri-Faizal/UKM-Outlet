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
                                <input type="text" id="productName" name="productName" style="width: 100%" required>
                            </div>

                            <!-- <div class="form-group" style="display: inline-flex">
                                Product Variation 
                                &nbsp;	&nbsp;
                                <label class="switch">
                                    <input type="checkbox" id="prodVariation" onclick="variationHide()">
                                <span class="slider round"></span>
                            </label>
                            </div>

                            <div class="form-group" id="variationdiv" style="display: none; text-align: center;">
                                <button id="createFieldButton">Create New Size</button>
                                <style>input[type="text"]{
                                    width: 200px
                                }</style>
                                <div id="fieldContainer"></div>
                            </div>

                            <script>
                                var count = 0;
                                document.getElementById('createFieldButton').addEventListener('click', function() {
                                    count++;

                                    // Create a new breakline element
                                    var blank1 = document.createElement('br');
                                    var blank2 = document.createElement('br');

                                    // Create a new size input element
                                    var prodVarSize = document.createElement('input');
                                    prodVarSize.type = 'text';
                                    prodVarSize.name = 'prodVarSize';
                                    prodVarSize.placeholder = 'Size';
                                    prodVarSize.id = "prodSize" + count; //ProdSize1...
                                    
                                    // Create a new price input element
                                    var prodVarPrice = document.createElement('input');
                                    prodVarPrice.type = 'text';
                                    prodVarPrice.name = 'prodVarPrice';
                                    prodVarPrice.placeholder = 'Price (RM)';
                                    prodVarPrice.id = "prodPrice" + count; //ProdPrice1...

                                    // Create new space
                                    var nbsp = " "
                                    

                                    // Append the new input element to the container
                                    document.getElementById('fieldContainer').appendChild(blank1);
                                    document.getElementById('fieldContainer').appendChild(prodVarSize);
                                    document.getElementById('fieldContainer').append(nbsp);
                                    document.getElementById('fieldContainer').appendChild(prodVarPrice);
                                    document.getElementById('fieldContainer').appendChild(blank2);

                                    // Append send 
                                    document.getElementById('fieldContainer').appendChild();
                                });
                            </script>

                            <script>
                                function variationHide() {
                                    if(document.getElementById("prodVariation").checked == true) {
                                        document.getElementById("variationdiv").style.display = "";
                                        document.getElementById("divPrice").style.display = "none";
                                    }
                                    else {
                                        document.getElementById("variationdiv").style.display = "none";
                                        document.getElementById("divPrice").style.display = "";
                                    }
                                }
                            </script> -->

                            <div class="form-group" id="divPrice">
                                <label for="productPrice">Product Price:</label>
                                <input type="number" step="0.01" id="productPrice" name="productPrice" required>
                            </div>

                            <div class="form-group">
                                <label for="productType">Product Type:</label>
                                <select id="productType" name="productType">
                                    <option value="Jersey">Jersey</option>
                                    <option value="Lanyard">Lanyard</option>
                                    <option value="Hoodie">Hoodie</option>
                                    <option value="Cap">Cap</option>
                                    <option value="ToteBag">ToteBag</option>
                                </select>
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

                            <label for="productStock" id="labelStock">Product Stock: </label>

                            <br>
                            <br>

                            <div class="form-group" style="display: grid; grid-template-columns: auto auto auto auto auto auto auto; text-align: center; margin-bottom: -50px;">
                                <div id="productStockXS" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputXS" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center" placeholder="Stock (XS)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockS" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputS" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center" placeholder="Stock (S)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockM" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputM" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center" placeholder="Stock (M)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockL" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputL" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center" placeholder="Stock (L)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockXL" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputXL" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center" placeholder="Stock (XL)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockXXL" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputXXL" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center" placeholder="Stock (XXL)">
                                        </div>
                                    </div>
                                </div>

                                <div id="productStockXXXL" style="display: none">
                                    <div class="box">
                                        <div class="item">
                                            <input type="text" id="inputXXXL" name="stock[]" style="width: 78%; margin-top: -80px; text-align: center" placeholder="Stock (XXXL)">
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
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( xs.checked ) {
                                        document.getElementById("productStockXS").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " XS ";
                                    } else {
                                        document.getElementById("productStockXS").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' XS ', '');
                                    }
                                });

                                s.addEventListener( "change", () => {
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( s.checked ) {
                                        document.getElementById("productStockS").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " S ";
                                    } else {
                                        document.getElementById("productStockS").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' S ', '');
                                    }
                                });

                                m.addEventListener( "change", () => {
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( m.checked ) {
                                        document.getElementById("productStockM").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " M ";
                                    } else {
                                        document.getElementById("productStockM").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' M ', '');
                                    }
                                });

                                l.addEventListener( "change", () => {
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( l.checked ) {
                                        document.getElementById("productStockL").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " L ";
                                    } else {
                                        document.getElementById("productStockL").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' L ', '');
                                    }
                                });

                                xl.addEventListener( "change", () => {
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( xl.checked ) {
                                        document.getElementById("productStockXL").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " XL ";
                                    } else {
                                        document.getElementById("productStockXL").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' XL ', '');
                                    }
                                });

                                xxl.addEventListener( "change", () => {
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( xxl.checked ) {
                                        document.getElementById("productStockXXL").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " XXL ";
                                    } else {
                                        document.getElementById("productStockXXL").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' XXL ', '');
                                    }
                                });

                                xxxl.addEventListener( "change", () => {
                                    let label = document.getElementById("labelStock").innerHTML;

                                    if ( xxxl.checked ) {
                                        document.getElementById("productStockXXXL").style.display = "";
                                        document.getElementById("labelStock").innerHTML = label + " XXXL ";
                                    } else {
                                        document.getElementById("productStockXXXL").style.display = "none";
                                        document.getElementById("labelStock").innerHTML = label.replace(' XXXL ', '');
                                    }
                                });
                            </script>

                            <div class="form-group">
                                <label for="productOrigin">Product Origin:</label>
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
                            <div class="form-group">
                                <label for="productDescription">Product Description:</label>
                                <textarea id="productDescription" name="productDescription" rows="4" required></textarea>
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