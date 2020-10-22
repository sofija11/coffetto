<?php
 include  "../../config/connection.php";
 
    if(isset($_POST['btnSlika'])){
      
    $naslov = $_POST['naziv'];
    $opis = $_POST['opis'];
    $slika = $_FILES['slika'];
    $datum=$_POST['datum'];
    $idKorisnikB=$_POST['hdn'];
    $ime_fajla = $slika['name'];
    $tip_fajla = $slika['type'];
    $velicina_fajla = $slika['size'];
    $tmp_putanja = $slika['tmp_name'];
      $errors = [];
        $dozvoljeni_formati = array("image/jpg", "image/jpeg",
            "image/png");
                if(!in_array($tip_fajla, $dozvoljeni_formati)){
                    $errors[] = "Type is not good!";
                          }
                if($velicina_fajla > 3000000){
                        $errors[] = "File must be less than 3MB";
                          }
                if(empty($naslov)){
                        $errors[] = "Caption is required field.";
                          }
                if(empty($datum)){
                        $errors[] = "Date is required field.";
                          }
                if(empty($opis)){
                        $errors[] = "Description is required field.";
                          }
                    if(count($errors)!=0){
                        $status = 400; 
                        header("Location:../../index.php?page=insertBlog");
                       
                       
                      }
                          else{
                            $novNaziv =  $ime_fajla;
                            $nova_putanja= "../../assets/images/blog/.$novNaziv";
                        if(move_uploaded_file($tmp_putanja, $nova_putanja)){
                        $upit = "INSERT INTO blogovi(idBlog,src,datum,naslov,opis,idKorisnik) values (NULL,?,?,?,?,?)";
                        $priprema=$conn->prepare($upit);
                       
                            try{ 
                              $putanja="assets/images/blog/.$novNaziv";
                                 $blog=$priprema->execute([$putanja,$datum,$naslov,$opis,$idKorisnikB]);
                            if($blog){
                            header("Location:../../index.php?page=admin");
                        }else{
                      echo 'greska';
                        }
                        }
                        catch(PDOException $ex){
                          echo json_encode(['message'=> $ex->getMessage()]);
                          http_response_code(500);
                          uhvatiGreske("insertBlog.php ->".$ex->getMessage());
                        }
                        }
    }
};
                        
                        ?>