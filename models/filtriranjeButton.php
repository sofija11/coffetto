<?php
include "../config/connection.php";

header("Content-Type:application/json");
if(isset($_POST['dohvacen'])){
    $kategorijaId=$_POST['dohvacen'];
    $upit ='SELECT * FROM meni WHERE idKategorije=:kat' ;
    
    try{
        
        $upitt=$conn->prepare($upit);
        $upitt->bindParam(":kat",$kategorijaId);
        $upitt->execute();
        $konac=$upitt->fetchAll();
        echo json_encode($konac);
    }
    catch(PDOException $ex){
        echo json_encode(['message'=> $ex->getMessage()]);
        http_response_code(500);
        uhvatiGreske("filtriranjeButton.php ->".$ex->getMessage());
    }
}
else{
    http_response_code(400);
}