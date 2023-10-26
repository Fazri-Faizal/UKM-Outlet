<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link rel="stylesheet" href="css/user-profile.css">
    </head>

    <?php 
        include('header.php');
    ?>
   
<body>
<div class="container mt-4 mb-4">
        <div class="row">
            <!-- Navbar -->
            <div class="col-lg-3 my-lg-0 my-md-1">
                <div id="sidebar" class="bg-purple">
                    <div class="h4 text-white">Account</div>
                    <ul>
                        <!-- <li class="active">
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-box pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Account</div>
                                    <div class="link-desc">View & Manage orders and returns</div>
                                </div>
                            </a>
                        </li> -->
                        <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="far fa-user pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Profile</div>
                                    <div class="link-desc">Change your profile details & password</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="far fa-address-book pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Address Book</div>
                                    <div class="link-desc">View & Manage Addresses</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-box-open pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Orders</div>
                                    <div class="link-desc">View & Manage orders and returns</div>
                                </div>
                            </a>
                        </li>
                        <!-- Not needed -->
                        <!-- <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-headset pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Help & Support</div>
                                    <div class="link-desc">Contact Us for help and support</div>
                                </div>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <!-- My Orders -->
            <div class="col-lg-9 my-lg-0 my-1">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <div class="h5">Hello Abu Ahmad,</div>
                        <div>Logged in as: abu&ahmad@gmail.com</div>
                    </div>
                    <div class="d-flex my-4 flex-wrap">
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Orders placed</div>
                                <div class="ms-auto number">2</div>
                            </div>
                        </div>
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Items in Cart</div>
                                <div class="ms-auto number">8</div>
                            </div>
                        </div>
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/love-png/love-png-heart-symbol-wikipedia-11.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Wishlist</div>
                                <div class="ms-auto number">10</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-uppercase">My recent orders</div>
                    <div class="order my-3 bg-light">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                        <div class="text-uppercase">Order #UKMOutletO01</div>
                                        <div class="blue-label ms-auto text-uppercase">paid</div>
                                    </div>
                                    <div class="fs-8">Jersey UKM 2022</div>
                                    <div class="fs-8">Baju FTSM</div>
                                    <div class="fs-8">24 August, 2020 | 12:50 PM</div>
                                    <div class="rating d-flex align-items-center pt-1">
                                        <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png"
                                            alt=""><span class="px-2">Rating:</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                    <div class="status">Status : Delivered</div>
                                    <div class="btn btn-primary text-uppercase">order info</div>
                                </div>
                                <div class="progressbar-track">
                                    <ul class="progressbar">
                                        <li id="step-1" class="text-muted green">
                                            <span class="fas fa-gift"></span>
                                        </li>
                                        <li id="step-2" class="text-muted green">
                                            <span class="fas fa-check"></span>
                                        </li>
                                        <li id="step-3" class="text-muted green">
                                            <span class="fas fa-box"></span>
                                        </li>
                                        <li id="step-4" class="text-muted green">
                                            <span class="fas fa-truck"></span>
                                        </li>
                                        <li id="step-5" class="text-muted green">
                                            <span class="fas fa-box-open"></span>
                                        </li>
                                    </ul>
                                    <div id="tracker"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order my-3 bg-light">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                        <div class="text-uppercase">Order #UKMOutletO02</div>
                                        <div class="green-label ms-auto text-uppercase">cod</div>
                                    </div>
                                    <div class="fs-8">KDO Official Lanyard</div>
                                    <div class="fs-8">FSSK Sports Tote Bag</div>
                                    <div class="fs-8">UKM Farmasi Cap</div>
                                    <div class="fs-8">22 August, 2020 | 05:30 PM</div>
                                    <div class="rating d-flex align-items-center pt-1">
                                        <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png"
                                            alt=""><span class="px-2">Rating:</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                    <div class="status">Status : Delivered</div>
                                    <div class="btn btn-primary text-uppercase">order info</div>
                                </div>
                                <div class="progressbar-track">
                                    <ul class="progressbar">
                                        <li id="step-1" class="text-muted green">
                                            <span class="fas fa-gift"></span>
                                        </li>
                                        <li id="step-2" class="text-muted">
                                            <span class="fas fa-check"></span>
                                        </li>
                                        <li id="step-3" class="text-muted">
                                            <span class="fas fa-box"></span>
                                        </li>
                                        <li id="step-4" class="text-muted">
                                            <span class="fas fa-truck"></span>
                                        </li>
                                        <li id="step-5" class="text-muted">
                                            <span class="fas fa-box-open"></span>
                                        </li>
                                    </ul>
                                    <div id="tracker"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Profile -->
            <div class="col-lg-9 my-lg-0 my-1" style="display:none">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <div class="h5">Hello Abu Ahmad,</div>
                        <div>Logged in as: abu&ahmad@gmail.com</div>
                        <button class="button-edit">Change Profile Information
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </div>
                    <div>
                        <img src="/img/user.jpg" class="profile" alt="profile picture">
                    </div>
                    <div class="bg-white border" style="border-radius: 20px;margin-top: 20px;">
                        <div class="info-group">
                            <label>Username</label>
                            <p style="display:none">Kazi Mahbub</p>
                            <!-- edit profile mode -->  
                            <p><input type="text" name="login" value="" placeholder="Kazi Mahbub"></p>    
                        </div>

                        <div class="info-group">
                            <label>Password</label>
                            <p style="display:none">********</p>
                            <!-- edit profile mode -->
                            <p><input placeholder='Isazalyforever' type="text"></p>

                        </div>

                        <div class="info-group">
                            <label>Date Of Birth</label>
                            <p style="display:none">20/01/2022</p>
                            <!-- edit profile mode -->
                            <p><input placeholder='20/01/2022' type="text"></p>
                        </div>

                        <div class="info-group">
                            <label>Gender</label>
                            <p style="display:none">Male</p>
                            <!-- edit mode -->
                            <p>
                                <input type="radio" name="gender" id="male" checked>
                                <label for="male">Male</label>
                                <input type="radio" name="gender" id="female">
                                <label for="female">Female</label>
                            </p>
                        </div>

                        <div class="info-group">
                            <label>Phone Number</label>
                            <p style="display:none">+90-123456789</p>
                            <!-- edit profile mode -->
                            <p><input placeholder='+90-123456789' type="text"></p>
                        </div>

                        <div class="info-group">
                            <label>Email</label>
                            <p style="display:none">abcd1234@email.com</p>
                            <!-- edit profile mode -->
                            <p><input placeholder='abcd1234@email.com' type="text"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My address -->
            <div class="col-lg-9 my-lg-0 my-1"  style="display:none">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <div class="h5">Hello Abu Ahmad,</div>
                        <div>Logged in as: abu&ahmad@gmail.com</div>         
                    </div>
                    <div class="address-section">
                        <h2>Saved Addresses</h2>

                        <div class="address-card">
                            <p>No 34 Jalan Laman Delfina 1/4, Laman Delfina,</p>
                            <p>Nilai Impian,</p>
                            <p>Nilai, 05, 71800</p>
                            <input type="radio" name="default-address" id="address1" checked>
                            <label for="address1">Default Delivery Address</label>
                            <button class="button-edit-address">Edit</button>
                            <button class="button-remove-address">Remove</button>
                        </div>

                        <div class="address-card">
                            <p>No 17, Jalan 1/3C Seksyen 1</p>
                            <p>Bandar Baru Bangi, 10, 43650</p>
                            <input type="radio" name="default-address" id="address2">
                            <label for="address2">Default Delivery Address</label>
                            <button class="button-edit-address">Edit</button>
                            <button class="button-remove-address">Remove</button>
                        </div>
                        <button class="add-new">+ Add New Address</button>
                        <div class="info-group"  style="display:none">
                            <label>Address</label>
                            <!-- <p><input placeholder='No 34 Jalan Laman Delfina 1/4, Laman Delfina,71800 Nilai Impian' style="width:100%" type="text" id=address></p> -->
                            <p><textarea id=address cols="90" rows="5" placeholder='No 34 Jalan Laman Delfina 1/4, Laman Delfina,71800 Nilai Impian'></textarea></p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

    <?php include 'footer.php' ?>
  </body>
</html>