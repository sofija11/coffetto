<?php
header("Content-Type:application/json");

if($_SERVER['REQUEST_METHOD']== 'GET'){
    include "../config/connection.php";;
    try{
        $blogs= executeQuery("SELECT * FROM blogovi b inner JOIN korisnik k on b.idKorisnik=k.idKorisnik ");
        echo json_encode($blogs);
    }
    catch(PDOException $ex){
        echo json_encode(['message'=> $ex->getMessage()]);
        http_response_code(500);
        uhvatiGreske("getBlogs.php ->".$ex->getMessage());

    }
}
else{
http_response_code(500);
}