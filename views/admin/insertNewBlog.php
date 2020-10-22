</header>


		<div id="main-content" class="main-content">
			<div class="page-header">
				<figure class="post-thumbnail">
					<img alt="" src="assets/images/contact/contact.jpg">
				</figure>
				
			</div><section id="mu-blog">
    <div class="container">
      <div class="row">
      <div class="row"> 
                    <div class="col-sm-6">
                        <h2 class="sub-title"id='blo'>Add blog</h2>

                        <form action="models/crud/insertBlog.php" method="POST" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label>Caption</label>
                                <input type="text" name="naziv" id='nazivI' class="form-control"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="opis" id='opisI'class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="datum" id='datum' class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="slika" id='slikaI' class="form-control"/>
                            </div>
                            <input type='hidden' id='hidnBlog' name='hdn' value="<?=$_SESSION['user_id']?>"/>
                            <div class="form-group">
                                <input type="submit" name="btnSlika" id='insert' class="form-control btn btn-primary" value="ADD"/>
                            </div>
                        </form>
                    </div>
      </div>
    </div>
  </section>
</div>