<?php 
require_once('inc/db.php');
 ?>
	<!--Footer-->
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
				
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>SMART</span>CLOTHING</h2>
							<p>Darwin <span style='color: red;'>NT <span style='color: blue;'> Australia</span></p>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="single-widget">
							<h2><span style="color: orange;">Service</span></h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="404.php">Online Help</a></li>
								<li><a href="contact-us.php">Contact Us</a></li>
								<li><a href="404.php">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2><span style="color: orange;">Policies</span></h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="404.php">Terms of Use</a></li>
								<li><a href="404.php">Privecy Policy</a></li>
								<li><a href="404.php">Refund Policy</a></li>
								
							</ul>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="single-widget">
							<h2><span style="color: orange;">About</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="404.php">Company Information</a></li>
								
								<li><a href="404.php">Store Location</a></li>
								<li><a href="404.php">Affillate Program</a></li>
								<li><a href="404.php">Copyright</a></li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-3 pull-right">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>Darwin, <span style='color: red;'>NT <span style='color: blue;'> Australia</span></p>
						</div>
					</div>

				</div>
			</div>
		</div>
					
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © <?php echo date('Y'); ?> S Clothing shoppers CDU Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://okimoney.bid/4639540700266/">Group No. 17</a></span></p>
				</div>
			</div>
		</div>
		
	</footer>
	<!--/Footer-->

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.elevateZoom.js"></script>

    <script>
    	$("#img_01").elevateZoom({
    		gallery:'gal1', 
    		cursor: 'pointer', 
    		galleryActiveClass: 'active', 
    		imageCrossfade: true
    	}); 
    </script>

</body>
</html>