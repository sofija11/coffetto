<?php 
function getQueryButtonSearch(){
    return "SELECT * FROM meni WHERE idKategorije=:kat";
}