<?php 

include ('header.php');
include ('database.php');
 
 $mysqli = new mysqli($servername, $username, $password,$dbname);


$stmt = $mysqli->prepare("SELECT * FROM tbl_cart LEFT JOIN tbl_products ON tbl_cart.product_id = tbl_products.product_Id 
LEFT JOIN tbl_product_variation ON tbl_cart.product_id = tbl_product_variation.fld_product_id 
WHERE tbl_cart.product_size = tbl_product_variation.fld_product_size");
$stmt->execute();



$arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

if(!$arr) exit('no rows');

$stmt->close();

$stmt2 = $mysqli->prepare("SELECT * FROM tbl_customer WHERE username = '$sessionname'");
$stmt2->execute();

$result = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
 
foreach ($result as $row) {

  $name = $row['username'];
  $role = $row['role'];
  $user_email = $row['user_email'];
  $fullname = $row['Fullname'];
  $shop_add = $row['shop_add'];

}

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/checkout.css"/>
  <title>Checkout</title>
</head>

<body>
  <main>
    <div class="basket" style="margin-top:20px;">        
      <div class="bag"><strong style="font-size: 20px;">How would you like to get your item?</strong></div>
                <!-- <div class="delivery-select">
                    <div class="delivery-type">
                        <div class="item">
                            <div class="address-details">
                                <h1><strong> Delivery</strong></h1>
                            </div>
                        </div>
                    </div>
                    <div class="delivery-type">
                        <div class="item">
                            <div class="address-details">
                                <h1><strong> Pick Up</strong></h1>
                            </div>
                        </div>
                    </div>
                </div> -->
                
        <div class="container">
          <div class="plans"> 
            <label class="plan basic-plan" for="basic">
              <div>
                <button class="plan-content-method" id="delivery" onclick="editDelivery()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#804444" class="bi bi-truck" viewBox="0 0 16 16">
                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                  <div class="plan-details">
                    <span>Delivery</span>    
                  </div>
                </button>
              </div>             
            </label>

            <label class="plan complete-plan" for="complete">
              <div>
                <button class="plan-content-method" id="pickup" onclick="editPickup()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#804444" class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg>
                  <div class="plan-details">
                    <span>Pick Up</span>    
                  </div>
                </button>
              </div>
            </label>
          </div>
        </div> 
          
        <!-- Delivery Detail-->
        <div id="displayDelivery">
          <div style="margin-top: 30px;"><h3>Delivery Information</h3></div>
          <div class="basket-product">
            <div class="item">
              <div class="address-details">
                <h1><strong><!-- <span class="item-quantity">4</span> --> <?php echo $fullname ?></strong></h1>
                <p><?php echo $shop_add ?></p>
                <p>01165240426 </p>
              </div>
            </div>
                <!-- <div class="price">26.00</div>
                <div class="quantity">
                <input type="number" value="4" min="1" class="quantity-field">
                </div> -->
            <a href="/user-profile"><div class="update-address">Change</div></a>
          </div>  

          <!-- <div>
            <form>
              <label for="promocode">Have a Promo Code ?</label>
              <input type="text" id="promocode" name="promocode" placeholder="A068GG..">
            </form>
          </div> -->

          <div class="payment">
          <div style="margin-top: 30px;"><h3>How would you like to pay?</h3></div>
            <button class="content-payment" id="payment-method" onclick="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
              <div class="details-payment">
                <span>eWallet</span>    
              </div>
            </button>

            <button class="content-payment" id="payment-method" onclick="#">
              <img src="/img/fpx.png" alt="Italian Trulli" style="width: 64px;">
              <div class="details-payment">
                <span>Online Payment</span>    
              </div>
            </button>

            <button class="content-payment" id="payment-method" onclick="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
              </svg>
              <div class="details-payment">
                <span>Cash</span>    
              </div>
            </button>
        </div>
      </div>

        <!-- Pick Up Detail -->
        <div id="displayPickup" style="display:none">
        <div style="margin-top: 30px;"><h3>You can pick up your item at this location:</h3></div>
          <div class="basket-pickup" id="display-pickup-kolej" >
            <div class="pickup-content">
              
              <div class="item" style="margin-left: 20px;">
                <div class="address-details">
                  <h1><strong>KTHO</strong></h1>
                  <p>Kolej Tun Hussein Onn</p>
                  <p style="margin-top:1px">Bilik Kinabalu</p>
                  <p>Syarif : 01165240426</p>
                </div>
              </div>
            </div>
          </div>

          <div class="payment">
          <div style="margin-top: 30px;"><h3>How would you like to pay?</h3></div>
            <button class="content-payment" id="payment-method" onclick="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
              <div class="details-payment">
                <span>eWallet</span>    
              </div>
            </button>

            <button class="content-payment" id="payment-method" onclick="#">
              <img src="/img/fpx.png" alt="Italian Trulli" style="width: 64px;">
              <div class="details-payment">
                <span>Online Payment</span>    
              </div>
            </button>

            <button class="content-payment" id="payment-method" onclick="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
              </svg>
              <div class="details-payment">
                <span>Cash</span>    
              </div>
            </button>
        </div>
      </div>

        </div>
      </div> 

        <!-- Payment Detail -->
        <!-- <div id="displayPayment" class="basket-payment">
          <div style="margin-top: 30px;margin-left: 20px;"><h3>Have a Promo Code ?</h3></div>
              <div class="item">
                <div class="address-details">
                  <form>
                    <label for="promocode">Have a Promo Code ?</label>
                    <input type="text" id="promocode" name="promocode" placeholder="A068GG..">
                  </form>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <form>
            <label for="promocode">Have a Promo Code ?</label>
            <input type="text" id="promocode" name="promocode" placeholder="A068GG..">
          </form> -->
        <!-- </div> -->



      <aside>
        <div class="summary">
          <div class="summary-total-items"><strong style="font-size: 30px;">Order Summary</strong></div>
          <!-- <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div> -->
            <div class="summary-subtotal">
              <div class="subtotal-title">Subtotal</div>
              <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
              <div class="subtotal-title">Shipping subtotal</div>
              <div class="subtotal-value final-value">0.00</div>
              <div class="summary-promo hide">
              <div class="promo-title">Promotion</div>
              <div class="promo-value final-value" id="basket-promo"></div>
            </div>
        </div>
        <?php
                $count = 1;
                
                foreach($arr as $ukmcart) { 

                    // if($count == 4) {
                    //     $count = 1;
                    //     echo '</tr>';
                    //     echo '<tr>';
                    // }
                    $cid=$ukmcart['cart_id'];
                    $id=$ukmcart['customer_id'];
                    $count++;
            ?>
            <div class="summary-delivery">
                <div class="product-details">
                  <h1><strong><!-- <span class="item-quantity">4</span> --> <?php echo $ukmcart['product_Name'] ?></strong></h1>
                  Quantity :  <strong><?php echo $ukmcart['quantity']; ?></strong>
                  
              </div>
              <hr>
              
              <?php 
                }
        ?>
            <div>
              <!-- <select name="delivery-collection" class="summary-delivery-selection">
                  <option value="0" selected="selected">Select Collection or Delivery</option>
                  <option value="collection">Collection</option>
                  <option value="first-class">Royal Mail 1st Class</option>
                  <option value="second-class">Royal Mail 2nd Class</option>
                  <option value="signed-for">Royal Mail Special Delivery</option>
              </select> -->
          </div>
          <div class="summary-total">
            <div class="total-title">Total</div>
            <div class="total-value final-value" id="basket-total">130.00</div>
          </div>
          <div class="summary-checkout">
              <!-- <a href="/checkout">
            <button class="checkout-cta">Go to Secure Checkout</button>
            </a> -->
          </div>
      </aside>
  </main>
</body>
</html>
<script>
/* Set values + misc */
var promoCode;
var promoPrice;
var fadeTime = 300;
/* Assign actions */
document.querySelectorAll(".quantity input").forEach(function (input) {
  input.addEventListener("change", function () {
    updateQuantity(this);
  });
});
document.querySelectorAll(".remove button").forEach(function (button) {
  button.addEventListener("click", function () {
    removeItem(this);
  });
});
document.addEventListener("DOMContentLoaded", function () {
  updateSumItems();
});
document.querySelectorAll(".promo-code-cta").forEach(function (cta) {
  cta.addEventListener("click", function () {
    promoCode = document.querySelector("#promo-code").value;
    if (promoCode == "10off" || promoCode == "10OFF") {
      //If promoPrice has no value, set it as 10 for the 10OFF promocode
      if (!promoPrice) {
        promoPrice = 10;
      } else if (promoCode) {
        promoPrice = promoPrice * 1;
      }
    } else if (promoCode != "") {
      alert("Invalid Promo Code");
      promoPrice = 0;
    }
    //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
    if (promoPrice) {
      document.querySelector(".summary-promo").classList.remove("hide");
      document.querySelector(".promo-value").textContent = promoPrice.toFixed(2);
      recalculateCart(true);
    }
  });
});
/* Recalculate cart */
function recalculateCart(onlyTotal) {
  var subtotal = 0;
  /* Sum up row totals */
  document.querySelectorAll(".basket-product").forEach(function (product) {
    subtotal += parseFloat(product.querySelector(".subtotal").textContent);
  });
  /* Calculate totals */
  var total = subtotal;
  //If there is a valid promoCode, and subtotal < 10 subtract from total
  var promoPrice = parseFloat(document.querySelector(".promo-value").textContent);
  if (promoPrice) {
    if (subtotal >= 10) {
      total -= promoPrice;
    } else {
      alert("Order must be more than £10 for Promo code to apply.");
      document.querySelector(".summary-promo").classList.add("hide");
    }
  }
  /*If switch for update only total, update only total display*/
  if (onlyTotal) {
    /* Update total display */
    var totalValue = document.querySelector(".total-value");
    totalValue.style.display = "none";
    totalValue.innerHTML = total.toFixed(2);
    totalValue.style.display = "block";
  } else {
    /* Update summary display. */
    var finalValue = document.querySelector(".final-value");
    finalValue.style.display = "none";
    document.querySelector("#basket-subtotal").innerHTML = subtotal.toFixed(2);
    document.querySelector("#basket-total").innerHTML = total.toFixed(2);
    if (total == 0) {
      document.querySelector(".checkout-cta").style.display = "none";
    } else {
      document.querySelector(".checkout-cta").style.display = "block";
    }
    finalValue.style.display = "block";
  }
}
/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate line price */
  var productRow = quantityInput.parentNode.parentNode;
  var price = parseFloat(productRow.querySelector(".price").textContent);
  var quantity = quantityInput.value;
  var linePrice = price * quantity;
  /* Update line price display and recalc cart totals */
  productRow.querySelectorAll(".subtotal").forEach(function (subtotal) {
    subtotal.style.display = "none";
    subtotal.textContent = linePrice.toFixed(2);
    recalculateCart();
    subtotal.style.display = "block";
  });
  productRow.querySelector(".item-quantity").textContent = quantity;
  updateSumItems();
}
function updateSumItems() {
  var sumItems = 0;
  document.querySelectorAll(".quantity input").forEach(function (input) {
    sumItems += parseInt(input.value);
  });
  document.querySelector(".total-items").textContent = sumItems;
}
/* Remove item from cart */
function removeItem(removeButton) {
  /* Remove row from DOM and recalc cart total */
  var productRow = removeButton.parentNode.parentNode;
  productRow.style.display = "none";
  productRow.remove();
  recalculateCart();
  updateSumItems();
}

$("select").on("click" , function() {
  
  $(this).parent(".select-box").toggleClass("open");
  
});

$(document).mouseup(function (e)
{
    var container = $(".select-box");

    if (container.has(e.target).length === 0)
    {
        container.removeClass("open");
    }
});


$("select").on("change" , function() {
  
  var selection = $(this).find("option:selected").text(),
      labelFor = $(this).attr("id"),
      label = $("[for='" + labelFor + "']");
    
  label.find(".label-desc").html(selection);
    
});

function editDelivery() {
  if(document.getElementById("delivery").classList.contains("editDeliveryactive")) {

    document.getElementById("displayPickup").style.display = "none";

    document.getElementById("displayDelivery").style.display = "";
    document.getElementById("displayPayment").style.display = "";

  } else {
    document.getElementById("delivery").classList.add('editDeliveryactive');
    editDelivery();
  }
}

function editPickup() {
  if(document.getElementById("pickup").classList.contains("editPickupactive")) {

    document.getElementById("displayPickup").style.display = "";

    document.getElementById("displayDelivery").style.display = "none"; 
    document.getElementById("displayPayment").style.display = "";

    
  } else {
    document.getElementById("pickup").classList.add('editPickupactive');
    editPickUp();
  }
}
</script>