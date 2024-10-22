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
 * Script home
*/




$(function() {
    $("#dinamic-nav-item").removeClass("d-none");

    
    var outputTitle = `<span class="display-4 fw-bold lh-1 custom-red mb-3">Scegli il tuo Hotel</span>`;
    var outputBody = `<p class="lead text-body-secondary fs-4 mt-5">Esplora la nostra selezione di hotel per trovare la sistemazione perfetta per il tuo prossimo soggiorno. Pianifica il tuo viaggio con noi e preparati a vivere un'esperienza indimenticabile.</p>`;
    var outputBtn = `<a  href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=auth&authState=login" class="btn btn-lg btn-primary mt-3 mb-5" type="submit">Autenticati</a>`;
    // Verifica se dinamicHeaderTitle e dinamicHeaderBody sono definiti e non nulli
    if (typeof dinamicHeaderTitle !== 'undefined' && dinamicHeaderTitle !== null  && dinamicHeaderTitle !== '' && typeof dinamicHeaderBody !== 'undefined' && dinamicHeaderBody !== null && dinamicHeaderBody !== '') {
        outputTitle = `<span class="display-4 fw-bold lh-1 custom-green mb-3">Benvenuto&nbsp;</span><span class="display-4 fw-bold lh-1 custom-red mb-3">${dinamicHeaderTitle}</span>`;
        
        // Verifica se dinamicHeaderBody Ã¨ 'Admin' o meno
        outputBody = `<p class="mt-4 mb-4"><span class="lead text-body-secondary fs-4 mt-5">Sei autenticato come </span><span class="lead  fw-bold  custom-red fs-4 mt-5">${dinamicHeaderBody}</span><span class="lead text-body-secondary fs-4 mt-5">. 
        ${(dinamicHeaderBody == 'Admin')
            ?"Gestisci i tuoi Hotel e le stanze dei tuoi Hotel personalizzando la sezione del sito dedicata a te! Sfrutta la nostra interfaccia user-friendly e crea la tua pagina."
            :"Preparati a prenotare la tua stanza per una confortevole uscita fuori porta! Ricerca trai nostri Hotel quello piÃ¹ adatto a te e prenota la tua stanza!."
        }
        </span></p>`;
        outputBtn = dinamicHeaderBody == 'Admin' ? `<a  href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=room&hotelId=newHotel" class="btn btn-lg btn-primary mt-3 mb-5" type="submit">Nuovo Hotel</a>` :  `<a  href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=book&method=bookings" class="btn btn-lg btn-primary mt-3 mb-5" type="submit">Vedi Prenotazioni</a>`;
    }

    $("#dinamic-header-title").html(outputTitle);
    $("#dinamic-header-body").html(outputBody);
    $("#dinamic-header-btn").html(outputBtn);
}); 