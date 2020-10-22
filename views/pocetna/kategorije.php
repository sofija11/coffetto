<section id="services" class="section services"
				style="background-image: url(assets/images/home/w.jpg); background-repeat: no-repeat; background-position: center top; background-size: 100% auto;">
				<div class="container">
					<!-- 
					<ul class="service-effect">
						<li><img alt="" src="assets/images/home/services/service-1.png"  class="animated animation-duration-15" data-animate="fadeInLeft animation"></li>
						<li><img alt="" src="assets/images/home/services/service-2.png"  class="animated animation-duration-15" data-animate="fadeInDown animation"></li>
						<li><img alt="" src="assets/images/home/services/service-3.png"  class="animated animation-duration-15" data-animate="fadeInDown animation"></li>
						<li><img alt="" src="assets/images/home/services/service-4.png"  class="animated animation-duration-15" data-animate="fadeInDown animation"></li>
						<li><img alt="" src="assets/images/home/services/service-5.png"  class="animated animation-duration-15" data-animate="fadeInDown animation"></li>
						<li><img alt="" src="assets/images/home/services/service-6.png"  class="animated animation-duration-15" data-animate="fadeInRight animation"></li>
					</ul> -->
					<ul id="services-item">
						<?php 
						include "config/connection.php";
						$upit="SELECT * FROM krugovi";
						$krugici=executeQuery($upit);
						foreach($krugici as $krug):
							?>
						<li class="service">
							<aside>
								<div class="service-inner">
									<h3>
										<a href="menu.html#coffee" title="Coffee"><?=$krug->nazivKrug?></a>
									</h3>
									<p><?=$krug->opisKrug?></p>
								</div>
							</aside>
							<em class="animated animation infinite bullets"></em>
						</li>
						<?php endforeach ;?>
						
						
						
						
					</ul>
				</div>
			</section>
