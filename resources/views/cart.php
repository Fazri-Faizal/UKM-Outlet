<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title>Cart List</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/cart.css">
  
  </head>
  <body> 
    <main>
        <header id="site-header">
            <div class="container">
                <h1>Cart</h1>
            </div>
        </header>

        <div class="container">

            <section id="cartlist"> 
                <article class="product">
                    <header>
                        <a class="remove">
                            <img src="./img/P003.png">

                            <h3>Remove product</h3>
                        </a>
                    </header>

                    <div class="content">

                        <h1>Baju FTSM</h1>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis perspiciatis ea ad omnis provident laborum dolore in atque. 

                        <div title="You have selected this product to be shipped in the color yellow." style="top: 0" class="color yellow"></div>
                        <div style="top: 43px" class="type small">XXL</div>
                    </div>

                    <footer class="content">
                        <span class="qt-minus">-</span>
                        <span class="qt">2</span>
                        <span class="qt-plus">+</span>

                        <h2 class="full-price">
                            29.98€
                        </h2>

                        <h2 class="price">
                            14.99€
                        </h2>
                    </footer>
                </article>

                <article class="product">
                    <header>
                        <a class="remove">
                            <img src="./img/P006.png" alt="Keyboard">

                            <h3>Remove product</h3>
                        </a>
                    </header>

                    <div class="content">

                        <h1>PC SIG</h1>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis perspiciatis ea ad omnis provident laborum dolore in atque.

                        <div title="You have selected this product to be shipped in the color red." style="top: 0" class="color red"></div>
                        <div title="You have selected this product to be shipped sized Small."  style="top: 43px" class="type small">M</div>
                    </div>

                    <footer class="content">
                        
                        <span class="qt-minus">-</span>
                        <span class="qt">1</span>
                        <span class="qt-plus">+</span>

                        <h2 class="full-price">
                            79.99€
                        </h2>

                        <h2 class="price">
                            79.99€
                        </h2>
                    </footer>
                </article>

                <article class="product">
                    <header>
                        <a class="remove">
                            <img src="./img/P009.png" alt="Handfree">

                            <h3>Remove product</h3>
                        </a>
                    </header>

                    <div class="content">

                        <h1>FPER new Lanyard</h1>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis perspiciatis ea ad omnis provident laborum dolore in atque.

                        <div title="You have selected this product to be shipped in the color blue." style="top: 0" class="color blue"></div>
                        <div style="top: 43px" class="type small">Large</div>
                    </div>

                    <footer class="content">
                        
                        <span class="qt-minus">-</span>
                        <span class="qt">3</span>
                        <span class="qt-plus">+</span>

                        <h2 class="full-price">
                            53.99€
                        </h2>

                        <h2 class="price">
                            17.99€
                        </h2>
                    </footer>
                </article>

            </section>

        </div>

        <footer id="site-footer">
            <div class="container clearfix">

                <div class="left">
                    <h2 class="subtotal">Subtotal: <span>163.96</span>€</h2>
                    <h3 class="tax">Taxes (5%): <span>8.2</span>€</h3>
                    <h3 class="shipping">Shipping: <span>5.00</span>€</h3>
                </div>

                <div class="right">
                    <h1 class="total">Total: <span>177.16</span>€</h1>
                    <!-- <button class="btn">Checkout</button> -->
                    <?php include 'button_checkout.php' ?>
                </div>

            </div>
        </footer>
        
    </main>
    
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="./js/cart.js"></script> 
    <?php include 'footer.php' ?>
  </body>
</html>