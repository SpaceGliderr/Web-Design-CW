<?php include 'includes/header.php'; ?>

<body class="about-us-body">
    <?php
      include "includes/navbar.php";
    ?>
    <div class="order-summary">
      <div class="col-75">
        <div class="checkout-container">
            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label class="first-name-checkout"for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="first-name-checkout" placeholder="John M. Doe">
                <label class="email-checkout" for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email-checkout" placeholder="john@example.com">
                <label class="address-checkout" for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address-checkout" placeholder="542 W. 15th Street">
                <label class="city-checkout"for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city-checkout" placeholder="New York">

                <div class="row">
                  <div class="col-50">
                    <label class="state-checkout" for="state">State</label>
                    <input type="text" id="state" name="state-checkout" placeholder="NY">
                  </div>
                  <div class="col-50">
                    <label class="zip-checkout" for="zip" name="zip">Zip</label>
                    <input type="text" id="zip" name="zip-checkout" placeholder="10001">
                  </div>
                </div>
              </div>

              <div class="col-50">
                <div class="right-side">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label class="cardname-checkout" for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                <label class="cardnumber-checkout" for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label class="expmonth-checkout" for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">

                <div class="row">
                  <div class="col-50">
                    <label class="expyear-checkout" for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label class="cvv-checkout" for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>
              </div>
              </div>

            </div>
            <input type="submit" value="Continue to checkout" class="btn">
        </div>
      </div>
    </div>
    </div>
</body>
