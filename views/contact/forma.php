
<?php if(isset($_SESSION['user'])):	?> 	

<div class="col-md-9  col-md-pull-3">
							<div class="contact-content">
								<h3 class="title contact-title">Leave us a message</h3>
								<p class="contact-desc"></p>
								<form action="AAAAAAAA.php" method="post" id="contact"
									class="contact-form">
									<input type='hidden' id='hidn' name='hidn' value="<?=$_SESSION['user_id']?>"/>
									

									<p>
										<textarea required="required" rows="3" cols="45"
											name="messageC" id="messageId" placeholder="Your message"></textarea>
									</p><p class="error" id="porukaGreske"></p>
									<p class="form-submit button">
										<button class="hvr-rectangle-out" type="button" id="sendC"
											name="sendC">Send Message</button>
									</p>
								</form>
							</div><?php endif;?>	
						
						</div>
						
					</div>
				</div>
	
				
				
			</div>

		</div>