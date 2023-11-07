<?php include 'header.php' ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout</title>
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

.delivery-type {
    width: 50%;
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
.product-details,
.delivery-type {
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
    max-width: 70%
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

.update-address {
padding: 30px;
text-align: right;
cursor: pointer;
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
    border: 1px solid #aaa;
padding: 1.3rem;
  position: fixed;
  border-radius: 10px;
  position: relative;
  margin: 30px 10px 10px 10px
}

.delivery-type {
border: 1px solid #aaa;
padding: 1.3rem;
  position: fixed;
  border-radius: 10px;
  position: relative;
  margin: 30px 10px 10px 10px;
  display: inline;
  
}


.product-image {
  width: 40%;
}

.product-details {
  width: 60%;
}
.address-details {
  width: 100%;
}

.product-frame {
  border: 1px solid #f2f2f2;
  border-radius: 10px;
  
}

.product-details {
  padding: 0 3rem;
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

.checkoutbox {
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
  .delivery-select {
    display: flex;
    justify-content: start;
    align-items: center;
    flex-wrap: nowrap; /* Prevents wrapping of child elements */
    gap: 20px; /* Optional: Adds space between the two boxes */
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
.plans {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;

  max-width: 970px;
  /* padding: 85px 50px; */
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  background: #fff;
  border-radius: 20px;
  /* -webkit-box-shadow: 0px 8px 10px 0px #d8dfeb;
  box-shadow: 0px 8px 10px 0px #d8dfeb; */
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  padding-top: 20px;
}

.plans .plan input[type="radio"] {
  position: absolute;
  opacity: 0;
}

.plans .plan {
  cursor: pointer;
  width: 48.5%;
}

.plans .plan .plan-content {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding: 30px;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  border: 2px solid #e1e2e7;
  border-radius: 10px;
  -webkit-transition: -webkit-box-shadow 0.4s;
  transition: -webkit-box-shadow 0.4s;
  -o-transition: box-shadow 0.4s;
  transition: box-shadow 0.4s;
  transition: box-shadow 0.4s, -webkit-box-shadow 0.4s;
  position: relative;
}

.plans .plan .plan-content img {
  margin-right: 30px;
  height: 72px;
}

.plans .plan .plan-details span {
    margin-bottom: 10px;
    display: block;
    font-size: 20px;
    line-height: 24px;
    color: #252f42;
    padding-top: 14px;
    padding-left: 20px;
}

.container .title {
  font-size: 20px;
  font-weight: 500;
  -ms-flex-preferred-size: 100%;
  flex-basis: 100%;
  color: #252f42;
  margin-bottom: 20px;
}

/* .plans .plan .plan-details span {
  color: #646a79;
  font-size: 14px;
  line-height: 18px;
} */

.plans .plan .plan-content:hover {
  -webkit-box-shadow: 0px 3px 5px 0px #e8e8e8;
  box-shadow: 0px 3px 5px 0px #e8e8e8;
}

.plans .plan input[type="radio"]:checked + .plan-content:after {
  content: "";
  position: absolute;
  height: 8px;
  width: 8px;
  background: #216fe0;
  right: 20px;
  top: 20px;
  border-radius: 100%;
  border: 3px solid #fff;
  -webkit-box-shadow: 0px 0px 0px 2px #0066ff;
  box-shadow: 0px 0px 0px 2px #0066ff;
}

.plans .plan input[type="radio"]:checked + .plan-content {
  border: 2px solid #216ee0;
  background: #eaf1fe;
  -webkit-transition: ease-in 0.3s;
  -o-transition: ease-in 0.3s;
  transition: ease-in 0.3s;
}

@media screen and (max-width: 991px) {
  .plans {
    margin: 0 20px;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    padding: 40px;
  }

  .plans .plan {
    width: 100%;
  }

  .plan.complete-plan {
    margin-top: 20px;
  }

  .plans .plan .plan-content .plan-details {
    width: 70%;
    display: inline-block;
    
  }

  .plans .plan input[type="radio"]:checked + .plan-content:after {
    top: 45%;
    -webkit-transform: translate(-50%);
    -ms-transform: translate(-50%);
    transform: translate(-50%);
  }
}

@media screen and (max-width: 767px) {
  .plans .plan .plan-content .plan-details {
    width: 60%;
    display: inline-block;
  }
}

@media screen and (max-width: 540px) {
  .plans .plan .plan-content img {
    margin-bottom: 20px;
    height: 56px;
    -webkit-transition: height 0.4s;
    -o-transition: height 0.4s;
    transition: height 0.4s;
  }

  .plans .plan input[type="radio"]:checked + .plan-content:after {
    top: 20px;
    right: 10px;
  }

  .plans .plan .plan-content .plan-details {
    width: 100%;
  }

  .plans .plan .plan-content {
    padding: 20px;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: baseline;
    -ms-flex-align: baseline;
    align-items: baseline;
  }
}

/* inspiration */
.inspiration {
  font-size: 12px;
  margin-top: 50px;
  position: absolute;
  bottom: 10px;
  font-weight: 300;
}

.inspiration a {
  color: #666;
}
@media screen and (max-width: 767px) {
  /* inspiration */
  .inspiration {
    display: none;
  }
}

  </style>
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
                            <input checked type="radio" name="plan" id="basic" />
                            <div class="plan-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#804444" class="bi bi-truck" viewBox="0 0 16 16">
                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                                <div class="plan-details">
                                    <span>Delivery</span>
                                </div>
                             </div>
                        </label>

                        <label class="plan complete-plan" for="complete">
                            <input type="radio" id="complete" name="plan" />
                            <div class="plan-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#804444" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                                <div class="plan-details">
                                    <span>Pick Up</span>    
                                </div>
                            </div>
                        </label>
                    </div>
                </div>   

        <div class="basket-product">
            <div class="item">
            <div class="address-details">
                <h1><strong><!-- <span class="item-quantity">4</span> --> Fazri Faizal</strong></h1>
                <p>No. 34, Jalan 1/4, Laman Delfina, Nilai Impian, 71800, Nilai, Negeri Sembilan</p>
                <p>01165240426 </p>
            </div>
            </div>
            <!-- <div class="price">26.00</div>
            <div class="quantity">
            <input type="number" value="4" min="1" class="quantity-field">
            </div> -->
            <a href="/user-profile">
                <div class="update-address">Change</div>
            </a>
        </div>
        
    </div>
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
        <div class="summary-delivery">
            <div class="product-image">
                <img src="img/p001.png" alt="Placholder Image 2" class="product-frame" width="100%">
            </div>
            <div class="product-details">
                <h1><strong><!-- <span class="item-quantity">4</span> --> Eliza J Lace Sleeve Cuff Dress</strong></h1>
                <p><strong>Navy, Size 18</strong></p>
                <br>
                Quantity : <span class="item-quantity">4</span>
            </div>
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