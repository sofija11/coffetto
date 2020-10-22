<?php
header("Content-Type:application/json");

if($_SERVER['REQUEST_METHOD']== 'GET'){
    require "../config/connection.php";
    try{
        $drinks= executeQuery("SELECT m.*,k.nazivKategorija FROM meni m INNER JOIN kategorije k ON m.idKategorije=k.idKategorije");
        echo json_encode($drinks);
    }
    catch(PDOException $ex){
        echo json_encode(['message'=> $ex->getMessage()]);
        http_response_code(500);
        uhvatiGreske("pica.php ->".$ex->getMessage());
    }
}
else{
http_response_code(500);
}