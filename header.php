<?php
// Start the session
session_start();

// Database connection settings
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bfdb"; // Your database name

// Establish a PDO connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Collect form data
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    // Validate input
    if (!empty($full_name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert data into the users table
        $sql = "INSERT INTO users (full_name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$full_name, $email, $hashedPassword, $phone, $address]);
		$userId = $conn->lastInsertId();

		// Store user_id in the session
		$_SESSION['user_id'] = $userId;

        // Set session variables after successful registration
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $full_name; // You can use email or any unique identifier
        header("Location: index.php");
        exit();
    } else {
        echo "Please enter all required fields: Full Name, Email, and Password.";
    }
}

// Handle Login (optional for login)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Query for user
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables after login
		$_SESSION['user_id'] = $user['user_id'];
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['full_name']; // Store full name or other unique identifier

        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
    }
}

// Handle Logout
if (isset($_GET['logout'])) {
    // Destroy the session
    session_unset();
    session_destroy();
    header('Location: index.php'); // Redirect to the home page
    exit();
}

$conn = null; // Close connection
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Categories | Ruper</title>
		
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

		<!-- Site Stylesheet -->
		<link rel="stylesheet" href="assets/css/app.css" type="text/css">
		<link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
		
		<!-- Google Web Fonts -->
		<link href="../../css2-1?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
		<link href="../../css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap" rel="stylesheet">
	
	<!-- jQuery CDN -->
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
		<script>
			let cartCount = 0; // Cart count
			const userId = <?php echo json_encode($_SESSION['user_id']); ?>; // Replace with the logged-in user's ID

$(document).ready(function () {
    // Fetch cart data on page load
    fetchCart();

    // Add to cart functionality
    $('.btn-add-to-cart a').on('click', function (e) {
        e.preventDefault();

        // Fetch product details
        const productName = $(this).closest('.products-content').find('.product-title a').text();
        const productPrice = $(this).closest('.products-content').find('.price ins span').length > 0
            ? $(this).closest('.products-content').find('.price ins span').text()
            : $(this).closest('.products-content').find('.price').text();
        const productImage = $(this).closest('.products-entry').find('.product-thumb-hover img:first').attr('src');

        // Add product to the database
        $.post('Add-to-cart.php', {
            user_id: userId,
            product_name: productName,
            price: parseFloat(productPrice.replace('$', '')),
            image: productImage,
            quantity: 1
        }).done(function (response) {
            const res = JSON.parse(response);
            if (res.status === 'success') {
				console.log(res)
                fetchCart();
            } else {
                alert(res.message);
            }
        });
    });
});

// Fetch cart items
function fetchCart() {
    $.get('fetch_cart.php', { user_id: userId }).done(function (response) {
        const res = JSON.parse(response);
        if (res.status === 'success') {
            const cartItems = res.cart_items;
			const combinedItems = combineCartItems(cartItems);
            cartCount = combinedItems.length;
            $('.cart-count').text(cartCount);
			if(cartCount==0){
				$('.cart-list').empty();
				const cartItem = `
					<li class="empty">
						<span>No products in the cart.</span>
						<a class="go-shop" href="shop-grid-left.html">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
					</li>`;
    			$('.cart-list').append(cartItem);
				$('.product-list').hide();
        		$('.empty-cart').show();
			}else{
				$('.cart-list').empty();
				//$('.cart-list').show();
				$('.product-list').show();
        		$('.empty-cart').hide();
			}
            combinedItems.forEach(item => appendCartItem(item));

            updateCartTotal(cartItems);
        }
    });
}
function combineCartItems(cartItems) {
    const combined = {};

    cartItems.forEach(item => {
        const itemName = item.product_name;

        if (combined[itemName]) {
            // If the product already exists, update quantity and price
            combined[itemName].quantity += item.quantity;
            combined[itemName].price += parseFloat(item.price) * item.quantity;
        } else {
            // Add new product with initial quantity and price
            combined[itemName] = {
                ...item,
                quantity: item.quantity,
                price: parseFloat(item.price) * item.quantity
            };
        }
    });

    // Convert the object back to an array
    return Object.values(combined);
}
// Append a cart item
function appendCartItem(item) {
    const cartItem = `
        <li class="mini-cart-item">
            <a href="#" class="remove" title="Remove this item" onclick="removeCartItem('${item.product_name}', event)"><i class="icon_close"></i></a>
            <a href="shop-details.html" class="product-image"><img width="600" height="600" src="${item.image}" alt=""></a>
            <a href="shop-details.html" class="product-name">${item.product_name}</a>
            <div class="quantity">Qty: ${item.quantity}</div>
            <div class="price">$${parseFloat(item.price).toFixed(2)}</div>
        </li>`;
    $('.cart-list').append(cartItem);
}

// Remove an item from the cart
function removeCartItem(productName, event) {
    event.preventDefault();

    $.post('remove_from_cart.php', {
        user_id: userId,
        product_name: productName
    }).done(function (response) {
        const res = JSON.parse(response);
        if (res.status === 'success') {
            fetchCart();
        } else {
            alert(res.message);
        }
    });
}

// Update total price
function updateCartTotal(cartItems) {
    const total = cartItems.reduce((sum, item) => sum + (parseFloat(item.price) * item.quantity), 0);
    $('.total-price span').text(`$${total.toFixed(2)}`);
}


	</script>
	<style>
		#site-footer .block-image1 img {
			position: relative; /* Enable positioning */
			top: -70px; /* Move the logo upwards, adjust value as needed */
			margin-left: -100px;
			height: 350px; /* Adjust height of the logo */
			width: 600px; /* Maintain aspect ratio */
		}

	</style>
	</head>
	
	<body class="home">
		<div id="page" class="hfeed page-wrapper">
			<header id="site-header" class="site-header header-v1">
				<div class="header-mobile">
					<div class="section-padding">
						<div class="section-container">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-left">
									<div class="navbar-header">
										<button type="button" id="show-megamenu" class="navbar-toggle"></button>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 header-center">
									<div class="">
										<a href="index.php">
											<img width="400" height="79" src="./assets/img/B-removebg-preview (1).png" alt="Ruper – Furniture HTML Theme">
										</a>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-right">
									<div class="ruper-topcart dropdown">
										<div class="dropdown mini-cart top-cart">
											<div class="remove-cart-shadow"></div>
											<a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">0</span></div>
											</a>
											<div class="dropdown-menu cart-popup">
												<div class="empty-cart">
													<ul class="cart-list">
														<li class="empty">
															<span>No products in the cart.</span>
															<a class="go-shop" href="shop-grid-left.html">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
														</li>
													</ul>
												</div>
												<div class="product-list">
													<ul class="cart-list ">
														
													</ul>
													<div class="total-cart">
														<div class="title-total">Total: </div>
														<div class="total-price"><span></span></div>
													</div>
													<div class="free-ship">
														<div class="title-ship">Buy <strong>$400</strong> more to enjoy <strong>FREE Shipping</strong></div>
														<div class="total-percent"><div class="percent" style="width:20%"></div></div>
													</div>
													<div class="buttons">
														<a href="shop-cart.php" class="button btn view-cart btn-primary">View cart</a>
														<a href="shop-checkout.html" class="button btn checkout btn-default">Check out</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="header-mobile-fixed">
						<!-- Shop -->
						<div class="shop-page">
							<a href="shop-grid-left.html"><i class="wpb-icon-shop"></i></a>
						</div>

						<!-- Login -->
						<div class="my-account">
							<div class="login-header">
								<a href="page-my-account.html"><i class="wpb-icon-user"></i></a>
							</div>
						</div>

						<!-- Search -->
						<div class="search-box">
							<div class="search-toggle"><i class="wpb-icon-magnifying-glass"></i></div>
						</div>

						<!-- Wishlist -->
						<div class="wishlist-box">
							<a href="shop-wishlist.html"><i class="wpb-icon-heart"></i></a>
						</div>
					</div>
				</div>

				<div class="header-desktop">
					<div class="header-wrapper">
						<div class="section-padding">
							<div class="section-container p-l-r">
								<div class="row">
									<div class="col-xl-3 col-lg-2 col-md-12 col-sm-12 col-12 header-left">
										<div>
											<a href="index.php">
												<img width="400" height="200" src="./assets/img/B-removebg-preview (1).png" alt="Ruper – Furniture HTML Theme">
											</a>
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-center header-center">
										<div class="site-navigation">
											<nav id="main-navigation">
												<ul id="menu-main-menu" class="menu">
													<li class="level-0 menu-item mega-menu current-menu-item">
														<a href="index.php"><span class="menu-item-text">Home</span></a>
														 <!-- <div class="sub-menu">
															<div class="row">
																<div class="col-md-6">
																	<div class="menu-section">
																		<h2 class="sub-menu-title">Furniture 1</h2>
																		<ul class="menu-list">
																			<li>
																				<a href="index.php"><span class="menu-item-text">Home Categories</span></a>
																			</li>
																			<li>
																				<a href="index2.html"><span class="menu-item-text">Home Clean</span></a>
																			</li>
																			<li>
																				<a href="index3.html"><span class="menu-item-text">Home Collection</span></a>
																			</li>
																			<li>
																				<a href="index4.html"><span class="menu-item-text">Home Grid</span></a>
																			</li>
																			<li>
																				<a href="index5.html"><span class="menu-item-text">Home Minimal</span></a>
																			</li>
																			<li>
																				<a href="index6.html"><span class="menu-item-text">Home Modern</span></a>
																			</li>
																			<li>
																				<a href="index7.html"><span class="menu-item-text">Home Stylish</span></a>
																			</li>
																			<li>
																				<a href="index8.html"><span class="menu-item-text">Home Unique</span></a>
																			</li>
																		</ul>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="menu-section">
																		<h2 class="sub-menu-title">Furniture 2</h2>
																		<ul class="menu-list">
																			<li>
																				<a href="index9.html"><span class="menu-item-text">Home Split</span></a>
																			</li>
																			<li>
																				<a href="index10.html"><span class="menu-item-text">Home Gothic</span></a>
																			</li>
																			<li>
																				<a href="index11.html"><span class="menu-item-text">Home Luxury</span></a>
																			</li>
																			<li>
																				<a href="index12.html"><span class="menu-item-text">Home Scandinavian</span></a>
																			</li>
																			<li>
																				<a href="index13.html"><span class="menu-item-text">Home Mid-Century</span></a>
																			</li>
																			<li>
																				<a href="index14.html"><span class="menu-item-text">Home Retro</span></a>
																			</li>
																			<li>
																				<a href="index15.html"><span class="menu-item-text">Home Color Block</span></a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														 </div>  -->
													</li>
													<li class="level-0 menu-item ">
														<a href="shop-tees.php"><span class="menu-item-text">Tees</span></a>
														<!-- <ul class="sub-menu">
															<li class="level-1 menu-item menu-item-has-children">
																<a href="shop-grid-left.html"><span class="menu-item-text">Shop - Products</span></a>
																<ul class="sub-menu">
																	<li>
																		<a href="shop-grid-left.html"><span class="menu-item-text">Shop Grid - Left Sidebar</span></a>
																	</li>
																	<li>
																		<a href="shop-list-left.html"><span class="menu-item-text">Shop List - Left Sidebar</span></a>
																	</li>
																	<li>
																		<a href="shop-grid-right.html"><span class="menu-item-text">Shop Grid - Right Sidebar</span></a>
																	</li>
																	<li>
																		<a href="shop-list-right.html"><span class="menu-item-text">Shop List - Right Sidebar</span></a>
																	</li>
																	<li>
																		<a href="shop-grid-fullwidth.html"><span class="menu-item-text">Shop Grid - No Sidebar</span></a>
																	</li>
																</ul>
															</li>
															<li>
																<a href="shop-details.html"><span class="menu-item-text">Shop Details</span></a>
															</li>
															<li>
																<a href="shop-cart.php"><span class="menu-item-text">Shop - Cart</span></a>
															</li>
															<li>
																<a href="shop-checkout.html"><span class="menu-item-text">Shop - Checkout</span></a>
															</li>
															<li>
																<a href="shop-wishlist.html"><span class="menu-item-text">Shop - Wishlist</span></a>
															</li>
														</ul> -->
													</li>
													<li class="level-0 menu-item mega-menu mega-menu-fullwidth align-center">
														<a href="shop-shirts.php"><span class="menu-item-text">Shirts</span></a>
														<!-- <div class="sub-menu">
															<div class="row">
																<div class="col-md-5">
																	<div class="menu-section">
																		<h2 class="sub-menu-title">Blog Category</h2>
																		<ul class="menu-list">
																			<li>
																				<a href="blog-grid-left.html"><span class="menu-item-text">Blog Grid - Left Sidebar</span></a>
																			</li>
																			<li>
																				<a href="blog-grid-right.html"><span class="menu-item-text">Blog Grid - Right Sidebar</span></a>
																			</li>
																			<li>
																				<a href="blog-list-left.html"><span class="menu-item-text">Blog List - Left Sidebar</span></a>
																			</li>
																			<li>
																				<a href="blog-list-right.html"><span class="menu-item-text">Blog List - Right Sidebar</span></a>
																			</li>
																			<li>
																				<a href="blog-grid-fullwidth.html"><span class="menu-item-text">Blog Grid - No Sidebar</span></a>
																			</li>
																		</ul>
																	</div>

																	<div class="menu-section">
																		<h2 class="sub-menu-title">Blog Details</h2>
																		<ul class="menu-list">
																			<li>
																				<a href="blog-details-left.html"><span class="menu-item-text">Blog Details - Left Sidebar</span></a>
																			</li>
																			<li>
																				<a href="blog-details-right.html"><span class="menu-item-text">Blog Details - Right Sidebar</span></a>
																			</li>
																			<li>
																				<a href="blog-details-fullwidth.html"><span class="menu-item-text">Blog Details - No Sidebar</span></a>
																			</li>
																		</ul>
																	</div>
																</div>
																<div class="col-md-7">
																	<div class="menu-section">
																		<h2 class="sub-menu-title">Recent Posts</h2>
																		<div class="block block-posts recent-posts p-t-5">
																			<ul class="posts-list">
																				<li class="post-item">
																					<a href="blog-details-right.html" class="post-image">
																						<img src="media/blog/1.jpg">
																					</a>
																					<div class="post-content">
																						<h2 class="post-title">
																							<a href="blog-details-right.html">
																								Easy Fixes For Home Decor
																							</a>
																						</h2>
																						<div class="post-time">
																							<span class="post-date">May 30, 2022</span>
																							<span class="post-comment">4 Comments</span>
																						</div>
																					</div>
																				</li>
																				<li class="post-item">
																					<a href="blog-details-right.html" class="post-image">
																						<img src="media/blog/2.jpg">
																					</a>
																					<div class="post-content">
																						<h2 class="post-title">
																							<a href="blog-details-right.html">
																								How To Make Your Home A Showplace
																							</a>
																						</h2>
																						<div class="post-time">
																							<span class="post-date">Aug 24, 2022</span>
																							<span class="post-comment">2 Comments</span>
																						</div>
																					</div>
																				</li>
																				<li class="post-item">
																					<a href="blog-details-right.html" class="post-image">
																						<img src="media/blog/3.jpg">
																					</a>
																					<div class="post-content">
																						<h2 class="post-title">
																							<a href="blog-details-right.html">
																								Stunning Furniture With Aesthetic Appeal
																							</a>
																						</h2>
																						<div class="post-time">
																							<span class="post-date">Dec 06, 2022</span>
																							<span class="post-comment">1 Comment</span>
																						</div>
																					</div>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div> -->
													</li>
													<li class="level-0 menu-item ">
														<a href="shop-pants.php"><span class="menu-item-text">Pants</span></a>
														<!-- <ul class="sub-menu">
															<li>
																<a href="page-login.html"><span class="menu-item-text">Login / Register</span></a>
															</li>
															<li>
																<a href="page-forgot-password.html"><span class="menu-item-text">Forgot Password</span></a>
															</li>
															<li>
																<a href="page-my-account.html"><span class="menu-item-text">My Account</span></a>
															</li>
															<li>
																<a href="page-about.html"><span class="menu-item-text">About Us</span></a>
															</li>
															<li>
																<a href="page-contact.html"><span class="menu-item-text">Contact</span></a>
															</li>
															<li>
																<a href="page-faq.html"><span class="menu-item-text">FAQ</span></a>
															</li>
															<li>
																<a href="page-404.html"><span class="menu-item-text">Page 404</span></a>
															</li>
														</ul> -->
													</li>
													<li class="level-0 menu-item">
														<a href="page-contact.php"><span class="menu-item-text">Contact</span></a>
													</li>
												</ul>
											</nav>
										</div>
									</div>

									<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 header-right">
										<div class="header-page-link">
											<!-- Login -->
											<div class="login-header">
												<a class="active-login" href="#">Login</a>
												<div class="form-login-register">
													<div class="box-form-login">
														<div class="active-login"></div>
														<div class="box-content">
															<div class="form-login active">
																<form id="login_ajax" method="post" class="login">
																	<h2>Sign in</h2>
																	<p class="status"></p>
																	<div class="content">
																		<div class="username">
																			<input type="text" required="required" class="input-text" name="username" id="username" placeholder="Your name">
																		</div>
																		<div class="password">
																			<input class="input-text" required="required" type="password" name="password" id="password" placeholder="Password">
																		</div>
																		<div class="rememberme-lost">
																			<div class="rememberme">
																				<input name="rememberme" type="checkbox" id="rememberme" value="forever">
																				<label for="rememberme" class="inline">Remember me</label>
																			</div>
																			<div class="lost_password">
																				<a href="forgot-password.html">Lost your password?</a>
																			</div>
																		</div>
																		<div class="button-login">
																			<input type="submit" class="button" name="login" value="Login">
																		</div>
																		<div class="button-next-reregister">Create An Account</div>
																	</div>						
																</form>
															</div>
															<div class="form-register">
																<form method="post" class="register">
																	<h2>REGISTER</h2>
																	<div class="content">
																		<div class="email">
																			<input type="email" class="input-text" placeholder="Email" name="email" id="reg_email" value="">
																		</div>
																		<div class="password">
																			<input type="password" class="input-text" placeholder="Password" name="password" id="reg_password">
																		</div>															
																		<div class="button-register">
																			<input type="submit" class="button" name="register" value="Register">
																		</div>
																		<div class="button-next-login">Already has an account</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- Search -->
											<div class="search-box">
												<div class="search-toggle"><i class="icon-search"></i></div>
											</div>
											
											<!-- Wishlist -->
											<div class="wishlist-box">
												<a href="shop-wishlist.html"><i class="icon-heart"></i></a>
												<span class="count-wishlist">1</span>
											</div>
											
											<!-- Cart -->
											<div class="ruper-topcart dropdown light">
												<div class="dropdown mini-cart top-cart">
													<div class="remove-cart-shadow"></div>
													<a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">0</span></div>
													</a>
													<div class="dropdown-menu cart-popup">
														<div class="empty-cart">
															<ul class="cart-list">
																<li class="empty">
																	<span>No products in the cart.</span>
																	<a class="go-shop" href="shop-grid-left.html">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
																</li>
															</ul>
														</div>
														<div class="product-list">
															<ul class="cart-list ">
															</ul>
															<div class="total-cart">
																<div class="title-total">Total: </div>
																<div class="total-price"><span></span></div>
															</div>
															<div class="free-ship">
																<div class="title-ship">Buy <strong>$400</strong> more to enjoy <strong>FREE Shipping</strong></div>
																<div class="total-percent"><div class="percent" style="width:20%"></div></div>
															</div>
															<div class="buttons">
																<a href="shop-cart.php" class="button btn view-cart btn-primary">View cart</a>
																<a href="shop-checkout.html" class="button btn checkout btn-default">Check out</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>