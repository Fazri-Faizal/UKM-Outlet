<?php 

include ('header.php');
include ('database.php');
$mysqli1=new mysqli($servername, $username, $password,$dbname);
  $stmt1 = $mysqli1->prepare("SELECT id FROM tbl_customer WHERE username = '$sessionname'");
  $stmt1->execute();
      $handler = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
      if(count($handler) == 0) {
        header("Location: \login-web");
      }
      
      $custId = 0;
      
      foreach($handler as $cust) {
        $custId = $cust['id'];
      }
 
 $mysqli = new mysqli($servername, $username, $password,$dbname);


$stmt = $mysqli->prepare("SELECT * FROM tbl_cart LEFT JOIN tbl_products ON tbl_cart.product_id = tbl_products.product_Id 
LEFT JOIN tbl_product_variation ON tbl_cart.product_id = tbl_product_variation.fld_product_id 
WHERE tbl_cart.product_size = tbl_product_variation.fld_product_size AND tbl_cart.customer_id = $custId");
$stmt->execute();

$arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);





?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cart</title>
  <link rel="stylesheet" href="/css/cart.css"/>
</head>

<body>
  <main>
    <div class="basket">
        <!-- voucher -->
      <?php
        $stmt3 = $mysqli->prepare("SELECT * FROM tbl_cart  WHERE customer_id = $custId");
        $stmt3->execute();
          
        $arr3 = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

          
        if(!$arr3) exit ('No item in your cart');
      ?>
      <div class="bag"><strong style="font-size: 30px;">Cart</strong></div>
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Unit Price</li>
          <li class="quantity">Quantity</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div>
    
      <form action="/cart_checkout" method="get">
      <input type="hidden" name="cust_id" value="<?php echo $custId; ?>">
      <?php
        foreach( $arr3 as $loop) { 
                $count = 1;

                $size=$loop['product_size'];
                $productid= $loop['product_id'];
                $cid=$loop['cart_id'];
                $quantity=$loop['quantity'];
                $stmt2 = $mysqli->prepare("SELECT * FROM tbl_products WHERE product_id=' $productid'");
                $stmt2->execute();
                
                $arr2 = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
                  foreach( $arr2 as $ukmcarts) { 
                 
                    $id=$ukmcarts['seller_ids'];
               
                    $pic=$ukmcarts['pic'];
                    $name=$ukmcarts['product_Name'];
                    $orginid=$ukmcarts['origin_id'];
                 
                    $count++;
                    $price= $ukmcarts['product_price'];
                    }
            ?>
         <?php
        
          ?>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="img/<?php echo $pic  ?>" alt="Placholder Image 2" class="product-frame" width="100%">
          </div>
          <div class="product-details">
            <h1><strong><!-- <span class="item-quantity">4</span> --> <?php echo  $name ?></strong></h1>
            <span value="<?php echo $size ?>"><p><strong><?php echo $size?></strong></p></span>
           
            <span  value="<?php echo $orginid ?>"><p>Product Origin - <?php echo $orginid  ?></p></span>

             <input name="prodsize" value="<?php echo $size?>">
             <input name="orgid" value="<?php echo $orginid ?>">

          </div>
        </div>
        <div class="price" data-price="<?php echo $price ?>" ><?php echo $price; ?></div>
        <input name="price" type="hidden" value="<?php echo $price; ?>">
          <div class="quantity">
            <input name="qty" type="number" value="<?php echo $quantity; ?>" min="1" class="quantity-field" data-id="<?php echo $productid; ?>" onchange="updateSubtotal(this);" id="newqty">
          </div>
       
          <div class="subtotal" data-id="<?php echo $productid; ?>"><?php echo number_format(   $quantity * $price, 2); ?></div>
      
          <input type="hidden" name="subtotal" value="<?php echo number_format($quantity * $price, 2); ?>">
          <input type="hidden" name="cid" value="<?php echo $cid ?>">
        <div class="remove">
          <a href='delete_cart_item?cart_id=<?=$cid;?>'>
          <button>Delete</button>
          </a>
        </div>
      </div>
      <?php 
                
              }
        ?>
    </div>
    <aside>
      <div class="summary">
        <div class="summary-total-items"><strong style="font-size: 30px;">Summary</strong></div>
        <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" name="subtotal" value="00" id="basket-subtotal">130.00</div>
          
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        
        <div class="basket-module">
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta" style="margin-bottom:10px;">Apply</button>
      
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total">130.00</div>
        </div>
        <div class="summary-checkout">
       
          <button type=submit class="checkout-cta">Go to Secure Checkout</button>
          </a>
        </div>
      </div>
      </form>
    </aside>
  </main>
</body>
<?php include 'footer.php' ?>
</html>
<?php ?>
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
  document.getElementById("basket-subtotal").value = total;
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
  /If switch for update only total, update only total display/
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
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".basket-product").forEach(function (product) {
    updateSubtotal(product.querySelector(".quantity input"));
  });
  updateSumItems();
});

function updateSubtotal(quantityInput) {
  var productRow = quantityInput.closest(".basket-product");
  var price = parseFloat(productRow.querySelector(".price").dataset.price);
  var quantity = parseInt(quantityInput.value);
  var subtotalElement = productRow.querySelector(".subtotal");
  var subtotal = (price * quantity).toFixed(2);
  
  subtotalElement.textContent = subtotal;
  document.getElementById("newqty").value = quantity ;
  recalculateCart(); // Recalculate the cart to update the total
}

/* Update quantity and subtotal */
function updateQuantity(quantityInput) {
  /* Update the quantity */
  var productRow = quantityInput.parentNode.parentNode;
  var quantity = quantityInput.value;
  productRow.querySelector(".item-quantity").textContent = quantity;
  
  /* Update the subtotal */
  updateSubtotal(quantityInput);

  /* Update the sum of items */
  updateSumItems();
}

</script>