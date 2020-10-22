<?php
header("Content-Type:application/json");
if(isset($_POST['send'])){
    $poruka=$_POST['poruka'];
    $id=$_POST["idKorisnika"];
    try{
        include "../../config/connection.php";
        $upit='INSERT INTO poruke(idPoruka,poruka,idKorisnik) VAlUES(NULL,?,?)';
        $prip=$conn->prepare($upit);
       $poruke= $prip->execute([$poruka,$id]);
       echo json_encode($poruke);
       http_response_code (201);
    }
    catch(PDOException $ex){
        echo json_encode(['message'=> $ex->getMessage()]);
        http_response_code(500);
        uhvatiGreske("contactPoruka.php ->".$ex->getMessage());

    }
}
else{
    http_response_code(400);
}
?>