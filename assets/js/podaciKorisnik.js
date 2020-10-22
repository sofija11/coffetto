$(document).ready(function(){
    $('#sendC').click(dodajPoruku);
    $("#sendId").click(function(e){
        e.preventDefault();
       $firstname= $("#firstnameId").val();
       $lastname=$("#lastnameId").val();
       $username=$("#usernameId").val();
       $password=$("#passwordId").val();
       $repassword=$("#rePasswordId").val();
       $email=$("#emailId").val();

       //REGULARNI IZRAZI

       $pFirstname=/^[A-Z]{1}[a-z]{2,25}$/;
       $pLastname=/^[A-Z]{1}[a-z]{2,25}$/;
       $pUsername=/^[a-zA-Z][a-zA-Z0-9-_]{3,32}$/;// a-z A-Z - I _
       $PPassword=/^(?=.*\d).{6,}$/;// brojevi, donje, slova
       $pEmail=/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
      

       //PROVERE 
       $marker=0; //ako je 1 IMA GRESAKA
       if($firstname.match($pFirstname)){
           $('#fG').html('');
        }
       else if($firstname==""){
           $('#fG').html( 'Firstname is required field');
           $marker=1;
        }
       else{
           $("#fG").html("Firstname is not in good format");
           $marker=1;
        }
        //llastname
        if($lastname.match($pLastname)){
            $('#lG').html( '');
        }
        else if($lastname==""){
            $('#lG').html( 'Lastname is required field');
            $marker=1;
        }
        else{
            $("#lG").html("Lastname is not in good format");
            $marker=1;
        }
        //username
        if($username.match($pUsername)){
            $('#uG').html( '');
        }
        else if($username==""){
            $('#uG').html( 'Username is required field');
            $marker=1;
        }
        else{
            $("#uG").html("Username is not in good format");
            $marker=1;
        }
        //PASSWORD
        if($password.match($PPassword)){
            $('#pG').html( '');
        }
        else if($password==""){
            $('#pG').html( 'Password is required field');
            $marker=1;
        }
        else{
            $("#pG").html("Password is not in good format");
            $marker=1;
        }
        //REPASS
        if($repassword!=$password){
            $("#rPG").html("Passwords must match");
            $marker=1;
        }
        if($repassword==''){
            $("#rPG").html('');
        }
        else if($repassword==""){
            $("#rPG").html('You must repeat password');
        }
        if($email.match($pEmail)){
            $('#eG').html( '');
        }
        else if($email==""){
            $('#eG').html( 'Email is required field');
            $marker=1;
        }
        else{
            $("#eG").html("Email is not in good format");
            $marker=1;
        }
       
        function dohvati(){
            var obj={
                firstname:$firstname,
                lastname:$lastname,
                username:$username,
                password:$password,
                rePassword:$repassword,
                email:$email,
                send:true
    
            };
         return obj;
        }
        function pozoviAjax(obj){
            $.ajax({
                url:'models/crud/registracija.php',
                type:"post",
                data:obj,
                success:function(data,status,xhr){
                    console.log(xhr.status);
                    if(xhr.status == 201){
                        console.log("Uspesno registrovan korisnik!");
                    }
                    $("#feed").html("<h1>Successful registration.</h1>");
                },
                error:function(xhr,status,error){
                    var poruka="Your data is not valid";
                    switch(xhr.status){
                        case 404:
                            poruka="Page not found";
                            break;
                        case 500:
                            poruka="Error";
                            break;
                    }
                    $("#feed").html(poruka);
    
                }
            });
        }
        var formData=dohvati();
        pozoviAjax(formData);
    
      
    });
   
   
});
function dodajPoruku(){
    let idKorisnika=$('#hidn').val();
    let poruka=$('#messageId').val();
    $.ajax({
        url:'models/crud/contactPoruka.php',
        method:'post',
        dataType:'json',
        data:{
            idKorisnika:idKorisnika,
            poruka:poruka,
            send:true
        },
        success:function(xhr,data,status){
            console.warn(data);
            console.log(xhr.status);

        },
        error:function(xhr,status,statusText){
            console.error('nije prosao AJax');
            console.log(xhr.status);
        }
    })
}
$('#sendIdI').click(function(e){
    e.preventDefault();
   let fn=$('#firstnameIdI').val();
   let ln=$('#lastnameIdI').val();
   let un=$('#usernameIdI').val();
   let ps=$('#passwordIdI').val();
   let rep=$('#rePasswordIdI').val();
   let em=$('#emailIdI').val();

   $pFn=/^[A-Z]{1}[a-z]{2,25}$/;
   $pLn=/^[A-Z]{1}[a-z]{2,25}$/;
   $pUn=/^[a-zA-Z][a-zA-Z0-9-_]{3,32}$/;// a-z A-Z - I _
   $pP=/^(?=.*\d).{6,}$/;// brojevi, donje, slova
   $pE=/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
  
   $markerr=0; //ako je 1 IMA GRESAKA
       if(fn.match($pFn)){
           $('#fGG').html('');
        }
       else if(fn==""){
           $('#fGG').html( 'Firstname is required field');
           $markerr=1;
        }
       else{
           $("#fGG").html("Firstname is not in good format");
           $markerr=1;
        }
        if(ln.match($pLn)){
            $('#lGG').html('');
         }
        else if(ln==""){
            $('#lGG').html( 'Lastname is required field');
            $markerr=1;
         }
        else{
            $("#lGG").html("Lastname is not in good format");
            $markerr=1;
         }
         if(un.match($pUn)){
            $('#uGG').html('');
         }
        else if(un==""){
            $('#uGG').html( 'Username is required field');
            $markerr=1;
         }
        else{
            $("#uGG").html("Username is not in good format");
            $markerr=1;
         }
         if(ps.match($pP)){
            $('#pGG').html('');
         }
        else if(ps==""){
            $('#pGG').html( 'Password is required field');
            $markerr=1;
         }
        else{
            $("#pGG").html("Password is not in good format");
            $markerr=1;
         }
         if(rep!=ps){
            $('#rPGG').html('Passwords must match');
            $markerr=1;
         }
        else if(rep==""){
            $('#rPGG').html( 'You must repeat your password');
            $markerr=1;
         }
         else{
            $('#rPGG').html( '');
           
         }
         if(em.match($pE)){
            $('#eGG').html('');
         }
        else if(em==""){
            $('#eGG').html( 'Email is required field');
            $markerr=1;
         }
        else{
            $("#eGG").html("Email is not in good format");
            $markerr=1;
         }
         console.log($markerr);//0 ako je tacno
         function dohvatiInsert(obj){
            var obj={
                firstnameI:fn,
                lastnameI:ln,
                usernameI:un,
                passwordI:ps,
                rePasswordI:rep,
                emailI:em,
                sendI:true
    
            };
         return obj;
        }
        function pozoviAjaxInsert(obj){
            $.ajax({
                url:'models/crud/insertK.php',
                type:"post",
                data:obj,
                dataType:"json",
                success:function(data,status,xhr){
                    console.log(xhr.status);
                    if(xhr.status == 201){
                        console.log("Uspesno unesen korisnik!");
                    }
                    $("#feedI").html("<h1>Successful registration.</h1>");
                },
                error:function(xhr,status,error){
                    
                    console.log(xhr.status);
                   
                   
    
                }
            });
        }
        var formDataa=dohvatiInsert();
        pozoviAjaxInsert(formDataa);
});