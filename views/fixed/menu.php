<!-- Main Menu --><?php
@session_start();

?>

<nav id="primary-navigation" class="navbar" role="navigation">
						<div class="navbar-inner">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed"
									data-toggle="collapse" data-target="#navbar">
									<span class="sr-only">Toggle navigation</span> <span
										class="icon-bar"></span> <span class="icon-bar"></span> <span
										class="icon-bar"></span>
								</button>
								<h3 class="navbar-brand">Menu</h3>
							</div>
							<div id="navbar" class="navbar-collapse collapse">
								<ul class="nav navbar-nav">
									<li ><a href="index.php?page=pocetna">Home</a></li>
									<li><a href="index.php?page=about">About</a></li>
									<li><a href="index.php?page=menu">Menu</a>
									</li>
									<li><a href="index.php?page=blog">Blog</a>
										
									</li>
										<li><a href="index.php?page=contact">Contact</a></li>
										
										<?php if(isset($_SESSION['korisnikUloga'])):?>
									
								<?php endif; ?>
								<?php if(isset($_SESSION['user'])):?>
									<li><a href="models/crud/logout.php">LOGOUT</a></li> 
								<?php endif; ?>
								
							</ul>
							</div>
							<!--/.navbar-collapse -->
						</div>
					</nav>
					
			</div>