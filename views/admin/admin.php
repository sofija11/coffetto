
<?php
if($_SESSION['korisnikUloga'] != 1){
	header("Location:index.php");
	}

?></header>


		<div id="main-content" class="main-content">
			<div class="page-header">
				<figure class="post-thumbnail">
					<img alt="" src="assets/images/contact/contact.jpg">
				</figure>
				<h1 class="title">
					<span class="line-title">admin<i class="fa">&#xf111;</i></span>
				</h1>
			</div>
			<div class="page-content">
				<div class="container">

                <table class="table">
                        <tr>
                            <th>RB</th>
                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Role</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        include "config/connection.php";
                            $upit = "SELECT k.idKorisnik, k.ime, k.prezime, u.nazivUloga FROM korisnik k INNER JOIN uloga u ON k.ulogaId = u.ulogaId";

                            $rezultat = $conn->query($upit);

                            $korisnici = $rezultat->fetchAll();

                            $br = 1;
                            foreach($korisnici as $korisnik) :
                        ?>
                        	<tr>
							<td><?= $br++ ?></td>
							<td><?= $korisnik->ime ?></td>
							<td><?= $korisnik->prezime ?></td>
							<td><?= $korisnik->nazivUloga ?></td>
                            <td><a href="#"  class="updateU" data-id="<?= $korisnik->idKorisnik?>">Change</a></td>
		
							<td><a href="models/crud/deleteK.php?id=<?= $korisnik->idKorisnik?>">Delete</a></td>
                        </tr>
                        <?php endforeach; ?>
</table>
<div class='dugme'>             
                                <h1><a href='index.php?page=insertU'>Insert new user</a></h1>
                                <h1><a href='index.php?page=insertBlog'>Insert new blog</a></h1>

                    </div>
				</div>
                <div class="container">
      <div class="row">
      <div class="row"> 
                    <div class="col-sm-6">
                        <h2 class="sub-title" id='blo'>Update blog</h2>

                        <form action="" method="POST">
                        <input type="hidden" id="hidnU" name='hdn'/>
                            <div class="form-group">
                                <label>Caption</label>
                                <input type="text" name="nazivU" id='nazivU' class="form-control"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="opisU" id='opisU'class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="datumU" id='datumU' class="form-control"/>
                            </div>
                            
                            <input type='hidden' id='hidnBlogU' name='hdnU' value="<?=$_SESSION['user_id']?>"/>
                            <div class="form-group">
                                <input type="button" name="btnSlikaU" id='updateU' class="form-control btn btn-primary" value="ADD"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                    <h2 class="sub-title"id='blo'>Update user</h2>
                    <form action="" method="POST" id="re"
									class="contact-form">
									<div class="row">
										
                                        <div class="col-sm-7">
											<p class="contact-form-author">
												<input type="text"size="30"  class="form-control" value=""
													name="firstnameU" id="firstnameIdU" placeholder="Firstname">
											</p>
                                        </div>
                                        <div class="col-sm-7">
											<p class="contact-form-author">
												<input type="text"  size="30" value=""
													name="lastnameU" id="lastnameIdU" placeholder="Lastname">
											</p>
										</div>
										<div class="col-sm-7">
												<p class="contact-form-author">
													<input type="text" size="30" value=""
														name="usernameU" id="usernameIdU" placeholder="Username"/>
												</p>
											</div>
                                            <div class="col-sm-7">
											<p class="contact-form-author">
												<input type="hidden"
													name="hiU" id="hidnUU" placeholder="Firstname">
											</p>
                                        </div>
                                        
                                        
										
									</div>

									
									<p class="form-submit button">
										<button class="hvr-rectangle-out" type="button" id="sendIdU"
											name="sendRU"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
									</p>
									
                                </form>
      </div>
    </div>	
    
			<div class="container">
      <div class="row">
      <div class="row"> 
                    
                                
                    </div>
      </div>
    </div>	
			</div>

				
				    <table class="table">
                            <tr>
                            
                            <th>Picture</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Post by:</th>
                            <th>Update</th>
                            <th>Delete</th>
                            </tr>

                                <?php

                                $proizvodi = executeQuery("SELECT * FROM blogovi b inner JOIN korisnik k on b.idKorisnik=k.idKorisnik INNER JOIN uloga u ON u.ulogaId =k.ulogaId");

                                foreach($proizvodi as $pro) : 

                                ?>
                            <tr>
                    
                    <td ><img src="<?= $pro->src?>" alt="<?= $pro->alt ?>"></td> </td>
                    <td><?= $pro->naslov ?></td> 
                    <td><?= $pro->opis ?></td>
                    <td><?= $pro->datum ?></td>
                    <td><?= $pro->ime ?></td>
                  
                    <td><a href="#"  class="update" data-id="<?= $pro->idBlog?>">Change</a></td>
                   
                    <td><a href="models/crud/deleteBlog.php?id=<?= $pro->idBlog?>">Delete</a></td>
                    </tr>
 <?php endforeach; ?>
 </table> 
 <table class='table'> 
 <tr>
 
                           
        <th >KOMENTARI KORISNIKA</th>
       
 </tr>
 <?php

$poruke = executeQuery("SELECT k.ime,p.poruka FROM poruke p inner JOIN korisnik k on p.idKorisnik=k.idKorisnik ");

foreach($poruke as $por) : 

?>
                                <tr>
                               
                                <td><?= $por->ime ?><td> <td><?= $por->poruka ?><td>
                               
                                <?php endforeach; ?>
                                </tr>
                               
 
 </table>
		
		</div>
        </div>