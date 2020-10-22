<?php
include "../config/connection.php";
header("Content-Type:application/json");

if(isset($_POST['uneto'])){
   
    $uneto = trim($_POST['uneto']);
            
    $komp = "%$uneto%"; 
            
    try{
      
        $upit=$conn->prepare("SELECT * FROM meni WHERE nazivPica LIKE :komp");
        $upit->bindParam(":komp",$komp);
        $upit->execute();
        $dohvaceni=$upit->fetchAll();
        echo json_encode($dohvaceni);

    }
    catch(PDOException $ex){
        
        echo json_encode(['message'=> $ex-getMessage()]);
        http_response_code(500);
        uhvatiGreske("search.php ->".$ex->getMessage());
    }
}
else{
    http_response_code(400);
}