<?php 
require_once('inc/top.php'); 
?>
</head><!--/head-->

<body>
	<?php require_once('inc/header.php'); ?>

	<section>
		<div class="container">
			<div class="row">
				<?php require_once('inc/sidebar.php'); ?>
				
				<div class="col-sm-9 padding-right">
					
					<!--features_items-->
					<div class="features_items">
					<h2 class="title text-center">Features <span style='color: grey;'>Items</span></h2>
						
						<div class="col-sm-4">
							<?php 
					            $query = "SELECT * FROM products ORDER BY id DESC";
					            $run = mysqli_query($conn, $query);
					            if (mysqli_num_rows($run) > 0) {  
					                     
					                    // <!-- <table class="table table-bordered table-striped table-hover"> -->
					                        // <!-- <tbody> -->
					                            // <?php 
					                            while($row = mysqli_fetch_array($run)){
					                                $product_name = ucfirst($row['product_name']);
					                                $image = $row['image'];
					                                $price = $row['price'];
					                                $size = $row['size'];
                                					$detail = $row['detail']; 
					                             ?>
					                            <!-- <tr>                               -->
					                                <!-- <td><?php echo ucfirst($product_name); ?></td> -->
					                                <!-- <td><img src="admin/img/<?php echo $image; ?>" width="30px"></td> -->
					                                <!-- <td><?php echo $price; ?></td>  -->
					                            <!-- </tr> -->
					                            <!-- <?php } ?> -->
					                        <!-- </tbody> -->
					                    <!-- </table> -->
					                    <div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/img/<?php echo $image; ?>" alt="" />
													<h2>$<?php echo $price;?></h2>
													<p><?php echo ucfirst($product_name); ?></p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											<!--	<div class="product-overlay">
													<div class="overlay-content">
														<p>Details: <?php echo $detail; ?></p>
														<option>Size:<?php echo $size; ?></option>
														<h2>$<?php echo $price;?></h2>
														<p><?php echo ucfirst($product_name);?></p>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
												</div> -->
												<img src="images/home/new.png" class="new" alt="" />
												
											</div>

					                    	<?php 
					                    	}

					                    	else{
					                        	echo "<center><h2>No Products Avalible Now</h2></center>";
					                    	}
					                     	?>
					                     	</form> 
									
							</div>
							</div>
											
 <!--               	
                	<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/shop/product9.jpg" alt="" />
												<h2>$5600</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$ 5600</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
											<img src="images/home/new.png" class="new" alt="" />
										</div>
										
									</div>
								</div>
 -->
            	</div>
        	
        	</div> 

		</div>
			<!--features_items-->
					 
			<!-- </div>
		</div>
		</div> -->
	</section>
	
<?php 
require_once('inc/footer.php');
?>