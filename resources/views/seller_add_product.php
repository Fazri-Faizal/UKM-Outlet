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
                        <form action="/crud_add_product" method="get">
                            <div class="form-group">
                                <label for="productName">Product Name:</label>
                                <input type="text" id="productName" name="productName" required>
                            </div>
                            <div class="form-group">
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
                            <button type="submit" name="insertProduct">Add Product</button>
                        </form>
                    
                </div>
            </div>
        </main>
    </div>
</div>