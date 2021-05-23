<!DOCTYPE html>
<html>
<head>
	<title>Buy Cool New Product</title>
	<link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

    
    <div class="container" >
    	 <div class="ro">
			   <div class="product-card">
					<div class="badge">Hot</div>
						 <div class="product-tumb">
							<img src="https://i.imgur.com/xdbHo4E.png" alt="">
						</div>
					<div class="product-details">
						<span class="product-catagory">Women,bag</span>
						<h4><a href="">Women leather bag</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
						<div class="product-bottom-details">
							<div class="product-price"><small>$96.00</small>$20.00</div>
							<div class="product-links">
								 <button type="button" id="checkout-button">Checkout</button>
							</div>


						</div>
					</div>
				</div>

				

				

    	 </div>
    </div>
	


 
 
 <script type="text/javascript">
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe("pk_test_51Ity7IHTPc2IsTFQahKAYv7bfZfKjut9k69jOmtWxtahFuU1FxD1u6DmD1ItUpC9N1Zvx7pt5JnFea5kqapVGnWu00HagaAO35");
    var checkoutButton = document.getElementById("checkout-button");


 checkoutButton.addEventListener("click", function () {
         fetch("./create-checkout-session.php", {
        method: "POST",
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (session) {
       

          return stripe.redirectToCheckout({ sessionId: session.id });
        })
        .then(function (result) {
          // If redirectToCheckout fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using error.message.
          if (result.error) {
            alert(result.error.message);
          }
        }).catch(function (error) {
          console.error("Error:", error);
        });
   

   });
  </script>


</body>
</html>