<?php

// Podesavanje da PHP stranica vraca JSON

header('Content-Type: application/json');

if(isset($_POST['id']) && isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['korisnicko'])){
    require_once '../../config/connection.php';

    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko=$_POST['korisnicko'];
    $rezultat = $conn->prepare("UPDATE korisnik SET ime = ?,prezime = ?, korisnicko  = ? WHERE idKorisnik = ?");

    $rezultat->bindValue(1, $ime);
    $rezultat->bindValue(2, $prezime);
    $rezultat->bindValue(3, $korisnicko);
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