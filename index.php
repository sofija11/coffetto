<?php

ob_start();
session_start();


include "views/fixed/head.php";
include "views/fixed/topmenu.php";
include "views/fixed/menu.php";

if(!isset($_GET['page'])){
	include "views/pocetna/baner.php";
	include "views/pocetna/coffetto.php";
	include "views/pocetna/kategorije.php";
	include "views/pocetna/updates.php";
	include "views/pocetna/galerija.php";
	include "views/pocetna/kafa.php";
	
  }
  else {
    switch($_GET['page']){
      case 'pocetna':
		include "views/pocetna/baner.php";
		include "views/pocetna/coffetto.php";
		include "views/pocetna/kategorije.php";
		include "views/pocetna/updates.php";
		include "views/pocetna/galerija.php";
		include "views/pocetna/kafa.php";
		
		
        break;
	 case 'about':
		include "views/about/welcome.php";
		
		include "views/about/method.php";

		break;
	case 'menu':
		include "views/menu/kategorije.php";
		include "views/menu/kafa.php";
		

		break;
	case 'blog':
		include "views/blog/blogs.php";
		break;
	case 'contact':
		include "views/contact/info.php";
		include "views/contact/forma.php";
		break;
	case 'login':
		include "views/login/log.php";
		break;
	case 'register':
		include "views/register/reg.php";
		break;
		case 'admin':
		
		include "views/admin/admin.php";
		
		break;
	case 'autor':
		include "views/author/author.php";
		break;
	case 'insertU':
		include "views/admin/insertNew.php";
		break;
	case 'insertBlog':
		include "views/admin/insertNewBlog.php";
		break;
	case 'updateBlog':
		include "views/admin/updateBlog.php";
		break;
		
    }
  }
  include "views/fixed/footer.php";
?>

				

			<!-- Banner -->
		


		

			

			

		