<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cart.css"/>
    <title>Cart</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<body style="text-align:center;">
    <table class="product-list">
        <tr style="bgcolor: #556B2F;" >
            <h2 style="color: #804444; face: verdana; text-align: center; padding-top: 20px; padding-bottom: 20px">CART</h2>
        </tr>
        <tr> 
            <td>    
              <div class="card">
                <div class="cart-box">
                    <input type="checkbox" name="tick" id="chckbox">
                    <span class="seller-name">Lagenda KIY <i class="fa fa-comments" aria-hidden="true"></i></span>      
                </div>
                <hr>
                <div class="cart-content">
                   <div>
                        <img id="cart-img" src="/img/Jersey-1 cropped.png" alt="">
                   </div>  
                   <div>
                    <h3 id="cart-header">Jersey UKM 2022</h3> 
                    <br>
                    <p id="cart-header"> Variations: Black , S</p>
                   </div>
                   <div>
                   <h3 id="cart-header" style="cursor:context-menu;">Price</h3>
                    <br>
                    <p id="cart-header"><s>RM 45</s> <?php $bef=(40);?>RM <?=$bef?></p>                   
                   </div>
                   <div>
                   <h4 id="cart-header" style="cursor:context-menu;">Quantity </h4>
                    <br>
                    <div class="wrapper" style="margin-right:35px; margin-top: 10px;">
                            <span class="minus">-</span>
                            <span class="num">01</span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div>
                   <h3 id="cart-header" style="cursor:context-menu; margin-left:60px;">Total</h3>
                    <br>
                    <p id="cart-header" style="margin-left:60px; color:red;">RM <?=$bef*2?></p>                   
                   </div> 
                   <div>
                   </div> 
                </div>   
              </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="card">
                <div class="cart-box">
                    <input type="checkbox" name="tick" id="chckbox">
                    <span class="seller-name">Fazri Faizal <i class="fa fa-comments" aria-hidden="true"></i></span>      
                    </div>
                    <hr>
                <div class="cart-content">
                   <div>
                        <img id="cart-img" src="/img/Jersey-1 cropped.png" alt="">
                   </div>  
                   <div>
                    <h3 id="cart-header">Jersey UKM 2022</h3> 
                    <br>
                    <p id="cart-header"> Variations: Black , S</p>
                   </div>
                   <div>
                   <h3 id="cart-header" style="cursor:context-menu;">Price</h3>
                    <br>
                    <p id="cart-header"><s>RM 45</s> <?php $bef=(40);?>RM <?=$bef?></p>                   
                   </div>
                   <div>
                   <h4 id="cart-header" style="cursor:context-menu;">Quantity </h4>
                    <br>
                    <div class="wrapper" style="margin-right:35px; margin-top: 10px;">
                            <span class="minus">-</span>
                            <span class="num">01</span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div>
                   <h3 id="cart-header" style="cursor:context-menu; margin-left:60px;">Total</h3>
                    <br>
                    <p id="cart-header" style="margin-left:60px; color:red;">RM <?=$bef*2?></p>                   
                   </div> 
                   <div>
                   </div> 
                </div>   
              </div>
            </div>
            <div class="card">
                <div class="cart-box">
                    <input type="checkbox" name="tick" id="chckbox">
                    <span class="seller-name">Lagenda KIY <i class="fa fa-comments" aria-hidden="true"></i></span>      
                </div>
                <hr>
                <div class="cart-content">
                   <div>
                        <img id="cart-img" src="/img/Jersey-1 cropped.png" alt="">
                   </div>  
                   <div>
                    <h3 id="cart-header">Jersey UKM 2022</h3> 
                    <br>
                    <p id="cart-header"> Variations: Black , S</p>
                   </div>
                   <div>
                   <h3 id="cart-header" style="cursor:context-menu;">Price</h3>
                    <br>
                    <p id="cart-header"><s>RM 45</s> <?php $bef=(40);?>RM <?=$bef?></p>                   
                   </div>
                   <div>
                   <h4 id="cart-header" style="cursor:context-menu;">Quantity </h4>
                    <br>
                    <div class="wrapper" style="margin-right:35px; margin-top: 10px;">
                            <span class="minus">-</span>
                            <span class="num">01</span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div>
                   <h3 id="cart-header" style="cursor:context-menu; margin-left:60px;">Total</h3>
                    <br>
                    <p id="cart-header" style="margin-left:60px; color:red;">RM <?=$bef*2?></p>                   
                   </div> 
                   <div>
                   </div> 
                </div>   
              </div>
            <div class="card-checkout">
                <table class="checkout-content">
                    <tr style="checkout-row">
                        <td style="visibility:hidden;">
                            Platform Voucher
                        </td>
                        <td style="visibility:hidden;">
                            Platform Voucher
                        </td>
                        <td style="display:inline-flex;">
                            <img src="img/vouchers/voucher.png" alt="" width="20px" style="margin-right:5px;">Platform Voucher
                        </td>
                        <td style="height: 50px;">
                            Select or enter code
                        </td>
                    </tr>
                    <tr>
                    <td style="visibility:hidden;">
                            Platform Voucher
                        </td>
                        <td style="visibility:hidden;">
                            Platform Voucher
                        </td>
                        <td style="display:inline-flex; visibility:hidden;">
                            <img src="img/vouchers/voucher.png" alt="" width="20px" style="margin-right:5px;">Platform Voucher
                        </td>
                        <td style="visibility:hidden;">
                            Select or enter code
                        </td>
                    </tr>
                    <tr>
                    <td style="text-align:left;">
                            <input type="checkbox"  id="" onchange="checkAll(this)"><span style="margin-right:20px;">Select All</span><span>Delete All</span>
                        </td>
                        <td style="visibility:hidden;">
                            Platform Voucher
                        </td>
                        <td style="display:inline-flex; padding: 9px;">
                            Total (2 items): <span style="font-size:1.5rem; color:red; margin-left:10px; margin-bottom: 5px;">RM 240</span>
                        </td>
                        <td>
                            <?php include 'button_checkout.php' ?>
                        </td>
                    </tr>
                </table>
            </div>
            </td>
        </tr>
    </table>  
    <script type="text/javascript">
const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num = document.querySelector(".num");
    let a = 1;
    plus.addEventListener("click", ()=>{
      a++;
      a = (a < 10) ? "0" + a : a;
      num.innerText = a;
    });

    minus.addEventListener("click", ()=>{
      if(a > 1){
        a--;
        a = (a < 10) ? "0" + a : a;
        num.innerText = a;
      }
    });
    function checkAll(e) {
    var checkboxes = document.getElementsByName('tick');
 
    if (e.checked) {
         for (var i = 0; i < checkboxes.length; i++) { 
              checkboxes[i].checked = true;
         }
    } else {
         for (var i = 0; i < checkboxes.length; i++) {
              checkboxes[i].checked = false;
         }
    }
}
 
    </script>
    
    <?php include 'footer.php' ?>
</body>
</html>