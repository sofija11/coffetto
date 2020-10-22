<?php
require "../../config/connection.php";
header("Content-Type:application/json");

if(isset($_POST['sendI'])){
    $first=$_POST['firstnameI'];
    $last=$_POST['lastnameI'];
    $user=$_POST['usernameI'];
    $pass=md5($_POST['passwordI']);
    $rePass=md5($_POST['rePasswordI']);
    $eMail=$_POST['emailI'];

    $errorss=[];
    $reFL="/^[A-Z]{1}[a-z]{2,25}$/";
    $reP="/^(?=.*\d).{6,}$/";
    $reU="/^[a-zA-Z][a-zA-Z0-9-_]{3,32}$/";

    if(empty($first)){
        array_push($errorss,'Field for firstname is required');
    }else if(!preg_match($reFL,$first)){
        array_push($errorss,'Not valid form fn');
    }
    if(empty($last)){
        array_push($errorss,'Field for lastname is required');
    }else if(!preg_match($reFL,$last)){
        array_push($errorss,'Not valid form ln');
    }
    if(empty($user)){
        array_push($errorss,'Field for username is required');
    }else if(!preg_match($reU,$user)){
        array_push($errorss,'Not valid form un');
    }
    if(!$_POST['passwordI']){
        array_push($errorss,'Field for password is required');
    }else if(!preg_match($reP,$_POST['passwordI'])){
        array_push($errorss,'Not valid form pasw');
    }
    if(($_POST['rePasswordI'])!=($_POST['passwordI'])){
        array_push($errorss,'Field for repeat and password do not match');
    }else if(!$_POST['rePasswordI']){
        array_push($errorss,'Field for repeat password is required');
    }
    if(!filter_var($eMail,FILTER_VALIDATE_EMAIL)){
        array_push($errorss,'Not valid form email');
    }
    if(count($errorss)){
        $code=422;
        $data=$errorss;
        
        

    }else{
        
        
        $upit="INSERT INTO korisnik (idKorisnik,ime,prezime,korisnicko,lozinka,email,ulogaId) values (NULL,?,?,?,?,?,2)";
        $rezultat = $conn->prepare($upit);
        
       try{
       $code= $rezultat->execute( [ $first,$last,$user,$pass,$eMail ] ) ? 201 : 500;
        echo json_encode($code);
        
       }
       catch(PDOException $e){
        http_response_code(500);
        uhvatiGreske("insertK.php =>".$ex->getMessage());
       }

    }

}

?>