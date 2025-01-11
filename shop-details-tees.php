<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Shop Details | Ruper</title>
		
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
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
		
		<?php
			// Database connection details
			$host = "localhost";
			$username = "root";
			$password = "";
			$dbname = "bfdb"; // Your database name

			try {
				// Establish PDO connection
				$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
				$pdo = new PDO($dsn, $username, $password);

				// Set error mode to exception for better error handling
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// Get category_id from URL
				if (isset($_GET['category_id'])) {
					$category_id = intval($_GET['category_id']); // Sanitize input to prevent SQL injection

					// Query to fetch category details for the specific category_id
					$query = "
						SELECT 
							CAT_NAME, 
							CAT_RATE, 
							CAT_CONTENT, 
							GROUP_CONCAT(CAT_COLOR) AS COLORS, 
							GROUP_CONCAT(CAT_HEXCODE) AS DRESSCOLOR,
							GROUP_CONCAT(CAT_PATHLOCATION) AS IMAGE_LOCATIONS 
						FROM category_details 
						WHERE CAT_CATID = :category_id
						GROUP BY CAT_NAME, CAT_RATE, CAT_CONTENT
						order by CAT_ID";

					// Prepare and execute the query
					$stmt = $pdo->prepare($query);
					$stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
					$stmt->execute();

					// Fetch the result
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

					$images = [];
					$colors=[];
					if ($result && count($result) > 0) { // Check if the result is not false and contains rows
						foreach ($result as $row) { // Loop through the result array
							// Explode the IMAGE_LOCATIONS column into individual image paths
							$colorsChange=explode(',', $row['DRESSCOLOR']);
							$colors = array_merge($colors, $colorsChange);
							$imagePaths = explode(',', $row['IMAGE_LOCATIONS']); // Correct column alias
							$images = array_merge($images, $imagePaths); // Add all image paths to $images array
						}
					}
					// Output the result for debugging (optional)
					// echo "<pre>";
					// print_r($images);
					// print_r($colors);
					// echo "</pre>";

				} else {
					die("No category_id provided.");
				}
			} catch (PDOException $e) {
				die("Database error: " . $e->getMessage());
			}
		?>

	
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
										Bora Armchair
									</h1>
								</div>
								<div class="breadcrumbs">
									<a href="index.php">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Bora Armchair
								</div>
							</div>
						</div>

						<div id="content" class="site-content" role="main">
							<div class="shop-details zoom" data-product_layout_thumb="scroll" data-zoom_scroll="true" data-zoom_contain_lens="true" data-zoomtype="inner" data-lenssize="200" data-lensshape="square" data-lensborder="" data-bordersize="2" data-bordercolour="#f9b61e" data-popup="false">	
								<div class="product-top-info">
									<div class="section-padding">
										<div class="section-container p-l-r">
											<div class="row">
												<div class="product-images col-lg-7 col-md-12 col-12">
													<div class="row">
														<div class="col-md-2">
															<div class="content-thumbnail-scroll">
																<div class="image-thumbnail slick-carousel slick-vertical" data-asnavfor=".image-additional" data-centermode="true" data-focusonselect="true" data-columns4="5" data-columns3="4" data-columns2="4" data-columns1="4" data-columns="4" data-nav="true" data-vertical="true" data-verticalswiping="true">
																	<?php foreach ($images as $index => $image) : ?>
																		<div class="img-item slick-slide">
																			<span class="img-thumbnail-scroll">
																				<img class="thumbnail-image" width="600" height="600" src="<?php echo $image; ?>" alt="Product Image" data-color="<?php echo $colors[$index]; ?>">
																			</span>
																		</div>
																	<?php endforeach; ?>
																</div>
															</div>
														</div>
														<div class="col-md-10">
															<div class="scroll-image main-image">
																<div class="image-additional slick-carousel" data-asnavfor=".image-thumbnail" data-fade="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
																<?php foreach ($images as $index => $image) : ?>
																	<div class="img-item slick-slide">
																		<span class="img-thumbnail-scroll">
																		<img class="main-image" width="600" height="600" src="<?php echo $image; ?>" alt="Product Image" data-color="<?php echo $colors[$index]; ?>">
																		</span>
																	</div>
																<?php endforeach; ?>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="product-info col-lg-5 col-md-12 col-12 ">
													<?php if ($result && count($result) > 0):
														// Extract static details from the first row
														$row = $result[0];
														$productName = htmlspecialchars($row['CAT_NAME'], ENT_QUOTES, 'UTF-8');
														$productRate = htmlspecialchars($row['CAT_RATE'], ENT_QUOTES, 'UTF-8');
														$productContent = htmlspecialchars($row['CAT_CONTENT'], ENT_QUOTES, 'UTF-8');
														$colors = explode(',', htmlspecialchars($row['DRESSCOLOR'], ENT_QUOTES, 'UTF-8'));
													?>
													 <h1 class="title"><?php echo $productName; ?></h1>
													<span class="price">
														<ins><span>$<?php echo $productRate; ?></span></ins>
													</span>
													<!-- <div class="rating">
														<div class="star star-5"></div>
														<div class="review-count">
															(3<span> reviews</span>)
														</div>
													</div> -->
													<div class="description">
														<p><?php echo $productContent; ?></p>
													</div>
													<div class="variations">
														<table cellspacing="0">
															<tbody>
																<tr>
																	<td class="label">Size</td>
																	<td class="attributes">
																		<ul class="text">
																			<li><span>XL</span></li>
																			<li><span>L</span></li>
																			<li><span>M</span></li>
																		</ul>
																	</td>
																</tr>
																<tr>
																	<td class="label">Color</td>
																	<td class="attributes">
																		<ul class="colors">
																			<?php foreach ($colors as $index => $color): ?>
																				<li>
																					<span class="color-<?php echo ($index + 1); ?>" 
																					style="background-color: <?php echo $color; ?>;" 
																					data-image="<?php echo $imagePaths[$index]; ?>" 
																					data-color="<?php echo $color; ?>"></span>
																				</li>
																			<?php endforeach; ?>
																		</ul>
																	</td>
																</tr>
		        											</tbody>
														</table>
													</div>
													<div class="buttons">
														<div class="add-to-cart-wrap">
															<div class="quantity">
																<button type="button" class="plus">+</button>
																<input type="number" class="qty" step="1" min="0" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
																<button type="button" class="minus">-</button>	
															</div>
															<div class="btn-add-to-cart">
																<a href="#" class="button" tabindex="0">Add to cart</a>
															</div>
														</div>
														<div class="btn-quick-buy" data-title="Wishlist">
															<button class="product-btn">Buy It Now</button>
														</div>
														<div class="btn-wishlist" data-title="Wishlist">
															<button class="product-btn">Add to wishlist</button>
														</div>
														
													</div>
													<br>
													<div class="social-share">
														<a href="#" title="Facebook" class="share-facebook" target="_blank"><i class="fa fa-facebook"></i>Facebook</a>
														<a href="#" title="Twitter" class="share-twitter"><i class="fa fa-twitter"></i>Twitter</a>
														<a href="#" title="Pinterest" class="share-pinterest"><i class="fa fa-pinterest"></i>Pinterest</a>
													</div>			
													<?php else: ?>
														<p>No product details found.</p>
													<?php endif; ?>		
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="product-related">
									<div class="section-padding">
										<div class="section-container p-l-r">
											<div class="block block-products slider">
												<div class="block-title"><h2>Related Products</h2></div>
												<div class="block-content">
													<div class="content-product-list slick-wrap">
														<div class="slick-sliders products-list grid" data-slidestoscroll="true" data-dots="false" data-nav="1" data-columns4="1" data-columns3="2" data-columns2="3" data-columns1="3" data-columns1440="4" data-columns="4">
															<div class="item-product slick-slide">
																<div class="items">
																	<div class="products-entry clearfix product-wapper">
																		<div class="products-thumb">
																			<div class="product-lable">
																				<div class="hot">Hot</div>
																			</div>
																			<div class="product-thumb-hover">
																				<a href="shop-details.html">
																					<img width="600" height="600" src="media/product/1.jpg" class="post-image" alt="">
																					<img width="600" height="600" src="media/product/1-2.jpg" class="hover-image back" alt="">
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
																				<h3 class="product-title"><a href="shop-details.html">Zunkel Schwarz</a></h3>
																				<div class="rating">
																					<div class="star star-5"></div>
																				</div>
																				<span class="price">$100.00</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="item-product slick-slide">
																<div class="items">
																	<div class="products-entry clearfix product-wapper">
																		<div class="products-thumb">
																			<div class="product-lable">
																				<div class="hot">Hot</div>
																			</div>
																			<div class="product-thumb-hover">
																				<a href="shop-details.html">
																					<img width="600" height="600" src="media/product/2.jpg" class="post-image" alt="">
																					<img width="600" height="600" src="media/product/2-2.jpg" class="hover-image back" alt="">
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
																				<h3 class="product-title"><a href="shop-details.html">Namaste Vase</a></h3>
																				<div class="rating">
																					<div class="star star-4"></div>
																				</div>
																				<span class="price">$200.00</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="item-product slick-slide">
																<div class="items">
																	<div class="products-entry clearfix product-wapper">
																		<div class="products-thumb">
																			<div class="product-lable">
																				<div class="hot">Hot</div>
																			</div>
																			<div class="product-thumb-hover">
																				<a href="shop-details.html">
																					<img width="600" height="600" src="media/product/3.jpg" class="post-image" alt="">
																					<img width="600" height="600" src="media/product/3-2.jpg" class="hover-image back" alt="">
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
																				<h3 class="product-title"><a href="shop-details.html">Chair Oak Matt Lacquered</a></h3>
																				<div class="rating">
																					<div class="star star-0"></div>
																				</div>
																				<span class="price">$150.00</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="item-product slick-slide">
																<div class="items">
																	<div class="products-entry clearfix product-wapper">
																		<div class="products-thumb">
																			<div class="product-lable">
																				<div class="onsale">-33%</div>
																			</div>
																			<div class="product-thumb-hover">
																				<a href="shop-details.html">
																					<img width="600" height="600" src="media/product/4.jpg" class="post-image" alt="">
																					<img width="600" height="600" src="media/product/4-2.jpg" class="hover-image back" alt="">
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
																				<div class="rating">
																					<div class="star star-5"></div>
																				</div>
																				<span class="price">
																					<del aria-hidden="true"><span>$150.00</span></del> 
																					<ins><span>$100.00</span></ins>
																				</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="item-product slick-slide">
																<div class="items">
																	<div class="products-entry clearfix product-wapper">
																		<div class="products-thumb">
																			<div class="product-lable">
																				<div class="onsale">-7%</div>
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
																			<div class="product-stock">    
																				<span class="stock">Out Of Stock</span>
																			</div>
																		</div>
																		<div class="products-content">
																			<div class="contents text-center">
																				<h3 class="product-title"><a href="shop-details.html">Amp Pendant Light Large</a></h3>
																				<div class="rating">
																					<div class="star star-4"></div>
																				</div>
																				<span class="price">
																					<del aria-hidden="true"><span>$150.00</span></del> 
																					<ins><span>$140.00</span></ins>
																				</span>
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
		<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

		<!-- <script src="libs/jquery/js/jquery.min.js"></script>  -->
		<script src="libs/bootstrap/js/bootstrap.min.js"></script>
		<!-- <script src="libs/slick/js/slick.min.js"></script> -->
		<script src="libs/countdown/js/jquery.countdown.min.js"></script>
		<script src="libs/mmenu/js/jquery.mmenu.all.min.js"></script>
		<script src="libs/slider/js/tmpl.js"></script>
		<script src="libs/slider/js/jquery.dependClass-0.1.js"></script>
		<script src="libs/slider/js/draggable-0.1.js"></script>
		 <script src="libs/slider/js/jquery.slider.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script src="assets/js/app.js"></script>
		<script src="libs/elevatezoom/js/jquery.elevatezoom.js"></script>


		<!-- Site Scripts -->

		<script>

			$(document).ready(function() {
				console.log($('.image-thumbnail')); // Check if it exists
				console.log($('.image-additional')); 

				// Initialize the slick carousel
				setTimeout(function() {
        $('.image-thumbnail').slick({
            vertical: true,
            focusOnSelect: true,
            slidesToShow: 4,
            slidesToScroll: 1
        });

        $('.image-additional').slick({
            fade: true,
            arrows: true,
            asNavFor: '.image-thumbnail'
        });
    }, 1000);

        // Select all color swatches
        const colorOptions = document.querySelectorAll('.colors span');
        
        // Handle color click event
        colorOptions.forEach(color => {
            color.addEventListener('click', function() {
                const selectedColor = this.getAttribute('data-color'); // Get the selected color
                const selectedIndex = this.getAttribute('data-index'); // Get the index for the corresponding image
                
                // Select the main image carousel and thumbnails carousel
                const thumbnails = document.querySelectorAll('.thumbnail-image');
                const mainImages = document.querySelectorAll('.main-image');

                // Loop through the thumbnails and main images to find the matching color
                thumbnails.forEach((img, index) => {
                    if (img.getAttribute('data-color') === selectedColor) {
                        // Use slickGoTo to go to the specific image
                        $('.image-additional').slick('slickGoTo', index);
                        $('.image-thumbnail').slick('slickGoTo', index); // Sync the thumbnails with main image
                    }
                });
            });
        });
    });
		</script>
	</body>
</html>