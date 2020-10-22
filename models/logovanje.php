<?php
session_start();
include "../config/connection.php";
$code=400;
$data = null;
if(isset($_POST['sendL'])){
   $userL=$_POST['usernameL'];
   $passL=$_POST['passwordL'];
    $passSifrovano=md5($_POST['passwordL']);
   $greske=[];
   $reUs='/^[a-zA-Z][a-zA-Z0-9-_]{3,32}$/';
   $reL='/^(?=.*\d).{6,}$/';
   if(!preg_match($reUs,$userL)){
       $greske[]="Username is not in good format";
   }
   else if (empty($userL)) {
       $greske[]='Username is required field';
   }
   if(!preg_match($reL,$passL)){
       $greske[]='Password is not in good format';
   }
   else if(empty($passL)){
       $greske[]='Password is required field';
   }
   if(count($greske)!=0){
      $code=401;
      $data='there are errors';
     
   }
   else{
       $upit="SELECT * FROM korisnik WHERE korisnicko=:kor AND lozinka=:loz";

       $priprema=$conn->prepare($upit);
       $priprema->bindParam(':kor',$userL);
       $priprema->bindParam(':loz',$passSifrovano);

       $rezultatLogovanja=$priprema->execute();
       if($rezultatLogovanja){
           if($priprema->rowCount()==1){
               $data='We found you';
               $code=200;
               $data='User exists';

               $user=$priprema->fetch();
               $_SESSION['user']=$user;
               $_SESSION['korisnikUloga']=$user->ulogaId;

               if($_SESSION['korisnikUloga'] == 1){
                header("Location:../index.php");
                $data='admin';
               
               }
               else{
                header("Location:../index.php");
                $code=200;
                $data='user';
               }
           }
           else{
            if($priprema->rowCount() == 0){
                $data="Not register";
                $code=403;
                }
           }
       }
       else {
        $code=402;
    }
   }
   //http_response_code($code);
  
}