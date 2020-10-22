</header>


<div id="main-content" class="main-content">
    <div class="page-header">
        <figure class="post-thumbnail">
            <img alt="" src="assets/images/blog/blog.jpg">
        </figure>
        <h1 class="title"><span class="line-title">Blog<i class="fa">&#xf111;</i></span></h1>
    </div>
    <div class="page-content">
        <div class="container">
          
            <!-- Post -->
            <article class="post" id='blog'><!-- dohvaceni ajaxom -->
           
             
            </article> <!-- End Post -->
           
            <!-- Post -->
           
         
            
            <nav role="navigation" class="navigation paging-navigation">
                <div class="pagination loop-pagination">
                <ul class="pagination m-auto" id="pagination">
                        <?php
                          include "config/connection.php";
                          $upit="SELECT COUNT(*) as brojStrana FROM blogovi";
                          $brStrana=$conn->query($upit)->fetch();
                          
                          $pag=$brStrana->brojStrana;
                          $broj_strana=ceil($pag / 3);
                          for($i=1;$i<=$broj_strana;$i++){
                            $id="$i";
                          

                        ?>
                        <li class="page-item">
                          <a href="#" class=" linkPag" data-pag="<?=$id ?>"><?=$i ?></a>
                        </li>
                        <?php    } ?>
                       
                  </ul>     
                </div><!-- .pagination -->
            </nav>
        </div>
    </div>
        
</div>
