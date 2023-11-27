<?php
    include ('database.php');
    $mysqli = new mysqli($servername, $username, $password,$dbname);


    $stmt = $mysqli->prepare("SELECT * FROM tbl_products");
    $stmt->execute();
    
    $arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
    if(!$arr) exit('no rows');
    
    $stmt->close();
?>

<head>
    <style>
        /* Webpixels CSS */
/* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
/* URL: https://github.com/webpixels/css */

@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

/* .search-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 600px;
} */

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
                            <a href="seller_products" class="nav-link active">My Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="seller_add_product" class="nav-link font-regular">Add Products</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-12 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="search-form">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" placeholder="Please input at least first 2 characters of word">
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select>
                                                <option>Select</option>
                                                <!-- Add more categories here -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stock</label>
                                            <input type="number" placeholder="Min">
                                            <span>-</span>
                                            <input type="number" placeholder="Max">
                                        </div>
                                        <div class="form-group">
                                            <label>Sales</label>
                                            <input type="number" placeholder="Min">
                                            <span>-</span>
                                            <input type="number" placeholder="Max">
                                        </div>
                                        <div class="button-group">
                                            <button>Search</button>
                                            <button type="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                    
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Product(s)</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col" style="text-align: center">Price</th>
                                    <th scope="col" style="text-align: center">Product Type</th>
                                    <th scope="col" style="text-align: center">Product Origin</th>
                                    <th scope="col" style="text-align: center">Product Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($arr as $productlist) {
                                ?>
                                    <tr>
                                        <td>
                                            <img alt="..." src="img/<?php echo $productlist['pic'] ?>" style="width: 80" alt="No picture">
                                            &nbsp;&nbsp;
                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo $productlist['product_Name'] ?>
                                            </a>
                                        </td>
                                        <td style="text-align: center">
                                            RM X.XX
                                        </td>
                                        <td style="text-align: center">
                                            <?php echo $productlist['product_Type'] ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php echo $productlist['origin_id'] ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php echo $productlist['product_Description'] ?>
                                        </td>
                                        <td class="text-end" style="text-align: center">
                                            <a href="#" class="btn btn-sm btn-neutral">View</a>
                                            <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>

                                <!-- <tr>
                                    <td>
                                        <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Syarif
                                        </a>
                                    </td>
                                    <td>
                                        Oct 21, 2023
                                    </td>
                                    <td>
                                        <img alt="..." src="img/p001.png" class="avatar avatar-xs rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Baju KIY
                                        </a>
                                    </td>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>Processed
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="..." src="https://images.unsplash.com/photo-1610271340738-726e199f0258?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Alia Syahira
                                        </a>
                                    </td>
                                    <td>
                                        Apr 15, 2021
                                    </td>
                                    <td>
                                        <img alt="..." src="img/p002.png" class="avatar avatar-xs rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Baju KBH
                                        </a>
                                    </td>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-warning"></i>To Process
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="..." src="https://images.unsplash.com/photo-1610878722345-79c5eaf6a48c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Zaihasra
                                        </a>
                                    </td>
                                    <td>
                                        Mar 20, 2021
                                    </td>
                                    <td>
                                        <img alt="..." src="img/p003.png" class="avatar avatar-xs rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Baju VIC
                                        </a>
                                    </td>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>Processed
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="..." src="https://images.unsplash.com/photo-1612422656768-d5e4ec31fac0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Abu Hasnah
                                        </a>
                                    </td>
                                    <td>
                                        Feb 15, 2021
                                    </td>
                                    <td>
                                        <img alt="..." src="img/p004.png" class="avatar avatar-xs rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Lanyard FPI
                                        </a>
                                    </td>
                                    <td>
                                        20
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-dark"></i>Cancelled
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 4 items out of 4 results found</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>