<?php

// Obezbediti da PHP strana vraća JSON.

header('Content-Type: application/json');

if(isset($_GET['id'])){
    require_once '../../config/connection.php';

    $id = $_GET['id'];

    $rezultat = $conn->prepare("SELECT * FROM blogovi WHERE idBlog = ?");
    $rezultat->bindValue(1, $id);

    try {
        $rezultat->execute();
        $korisnikk = $rezultat->fetch();
        echo json_encode($korisnikk);
    }
    catch(PDOException $ex){
        echo json_encode(['message'=> $ex->getMessage()]);
        http_response_code(500);
        uhvatiGreske("dohvati.php ->".$ex->getMessage());
    }
} else {
    http_response_code(400); // 400 - Bad request
}