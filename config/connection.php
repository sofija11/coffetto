<?php

require_once "config.php";
try {
    zabeleziPristup();
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo $ex->getMessage();
}

function executeQuery($query){
    global $conn;
    return $conn->query($query)->fetchAll();
}

function zabeleziPristup(){
    $file = fopen(BASE_URL . "data/pristup.txt", "a");

    $string = basename($_SERVER['REQUEST_URI']) . "\t" . date("d.m.Y H:i:s") . "\t" . $_SERVER['REMOTE_ADDR'] . "\n";

    fwrite($file, $string);
    fclose($file);
}
function uhvatiGreske($error){
    @$open = fopen(ERROR_FILE, "a");
    $unosG = $error."\t".date('d-m-Y H:i:s'). "\n";
    @fwrite($open, $unosG);
    @fclose($open);
}