<?php

// Podesavanje da PHP stranica vraca JSON

header('Content-Type: application/json');

if(isset($_POST['id']) && isset($_POST['naziv']) && isset($_POST['opis']) && isset($_POST['datum'])){
    require_once '../../config/connection.php';

    $id = $_POST['id'];
    $naziv = $_POST['naziv'];
    $opis = $_POST['opis'];
    $datum = $_POST['datum'];
    $rezultat = $conn->prepare("UPDATE blogovi SET naslov = ?,opis = ?, datum  = ? WHERE idBlog = ?");

    $rezultat->bindValue(1, $naziv);
    $rezultat->bindValue(2, $opis);
    $rezultat->bindValue(3, $datum);
    $rezultat->bindValue(4, $id);

    try {
        $rezultat->execute();
        
        http_response_code(204); // 204 - Success and No content (Nothing to return)
        
    }
    catch(PDOException $ex){
        echo json_encode(['message =>'.$ex->getMessage()]);
        http_response_code(500);
        uhvatiGreske("updateBlog.php =>".$ex->getMessage());
    }
} else {
    http_response_code(400); // 400 - Bad request
}