<?php
header("Content-Type: application/json");

require "../config/connection.php";
try{
    if(isset($_POST['str'])){
        $stranana=$_POST['str'];
        $br =(int)$stranana;
        $strana=($br-1)*3;
        
        $upit = "SELECT b.*,k.ime FROM blogovi b inner JOIN korisnik k ON b.idKorisnik = k.idKorisnik  LIMIT $strana , 3";
        
    
        $blogovi=executeQuery($upit);
        
        echo json_encode($blogovi);
        http_response_code(200);
        
    }
    
}
catch(PDOException $ex){
    echo json_encode(["Greska =>".$ex->getMessage()]);
    http_response_code(400);
}



?>

