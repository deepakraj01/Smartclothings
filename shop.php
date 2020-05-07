<?php 
require_once('inc/top1.php');
 ?>
</head><!--/head-->

<body>
	<?php 
	require_once('inc/header.php'); ?>
	
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
	<?php 
	require_once('inc/sidebar.php');  
	?>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Feature <span style="color: grey;"> Items</span></h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
								
								<?php 
			                    $query = "SELECT * FROM products ORDER BY id DESC";
			                    $run = mysqli_query($conn, $query);
			                    if (mysqli_num_rows($run) > 0) {
			                    ?>
									<?php 
		                            while($row = mysqli_fetch_array($run)){
		                                $product_name = ucfirst($row['product_name']);
		                                $image = $row['image'];
		                                $price = $row['price'];
		                                $size = $row['size'];
		                                $detail = $row['detail'];
		                            ?>
										<div class="productinfo text-center">
											<img src="admin/img/<?php echo $image; ?>" />
											<h2>$ <?php echo $price; ?></h2>
											<p><?php echo ucfirst($product_name); ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									<!--	<div class="product-overlay">
											<div class="overlay-content">
												<p><?php echo $detail; ?></p>
												<p><?php echo $size; ?></p>
												<h2>Rs.<?php echo $price; ?></h2>
												<p><?php echo ucfirst($product_name); ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->
									</div>
									<br>
								<?php } ?>	
								</div>
								</div>
							<?php 
		                    }
		                    else{
		                        echo "<center><h2>No Products Avalible Now</h2></center>";
		                    }
		                    ?>
						</div>


						<!-- <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/shop/product9.jpg" alt="" />
										<h2>Rs.5600</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs.5600</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<img src="images/home/new.png" class="new" alt="" />
								</div>
								
							</div>
						</div> -->

						<!-- <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/shop/product8.jpg" alt="" />
										<h2>Rs.5600</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs.5600</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<img src="images/home/sale.png" class="new" alt="" />
								</div>
								
							</div>
						</div> -->
						
						
					</div>
					<!--features_items-->
					<hr>
					<center>
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
							<li><a href="">5</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</center>
				</div>
			</div>
		</div>
	</section>
	
	<?php 
	require_once('inc/footer.php');
	 ?>