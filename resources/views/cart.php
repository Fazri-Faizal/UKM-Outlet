<?php include 'header.php' ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cart</title>
  <style>
    @charset "utf-8";

@import url(https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap);

html,
html a {
  -webkit-font-smoothing: antialiased;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
}

body {
  background-color: #fff;
  color: #666;
  font-family: "Montserrat", sans-serif;
  font-size: 62.5%;
  margin: 0 auto;
}

a {
  border: 0 none;
  outline: 0;
  text-decoration: none;
}

strong {
  font-weight: bold;
}

p {
  margin: 0.75rem 0 0;
}

h1 {
  font-size: 16px;
  font-weight: normal;
  margin: 0;
  padding: 0;
}

input,
button {
  border: 0 none;
  outline: 0 none;
}

button {
  background-color: #804444;
  color: #fff;
  border-radius:5px;
}

button:hover,
button:focus {
  background-color: #555;
}


.basket-module,
.basket-labels,
.basket-product {
  width: 100%;
}

input,
button,
.basket,
.basket-module,
.basket-labels,
.item,
.price,
.quantity,
.subtotal,
.basket-product,
.product-image,
.product-details {
  float: left;
}

.price:before,
.subtotal:before,
.subtotal-value:before,
.total-value:before,
.promo-value:before {
  content: "RM ";
}

.hide {
  display: none;
}

main {
  clear: both;
  font-size: 16px;
  margin: 0 auto;
  overflow: hidden;
  padding: 1rem 0;
  width: 960px;
  display: flex;
  justify-content: space-between; /* This will space out the .basket and .summary */
  flex-wrap: wrap; /* Allows them to wrap into a new line on smaller screens */
}

.basket,.summary {
    flex: 1; /* This will make them grow to take up available space */
    padding: 1rem; /* Added padding for spacing, adjust as necessary */
    max-width: 100%;
}

.basket,
aside {
  padding: 0 2rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.basket {
    max-width: calc(100% - 2rem); /* Adjusted for padding */
}

.basket-module {
  color: #111;
}

label {
  display: block;
  margin-bottom: 0.3125rem;
}

.promo-code-field {
  border: 1px solid #804444;
  padding: 0.5rem;
  text-transform: uppercase;
  transition: all 0.2s linear;
  width: 48%;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -o-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.promo-code-field:hover,
.promo-code-field:focus {
  border: 1px solid #999;
}

.promo-code-cta {
  border-radius: 4px;
  font-size: 0.625rem;
  margin-left: 0.625rem;
  padding: 0.6875rem 1.25rem 0.625rem;
}

.basket-labels {
  /* border-top: 1px solid #ffbebe;
  border-bottom: 1px solid #ffbebe; */
  margin-top: 1.625rem;
  
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

li {
  color: #111;
  display: inline-block;
  padding: 0.625rem 0;
}

li.price:before,
li.subtotal:before {
  content: "";
}

.item {
  width: 55%;
}

.price,
.quantity,
.subtotal {
  width: 15%;
}

.subtotal {
  text-align: right;
}

.remove {
  bottom: 1.125rem;
  float: right;
  position: absolute;
  right: 0;
  text-align: right;
  width: 45%;

}

.remove button {
  background-color: transparent;
  color: #ff0000;
  float: none;
  /* text-decoration: underline; */
  text-transform: uppercase;
  cursor: pointer;
}

.item-heading {
  padding-left: 4.375rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.basket-product {
  border-bottom: 2px groove #ffbebe;
  padding: 1rem 0;
  position: relative;
}

.product-image {
  width: 40%;
}

.product-details {
  width: 60%;
}

.product-frame {
  /* border: 1px solid #804444; */
  border-radius: 10px;
  box-shadow: 7px 7px 7px #bfbfbf;
}

.product-details {
  padding: 0 1.5rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.quantity-field {
  background-color: #ffffff;
  border: 1px solid #aaa;
  border-radius: 4px;
  font-size: 12px;
  padding: 2px;
  width: 3.75rem;
  text-align: center;
}

aside {
  float: right;
  position: relative;
  width: 10%;
}

.summary {
  /* background-color: #fffcfc; */
  /* border: 1px solid #aaa; */
  padding: 1.3rem;
  position: fixed;
  border-radius: 10px;
  width: 400px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  box-shadow: 7px 7px 7px #bfbfbf;
  max-width: calc(30% - 2rem); /* Adjusted for padding */
  flex-basis: 300px; /* The summary won't shrink below 300px */
}

.summary-total-items {
  color: #666;
  font-size: 0.875rem;
  text-align: left;
  margin-bottom: 15px;
}
.bag {
  color: #666;
  font-size: 0.875rem;
  text-align: left;
}

.summary-subtotal,
.summary-total {
  border-top: 1px solid #804444;
  border-bottom: 1px solid #804444;
  clear: both;
  margin: 1rem 0;
  overflow: hidden;
  padding: 0.5rem 0;
}

.subtotal-title,
.subtotal-value,
.total-title,
.total-value,
.promo-title,
.promo-value {
  color: #111;
  float: left;
  width: 50%;
}

.summary-promo {
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}

.promo-title {
  float: left;
  width: 70%;
}

.promo-value {
  color: #8b0000;
  float: left;
  text-align: right;
  width: 30%;
}

.summary-delivery {
  padding-bottom: 3rem;
}

.subtotal-value,
.total-value {
  text-align: right;
}

.total-title {
  font-weight: bold;
  text-transform: uppercase;
}

.summary-checkout {
  display: block;
}

.checkout-cta {
  display: block;
  float: none;
  font-size: 0.75rem;
  text-align: center;
  text-transform: uppercase;
  padding: 0.625rem 0;
  width: 100%;
  cursor: pointer;
}

.summary-delivery-selection {
  background-color: #ffffff;
  border: 1px solid #aaa;
  border-radius: 4px;
  display: block;
  font-size: 15px;
  height: 34px;
  width: 100%;
}

@media screen and (max-width: 640px) {
  aside,
  .basket,
  .summary,
  .item,
  .remove {
    width: 100%;
  }
  .basket-labels {
    display: none;
  }
  .basket-module {
    margin-bottom: 1rem;
  }
  .item {
    margin-bottom: 1rem;
  }
  .product-image {
    width: 40%;
  }
  .product-details {
    width: 60%;
  }
  .price,
  .subtotal {
    width: 33%;
  }
  .quantity {
    text-align: center;
    width: 34%;
  }
  .quantity-field {
    float: none;
  }
  .remove {
    bottom: 0;
    text-align: left;
    margin-top: 0.75rem;
    position: relative;
  }
  .remove button {
    padding: 0;
  }
  .summary {
    margin-top: 1.25rem;
    position: relative;
  }
}

@media screen and (min-width: 641px) and (max-width: 960px) {
  aside {
    padding: 0 1rem 0 0;
  }
  .summary {
    width: 28%;
  }
}

@media screen and (max-width: 960px) {
  main {
    max-width: 100%;
  }
  .product-details {
    padding: 0 1rem;
  }
}

  </style>
</head>

<body>
  <main>
    <div class="basket">
        <!-- voucher -->
      <!-- <div class="basket-module">
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta">Apply</button>
      </div> -->
      <div class="bag"><strong style="font-size: 30px;">Cart</strong></div>
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Unit Price</li>
          <li class="quantity">Quantity</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="img/p001.png" alt="Placholder Image 2" class="product-frame" width="100%">
          </div>
          <div class="product-details">
            <h1><strong><!-- <span class="item-quantity">4</span> --> Eliza J Lace Sleeve Cuff Dress</strong></h1>
            <p><strong>Navy, Size 18</strong></p>
            <p>Product Code - 232321939</p>
          </div>
        </div>
        <div class="price">26.00</div>
        <div class="quantity">
          <input type="number" value="4" min="1" class="quantity-field">
        </div>
        <div class="subtotal">104.00</div>
        <div class="remove">
          <button>Delete</button>
        </div>
      </div>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="img/p002.png" alt="Placholder Image 2" class="product-frame" width="100%">
          </div>
          <div class="product-details">
            <h1><strong><!-- <span class="item-quantity">1</span> --> Whistles</strong> Amella Lace Midi Dress</h1>
            <p><strong>Navy, Size 10</strong></p>
            <p>Product Code - 232321939</p>
          </div>
        </div>
        <div class="price">26.00</div>
        <div class="quantity">
          <input type="number" value="1" min="1" class="quantity-field">
        </div>
        <div class="subtotal">26.00</div>
        <div class="remove">
          <button>Delete</button>
        </div>
      </div>
    </div>
    <aside>
      <div class="summary">
        <div class="summary-total-items"><strong style="font-size: 30px;">Summary</strong></div>
        <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
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
        <div class="summary-delivery">
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
            <a href="/checkout">
          <button class="checkout-cta">Go to Secure Checkout</button>
          </a>
        </div>
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

</script>