<?php
function doh(){
    return executeQuery("SELECT m.idPice,m.nazivPica,m.cena,m.opis,k.nazivKategorija FROM meni m INNER JOIN kategorije k ON m.idKategorije=k.idKategorije");
}