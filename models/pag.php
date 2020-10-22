<?php

header("Content-Type: application/json");

if(isset($_GET['limit'])){
    require_once "../config/connection.php";
    include "paginacija.php";

    $limit = $_GET['limit'];
    $blogs = dohvatiPostove($limit);
    $brojB = brojBlogova();

    
    echo json_encode([
        "blogs" => $blogs,
        "brojB" => $brojB
    ]);
} else {
    echo json_encode(["message"=> "Limit not passed."]);
    http_response_code(400); // Bad request
}