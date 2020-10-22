<footer id="footer">
			<div class="footer-info">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<aside class="widget">
							<a href="contact.html"><h3 class="title">Contact us</h3></a>	
								<div class="widget-content contact-us">
									
									<p><i class="fa fa-envelope"></i><span>sofija.vitorovic.171.17@ict.edu.rs</span></p>
									<p><i class="fa fa-phone"></i><span>0645896888</span></p>
									<p><i class="fa fa-home"></i><span>West 23th Street, New York NY 10010</span></p>
								</div>
							</aside>
						</div>
						<div class="col-sm-3">
							<aside class="widget">
									<h3 class="title">Pet friendly</h3>
									<div class="widget-content">
											<p>Coffetto is pet friendly, you can bring your pets so we can play with them.</p>
										</div>
								<img class="title" alt="" src="assets/images/home/pet.png">
								
							</aside>
						</div>
						<div class="col-sm-3">
							<aside class="widget">
							<h3 class="title">Lattest blog</h3>
								<?php
								require_once "config/connection.php";
							
								$upit="SELECT * FROM blogovi ORDER BY idBlog DESC LIMIT 0,1";
								$poslednji=$conn->query($upit)->fetch();

								?>
								
<img src="<?=$poslednji->src?>"/>
								<div class="widget-content">
									
								</div>
							</aside>
						</div>
						<div class="col-sm-3">
							<aside class="widget">
								<h3 class="title">Follow Us</h3>
								<div class="widget-content">
									<p>Follow Coffetto on the following social network sites.</p>
									<ul class="social">
										<li><a href="https://www.facebook.com/" class="hvr-rectangle-out" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="https://twitter.com/?lang=sr" class="hvr-rectangle-out" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="https://www.instagram.com/?hl=sr" class="hvr-rectangle-out" target="_blank"><i class="fa fa-instagram"></i></a></li>
											<li><a href="sitemap.xml" class="hvr-rectangle-out" target="_blank"><i class="fa fa-sitemap"></i></a>
										</li>
									</ul>
								</div>
							</aside>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright">
				<div class="container">
					<p>
						Copyright &copy; 2019 <a href="index.php?page=autor">Sofija Vitorivic 171/17</a>. All Rights Reserved.
					</p>
				</div>
			</div>

		</footer>
	</div>

	<script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
	
	<script src="assets/js/vendor/flickity.pkgd.min.js"></script>
	<script src="assets/js/vendor/jquery.waypoints.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/vendor/jquery.nivo.slider.pack.js"></script>
	<script src="assets/js/podaciKorisnik.js"></script>
	
	
	<script src="assets/js/main.js"></script>
	<script src="assets/js/pica.js"></script>
	

</body>

<!-- Mirrored from html.mthemes.org/retation/style-v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2019 23:04:06 GMT -->
</html>
