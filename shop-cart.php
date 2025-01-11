<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Shop Cart | Ruper</title>
		
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
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>

	<script>
		$(document).ready(function () {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Function to populate the cart page from localStorage
    function populateCartPage() {
        if (cart.length > 0) {
            $('.shop-cart-empty').hide();
            $('.shop-cart').show();

            let cartItemsHTML = '';
            let total = 0;

            cart.forEach((product, index) => {
                const productTotal = parseFloat(product.price.replace('$', '')) * product.quantity;
                total += productTotal;

                cartItemsHTML += `
                    <tr class="cart-item">		
                        <td class="product-thumbnail">
                            <a href="shop-details.html">
                                <img width="600" height="600" src="${product.image}" class="product-image" alt="">
                            </a>				
                            <div class="product-name">
                                <a href="shop-details.html">${product.name}</a>								
                            </div>
                        </td>
                        <td class="product-price">
                            <span class="price">${product.price}</span>
                        </td>
                        <td class="product-quantity">
                            <div class="quantity">
                                <button type="button" class="minus" data-index="${index}">-</button>	
                                <input type="number" class="qty" step="1" min="1" name="quantity" value="${product.quantity}" data-index="${index}" title="Qty" size="4" inputmode="numeric" autocomplete="off">
                                <button type="button" class="plus" data-index="${index}">+</button>
                            </div>
                        </td>
                        <td class="product-subtotal">
                            <span>$${productTotal.toFixed(2)}</span>
                        </td>
                        <td class="product-remove">
                            <a href="#" class="remove" data-index="${index}">×</a>								
                        </td>
                    </tr>
                `;
            });
			cartItemsHTML+=`<tr>
								<td colspan="6" class="actions">
									<div class="bottom-cart">
										<div class="coupon">
											<input type="text" name="coupon_code" class="input-text" id="coupon-code" value="" placeholder="Coupon code"> 
											<button type="submit" name="apply_coupon" class="button" value="Apply coupon">Apply coupon</button>
										</div>
										<h2><a href="shop-grid-left.html">Continue Shopping</a></h2>
									</div>	
								</td>
							</tr>`

            $('.cart-items tbody').html(cartItemsHTML);
            updateCartTotals(total);
        } else {
            $('.shop-cart').hide();
            $('.shop-cart-empty').show();
        }
    }

    // Update cart totals
    function updateCartTotals(total) {
        $('.cart-subtotal span').text(`$${total.toFixed(2)}`);
        $('.order-total span').text(`$${total.toFixed(2)}`);
    }

    // Update cart in localStorage and refresh UI
    function updateLocalStorageAndUI() {
        localStorage.setItem('cart', JSON.stringify(cart));
        populateCartPage();
    }

    // Handle quantity change (plus and minus buttons)
    $(document).on('click', '.plus, .minus', function () {
        const index = $(this).data('index');
        const isPlus = $(this).hasClass('plus');

        if (isPlus) {
            cart[index].quantity++;
        } else if (cart[index].quantity > 1) {
            cart[index].quantity--;
        }

        updateLocalStorageAndUI();
    });

    // Handle quantity input change directly
    $(document).on('change', '.qty', function () {
        const index = $(this).data('index');
        const quantity = parseInt($(this).val());

        if (quantity > 0) {
            cart[index].quantity = quantity;
        } else {
            cart[index].quantity = 1; // Set to 1 if invalid input
        }

        updateLocalStorageAndUI();
    });

    // Handle item removal
    $(document).on('click', '.remove', function (e) {
        e.preventDefault();
        const index = $(this).data('index');

        cart.splice(index, 1); // Remove item from cart
        updateLocalStorageAndUI();
    });

    // Handle cart update button
    $('.cart-form').on('submit', function (e) {
        e.preventDefault();
        populateCartPage(); // Refresh cart UI
    });

    // Populate the cart page on page load
    populateCartPage();
});

	</script>
	
	</head>
	
	<body class="shop">
		<div id="page" class="hfeed page-wrapper">
		<?php include('header.php'); ?>

			<div id="site-main" class="site-main">
				<div id="main-content" class="main-content">
					<div id="primary" class="content-area">
						<div id="title" class="page-title">
							<div class="section-container">
								<div class="content-title-heading">
									<h1 class="text-title-heading">
										Shopping Cart
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
									<div class="shop-cart">	
										<div class="row">
											<div class="col-xl-8 col-lg-12 col-md-12 col-12">
												<form class="cart-form" action="" method="post">
													<div class="table-responsive">
														<table class="cart-items table" cellspacing="0">
															<thead>
																<tr>
																	<th class="product-thumbnail">Product</th>
																	<th class="product-price">Price</th>
																	<th class="product-quantity">Quantity</th>
																	<th class="product-subtotal">Subtotal</th>
																	<th class="product-remove">&nbsp;</th>
																</tr>
															</thead>
															<tbody>
																
															</tbody>
														</table>
													</div>
												</form>
											</div>
											<div class="col-xl-4 col-lg-12 col-md-12 col-12">
												<div class="cart-totals">
													<h2>Cart totals</h2>
													<div>
														<div class="cart-subtotal">
															<div class="title">Subtotal</div>
															<div><span>$480.00</span></div>
														</div>
														<div class="shipping-totals">
															<div class="title">Shipping</div>
															<div>
																<ul class="shipping-methods custom-radio">
																	<li>
																		<input type="radio" name="shipping_method" data-index="0" value="free_shipping" class="shipping_method" checked="checked"><label>Free shipping</label>
																	</li>
																	<li>
																		<input type="radio" name="shipping_method" data-index="0" value="flat_rate" class="shipping_method"><label>Flat rate</label>					
																	</li>
																</ul>
																<p class="shipping-desc">
																	Shipping options will be updated during checkout.				
																</p>
															</div>
														</div>
														<div class="order-total">
															<div class="title">Total</div>
															<div><span>$480.00</span></div>
														</div>
													</div>
													<div class="proceed-to-checkout">		
														<a href="shop-checkout.html" class="checkout-button button">
															Proceed to checkout
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="shop-cart-empty">
										<div class="notices-wrapper">
											<p class="cart-empty">Your cart is currently empty.</p>
										</div>	
										<div class="return-to-shop">
											<a class="button" href="shop-grid-left.html">
												Return to shop		
											</a>
										</div>
									</div>
								</div>
							</div>
						</div><!-- #content -->
					</div><!-- #primary -->
				</div><!-- #main-content -->
			</div>

			<?php include('footer.php'); ?>
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
		
		<!-- Site Scripts -->
		<script src="assets/js/app.js"></script>
	</body>
</html>