<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Shop Grid - Right Sidebar | Ruper</title>
		
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

		<!-- Site Stylesheet -->
		<link rel="stylesheet" href="assets/css/app.css" type="text/css">
		<link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
		
		<!-- Google Web Fonts -->
		<link href="../../css2-1?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
		<link href="../../css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap" rel="stylesheet">
	</head>
	
	<body class="shop">
		<div id="page" class="hfeed page-wrapper">
			<header id="site-header" class="site-header header-v1 absolute">
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
														<a href="shop-cart.html" class="button btn view-cart btn-primary">View cart</a>
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
														<a href="shop-grid-right.php"><span class="menu-item-text">Tees</span></a>
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
																<a href="shop-cart.html"><span class="menu-item-text">Shop - Cart</span></a>
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
																<a href="shop-cart.html" class="button btn view-cart btn-primary">View cart</a>
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

			<div id="site-main" class="site-main">
				<div id="main-content" class="main-content">
					<div id="primary" class="content-area">
						<div id="title" class="page-title">
							<div class="section-container">
								<div class="content-title-heading">
									<h1 class="text-title-heading">
										Bed &amp; Bath		
									</h1>
								</div>
								<div class="breadcrumbs">
									<a href="index.php">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Bed &amp; Bath
								</div>
							</div>
						</div>

						<div id="content" class="site-content" role="main">
							<div class="section-padding">
								<div class="section-container p-l-r">
									<div class="row">
										<div class="col-xl-9 col-lg-9 col-md-12 col-12 products-column">
											<div class="products-topbar clearfix">
												<div class="products-topbar-left">
													<div class="products-count">
														Showing all 21 results
													</div>
												</div>
												<div class="products-topbar-right">
													<div class="products-sort dropdown">
														<!-- <span class="sort-toggle dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Default sorting</span> -->
														<!-- <ul class="sort-list dropdown-menu" x-placement="bottom-start">
															<li class="active"><a href="#">Default sorting</a></li>
															<li><a href="#">Sort by popularity</a></li>
															<li><a href="#">Sort by average rating</a></li>
															<li><a href="#">Sort by latest</a></li>
															<li><a href="#">Sort by price: low to high</a></li>
															<li><a href="#">Sort by price: high to low</a></li>
														</ul> -->
													</div>
													<ul class="layout-toggle nav nav-tabs">
														<li class="nav-item">
															<a class="layout-grid nav-link active" data-toggle="tab" href="#layout-grid" role="tab"><span class="icon-column"><span class="layer first"><span></span><span></span><span></span></span><span class="layer middle"><span></span><span></span><span></span></span><span class="layer last"><span></span><span></span><span></span></span></span></a>
														</li>
														<li class="nav-item">
															<a class="layout-list nav-link" data-toggle="tab" href="#layout-list" role="tab"><span class="icon-column"><span class="layer first"><span></span><span></span></span><span class="layer middle"><span></span><span></span></span><span class="layer last"><span></span><span></span></span></span></a>
														</li>
													</ul>
												</div>
											</div>

											<div class="tab-content">
												<div class="tab-pane fade show active" id="layout-grid" role="tabpanel">
													<div class="products-list grid">
														<div class="row">
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
																<div class="products-entry clearfix product-wapper">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/Tees/8.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/Tees/1.jpg" class="hover-image back" alt="">
																			</a>
																		</div>		
																		<div class="product-button">
																			<!-- <div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div> -->
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<!-- <div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																			<span class="product-quickview" data-title="Quick View">
																				<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																			</span>	-->
																		</div>
																	</div>
																	<div class="products-content">
																		<div class="contents text-center">
																			<h3 class="product-title"><a href="shop-details.html">Dining Table</a></h3>
																			<span class="price">$150.00</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
																<div class="products-entry clearfix product-wapper">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="onsale">-33%</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/Tees/2.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/Tees/7.jpg" class="hover-image back" alt="">
																			</a>
																		</div>		
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																			<span class="product-quickview" data-title="Quick View">
																				<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																			</span>		
																		</div>
																	</div>
																	<div class="products-content">
																		<div class="contents text-center">
																			<h3 class="product-title"><a href="shop-details.html">Pillar Dining Table Round</a></h3>
																			<span class="price">
																				<del aria-hidden="true"><span>$150.00</span></del> 
																				<ins><span>$100.00</span></ins>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
																<div class="products-entry clearfix product-wapper">
																	<div class="products-thumb">
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/Tees/11.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/Tees/3.jpg" class="hover-image back" alt="">
																			</a>
																		</div>		
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																			<span class="product-quickview" data-title="Quick View">
																				<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																			</span>		
																		</div>
																	</div>
																	<div class="products-content">
																		<div class="contents text-center">
																			<h3 class="product-title"><a href="shop-details.html">Mags Sofa 2.5 Seater</a></h3>
																			<span class="price">$150.00</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
																<div class="products-entry clearfix product-wapper">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="onsale">-33%</div>
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/Tees/13.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/Tees/4.jpg" class="hover-image back" alt="">
																			</a>
																		</div>		
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																			<span class="product-quickview" data-title="Quick View">
																				<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																			</span>		
																		</div>
																	</div>
																	<div class="products-content">
																		<div class="contents text-center">
																			<h3 class="product-title"><a href="shop-details.html">Spinning pendant lamp</a></h3>
																			<span class="price">
																				<del aria-hidden="true"><span>$150.00</span></del> 
																				<ins><span>$100.00</span></ins>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
																<div class="products-entry clearfix product-wapper">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="onsale">-23%</div>
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/Tees/16.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/Tees/5.jpg" class="hover-image back" alt="">
																			</a>
																		</div>		
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																			<span class="product-quickview" data-title="Quick View">
																				<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																			</span>		
																		</div>
																	</div>
																	<div class="products-content">
																		<div class="contents text-center">
																			<h3 class="product-title"><a href="shop-details.html">Bora Armchair</a></h3>
																			<span class="price">
																				<del aria-hidden="true"><span>$100.00</span></del> 
																				<ins><span>$90.00</span></ins>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
															<!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
																<div class="products-entry clearfix product-wapper">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="onsale">-37%</div>
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/10.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/10-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>		
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																			<span class="product-quickview" data-title="Quick View">
																				<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																			</span>		
																		</div>
																	</div>
																	<div class="products-content">
																		<div class="contents text-center">
																			<h3 class="product-title"><a href="shop-details.html">Panton Dining Table</a></h3>
																			<span class="price">
																				<del aria-hidden="true"><span>$79.00</span></del> 
																				<ins><span>$50.00</span></ins>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
																<div class="products-entry clearfix product-wapper">
																	<div class="products-thumb">
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/11.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/11-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>		
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																			<span class="product-quickview" data-title="Quick View">
																				<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																			</span>		
																		</div>
																	</div>
																	<div class="products-content">
																		<div class="contents text-center">
																			<h3 class="product-title"><a href="shop-details.html">Kittchen Table</a></h3>
																			<span class="price">$120.00</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
																<div class="products-entry clearfix product-wapper">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="onsale">-10%</div>
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/12.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/12-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>		
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																			<span class="product-quickview" data-title="Quick View">
																				<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																			</span>		
																		</div>
																	</div>
																	<div class="products-content">
																		<div class="contents text-center">
																			<h3 class="product-title"><a href="shop-details.html">Mundo Sofa With Cushion</a></h3>
																			<span class="price">
																				<del aria-hidden="true"><span>$200.00</span></del> 
																				<ins><span>$180.00</span></ins>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
																<div class="products-entry clearfix product-wapper">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/5.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/5-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																			<span class="product-quickview" data-title="Quick View">
																				<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																			</span>		
																		</div>
																	</div>
																	<div class="products-content">
																		<div class="contents text-center">
																			<h3 class="product-title"><a href="shop-details.html">Amp Pendant Light Large</a></h3>
																			<span class="price">$140.00</span>
																		</div>
																	</div>
																</div>
															</div> -->
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="layout-list" role="tabpanel">
													<div class="products-list list">
														<div class="products-entry clearfix product-wapper">
															<div class="row">
																<div class="col-md-4">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/6.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/6-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<span class="product-quickview" data-title="Quick View">
																			<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																		</span>
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="products-content">
																		<h3 class="product-title"><a href="shop-details.html">Dining Table</a></h3>
																		<span class="price">$150.00</span>
																		<div class="rating">
																			<div class="star star-5"></div>
																			<div class="review-count">
																				(1<span> review</span>)
																			</div>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																		</div>
																		<div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>			
																	</div>
																</div>
															</div>
														</div>
														<div class="products-entry clearfix product-wapper">
															<div class="row">
																<div class="col-md-4">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/4.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/4-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<span class="product-quickview" data-title="Quick View">
																			<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																		</span>
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="products-content">
																		<h3 class="product-title"><a href="shop-details.html">Pillar Dining Table Round</a></h3>
																		<span class="price">
																			<del aria-hidden="true"><span>$150.00</span></del> 
																			<ins><span>$100.00</span></ins>
																		</span>
																		<div class="rating">
																			<div class="star star-0"></div>
																			<div class="review-count">
																				(0<span> review</span>)
																			</div>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																		</div>
																		<div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>			
																	</div>
																</div>
															</div>
														</div>
														<div class="products-entry clearfix product-wapper">
															<div class="row">
																<div class="col-md-4">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/7.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/7-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<span class="product-quickview" data-title="Quick View">
																			<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																		</span>
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="products-content">
																		<h3 class="product-title"><a href="shop-details.html">Mags Sofa 2.5 Seater</a></h3>
																		<span class="price">$150.00</span>
																		<div class="rating">
																			<div class="star star-4"></div>
																			<div class="review-count">
																				(1<span> review</span>)
																			</div>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																		</div>
																		<div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>			
																	</div>
																</div>
															</div>
														</div>
														<div class="products-entry clearfix product-wapper">
															<div class="row">
																<div class="col-md-4">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/8.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/8-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<span class="product-quickview" data-title="Quick View">
																			<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																		</span>
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="products-content">
																		<h3 class="product-title"><a href="shop-details.html">Spinning pendant lamp</a></h3>
																		<span class="price">
																			<del aria-hidden="true"><span>$120.00</span></del> 
																			<ins><span>$100.00</span></ins>
																		</span>
																		<div class="rating">
																			<div class="star star-0"></div>
																			<div class="review-count">
																				(0<span> review</span>)
																			</div>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																		</div>
																		<div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>			
																	</div>
																</div>
															</div>
														</div>
														<div class="products-entry clearfix product-wapper">
															<div class="row">
																<div class="col-md-4">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/9.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/9-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<span class="product-quickview" data-title="Quick View">
																			<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																		</span>
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="products-content">
																		<h3 class="product-title"><a href="shop-details.html">Bora Armchair</a></h3>
																		<span class="price">
																			<del aria-hidden="true"><span>$100.00</span></del> 
																			<ins><span>$90.00</span></ins>
																		</span>
																		<div class="rating">
																			<div class="star star-5"></div>
																			<div class="review-count">
																				(3<span> review</span>)
																			</div>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																		</div>
																		<div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>			
																	</div>
																</div>
															</div>
														</div>
														<div class="products-entry clearfix product-wapper">
															<div class="row">
																<div class="col-md-4">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/10.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/10-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<span class="product-quickview" data-title="Quick View">
																			<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																		</span>
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="products-content">
																		<h3 class="product-title"><a href="shop-details.html">Panton Dining Table</a></h3>
																		<span class="price">
																			<del aria-hidden="true"><span>$79.00</span></del> 
																			<ins><span>$50.00</span></ins>
																		</span>
																		<div class="rating">
																			<div class="star star-5"></div>
																			<div class="review-count">
																				(2<span> review</span>)
																			</div>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																		</div>
																		<div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>			
																	</div>
																</div>
															</div>
														</div>
														<div class="products-entry clearfix product-wapper">
															<div class="row">
																<div class="col-md-4">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/11.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/11-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<span class="product-quickview" data-title="Quick View">
																			<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																		</span>
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="products-content">
																		<h3 class="product-title"><a href="shop-details.html">Kittchen Table</a></h3>
																		<span class="price">$120.00</span>
																		<div class="rating">
																			<div class="star star-4"></div>
																			<div class="review-count">
																				(1<span> review</span>)
																			</div>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																		</div>
																		<div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>			
																	</div>
																</div>
															</div>
														</div>
														<div class="products-entry clearfix product-wapper">
															<div class="row">
																<div class="col-md-4">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/12.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/12-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<span class="product-quickview" data-title="Quick View">
																			<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																		</span>
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="products-content">
																		<h3 class="product-title"><a href="shop-details.html">Mundo Sofa With Cushion</a></h3>
																		<span class="price">
																			<del aria-hidden="true"><span>$200.00</span></del> 
																			<ins><span>$180.00</span></ins>
																		</span>
																		<div class="rating">
																			<div class="star star-5"></div>
																			<div class="review-count">
																				(4<span> review</span>)
																			</div>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																		</div>
																		<div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>			
																	</div>
																</div>
															</div>
														</div>
														<div class="products-entry clearfix product-wapper">
															<div class="row">
																<div class="col-md-4">
																	<div class="products-thumb">
																		<div class="product-lable">
																			<div class="hot">Hot</div>
																		</div>
																		<div class="product-thumb-hover">
																			<a href="shop-details.html">
																				<img width="600" height="600" src="media/product/5.jpg" class="post-image" alt="">
																				<img width="600" height="600" src="media/product/5-2.jpg" class="hover-image back" alt="">
																			</a>
																		</div>
																		<span class="product-quickview" data-title="Quick View">
																			<a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
																		</span>
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="products-content">
																		<h3 class="product-title"><a href="shop-details.html">Amp Pendant Light Large</a></h3>
																		<span class="price">$140.00</span>
																		<div class="rating">
																			<div class="star star-5"></div>
																			<div class="review-count">
																				(1<span> review</span>)
																			</div>
																		</div>
																		<div class="product-button">
																			<div class="btn-add-to-cart" data-title="Add to cart">
																				<a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
																			</div>
																			<div class="btn-wishlist" data-title="Wishlist">
																				<button class="product-btn">Add to wishlist</button>
																			</div>
																			<div class="btn-compare" data-title="Compare">
																				<button class="product-btn">Compare</button>
																			</div>
																		</div>
																		<div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>			
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<nav class="pagination">
												<ul class="page-numbers">
													<li><a class="prev page-numbers" href="#">Previous</a></li>
													<li><span aria-current="page" class="page-numbers current">1</span></li>
													<li><a class="page-numbers" href="#">2</a></li>
													<li><a class="page-numbers" href="#">3</a></li>
													<li><a class="next page-numbers" href="#">Next</a></li>
												</ul>
											</nav>
										</div>

										<div class="col-xl-3 col-lg-3 col-md-12 col-12 sidebar right-sidebar md-b-50">
											<!-- Block Product Categories -->
											<!-- <div class="block block-product-cats">
												<div class="block-title"><h2>Categories</h2></div>
												<div class="block-content">
													<div class="product-cats-list">
														<ul>
															<li class="current">
																<a href="shop-grid-left.html">Bed & Bath <span class="count">9</span></a>
															</li>
															<li>
																<a href="shop-grid-left.html">Furniture <span class="count">4</span></a>
															</li>
															<li>
																<a href="shop-grid-left.html">Home Décor <span class="count">3</span></a>
															</li>
															<li>
																<a href="shop-grid-left.html">Lighting <span class="count">6</span></a>
															</li>
															<li>
																<a href="shop-grid-left.html">Office <span class="count">2</span></a>
															</li>
															<li>
																<a href="shop-grid-left.html">Outdoor <span class="count">4</span></a>
															</li>
														</ul>
													</div>
												</div>
											</div> -->

											<!-- Block Product Filter -->
											<!-- <div class="block block-product-filter">
												<div class="block-title"><h2>Price</h2></div>
												<div class="block-content">
													<div id="slider-range" class="price-filter-wrap">
														<div class="filter-item price-filter">
															<div class="layout-slider">
																<input id="price-filter" name="price" value="0;100">
															</div>
															<div class="layout-slider-settings"></div>
														</div>
													</div>
												</div>
											</div> -->

											<!-- Block Product Filter -->
											<!-- <div class="block block-product-filter clearfix">
												<div class="block-title"><h2>Size</h2></div>
												<div class="block-content">
													<ul class="filter-items text">
														<li><span>L</span></li>
														<li><span>M</span></li>
														<li><span>S</span></li>
													</ul>
												</div>
											</div> -->

											<!-- Block Product Filter -->
											<!-- <div class="block block-product-filter clearfix">
												<div class="block-title"><h2>Brands</h2></div>
												<div class="block-content">
													<ul class="filter-items image">
														<li><span><img src="media/brand/1.jpg" alt="Brand"></span></li>
														<li><span><img src="media/brand/2.jpg" alt="Brand"></span></li>
														<li><span><img src="media/brand/3.jpg" alt="Brand"></span></li>
														<li><span><img src="media/brand/4.jpg" alt="Brand"></span></li>
														<li><span><img src="media/brand/5.jpg" alt="Brand"></span></li>
													</ul>
												</div>
											</div> -->

											<!-- Block Products -->
											<!-- <div class="block block-products">
												<div class="block-title"><h2>Feature Product</h2></div>
												<div class="block-content">
													<ul class="products-list">
														<li class="product-item">
															<a href="shop-details.html" class="product-image">
																<img src="media/product/6.jpg">
															</a>
															<div class="product-content">
																<h2 class="product-title">
																	<a href="shop-details.html">
																		Dining Table
																	</a>
																</h2>
																<div class="rating small">
																	<div class="star star-5"></div>
																</div>
																<span class="price">
																	<del aria-hidden="true"><span>$150.00</span></del> 
																	<ins><span>$100.00</span></ins>
																</span>
															</div>
														</li>
														<li class="product-item">
															<a href="shop-details.html" class="product-image">
																<img src="media/product/8.jpg">
															</a>
															<div class="product-content">
																<h2 class="product-title">
																	<a href="shop-details.html">
																		Spinning Pendant Lamp
																	</a>
																</h2>
																<div class="rating small">
																	<div class="star star-0"></div>
																</div>
																<span class="price">$120.00</span>
															</div>
														</li>
														<li class="product-item">
															<a href="shop-details.html" class="product-image">
																<img src="media/product/9.jpg">
															</a>
															<div class="product-content">
																<h2 class="product-title">
																	<a href="shop-details.html">
																		Bora Armchair
																	</a>
																</h2>
																<div class="rating small">
																	<div class="star star-5"></div>
																</div>
																<span class="price">
																	<del aria-hidden="true"><span>$200.00</span></del> 
																	<ins><span>$180.00</span></ins>
																</span>
															</div>
														</li>
													</ul>
												</div>
											</div>  -->
										</div>
									</div>
								</div>
							</div>
						</div><!-- #content -->
					</div><!-- #primary -->
				</div><!-- #main-content -->
			</div>

			<footer id="site-footer" class="site-footer background">
				<div class="footer">
					<div class="section-padding">
						<div class="section-container">
							<div class="block-widget-wrap">
								<div class="row">
									<div class="col-lg-3 col-md-6">
										<div class="block block-menu m-b-20">
											<h2 class="block-title">Contact Us</h2>
											<div class="block-content">
												<ul>
													<li>
														<a href="page-contact.html">616.774.0561</a>
													</li>
													<li>
														<a href="page-contact.html">866.453.4748</a>
													</li>
													<li>
														<a href="page-contact.html">HR Fax: 810.222.5439</a>
													</li>
													<li>
														<a href="page-contact.html">sales@ruperfurniture.com</a>
													</li>
												</ul>
											</div>
										</div>

										<div class="block block-social">
											<ul class="social-link">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-instagram"></i></a></li>
												<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
												<li><a href="#"><i class="fa fa-behance"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-3 col-md-6">
										<div class="block block-menu">
											<h2 class="block-title">Showroom</h2>
											<div class="block-content">
												<p>1000 84th Street SW , Byron Center, MI 49315</p>
												<p>AmericasMart Bldg. #1</p>
												<p>Suite 5C-1, Atlanta, GA 30303</p>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6">
										<div class="block block-menu">
											<h2 class="block-title">Services</h2>
											<div class="block-content">
												<ul>
													<li>
														<a href="page-about.html">Sale</a>
													</li>
													<li>
														<a href="page-about.html">Quick Ship</a>
													</li>
													<li>
														<a href="page-about.html">New Designs</a>
													</li>
													<li>
														<a href="page-about.html">Accidental Fabric Protection</a>
													</li>
													<li>
														<a href="page-about.html">Furniture Care</a>
													</li>
													<li>
														<a href="page-about.html">Gift Cards</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6">
										<div class="block block-newsletter">
											<h2 class="block-title">Newsletter</h2>
											<div class="block-content">
												<div class="newsletter-text">Enter your email below to be the first to know about new collections and product launches.</div>
												<form action="" method="post" class="newsletter-form">
													<input type="email" class="bg-white" name="your-email" value="" size="40" placeholder="Email address">
													<span class="btn-submit">
														<input type="submit" value="Subscribe">
													</span>
												</form>
											</div>
										</div>
										<div class="block block-image">
											<img width="309" height="32" src="media/payments.png" alt="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					<div class="section-padding">
						<div class="section-container">
							<div class="block-widget-wrap">
								<p class="copyright text-center">Copyright © 2022. All Right Reserved</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
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

		<!-- Quickview -->
		<div class="quickview-popup">
			<div id="quickview-container"> 
				<div class="quickview-container"> 
					<a href="#" class="quickview-close"></a> 
					<div class="quickview-notices-wrapper"></div> 
					<div class="product single-product product-type-simple">
						<div class="product-detail">
							<div class="row"> 
								<div class="img-quickview"> 
									<div class="product-images-slider">
										<div id="quickview-slick-carousel"> 
											<div class="images"> 
												<div class="scroll-image">
													<div class="slick-wrap">
														<div class="slick-sliders image-additional" data-dots="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
															<div class="img-thumbnail slick-slide"> 
																<a href="media/product/3.jpg" class="image-scroll" title="">
																	<img width="900" height="900" src="media/product/3.jpg" alt="">
																</a> 
															</div>
															<div class="img-thumbnail slick-slide"> 
																<a href="media/product/3-2.jpg" class="image-scroll" title="">
																	<img width="900" height="900" src="media/product/3-2.jpg" alt="">
																</a> 
															</div>
														</div>
													</div>
												</div> 
											</div> 
										</div> 
									</div> 
								</div> 
								<div class="quickview-single-info">
									<div class="product-content-detail entry-summary">
										<h1 class="product-title entry-title">Chair Oak Matt Lacquered</h1>
										<div class="price-single">
											<div class="price">
												<del><span>$150.00</span></del>
												<span>$100.00</span>
											</div>
										</div>
										<div class="product-rating"> 
											<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
												<span style="width:80%">Rated <strong class="rating">4.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
											</div> 
											<a href="#" class="review-link">(<span class="count">1</span> customer review)</a> 
										</div>
										<div class="description"> 
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore…</p> 
										</div>
										<form class="cart" method="post" enctype="multipart/form-data">
											<div class="quantity-button">
												<div class="quantity"> 
													<button type="button" class="plus">+</button> 
													<input type="number" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off"> 
													<button type="button" class="minus">-</button> 
												</div> 
												<button type="submit" class="single-add-to-cart-button button alt">Add to cart</button> 
											</div> 
											<button class="button quick-buy">Buy It Now</button>
										</form> 
									</div> 
								</div> 
							</div> 
						</div>
					</div> 
					<div class="clearfix"></div> 
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
		
		<!-- Site Scripts -->
		<script src="assets/js/app.js"></script>
	</body>
</html>