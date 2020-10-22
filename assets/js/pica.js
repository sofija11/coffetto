$(document).ready(function(){
    showProducts();
    $('#sendIdd').click(checkContact);
   showBlogs();
    $(document).on('click','.linkPag', posaljiBrojStrane);
   
})

//pag
function posaljiBrojStrane(e){
    e.preventDefault();
    var str=$(this).data('pag');
    $.ajax({
        url:"models/paginacija.php",
        dataType:"json",
        data:{
            str:str
        },
        method:"post",
        success:function(data,status,xhr){
            
            console.log('Br strana nadjen.');
            printBlogs(data);
        },
        error:function(xhr,status,error){
            console.error(xhr.status);
            console.log(error);
        }
    });

}
$("#menus .container #filter :button").click(function(){
   let dohvacen=$(this).data('filter');
   $.ajax({
       url:'models/filtriranjeButton.php',
       method:'POST',
       dataType:'json',
       data:{
           dohvacen:dohvacen
       },
       success:function(data,status,xhr){
           console.warn(data);
           console.log('Nadjeno po kategorijama');
           printDrinks(data);
       },
       error:function(xhr){
            console.log('nije uspeo AJAX');
       }
   })
});
		
 
function showBlogs(){
    $.ajax({
        url: 'models/getBlogs.php',
        method: 'GET',
        dataType: 'json',
        success: function(data){
            console.warn(data);
            printBlogs(data);
        },
        error: function(xhr, status, statusText){
            console.log('gr');
            console.log(xhr);
        
        }
    });
}
function printBlogs(data){
    let html = "";
    for(let blog of data){
        html += `
        <div class="row">
            <div class="col-md-6">
                <figure class="post-thumbnail">
                    <img alt="${blog.alt}" src="${blog.src}">
                    <a href="#"></a>
                </figure>
            </div>
            <div class="col-md-6">
                <div class="entry">
                    <div class="entry-date"></div>
                    <h3 class="title entry-title"><a href="#">
                    ${blog.naslov}</a></h3>
                    <div class="entry-content">${blog.opis}</div>
                    <div class="entry-meta">
                        Post by <a href="#" class="entry-meta-author">${blog.ime}</a> 
                    </div>
                </div>
            </div>
        </div>
     `;
        
    }
    $("#blog").html(html);
}

function showProducts(){
    $.ajax({
        url: 'models/pica.php',
        method: 'GET',
        dataType: 'json',
        success: function(data){
            console.warn(data);
            printDrinks(data);
        },
        error: function(xhr, status, statusText){
            console.log('gr');
            console.log(xhr);
        
        }
    })
}

function printDrinks(data){
    let html = "";
    for(let drink of data){
        html += `<aside class="clearfix animated animation-delay-75" data-animate="fadeInLeft">
        <img class="menu-img" alt="" src="${ drink.slika }">
        <div class="menu-content">
            <h5 class="title menu-title"><span> ${ drink.nazivPica }</span><span class="menu-price"><i class="fa fa-usd"></i>${ drink.cena }</span></h5>
            <p>${ drink.opis }.</p>
        </div>
    </aside>`;
        
    }
    $("#picaa").html(html);
}
$("#pretraga").keyup(function(){
    let uneto=$(this).val();
    $.ajax({
        url:'models/search.php',
        method:'POST',
        dataType:'json',
        data:{
            uneto:uneto
        },
        success:function(data){
           console.warn(data);
            printDrinks(data);
            
            
      },
        error:function(xhr,status,statusText){
            console.log('Greska');
            console.log(xhr);
        }
    })
});
$(document).on('click', '.update', function(e){
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
        url: 'models/crud/dohvati.php', 
        method: 'GET',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(korisnikk){
            console.warn('USPESNO DOHVACENA KATEGORIJA');
            console.log(korisnikk);

            // Popunjavanje forme
            fillForm(korisnikk);
        }, 
        error: function(greska, status, statusText){
            console.error('GRESKA DOHVATANJE KATEGORIJE:');
            
            console.log(greska.parseJSON);
            alert(greska.parseJSON.poruka);
        }
    })
});
function fillForm(korisnikk){
    $("#hidnU").val(korisnikk.idBlog);
    $("#nazivU").val(korisnikk.naslov);
    $("#opisU").val(korisnikk.opis);
    $("#datumU").val(korisnikk.datum);
    
    
}
$("#updateU").click(function(){

    let id = $('#hidnU').val();

  

    

        $.ajax({
            url: 'models/crud/updateBlog.php',
            method: 'POST',
            data: {
                id: id,
                naziv: $('#nazivU').val(),
                opis: $('#opisU').val(),
                datum:$('#datumU').val()
            },
            dataType: 'json',
            success: function(podaci, status, ceoZahtev){
                console.warn('USPESNO SACUVANO');
                

                if(ceoZahtev.status == 204){
                    console.log('USPESNO SACUVANO!');
                    window.location.reload(false); 
                    
                }
                
                clearForm();

            }, 
           
            error: function(greska, status, statusText){
                console.error('GRESKA DOHVATANJE KATEGORIJE:');
            
                console.log(greska.parseJSON);
                alert(greska.parseJSON.poruka);
            }
        });
    

})
function clearForm(){
    $("#hidnU").val('');
    $("#nazivU").val('');
    $("#opisU").val('');
    $("#datumU").val('');
}

$(document).on('click', '.updateU', function(e){
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
        url: 'models/crud/dohvatiK.php', 
        method: 'GET',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(korisnikU){
            
            console.log(korisnikU);

            // Popunjavanje forme
            fillFormUser(korisnikU);
        }, 
        error: function(greska, status, statusText){
            console.error('GRESKA DOHVATANJE KATEGORIJE:');
            
            console.log(greska.parseJSON);
            alert(greska.parseJSON.poruka);
        }
    })
});
function fillFormUser(korisnikU){
    $('#firstnameIdU').val(korisnikU.ime);
    $('#lastnameIdU').val(korisnikU.prezime);
    $('#usernameIdU').val(korisnikU.korisnicko);
    $('#hidnUU').val(korisnikU.idKorisnik);
}
$('#sendIdU').click(function(){
    let id = $('#hidnUU').val();

    $.ajax({
        url: 'models/crud/updateUser.php',
        method: 'POST',
        data: {
            id: id,
            ime: $('#firstnameIdU').val(),
            prezime: $('#lastnameIdU').val(),
            korisnicko:$('#usernameIdU').val()
        },
        dataType: 'json',
        success: function(podaci, status, ceoZahtev){
            console.warn('USPESNO SACUVANO');
            

            if(ceoZahtev.status == 204){
                console.log('USPESNO SACUVANO!');
                window.location.reload(false); 
            }
           
            clearFormUser();

        }, 
       
        error: function(greska, status, statusText){
            console.error('GRESKA DOHVATANJE KATEGORIJE:');
        
            console.log(greska.parseJSON);
            alert(greska.parseJSON.poruka);
        }
    });

   
})
function clearFormUser(){
    $("#firstnameIdU").val('');
    $("#lastnameIdU").val('');
    $("#usernameIdU").val('');
}



function checkContact(){
    let ime=document.getElementById("nameIdd").value;
    let poruka=document.getElementById("messageId").value;
	let reIme=/^[A-Z]{1}[a-z]{2,20}$/;
	let rePoruka=/^[A-Za-z\s]{10,250}$/;

	if(ime.match(reIme)){
			document.querySelector("#nameggreske").innerHTML="";

	} 
	else if(ime==""){
		document.querySelector("#nameggreske").innerHTML="You must enter your name";
	}
	else{
			document.querySelector("#nameggreske").innerHTML="Your name isn't in right form";
	}
	
	
    if(poruka.match(rePoruka)){
	document.querySelector("#porukaGreske").innerHTML=""
    }
    else if(poruka=""){
	document.querySelector("#porukaGreske").innerHTML="You must enter message";
    }
    else{
	document.querySelector("#porukaGreske").innerHTML="Message isn't in right form";
}
}
