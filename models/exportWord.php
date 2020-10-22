<?php
include "../config/connection.php";
$upit="SELECT * FROM autor";

$authors=executeQuery($upit);
$author=$authors[0];

$wordApp=new COM("Word.Application");
$wordApp->Visible=true;

$wordApp->Documents->Add();
$wordApp->Selection->TypeText("$author->imePrezime \n $author->opis");
header("Location:../../index.php");

$wordApp->Documents[1]->SaveAs("About.doc");
?>
