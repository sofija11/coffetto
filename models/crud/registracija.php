<?php
require "../../config/connection.php";

$code=404;
$data=null;
if(isset($_POST['send'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $rePassword=md5($_POST['rePassword']);
    $email=$_POST['email'];

    $errors=[];
    $reFirstLast="/^[A-Z]{1}[a-z]{2,25}$/";
    $rePassword="/^(?=.*\d).{6,}$/";
    $reUsername="/^[a-zA-Z][a-zA-Z0-9-_]{3,32}$/";

    if(empty($firstname)){
        array_push($errors,'Field for firstname is required');
    }else if(!preg_match($reFirstLast,$firstname)){
        array_push($errors,'Not valid form fn');
    }
    if(empty($lastname)){
        array_push($errors,'Field for lastname is required');
    }else if(!preg_match($reFirstLast,$lastname)){
        array_push($errors,'Not valid form ln');
    }
    if(empty($username)){
        array_push($errors,'Field for username is required');
    }else if(!preg_match($reUsername,$username)){
        array_push($errors,'Not valid form un');
    }
    if(!$_POST['password']){
        array_push($errors,'Field for password is required');
    }else if(!preg_match($rePassword,$_POST['password'])){
        array_push($errors,'Not valid form pasw');
    }
    if(($_POST['rePassword'])!=($_POST['password'])){
        array_push($errors,'Field for repeat and password do not match');
    }else if(!$_POST['rePassword']){
        array_push($errors,'Field for repeat password is required');
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($errors,'Not valid form email');
    }
    if(count($errors)){
        $code=422;
        $data=$errors;

    }else{
        
        
        $upit="INSERT INTO korisnik(idKorisnik,ime,prezime,korisnicko,lozinka,email,ulogaId) values (NULL,?,?,?,?,?,2)";
        $rezultat = $conn->prepare($upit);
        
       try{
       $code= $rezultat->execute( [ $firstname,$lastname,$username,$password,$email ] ) ? 201 : 500;
           
       }
       catch(PDOException $e){
           $code=409;
           uhvatiGreske("registracija.php ->".$ex->getMessage());
       
       }

    }

}
http_response_code($code);
echo json_encode($data);
?>