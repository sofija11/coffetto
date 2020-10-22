<div class="col-sm-5">
							<div class="widget-gallery">
								<ul><?php 
									$upit="SELECT * FROM slikepocetna";
									$glavneSlike=executeQuery($upit);
									foreach ($glavneSlike as $slik) :
									
								?>
									<li>
										<figure>
											<img class="animated" data-animate="zoomIn animation" alt="<?=$slik->alt?>" src="<?=$slik->src?>" >
											<figcaption>
												<a class="gallery-ajax" href="#" data-url="../ajax/gallery-v2-1.html" data-toggle="modal" data-target="#myModal-1"></a>
											</figcaption>
										</figure>
									</li><?php endforeach;?>
									
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="modal" id="myModal-1">
					<div class="modal-content">

						<div class="modal-header">
							<div class="container">
								<button aria-label="Close" data-dismiss="modal" class="close"
									type="button">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
						<div class="modal-body"></div>

					</div>
					<!-- /.modal-content -->
				</div>
				<div class="modal" id="myModal-2">
					<div class="modal-content">

						<div class="modal-header">
							<div class="container">
								<button aria-label="Close" data-dismiss="modal" class="close"
									type="button">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
						<div class="modal-body"></div>

					</div>
					<!-- /.modal-content -->
				</div>
				<div class="modal" id="myModal-3">
					<div class="modal-content">

						<div class="modal-header">
							<div class="container">
								<button aria-label="Close" data-dismiss="modal" class="close"
									type="button">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
						<div class="modal-body"></div>

					</div>
					<!-- /.modal-content -->
				</div>
				<div class="modal" id="myModal-4">
					<div class="modal-content">

						<div class="modal-header">
							<div class="container">
								<button aria-label="Close" data-dismiss="modal" class="close"
									type="button">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
						<div class="modal-body"></div>

					</div>
					<!-- /.modal-content -->
				</div>
				<div class="modal" id="myModal-5">
					<div class="modal-content">

						<div class="modal-header">
							<div class="container">
								<button aria-label="Close" data-dismiss="modal" class="close"
									type="button">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
						<div class="modal-body"></div>

					</div>
					<!-- /.modal-content -->
				</div>
				<div class="modal" id="myModal-6">
					<div class="modal-content">

						<div class="modal-header">
							<div class="container">
								<button aria-label="Close" data-dismiss="modal" class="close"
									type="button">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
						<div class="modal-body"></div>

					</div>
					<!-- /.modal-content -->
				</div>

			</section>