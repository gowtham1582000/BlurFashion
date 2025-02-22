<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Shop Checkout | Ruper</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="media/favicon.png">
		
		<!-- Dependency Styles -->
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="libs/feather-font/css/iconfont.css" type="text/css">
		<link rel="stylesheet" href="libs/icomoon-font/css/icomoon.css" type="text/css">
		<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.css" type="text/css">
		<link rel="stylesheet" href="libs/wpbingofont/css/wpbingofont.css" type="text/css">
		<link rel="stylesheet" href="libs/elegant-icons/css/elegant.css" type="text/css">
		<link rel="stylesheet" href="libs/slick/css/slick.css" type="text/css">
		<link rel="stylesheet" href="libs/slick/css/slick-theme.css" type="text/css">
		<link rel="stylesheet" href="libs/mmenu/css/mmenu.min.css" type="text/css">
		<link rel="stylesheet" href="libs/slider/css/jslider.css">
		<link rel="stylesheet" href="libs/select2/css/select2.min.css">

		<!-- Site Stylesheet -->
		<link rel="stylesheet" href="assets/css/app.css" type="text/css">
		<link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
		
		<!-- Google Web Fonts -->
		<link href="../../css2-1?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
		<link href="../../css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
		<script src="https://cdn.emailjs.com/dist/email.min.js"></script>
		<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		 .error { color: red; font-size: 12px; }
		.payment-box p {
			display: flex;
			align-items: center;
			gap: 15px; /* Adjust spacing between icons and text */
		}

		.payment-box p i {
			font-size: 1.5rem; /* Larger icon size */
			color: #4caf50; /* Icon color (e.g., green) */
			transition: color 0.3s; /* Smooth hover transition */
		}

		.payment-box p i:hover {
			color: #007bff; /* Icon color on hover */
		}
		
		.btn {
              padding: 12px 24px;
              font-size: 18px;
              border: none;
              cursor: pointer;
              border-radius: 8px;
              font-weight: bold;
              transition: 0.3s ease;
          }
          .confirm-btn {
              background: linear-gradient(135deg, #ff416c, #ff4b2b);
              color: white;
              box-shadow: 0 4px 10px rgba(255, 75, 43, 0.5);
          }
          .confirm-btn:hover {
              transform: scale(1.1);
          }
	</style>
	<script>
		//const userId = localStorage.getItem("userid");

		// Check if user_id exists
		if (!localStorage.getItem('userid') || localStorage.getItem('userid')==0) {
			alert("User ID not found. Please log in again.");
			window.location.href = "index.php"; // Redirect to login if user_id is missing
		}

		
		//const rzp = new Razorpay(options);

		function RazorpayCheckOut() {
			// Fetch the Razorpay order ID from your backend
			fetch("razorpay-orderid.php", {
				method: "POST",
			})
			.then((response) => response.json())
			.then((data) => {
				const options = {
					key: "rzp_test_gH7uWmfygand8W", // Razorpay key
					currency: "INR",
					name: "Blur Fashion",
					description: "Test Transaction",
					order_id: data.order_id, // Razorpay order ID from backend
					handler: function (response) {
						// Step 1: Verify payment with the server
						console.log("Payment Response:", response);

						fetch("paymentverification.php", {
							method: "POST",
							headers: { "Content-Type": "application/json" },
							body: JSON.stringify({
								razorpay_payment_id: response.razorpay_payment_id,
								razorpay_order_id: response.razorpay_order_id,
								razorpay_signature: response.razorpay_signature,
							}),
						})
						.then((response) => response.json())
						.then((data) => {
							if (data.status === "success") {
								// Step 2: Trigger email sending via mail-trigger.php
								return fetch("mail-trigger.php", {
									method: "POST",
									body: formData, // Send your form data here
								});
							} else {
								throw new Error(data.message);
							}
						})
						.then((response) => response.json())
						.then((data) => {
							if (data.success) {
								// Step 3: Place the order after email is triggered successfully
								return fetch("Place-order.php", {
									method: "POST",
									body: formData, // Send your form data here
								});
							} else {
								throw new Error("Error in sending email: " + data.message);
							}
						})
						.then((response) => response.json())
						.then((data) => {
							if (data.success) {
								alert("Order placed successfully!");
								// window.location.href = "index.php"; // Optional: Redirect to homepage or order confirmation page
							} else {
								alert("Error placing order: " + data.message);
							}
						})
						.catch((error) => {
							console.error("Error:", error);
							alert("An error occurred: " + error.message);
						});
					},
					prefill: {
						name: "John Doe",
						email: "john.doe@example.com",
						contact: "9999999999",
					},
					theme: {
						color: "#F37254",
					},
				};

				const rzp = new Razorpay(options);
				rzp.open();
			})
			.catch((error) => {
				console.error("Error:", error);
			});
		}

		defaultaddressLoader()

		var addressbillid=0,addressdefaultflag='N'
		function defaultaddressLoader(){
			$.ajax({
					url: 'DefaultAddress.php', // Path to the PHP file
					method: 'GET',
					data: { user_id: localStorage.getItem('userid') },
					dataType: 'json',
					success: function(response) {
						if (response.status === 'success') {
							const billingInfo = `
								<p><strong>${response.first_name} ${response.last_name}</strong></p>
								<p>${response.address}</p>
								<p>Phone: ${response.phone}</p>
								<p>Email: ${response.email}</p>
							`;
							$('#billing-address').html(billingInfo);
							$('#billing-address').show()
							$('.customer-details').hide()
							addressbillid=response.billid
							addressdefaultflag='Y'
						} else if (response.status === 'no_default') {
							$('#billing-address').hide()	
							$('.customer-details').show()
							//$('#billing-address').html('<p>No default address found. Please add your billing details.</p>');
						} else if (response.status === 'not_logged_in') {
							$('#billing-address').html('<p>Please log in to load your billing information.</p>');
						} else {
							$('#billing-address').html('<p>Error: ' + response.error + '</p>');
						}
					},
					error: function() {
						$('#billing-address').html('<p>Error loading billing information.</p>');
					}
				});
		}
	</script>

	<script>
		var orderDetails = [];
		document.addEventListener("DOMContentLoaded", function () {
			var totalCart=0
			
			// Fetch cart details for the user
			function fetchCartDetails() {
				$.get('getCartDetails.php', { user_id: localStorage.getItem('userid') })
				.done(function(response) {
					if (response.error) {
						// Handle error response
						console.error("Error fetching cart details:", response.error);
						$('.checkout-review-order-table').html('<p>Your cart could not be loaded. Please try again later.</p>');
						return;
					}
					console.log(response)
					const cartItems = response; // Assuming the response is an array of cart items
					if (cartItems.length > 0) {
						$('.checkout-review-order-table').show();
						$('.cart-empty-message').hide();

						let cartItemsHTML = '';
						let subtotal = 0;

						cartItems.forEach((product, index) => {
							const productTotal = parseFloat(product.price) * product.quantity;
							subtotal += productTotal;

							cartItemsHTML += `
							<div class="cart-item">
								<div class="info-product">
									<div class="product-thumbnail">
										<img width="600" height="600" src="${product.image}" alt="">					
									</div>
									<div class="product-name">
										${product.product_name}
										<div>
											<strong class="product-quantity">QTY : ${product.quantity}</strong>	
											<strong class="product-quantity">SIZE : ${product.size}</strong>
											<strong class="product-quantity">COLOR : ${product.color}</strong>
										</div>							
									</div>
								</div>
								<div class="product-total">
									<span>₹${productTotal.toFixed(2)}</span>
								</div>
							</div>
							`;
							orderDetails.push({
								name: product.product_name,
								quantity: parseInt(product.quantity),
								price: parseFloat(productTotal.toFixed(2)),
								size: product.size,
								color: product.color,
								image: product.image
							});
						});

						// Append the HTML to the cart table body
						$('.cart-items').html(cartItemsHTML);

						// Update cart totals
						updateCheckoutTotals(subtotal);
					} else {
						// If cart is empty
						$('.checkout-review-order-table').hide();
						$('.cart-empty-message').show().html('<p>Your cart is empty. Please add items to the cart.</p>');
					}
				})
				.fail(function(xhr, status, error) {
					console.error("Failed to fetch cart details:", error);
					$('.checkout-review-order-table').html('<p>Failed to load your cart. Please try again later.</p>');
				});
				
				console.log(orderDetails)

			}

			// Function to update checkout totals
			function updateCheckoutTotals(subtotal) {
				$('.subtotal-price span').text(`₹${subtotal.toFixed(2)}`);
				$('.total-price span').text(`₹${subtotal.toFixed(2)}`); // Update the total to match subtotal (if no additional charges)
				totalCart=subtotal.toFixed(2)
				console.log(subtotal.toFixed(2))
			}

			// Fetch cart details on page load
			fetchCartDetails(); 
		
		});

		const formData = new FormData();
		function validation(e) {
				// Clear previous error messages
				e.preventDefault();
				$('.error').text('');
				
				let isValid = true;
				if(addressdefaultflag=='N'){
						// Validate first name
					if ($('input[name="billing_first_name"]').val().trim() === "") {
						$('#first-name-error').text("First name is required.");
						isValid = false;
					}
					
					// Validate last name
					if ($('input[name="billing_last_name"]').val().trim() === "") {
						$('#last-name-error').text("Last name is required.");
						isValid = false;
					}
					
					// Validate street address
					if ($('input[name="billing_address_1"]').val().trim() === "") {
						$('#street-address-error').text("Street address is required.");
						isValid = false;
					}

					if ($('input[name="billing_address_2"]').val().trim() === "") {
						$('#door-no-error').text("Door No is required.");
						isValid = false;
					}

					// Validate country
					if ($('input[name="billing_country"]').val().trim() === "") {
						$('#country-error').text("Please select a country.");
						isValid = false;
					}

					if ($('input[name="billing_postcode"]').val().trim() === "") {
						$('#Postcode-error').text("Please select a post code.");
						isValid = false;
					}

					// Validate state
					if ($('input[name="billing_state"]').val().trim() === "") {
						$('#state-error').text("Please select a state.");
						isValid = false;
					}

					// Validate city
					if ($('input[name="billing_city"]').val().trim() === "") {
						$('#city-error').text("Please select a city.");
						isValid = false;
					}

					// Validate phone number (basic validation)
					let phone = $('input[name="billing_phone"]').val();
					let phonePattern = /^[0-9]{10}$/;
					if (phone.trim() === "" || !phone.match(phonePattern)) {
						$('#phone-error').text("Please enter a valid phone number.");
						isValid = false;
					}

					// Validate email address
					let email = $('input[name="billing_email"]').val();
					let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
					if (email.trim() === "" || !email.match(emailPattern)) {
						$('#email-error').text("Please enter a valid email address.");
						isValid = false;
					}
				}

				// Shipping validation (only if checkbox is checked)

				if ($('input[name="ship_to_different_address"]').is(':checked')) {
					if ($('input[name="shipping_first_name"]').val().trim() === "") {
						$('#shipping-first-name-error').text("First name is required.");
						isValid = false;
					}

					if ($('input[name="shipping_last_name"]').val().trim() === "") {
						$('#shipping-last-name-error').text("Last name is required.");
						isValid = false;
					}

					if ($('input[name="shiping_address_2"]').val().trim() === "") {
						$('#shipping-door-no-error').text("Door No is required.");
						isValid = false;
					}

					if ($('input[name="shipping_address_1"]').val().trim() === "") {
						$('#shipping-street-address-error').text("Street address is required.");
						isValid = false;
					}

					if ($('input[name="shipping_country"]').val().trim() === "") {
						$('#shipping-country-error').text("Please select a country.");
						isValid = false;
					}

					if ($('input[name="shipping_postcode"]').val().trim() === "") {
						$('#shipping-postcode-error').text("Postcode is required.");
						isValid = false;
					}

					if ($('input[name="shipping_state"]').val().trim() === "") {
						$('#shipping-state-error').text("Please select a state.");
						isValid = false;
					}

					if ($('input[name="shipping_city"]').val().trim() === "") {
						$('#shipping-city-error').text("Please select a city.");
						isValid = false;
					}

					let shippingPhone = $('input[name="shipping_phone"]').val();
					if (shippingPhone.trim() === "" || !shippingPhone.match(phonePattern)) {
						$('#shipping-phone-error').text("Please enter a valid phone number.");
						isValid = false;
					}

					let shippingEmail = $('input[name="shipping_email"]').val();
					if (shippingEmail.trim() === "" || !shippingEmail.match(emailPattern)) {
						$('#shipping-email-error').text("Please enter a valid email address.");
						isValid = false;
					}
				}

				
				console.log(orderDetails)
				// If form is invalid, prevent submission
				if (isValid) {

					formData.append("user_id", localStorage.getItem("userid"));
					formData.append("first_name", document.querySelector("input[name='billing_first_name']").value);
					formData.append("last_name", document.querySelector("input[name='billing_last_name']").value);
					formData.append("billing_address_1", document.querySelector("input[name='billing_address_1']").value);
					formData.append("billing_address_2", document.querySelector("input[name='billing_address_2']").value);
					formData.append("billing_city", document.querySelector("input[name='billing_city']").value);
					formData.append("billing_state", document.querySelector("input[name='billing_state']").value);
					formData.append("billing_postcode", document.querySelector("input[name='billing_postcode']").value);
					formData.append("billing_phone", document.querySelector("input[name='billing_phone']").value);
					formData.append("billing_email", document.querySelector("input[name='billing_email']").value);
					formData.append("order_comments", document.querySelector("textarea[name='order_comments']").value);
					formData.append("billing_country", document.querySelector("input[name='billing_country']").value);

					formData.append("shipping_first_name", document.querySelector("input[name='shipping_first_name']").value);
					formData.append("shipping_last_name", document.querySelector("input[name='shipping_last_name']").value);
					formData.append("shipping_address_1", document.querySelector("input[name='shipping_address_1']").value);
					formData.append("shipping_address_2", document.querySelector("input[name='shiping_address_2']").value);
					formData.append("shipping_city", document.querySelector("input[name='shipping_city']").value);
					formData.append("shipping_state", document.querySelector("input[name='shipping_state']").value);
					formData.append("shipping_postcode", document.querySelector("input[name='shipping_postcode']").value);
					formData.append("shipping_phone", document.querySelector("input[name='shipping_phone']").value);
					formData.append("shipping_email", document.querySelector("input[name='shipping_email']").value);
					formData.append("shipping_country", document.querySelector("input[name='shipping_country']").value);
			
					formData.append("MailShipAddress", $('input[name="ship_to_different_address"]').is(':checked')?'S':'B');
					formData.append("userbillId", addressbillid);

					orderDetails.forEach((item, index) => {
						formData.append(`order_items[${index}][name]`, item.name);
						formData.append(`order_items[${index}][quantity]`, item.quantity);
						formData.append(`order_items[${index}][price]`, item.price);
						formData.append(`order_items[${index}][size]`, item.size);
						formData.append(`order_items[${index}][color]`, item.color);
						formData.append(`order_items[${index}][image]`, item.image);
					});

					if(addressbillid==0){
						Swal.fire({
							title: "🎉 Order Placed!",
							html: "<b>Thank you for shopping with us! 🎁</b><br>Your order will be delivered soon.",
							icon: "success",
							showCancelButton: true,
							confirmButtonColor: "#ff416c",
							cancelButtonColor: "#555",
							confirmButtonText: "ok! 🚀",
							cancelButtonText: "Maybe Later 😴",
							background: "#fff",
							allowOutsideClick: false, // Prevent closing on outside click
							allowEscapeKey: false, // Prevent closing with ESC key
							showCloseButton: false, // Hide close (X) button
							backdrop: `
								rgba(0,0,0,0.4)
								url("https://i.gifer.com/7efs.gif")
								center top
								no-repeat
							`,
						}).then((result) => {
							formData.append("default_address", result.isConfirmed?'Y':'N');
						});
					}
					
					if (document.querySelector('input[name="payment_method"]:checked').value === "cod") {
						formData.append("default_address",'N');
							fetch('mail-trigger.php', {
								method: 'POST',
								body: formData
							})
							.then(response => response.json())
							.then(data => {
								if (data.success) {
									alert('Order placed successfully!');
									fetch("Place-order.php", {
										method: "POST",
										body: formData,
									})
									.then(response => response.json())
									.then(saveData => {
										if (saveData.success) {
											alert('Order saved successfully!');
										} else {
											console.error('Failed to save order.');
										}
									})
									.catch(err => console.error('Error saving order:', err));
								} else {
									alert('Failed to place order.');
								}
							})
							.catch(err => console.error('Error:', err));

								
						} else {
							RazorpayCheckOut()
					}
				}
			}

	</script>
	
	<body class="shop">
		<div id="page" class="hfeed page-wrapper">
			<div id="site-main" class="site-main">
				<div id="main-content" class="main-content">
					<div id="primary" class="content-area">
						<div id="title" class="page-title">
							<div class="section-container">
								<div class="content-title-heading">
									<h1 class="text-title-heading">
										Checkout
									</h1>
								</div>
								<div class="breadcrumbs">
									<a href="index.php">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Shopping Cart
								</div>
							</div>
						</div>

						<div id="content" class="site-content" role="main">
							<div class="section-padding">
								<div class="section-container p-l-r">
									<div class="shop-checkout">
										<form name="checkout" id="checkout-form" class="checkout" action="" autocomplete="on">
											<div class="row">
												<div class="col-xl-8 col-lg-7 col-md-12 col-12">
													<h3>Billing details</h3>
													<div id="billing-address">
														<!-- Billing details will load here -->
													</div>

													<div class="customer-details">
														<div class="billing-fields">
															
															<div class="billing-fields-wrapper">
																<p class="form-row form-row-first validate-required">
																	<label>First name <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="billing_first_name" value=""></span>
																	<span class="error" id="first-name-error"></span>
																</p>
																<p class="form-row form-row-last validate-required">
																	<label>Last name <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="billing_last_name" value=""></span>
																	<span class="error" id="last-name-error"></span>
																</p>
																<p class="form-row address-field form-row-wide">
																	<label>Door No<span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="billing_address_2" placeholder="House no, Door no.." value="">
																	</span>
																	<span class="error" id="door-no-error"></span>
																</p>
																<p class="form-row address-field validate-required form-row-wide">
																	<label>Street address <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="billing_address_1" placeholder="House number and street name" value="">
																	</span>
																	<span class="error" id="street-address-error"></span>
																</p>
																<p class="form-row address-field validate-required validate-country form-row-wide">
																	<label>Select Country<span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="billing_country" placeholder="Enter the Country...." value="">
																	</span>
																	<span class="error" id="country-error"></span>
																</p>
																<!-- <div class="form-row">
																<label>Select Country<span class="required">*</span></label>
																<span class="input-wrapper">
																	<select name="country" id="country-dropdown" class="country-select custom-select">
																		<option value="" disabled selected>Select a country</option>
																		
																	</select>
																</span>
																
															</div> -->
																<p class="form-row address-field validate-required validate-state form-row-wide">
																	<label>Select State<span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="billing_state" placeholder="Enter the State...." value="">
																	</span>
																	<span class="error" id="state-error"></span>
																</p>
																<p class="form-row address-field validate-required form-row-wide">
																	<label for="billing_city" class="">Select City <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="billing_city" placeholder="Enter the City...." value="">
																	</span>
																	<span class="error" id="city-error"></span>
																</p>
																<p class="form-row address-field validate-required validate-postcode form-row-wide">
																	<label>Postcode / ZIP <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="billing_postcode" value="">
																	</span>
																	<span class="error" id="Postcode-error"></span>
																</p>
																<p class="form-row form-row-wide validate-required validate-phone">
																	<label>Phone <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="tel" class="input-text" name="billing_phone" value="">
																	</span>
																	<span class="error" id="phone-error"></span>
																</p>
																<p class="form-row form-row-wide validate-required validate-email">
																	<label>Email address <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="email" class="input-text" name="billing_email" value="" autocomplete="off">
																	</span>
																	<span class="error" id="email-error"></span>
																</p>
															</div>
														</div>
														<div class="account-fields" style="display: none;">
															<p class="form-row form-row-wide">
																<label class="checkbox">
																	<input class="input-checkbox" type="checkbox" name="createaccount" value="1"> 
																	<span>Create an account?</span>
																</label>
															</p>
															<div class="create-account">
																<p class="form-row validate-required">
																	<label>Create account password <span class="required" title="required">*</span></label>
																	<span class="input-wrapper password-input">
																		<input type="password" class="input-text" name="account_password" value="" autocomplete="off">
																		<span class="show-password-input"></span>
																	</span>
																</p>								
																<div class="clear"></div>
															</div>
														</div>
													</div>
													<div class="shipping-fields">
														<p class="form-row form-row-wide ship-to-different-address">
															<label class="checkbox">
																<input class="input-checkbox" type="checkbox" name="ship_to_different_address" value="1"> 
																<span>Ship to a different address?</span>
															</label>
														</p>
														<div class="shipping-address">
															<p class="form-row form-row-first validate-required">
																<label>First name <span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="text" class="input-text" name="shipping_first_name" value="">
																</span>
																<span class="error" id="shipping-first-name-error"></span>
															</p>
															<p class="form-row form-row-last validate-required">
																<label>Last name <span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="text" class="input-text" name="shipping_last_name" value="">
																</span>
																<span class="error" id="shipping-last-name-error"></span>
															</p>
															<p class="form-row form-row-wide">
																<label>Door No<span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="text" class="input-text" name="shiping_address_2" placeholder="House no, Door no.." value="">
																</span>
																<span class="error" id="shipping-door-no-error"></span>
															</p>
															<p class="form-row address-field validate-required form-row-wide">
																<label>Street address <span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="text" class="input-text" name="shipping_address_1" placeholder="House number and street name" value="">
																</span>
																<span class="error" id="shipping-street-address-error"></span>
															</p>
															<p class="form-row form-row-wide address-field validate-required">
																<label for="shipping_country" class="">Select Country<span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="text" class="input-text" name="shipping_country" placeholder="Enter the Country...." value="">
																</span>
																<span class="error" id="shipping-country-error"></span>
															</p>
															<p class="form-row form-row-wide address-field validate-required">
																<label for="shipping_state" class="">Select State<span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="text" class="input-text" name="shipping_state" placeholder="Enter the State...." value="">
																</span>
																<span class="error" id="shipping-state-error"></span>
															</p>
															<p class="form-row form-row-wide address-field validate-required">
																<label for="shipping_city" class="">Select City<span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="text" class="input-text" name="shipping_city" placeholder="Enter the City...." value="">
																</span>
																<span class="error" id="shipping-city-error"></span>
															</p>
															<p class="form-row address-field validate-required validate-postcode form-row-wide">
																<label>Postcode / ZIP <span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="text" class="input-text" name="shipping_postcode" value="">
																</span>
																<span class="error" id="shipping-postcode-error"></span>
															</p>
															<p class="form-row form-row-wide validate-required validate-phone">
																<label>Phone <span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="tel" class="input-text" name="shipping_phone" value="">
																</span>
																<span class="error" id="shipping-phone-error"></span>
															</p>
															<p class="form-row form-row-wide validate-required validate-email">
																<label>Email address <span class="required" title="required">*</span></label>
																<span class="input-wrapper">
																	<input type="email" class="input-text" name="shipping_email" value="" autocomplete="off">
																</span>
																<span class="error" id="shipping-email-error"></span>
															</p>
														</div>
													</div>
													<div class="additional-fields">
														<p class="form-row notes">
															<label>Order notes <span class="optional">(optional)</span></label>
															<span class="input-wrapper">
																<textarea name="order_comments" class="input-text" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
															</span>
														</p>
													</div>
												</div>
												<div class="col-xl-4 col-lg-5 col-md-12 col-12">
													<div class="checkout-review-order">
														<div class="checkout-review-order-table">
															<div class="review-order-title">Product</div>
															<div class="cart-items">
															</div>
															<div class="cart-subtotal">
																<h2>Subtotal</h2>
																<div class="subtotal-price">
																	<span></span>
																</div>
															</div>
															<!-- <div class="shipping-totals shipping">
																<h2>Shipping</h2>
																<div data-title="Shipping">
																	<ul class="shipping-methods custom-radio">
																		<li>
																			<input type="radio" name="shipping_method" data-index="0" value="free_shipping" class="shipping_method" checked="checked"><label>Free shipping</label>
																		</li>
																		<li>
																			<input type="radio" name="shipping_method" data-index="0" value="flat_rate" class="shipping_method"><label>Flat rate</label>					
																		</li>
																	</ul>
																</div>
															</div> -->
															<div class="order-total">
																<h2>Total</h2>
																<div class="total-price">
																	<strong>
																		<span></span>
																	</strong> 
																</div>
															</div>
														</div>
														<div id="payment" class="checkout-payment">
															<ul class="payment-methods methods custom-radio">
																<li class="payment-method">
																	<input type="radio" class="input-radio" name="payment_method" value="cod" checked="true">
																	<label>Cash on delivery</label>
																	<div class="payment-box">
																		<p>Pay with cash upon delivery.</p>
																	</div>
																</li>
																<li class="payment-method">
																	<input type="radio" class="input-radio" name="payment_method" value="upi">
																	<label>Online Payment</label>
																	<div class="payment-box">
																		<p>
																			Pay via 
																			<i class="fab fa-google-pay payment-icon"></i> 
																			<i class="fas fa-phone-alt payment-icon"></i> 
																			<i class="fab fa-amazon payment-icon"></i> 
																			<i class="fab fa-paypal payment-icon"></i>
																		</p>
																	</div>
																	
																</li>
																
																
															</ul>
															<div class="form-row place-order">
																<button type="submit" class="button alt" onclick="validation(event)" id="checkout-button" name="checkout_place_order" value="Place order">Place order</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div><!-- #content -->
					</div><!-- #primary -->
				</div><!-- #main-content -->
			</div>
		</div>

		<!-- Back Top button -->
		<div class="back-top button-show">
			<i class="arrow_carrot-up"></i>
		</div>

		<!-- Search -->
		<div class="search-overlay">
			<div class="close-search"></div>
			<div class="wrapper-search">
				<form role="search" method="get" class="search-from ajax-search" action="">
					<div class="search-box">
						<button id="searchsubmit" class="btn" type="submit">
							<i class="icon-search"></i>
						</button>
						<input id="myInput" type="text" autocomplete="off" value="" name="s" class="input-search s" placeholder="Search...">
						<div class="search-top">
							<div class="close-search">Cancel</div>
						</div>
						<div class="content-menu_search">
							<label>Suggested</label>
							<ul id="menu_search" class="menu">
								<li><a href="#">Furniture</a></li>
								<li><a href="#">Home Décor</a></li>
								<li><a href="#">Industrial</a></li>
								<li><a href="#">Kitchen</a></li>
							</ul>			
						</div>
					</div>
				</form>	
			</div>	
		</div>

		<!-- Wishlist -->
		<div class="wishlist-popup">
			<div class="wishlist-popup-inner">
                <div class="wishlist-popup-content">
                    <div class="wishlist-popup-content-top">
                        <span class="wishlist-name">Wishlist</span>
						<span class="wishlist-count-wrapper"><span class="wishlist-count">2</span></span>                                
						<span class="wishlist-popup-close"></span>
                    </div>
                    <div class="wishlist-popup-content-mid">
						<table class="wishlist-items">                        
							<tbody>
								<tr class="wishlist-item">
									<td class="wishlist-item-remove"><span></span></td>
									<td class="wishlist-item-image">
                                    	<a href="shop-details.html">
											<img width="600" height="600" src="media/product/3.jpg" alt="">                                        
										</a>
		                       		</td>
			                        <td class="wishlist-item-info">
										<div class="wishlist-item-name">
											<a href="shop-details.html">Chair Oak Matt Lacquered</a>
										</div>
										<div class="wishlist-item-price">
											<span>$150.00</span>
										</div>
										<div class="wishlist-item-time">June 4, 2022</div>                                
									</td>
			                        <td class="wishlist-item-actions">
			                            <div class="wishlist-item-stock">
											In stock 
										</div>
			                            <div class="wishlist-item-add">
											<div data-title="Add to cart">
												<a rel="nofollow" href="#" class="button">Add to cart</a>
											</div>
										</div>
	                                </td>
								</tr>
								<tr class="wishlist-item">
									<td class="wishlist-item-remove"><span></span></td>
									<td class="wishlist-item-image">
                                    	<a href="shop-details.html">
											<img width="600" height="600" src="media/product/4.jpg" alt="">                                        
										</a>
		                       		</td>
			                        <td class="wishlist-item-info">
										<div class="wishlist-item-name">
											<a href="shop-details.html">Pillar Dining Table Round</a>
										</div>
										<div class="wishlist-item-price">
											<del aria-hidden="true"><span>$150.00</span></del> 
											<ins><span>$100.00</span></ins>
										</div>
										<div class="wishlist-item-time">June 4, 2022</div>                                
									</td>
			                        <td class="wishlist-item-actions">
			                            <div class="wishlist-item-stock">
											In stock 
										</div>
			                            <div class="wishlist-item-add">
											<div data-title="Add to cart">
												<a rel="nofollow" href="#" class="button">Add to cart</a>
											</div>
										</div>
	                                </td>
								</tr>
							</tbody>
						</table>
					</div>
                    <div class="wishlist-popup-content-bot">
                        <div class="wishlist-popup-content-bot-inner">
                            <a class="wishlist-page" href="shop-wishlist.html">
								Open wishlist page                                    
							</a>
                            <span class="wishlist-continue" data-url="">
                                Continue shopping                                        
                            </span>
                        </div>
                        <div class="wishlist-notice wishlist-notice-show">Added to the wishlist!</div>
                    </div>
                </div>
            </div>
		</div>

		<!-- Compare -->
		<div class="compare-popup">
		    <div class="compare-popup-inner">
		        <div class="compare-table">
		            <div class="compare-table-inner">
                    	<a href="#" id="compare-table-close" class="compare-table-close">
                    		<span class="compare-table-close-icon"></span>
                    	</a>
                    	<div class="compare-table-items">
                    		<table id="product-table" class="product-table">
                    			<thead>
                    				<tr>
                    					<th>
                    						<a href="#" class="compare-table-settings">Settings</a>
                    					</th>
                    					<th>
                    						<a href="shop-details.html">Chair Oak Matt Lacquered</a> <span class="remove">remove</span>
                    					</th>
                    					<th>
                    						<a href="shop-details.html">Zunkel Schwarz</a> <span class="remove">remove</span>
                    					</th>
                    					<th>
                    						<a href="shop-details.html">Namaste Vase</a> <span class="remove">remove</span>
                    					</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                    				<tr class="tr-image">
                    					<td class="td-label">Image</td>
                    					<td>
                    						<a href="shop-details.html">
                    							<img width="600" height="600" src="media/product/3.jpg" alt="">
                    						</a>
                    					</td>
                    					<td>
                    						<a href="shop-details.html">
                    							<img width="600" height="600" src="media/product/1.jpg" alt="">
                    						</a>
                    					</td>
                    					<td>
                    						<a href="shop-details.html">
                    							<img width="600" height="600" src="media/product/2.jpg" alt="">
                    						</a>
                    					</td>
                    				</tr>
                    				<tr class="tr-sku">
                    					<td class="td-label">SKU</td>
                    					<td>VN00189</td>
                    					<td></td>
                    					<td>D1116</td>
                    				</tr>
                    				<tr class="tr-rating">
                    					<td class="td-label">Rating</td>
                    					<td>
                    						<div class="star-rating">
                    							<span style="width:80%"></span>
                    						</div>
                    					</td>
                    					<td>
                    						<div class="star-rating">
                    							<span style="width:100%"></span>
                    						</div>
                    					</td>
                    					<td></td>
                    				</tr>
                    				<tr class="tr-price">
                    					<td class="td-label">Price</td>
                    					<td><span class="amount">$150.00</span></td>
                    					<td><del><span class="amount">$150.00</span></del> <ins><span class="amount">$100.00</span></ins></td>
                    					<td><span class="amount">$200.00</span></td>
                    				</tr>
                    				<tr class="tr-add-to-cart">
                    					<td class="td-label">Add to cart</td>
                    					<td>
                    						<div data-title="Add to cart">
                    							<a href="#" class="button">Add to cart</a>
                    						</div>
                    					</td>
                    					<td>
                    						<div data-title="Add to cart">
                    							<a href="#" class="button">Add to cart</a>
                    						</div>
                    					</td>
                    					<td>
                    						<div data-title="Add to cart">
                    							<a href="#" class="button">Add to cart</a>
                    						</div>
                    					</td>
                    				</tr>
                    				<tr class="tr-description">
                    					<td class="td-label">Description</td>
                    					<td>Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida nec dui. Aenean aliquam varius ipsum, non ultricies tellus sodales eu. Donec dignissim viverra nunc, ut aliquet magna posuere eget.</td>
                    					<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                    					<td>The EcoSmart Fleece Hoodie full-zip hooded jacket provides medium weight fleece comfort all year around. Feel better in this sweatshirt because Hanes keeps plastic bottles of landfills by using recycled polyester.7.8 ounce fleece sweatshirt made with up to 5 percent polyester created from recycled plastic.</td>
                    				</tr>
                    				<tr class="tr-content">
                    					<td class="td-label">Content</td>
                    					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
                    					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
                    					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
                    				</tr>
                    				<tr class="tr-dimensions">
                    					<td class="td-label">Dimensions</td>
                    					<td>N/A</td>
                    					<td>N/A</td>
                    					<td>N/A</td>
                    				</tr>
                    			</tbody>
                    		</table>
                    	</div>
		            </div>
		        </div>
		    </div>
		</div>

		<!-- Page Loader -->
		<div class="page-preloader">
	    	<div class="loader">
	    		<div></div>
	    		<div></div>
	    	</div>
	    </div>

		<!-- Dependency Scripts -->
		<script src="libs/popper/js/popper.min.js"></script>
		<script src="libs/jquery/js/jquery.min.js"></script>
		<script src="libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="libs/slick/js/slick.min.js"></script>
		<script src="libs/countdown/js/jquery.countdown.min.js"></script>
		<script src="libs/mmenu/js/jquery.mmenu.all.min.js"></script>
		<script src="libs/slider/js/tmpl.js"></script>
		<script src="libs/slider/js/jquery.dependClass-0.1.js"></script>
		<script src="libs/slider/js/draggable-0.1.js"></script>
		<script src="libs/slider/js/jquery.slider.js"></script>
		<script src="libs/elevatezoom/js/jquery.elevatezoom.js"></script>
		<script src="libs/select2/js/select2.min.js"></script>
		
		<!-- Site Scripts -->
		<script src="assets/js/app.js"></script>
	</body>
	

</html>