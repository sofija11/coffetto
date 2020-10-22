<?php

require "../../config/connection.php";

if(!isset($_GET['id'])){
   header('Location: index.php');
}

    $id =$_GET['id'];
    $upit = "DELETE FROM korisnik WHERE idKorisnik = :id";
    $rez = $conn->prepare($upit);

    $rez->bindParam(":id", $id);

    $rez->execute();
    
    header("Location: ../../index.php?page=admin");
?>