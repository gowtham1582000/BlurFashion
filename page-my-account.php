<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>My Account | Ruper</title>
		
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
		<style>
			.order-card {
				border: 1px solid #e0e0e0;
				border-radius: 10px;
				margin-bottom: 20px;
				background: #ffffff;
				box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
				overflow: hidden;
				transition: transform 0.3s ease-in-out;
			}
			.order-card:hover {
				transform: scale(1.02);
			}
			.order-card-header {
				background: #f3f3f3;
				padding: 10px 15px;
				display: flex;
				justify-content: space-between;
				align-items: center;
				border-bottom: 1px solid #e0e0e0;
			}
			.order-card-body {
				display: flex;
				flex-wrap: wrap;
				padding: 15px;
				gap: 15px;
			}
			.order-image img {
				width: 100px;
				height: 100px;
				border-radius: 10px;
				object-fit: cover;
				box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
			}
			.order-info p {
				margin: 5px 0;
				font-size: 14px;
			}
			@media (max-width: 768px) {
				.order-card-body {
					flex-direction: column;
					text-align: center;
				}
				.order-image img {
					margin-bottom: 10px;
				}
			}
			.address-container {
				display: flex;
				flex-wrap: wrap;
				gap: 20px;
			}
			.address-card {
				background: #f5f5f5;
				border: 1px solid #ccc;
				border-radius: 10px;
				padding: 20px;
				width: 100%;
				max-width: 400px;
				box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
				transition: transform 0.3s ease;
			}
			.address-card:hover {
				transform: scale(1.03);
			}
			.address-header {
				display: flex;
				justify-content: space-between;
				align-items: flex-start;
				margin-bottom: 15px;
				border-bottom: 1px solid #ccc;
				padding-bottom: 10px;
			}
			.address-header h4 {
				margin: 0;
				font-size: 18px;
				font-weight: 600;
				color: #333;
			}
			.address-actions {
				display: flex;
				gap: 10px;
			}
			.address-actions button {
				background: #007bff;
				color: #fff;
				border: none;
				border-radius: 5px;
				cursor: pointer;
				transition: background 0.3s ease;
				display: flex;
				align-items: center;
				gap: 5px;
				justify-content: center;
			}
			.address-actions button:hover {
				background: #0056b3;
			}
			.address-body p {
				margin: 5px 0;
				color: #555;
				font-size: 14px;
			}
			.address-footer label {
				font-weight: 600;
				color: #007bff;
				cursor: pointer;
				display: flex;
				align-items: center;
				gap: 5px;
			}
			.modal {
				display: none;
				position:absolute;
				transform: translate(-50%, 10%); 
				top: 50%;
    			left: 50%;
				width: 100%;
				height: 100%;
				justify-content: center;
				align-items: center;
				z-index: 1000;
				animation: fadeIn 0.3s ease-in-out;
			}
			.modal-content {
				background: white;
				padding: 30px;
				border-radius: 15px;
				width: 100%;
				max-width: 500px;
				text-align: center;
				position: relative;
				animation: slideIn 0.4s ease-in-out;
				margin: auto;
			}
.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
    color: #333;
    transition: color 0.3s ease;
}
.close-btn:hover {
    color: red;
}
.input-field {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: calc(100% - 22px);
    margin-bottom: 10px;
    display: block;
}
			.save-btn {
				background: #28a745;
				color: #fff;
				border: none;
				padding: 10px;
				border-radius: 5px;
				cursor: pointer;
				transition: background 0.3s ease;
			}
			.save-btn:hover {
				background: #218838;
			}
			.form-group {
				display: flex;
				gap: 10px;  /* Adds spacing between inputs */
				flex-wrap: wrap;  /* Ensures responsiveness on smaller screens */
			}

			.form-group input {
				flex: 1;  /* Makes input fields take equal width */
				min-width: 150px;  /* Prevents fields from getting too small */
			}
			.my-account-addresses {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin: auto;
    }
    
    .my-account-addresses p {
        font-size: 16px;
        color: #555;
        margin-bottom: 15px;
    }

    .add-btn {
        background: #28a745;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        justify-content: center;
        margin: 10px auto;
    }

    .add-btn:hover {
        background: #218838;
    }
	.no-data {
    text-align: center;
    font-size: 16px;
    color: #888;
    padding: 20px;
    font-weight: 600;
}
.address-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.address-header p {
    margin: 0;
    flex-grow: 1;
}

.add-btn {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
    font-size: 14px;
}

.add-btn:hover {
    background: #0056b3;
}

		</style> 
	</head>
	
	<body class="blog">
		<div id="page" class="hfeed page-wrapper">
			<?php include('header.php'); ?>

			<div id="site-main" class="site-main">
				<div id="main-content" class="main-content">
					<div id="primary" class="content-area">
						<div id="title" class="page-title">
							<div class="section-container">
								<div class="content-title-heading">
									<h1 class="text-title-heading">
										My Account
									</h1>
								</div>
								<div class="breadcrumbs">
									<a href="index.php">Home</a><span class="delimiter"></span>My Account
								</div>
							</div>
						</div>

						<div id="content" class="site-content" role="main">
							<div class="section-padding">
								<div class="section-container p-l-r">
									<div class="page-my-account">
										<div class="my-account-wrap clearfix">
											<nav class="my-account-navigation">
				
												<ul class="nav nav-tabs">
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#orders" role="tab">Orders</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#addresses" role="tab">Addresses</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#account-details" role="tab">Account details</a>
													</li>
												</ul>
											</nav>
											<div class="my-account-content tab-content">
												
												<div class="tab-pane fade show active" id="orders" role="tabpanel">
													<div class="my-account-orders">
														<div class="order-list">
															<table class="DataTable" id="OrderTable">
																<thead>
																	<tr>
																		<th style="align-items: center;">Order Details</th>
																	</tr>
																</thead>
																<tbody>
																	
																</tbody>
															</table>
															
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="addresses" role="tabpanel">
													<div class="my-account-addresses">
														<div class="address-header">
															<p>The following addresses will be used on the checkout page by default.</p>
															<button class="add-btn" onclick="OpenEditModal(0,'I',null)">➕ Add</button>
														</div>
														

														<div class="address-container" id="AddressList">
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="account-details" role="tabpanel">
													<div class="my-account-account-details">
														<p class="form-row">
															<label>Display name <span class="required">*</span></label>
															<input type="text" class="input-text" name="account_display_name"> 
															<span><em>This will be how your name will be displayed in the account section and in reviews</em></span>
														</p>
														<div class="clear"></div>
														<p class="form-row">
															<label>Email address <span class="required">*</span></label>
															<input type="email" class="input-text" name="account_email">
														</p>
														<form class="edit-account" action="" method="post">
															<fieldset>
																<legend>Password change</legend>
																<p class="form-row">
																	<label>Current password (leave blank to leave unchanged)</label>
																	<input type="password" class="input-text" name="password_current" autocomplete="off">
																</p>
																<p class="form-row">
																	<label>New password (leave blank to leave unchanged)</label>
																	<input type="password" class="input-text" name="password_1" autocomplete="off">
																</p>
																<p class="form-row">
																	<label>Confirm new password</label>
																	<input type="password" class="input-text" name="password_2" autocomplete="off">
																</p>
															</fieldset>
															<div class="clear"></div>
															<p class="form-row">
																<button type="submit" class="button" name="save_account_details" value="Save changes">Save changes</button>
															</p>
														</form>
													</div>
												</div>
											</div>
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

		<div class="modal" id="EditModal">
			<div class="modal-content">
				<span class="close-btn" onclick="CloseModal()">&times;</span>
				<h3 id="ModalHeader">Edit Address</h3>
				<form id="EditAddressForm">
					<input type="hidden" id="AddressId" name="AddressId">
					<div class="form-group">
						<input type="text" id="FirstName" name="FirstName" placeholder="First Name" class="input-field">
						<input type="text" id="LastName" name="LastName" placeholder="Last Name" class="input-field">
					</div>
					<div class="form-group">
						<input type="text" id="DoorNo" name="DoorNo" placeholder="Door No" class="input-field">
						<input type="text" id="StreetAddress" name="StreetAddress" placeholder="Street Address" class="input-field">
					</div>
					<div class="form-group">
						<input type="text" id="City" name="City" placeholder="City" class="input-field">
						<input type="text" id="State" name="State" placeholder="State" class="input-field">
						<input type="text" id="Country" name="Country" placeholder="Country" class="input-field">
					</div>
					<div class="form-group">
						<input type="text" id="Postcode" name="Postcode" placeholder="Postcode" class="input-field">
						<input type="text" id="Phone" name="Phone" placeholder="Phone Number" class="input-field">
					</div>
					<button type="submit" class="save-btn">💾 Save Changes</button>
				</form>
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

	<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		
		UserDashboard();
		function UserDashboard() { 
			$.ajax({
				url: "UserDashboard.php", // Replace with your PHP file path
				type: "POST",
				data: {
					user_id: localStorage.getItem("userid")
				},
				dataType: "json",
				success: function (response) {
					if (response.success) {
						console.log("Success:", response.message);
						$('#OrderTable tbody').empty()
						DisplayProducts(response.data.OrderList);
						DisplayAddresses(response.data.UserAddress)
						console.log("Products:", response);
					} else {
						console.log("Error:", response.message);
					}
				},
				error: function (xhr, status, error) {
					console.log("AJAX Error:", error);
				}
			});
		}
		function DisplayProducts(products) {
			
			if(products.length>0){
				products.forEach(product => {
					let orderCard = `
						<tr>
							<td>
								<div class="order-card">
									<div class="order-card-header">
										<h4>${product.OrderName} - ${product.OrderSize} - ${product.OrderColor}</h4>
										<span class="order-date">${new Date(product.OrderDate).toLocaleDateString("en-IN", {
											year: 'numeric',
											month: 'long',
											day: 'numeric'
										})}</span>
									</div>
									<div class="order-card-body">
										<div class="order-image">
											<img src="${product.OrderImage}" alt="${product.OrderName}">
										</div>
										<div class="order-info">
											<p><strong>Quantity:</strong> ${product.OrderQuantity}</p>
											<p><strong>Rate:</strong> ₹${product.Rate}</p>
											<p><strong>Total:</strong> ₹${product.Total}</p>
										</div>
										<div class="order-info">
											<p><strong>Shipping Address:</strong> ${product.OrderAddress}</p>
										</div>
									</div>
								</div>
							</td>
						</tr>
					`;
					$('#OrderTable tbody').append(orderCard)
					//orderTable.row.add($(orderCard)).draw(false);
				});

			}else{
				
			}
		
			let orderTable = $('#OrderTable').DataTable({
				"paging": true,
				"pageLength": 1,
				"lengthChange": false,
				"info": false,
				"searching": false,
				"ordering": false,
				"destroy": true // Destroy previous instance to avoid duplication
			});
		}
		function DisplayAddresses(addresses) {
			let addressList = document.getElementById("AddressList");
			addressList.innerHTML = "";
			if(addresses.length>0){
				addresses.forEach(address => {
					let isDefault = address.DefaultAddress === "Y" ? "checked" : "";
					let addressCard = `
						<div class="address-card">
							<div class="address-header">
								<h4>${address.first_name} ${address.last_name}</h4>
								<div class="address-actions">
									<button class="edit-btn" onclick="OpenEditModal('${address.id}','U',${JSON.stringify(address).replace(/"/g, '&quot;')})">✏️ Edit</button>
									<button class="delete-btn" onclick="DeleteAddress('${address.id}')">🗑️ Delete</button>
								</div>
							</div>
							<div class="address-body">
								<p>${address.address_1}, ${address.address_2}</p>
								<p>${address.city} - ${address.postcode}, ${address.state}</p>
								<p>Phone: ${address.phone}</p>
								<div class="address-footer">
									<label>
										<input type="radio" name="defaultAddress" ${isDefault} onclick="SetDefaultAddress('${address.id}')"> Default Address
									</label>
								</div>
							</div>
						</div>
					`;
					addressList.innerHTML += addressCard;
				});
			}else{
				let noDataMessage = `
					<div class="no-data">
						<p>No addresses found. Add New Address</p>
					</div>
				`;
				addressList.innerHTML = noDataMessage;
			}

		}
		
		function OpenEditModal(addressId,type,address) {
			document.getElementById("EditModal").style.display = "block";
			document.getElementById("AddressId").value = addressId?addressId:null;
			if(type=='U'){
				document.getElementById("ModalHeader").innerHTML = 'EDIT ADDRESS';

				address = typeof address === "string" ? JSON.parse(address) : address;

				document.getElementById("FirstName").value = address.first_name || "";
				document.getElementById("LastName").value = address.last_name || "";
				document.getElementById("DoorNo").value = address.address_2 || "";
				document.getElementById("StreetAddress").value = address.address_1 || "";
				document.getElementById("City").value = address.city || "";
				document.getElementById("State").value = address.state || "";
				document.getElementById("Country").value = address.country || "";
				document.getElementById("Postcode").value = address.postcode || "";
				document.getElementById("Phone").value = address.phone || "";
			}else {
				document.getElementById("ModalHeader").innerHTML = 'ADD ADDRESS';

				// Reset form for new entry
				document.getElementById("EditAddressForm").reset();
			}
		}

		function saveAddress() {
			let formData = new FormData(document.getElementById("EditAddressForm"));
			formData.append("UserId", localStorage.getItem("userid")); // Replace with logged-in user ID
			formData.append("OperationType", document.getElementById("AddressId").value ? "U" : "I"); // 'U' for update, 'I' for insert

			fetch("UserAddressDetail.php", {
				method: "POST",
				body: formData
			})
			.then(response => response.json())
			.then(data => {
				alert(data.message);
				if (data.status === "success") {
					document.getElementById("EditModal").style.display = "none";
					UserDashboard();
				}
			})
			.catch(error => console.error("Error:", error));
		}

		document.getElementById("EditAddressForm").addEventListener("submit", function (event) {
			event.preventDefault(); // Prevent default form submission
			saveAddress();
		});


		function CloseModal() {
			document.getElementById("EditModal").style.display = "none";
		}

		function DeleteAddress(addressId) {
			Swal.fire({
				title: "🗑️ Delete Address?",
				html: "<b>Are you sure you want to remove this address? ⚠️</b><br>This action cannot be undone.",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#d33",
				cancelButtonColor: "#555",
				confirmButtonText: "Yes, Delete! ❌",
				cancelButtonText: "Cancel ❎",
				background: "#fff",
				allowOutsideClick: false, // Prevent closing on outside click
				allowEscapeKey: false, // Prevent closing with ESC key
				showCloseButton: false
			}).then((result) => {
				if (result.isConfirmed) {
					let formData = new FormData();
					formData.append("UserId", 13); // Replace with logged-in user ID
					formData.append("AddressId", addressId);
					formData.append("OperationType", "R"); // 'D' for default update

					fetch("UserAddressDetail.php", {
						method: "POST",
						body: formData
					})
					.then(response => response.json())
					.then(data => {
						alert(data.message);
						if (data.status === "success") {
							UserDashboard();
						}
					})
					.catch(error => console.error("Error:", error));
				}
			});

			
		}

		function SetDefaultAddress(addressId) {
			let formData = new FormData();
			formData.append("UserId", 13); // Replace with logged-in user ID
			formData.append("AddressId", addressId);
			formData.append("DefaultAddress", "Y");
			formData.append("OperationType", "D"); // 'D' for default update

			fetch("UserAddressDetail.php", {
				method: "POST",
				body: formData
			})
			.then(response => response.json())
			.then(data => {
				alert(data.message);
				if (data.status === "success") {
					UserDashboard();
				}
			})
			.catch(error => console.error("Error:", error));
		}
	</script>
</html>