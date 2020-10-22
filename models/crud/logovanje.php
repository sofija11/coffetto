<?php
@session_start();
include "../../config/connection.php";
header("Content-type:application/json");
if(isset($_POST['sendL'])){
   $userL=$_POST['usernameL'];
   $passL=$_POST['passwordL'];
    
   $greskeL=[];
   $reUs='/^[a-zA-Z][a-zA-Z0-9-_]{3,32}$/';
   $reL='/^(?=.*\d).{6,}$/';
   if(!preg_match($reUs,$userL)){
    array_push($greskeL,  "Username is not in good format" );
      
       
   }
   else if ($userL=='') {
    array_push($greskeL,  "Username is required field" );
     
   }
   if(!preg_match($reL,$passL)){
    array_push($greskeL,  "Password is not in good format" );
       
   }
   else if(empty($passL)){
    array_push($greskeL,  "Password is required field" );
      
   }
   if(count($greskeL)!= 0){
     
      http_response_code(422);
      header("Location: ../../index.php?page=login");
   }
   else{
    $passSifrovano=md5($_POST['passwordL']);
       $upit="SELECT * FROM korisnik WHERE korisnicko=:kor AND lozinka=:loz";

       $priprema=$conn->prepare($upit);
       $priprema->bindParam(':kor',$userL);
       $priprema->bindParam(':loz',$passSifrovano);

       $rezultatLogovanja=$priprema->execute();
       if($rezultatLogovanja){
           if($priprema->rowCount()==1){
               
               http_response_code(200);
               

               $user=$priprema->fetch();
               $_SESSION["user"]=$user;
              $_SESSION["user_id"]=$user->idKorisnik;
               $_SESSION["korisnikUloga"]=$user->ulogaId;
               
               if($_SESSION["korisnikUloga"] == 1){
                header("Location:../../index.php?page=admin");
               }
               else if($_SESSION["korisnikUloga"] == 2){
                header("Location: ../../index.php");
               }
           }
           else{
            if($priprema->rowCount() == 0){
               
                http_response_code(500);
                }
           }
       }
       else {
        http_response_code(400);;
    }
   }
   
}