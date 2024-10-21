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

$(function() {


    
    if (typeof hideDinamicItem !== 'undefined' && hideDinamicItem !== null && hideDinamicItem !== '') {
        $("#dinamic-nav-item").html(``);
    }
    if (typeof bookingPage !== 'undefined' && bookingPage !== null && bookingPage !== '') {

        var hotelNameParts = hotelName.split(' '); // Dividi hotelName in parti separate da spazi
        var firstPart = hotelNameParts[0]; // Prima parte del nome dell'hotel
        var secondPart = hotelNameParts.slice(1).join(' '); // Rimuovi la prima parte e unisci il resto

        $("#hotel-name").html(`<span class="display-4 fw-normal custom-green">${firstPart}&nbsp;</span><span class="display-4 fw-normal custom-red">${secondPart}</span>`);
        $("#dinamic-nav-item").html(`<span class="text-title-first-header custom-green">${firstPart}&nbsp;</span> <span class="text-title-second-header custom-red">${secondPart}</span>`);
    
        $('#choice-room').text($('#nome-stanza-checkout-' + selectedIndex).text());
        $('#startDate').val(startDateBook).prop('disabled', true); 

        // Imposta il valore e disabilita l'interazione con l'elemento con id "endDate"
        $('#endDate').val(endDateBook).prop('disabled', true); 

       

        const onChangeCallback = ({ startDate, endDate }) => {
            var dateState = "end";
            if(startDate.format('YYYY-MM-DD') != $('#startDate').val())dateState = "start";

            var startDateObj = new Date(startDate);
            var endDateObj = new Date(endDate);
            var today = new Date();
    
            // Confronta le date considerando solo anno, mese e giorno
            var startDateStr = startDateObj.toISOString().split('T')[0];
            var endDateStr = endDateObj.toISOString().split('T')[0];
            var todayStr = today.toISOString().split('T')[0];
            var tomorrowObj = new Date(today);
            tomorrowObj.setDate(tomorrowObj.getDate() + 1);
            var tomorrowStr = tomorrowObj.toISOString().split('T')[0];


            if(startDateStr < todayStr){
                calendar.setState({
                    startDate: moment(todayStr), // Imposta la data di inizio al 1 aprile 2024
                    endDate: moment(tomorrowStr)     // Imposta la data di fine al 5 aprile 2024
                });

                startDateStr = todayStr;
                endDateStr = tomorrowStr;
            }else{

                startDateStr = startDate.format('YYYY-MM-DD');
                endDateStr = endDate.format('YYYY-MM-DD');
            }

            $('#startDate').val(startDateStr);
            $('#endDate').val(endDateStr);
      
            getBookingRoomData($('#choice-room').text().trim(), hotelId, $('#startDate').val(), $('#endDate').val(), callBackPreBooking, dateState);


          };

          
          
          function callBackPreBooking(data, startDate, endDate, state, selectedRoom, hotelId){
            var startDateObj = new Date(startDate);
            var endDateObj = new Date(endDate);
            $('#cost-booking').html(`
            <span id="cost-booking" class="fs-5 mb-0">
            ${data.cost}
            <small class="text-body-secondary fw-light ms-2">
                â‚¬/${ Math.floor((endDateObj - startDateObj) / (1000 * 60 * 60 * 24)) === 1 ? "" : Math.floor((endDateObj - startDateObj) / (1000 * 60 * 60 * 24))}gg
            </small>
        </span>             `);
            $('#availability-booking').text(data.availability);
            


            $('#cost-checkout').html(`
            <span id="cost-checkout" class="fs-2 mb-0">
            ${data.cost}
            <small class="text-body-secondary fw-light ms-2">
                â‚¬/${ Math.floor((endDateObj - startDateObj) / (1000 * 60 * 60 * 24)) === 1 ? "" : Math.floor((endDateObj - startDateObj) / (1000 * 60 * 60 * 24))}gg
            </small>
        </span>             `);
            $('#availability-checkout').text(data.availability);
            

          }
  
          
          var startDateObj = new Date(startDateBook);
          var endDateObj = new Date(endDateBook);
          
          // Confronto delle date come oggetti Date anzichÃ© stringhe
          if(startDateObj > endDateObj) {
              // Se la data di inizio Ã¨ successiva alla data di fine, scambia le due date
              let temp = startDateObj;
              startDateObj = endDateObj;
              endDateObj = temp;
          }

          
          // Converti nuovamente le date in stringhe nel formato corretto 'yyyy-mm-dd'
          var startDateStr = startDateObj.toISOString().split('T')[0];
          var endDateStr = endDateObj.toISOString().split('T')[0];
          
          // Assegna le date corrette ai campi di input
          $('#startDate').val(startDateStr);
          $('#endDate').val(endDateStr);
          
          // Crea l'oggetto Calendar con le date corrette
          const calendar = new Calendar({ startDate: startDateStr, endDate: endDateStr, onChange: onChangeCallback });
          
        $('#btn-checkout-stanza').click(function() {
            
            if($('#availability-checkout').text() == '0'){
                
                


                $('#modal-svg').html(SVG_ERROR);
                $('#modal-title').text("Nessuna DisponibilitÃ  di Stanze");
                $('#modal-desc').text("Non ci sono stanze disponibili nella data di prenotazione scelta");
                $('#modal-feed').modal('show');
                
                $('#modal-feed').on('hidden.bs.modal', function () {
                    $('#modal-content').removeClass('show-modal');
                });
                $('#modal-content').delay(300).queue(function(next) {
                    $(this).addClass('show-modal');
                    next();
                });



                
            }else{

            var startDateObj = new Date($('#startDate').val());
            var endDateObj = new Date($('#endDate').val());
    
            // Confronta le date considerando solo anno, mese e giorno
            var startDateStr = startDateObj.toISOString().split('T')[0];
            var endDateStr = endDateObj.toISOString().split('T')[0];

            if( startDateStr == endDateStr){
                $('#modal-svg').html(SVG_ERROR);
                $('#modal-title').text("Data soggiorno non valida");
                $('#modal-desc').text("La data dell'inizio della prenotazione deve essere minore di quella della fine");
                $('#modal-feed').modal('show');
                
                $('#modal-feed').on('hidden.bs.modal', function () {
                    $('#modal-content').removeClass('show-modal');
                });
                $('#modal-content').delay(300).queue(function(next) {
                    $(this).addClass('show-modal');
                    next();
                });
            }else{
                  $('#modal-svg').html(SVG_CHECK);
                        $('#modal-title').text("Prenotazione in corso");
                        $('#modal-btn-chiudi').addClass("d-none");
                        $('#modal-btn-conferma').removeClass("d-none");
                        $('#modal-btn-annulla').removeClass("d-none");
                        $('#modal-btn-conferma').removeClass("btn-danger");
                        $('#modal-btn-conferma').addClass("btn-success");

                        $('#modal-btn-annulla').off('click').on('click', async function() {

                        });
                    
                        $('#modal-btn-conferma').off('click').on('click', async function() {

                            newBooking($('#choice-room').text().trim(), hotelId, $('#startDate').val(), $('#endDate').val(),userId);


                            window.location.href = "http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php";

                  
                        });


                        $('#modal-desc').text("Confermare le prenotazione ");
                        $('#modal-feed').modal('show');
                        $('#modal-feed').on('hidden.bs.modal', function () {
                            $('#modal-content').removeClass('show-modal');
                        });
                        $('#modal-content').delay(300).queue(function(next) {
                            $(this).addClass('show-modal');
                            next();
                        })
            }
        }
        })
        $('.custom-nav-item').click(function() {
            var key = $(this).find('.nav-link').data('key'); // Ottieni la chiave dall'attributo data-key dell'elemento .nav-link
            $('.row.featurette.room-checkout').hide(); // Nascondi tutte le featurette delle stanze
            $('#stanza-checkout-' + key).show(); // Mostra solo la featurette della stanza corrispondente alla chiave selezionata

            $('#choice-room').text($(this).text());
    
            getBookingRoomData($('#choice-room').text().trim(), hotelId, $('#startDate').val(), $('#endDate').val(), callBackPreBooking, "start");

           
        });

        getBookingRoomData($('#choice-room').text().trim(), hotelId, $('#startDate').val(), $('#endDate').val(), callBackPreBooking, "start");

        
    }
});        


