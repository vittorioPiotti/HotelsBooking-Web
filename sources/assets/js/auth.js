/*
  Hotels Booking Web v1.0.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/releases/tag/1.0.0)
  Copyright 2024 Vittorio Piotti
  Licensed under GPL-3.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/blob/main/LICENSE.md)
*/
/*
  Bootstrap v4.0.0 (https://getbootstrap.com)
  Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
*/

/**
 * @author Vittorio Piotti
 *
 * Script auth
*/

$(function() {
    $("#footer").removeClass("d-none");
    $("#form-signin-dinamic").addClass("show");
   
    $('#button-password').html( SVG_EYE_OFF(32) );
    // Controlla se la variabile globale fixedBottom Ã¨ definita
    if (typeof fixedBottom !== 'undefined' && fixedBottom !== null && fixedBottom != '') {
       
        // Aggiungi la classe dalla variabile globale all'elemento con id "idFooter"
        $('#footer').addClass(fixedBottom);
        $("#dinamic-nav-item").html(``);
        console.log(userEmail)
        console.log(userState)

     

    }



    $('#logged-title').html(`
    <h1  ><span >Benvenuto</span><span class="fw-bold custom-green"> ${userEmail}!</span></h1>
    <h3><span>Hai effettuato l'accesso come </span><span class="fw-bold custom-red">${userState}.</span></h3>

    
    `);


      $('#btn-elimina-profilo').off('click').on('click', async function() {
        $('#modal-svg').html(SVG_EXCLA);
        $('#modal-title').text("Eliminazione Profilo");
        $('#modal-btn-chiudi').addClass("d-none");
        $('#modal-btn-conferma').removeClass("d-none");
        $('#modal-btn-annulla').removeClass("d-none");
        $('#modal-btn-conferma').addClass("btn-danger");
        $('#modal-btn-conferma').removeClass("btn-success");
        $('#modal-btn-annulla').off('click').on('click', async function() {
        });
    
        $('#modal-btn-conferma').off('click').on('click', async function() {
         
            window.location.href = "http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=auth&authState=login&action=delete";

        });
    
        $('#modal-desc').html("Confermare l'eliminazione del tuo Profilo con tutti i dati ad esso associati perdondo: hotel, stanze e prenotazioni");
        $('#modal-feed').modal('show');

        $('#modal-feed').on('hidden.bs.modal', function () {
            $('#modal-content').removeClass('show-modal');
        });
        $('#modal-content').delay(300).queue(function(next) {
            $(this).addClass('show-modal');
            next();
        });
    });
    


   

});





function handleRegistration(){
    $("#form-signin-dinamic").removeClass("show");

    
}


function togglePassword(){
    var passwordInput = $('#floatingPassword');
    var currentType = passwordInput.attr('type');
    passwordInput.attr('type', currentType === 'password' ? 'text' : 'password');
    $('#button-password').html(currentType == 'password' ? SVG_EYE_ON(32) : SVG_EYE_OFF(32));
}
