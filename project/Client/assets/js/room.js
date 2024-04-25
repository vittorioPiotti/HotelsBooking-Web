var selectedRoomText = 'Stanza Singola';
var startDate = '2003-10-10';
var endDate = '2003-11-10';
var url = "";

$(function() {

    if (typeof stateRoom !== 'undefined' && stateRoom !== null && stateRoom !== '') {

        function callBack(data, startDate, endDate, state, selectedRoom, hotelId) {
            var startDateObj = new Date(startDate);
            var endDateObj = new Date(endDate);
            var today = new Date();

            // Confronta le date considerando solo anno, mese e giorno
            var startDateStr = startDateObj.toISOString().split('T')[0];
            var endDateStr = endDateObj.toISOString().split('T')[0];
            var todayStr = today.toISOString().split('T')[0];

            if (startDateStr < todayStr) {
                // Imposta la data di oggi come startDate
                var tomorrowObj = new Date(today);
                tomorrowObj.setDate(tomorrowObj.getDate() + 1);
                var tomorrowStr = tomorrowObj.toISOString().split('T')[0];

                $('#start-date').val(todayStr);
                $('#end-date').val(tomorrowStr);
                getBookingRoomData(selectedRoom, hotelId, $('#start-date').val(), $('#end-date').val(), callBack, state);

            } else if (startDateStr < endDateStr) {
                // Le date sono corrette, mostra i dati
                $('#cost-pre-booking').html(`
                <span id="cost-pre-booking" class="fs-5 mb-0">
                ${data.cost}
                <small class="text-body-secondary fw-light ms-2">
                    €/${ Math.floor((endDateObj - startDateObj) / (1000 * 60 * 60 * 24)) === 1 ? "" : Math.floor((endDateObj - startDateObj) / (1000 * 60 * 60 * 24))}gg
                </small>
            </span>             `);
                $('#availability-pre-booking').text(data.availability);
                
            } else {
            
                if (state == "start") {
                    // Imposta la data successiva a startDate come endDate
                    var tomorrowObj = new Date(startDateObj);
                    tomorrowObj.setDate(tomorrowObj.getDate() + 1);
                    var tomorrowStr = tomorrowObj.toISOString().split('T')[0];
                    $('#end-date').val(tomorrowStr);
                    $('#end-date').val(tomorrowStr).trigger('change');

                } else {
                    // Imposta la data precedente a endDate come startDate
                    var yesterdayObj = new Date(endDateObj);
                    yesterdayObj.setDate(yesterdayObj.getDate() - 1);
                    var yesterdayStr = yesterdayObj.toISOString().split('T')[0];
                    $('#start-date').val(yesterdayStr);
                    $('#start-date').val(yesterdayStr).trigger('change');

                }
        
            

                // Richiama la funzione per ottenere nuovamente i dati
                getBookingRoomData(selectedRoom, hotelId, $('#start-date').val(), $('#end-date').val(), callBack, state);
            }
        }

        setRefBtnPrenota();

        // Esegue la callback immediatamente al caricamento della pagina
        getBookingRoomData(selectedRoomText, hotelId, startDate, endDate, callBack, "end");

        $('#end-date').on('change', function() {
            getBookingRoomData($('#selectRoom option:selected').text(), hotelId, $('#start-date').val(), $('#end-date').val(), callBack, "end");
            setRefBtnPrenota();
        });

        $('#start-date').on('change', function() {
            getBookingRoomData($('#selectRoom option:selected').text(), hotelId, $('#start-date').val(), $('#end-date').val(), callBack, "start");
            setRefBtnPrenota();
        });

        $('#selectRoom').on('change', function() {
            getBookingRoomData($('#selectRoom option:selected').text(), hotelId, $('#start-date').val(), $('#end-date').val(), callBack, "start");

            setRefBtnPrenota();
        });

        var hotelNameParts = hotelName.split(' ');
        var firstPart = hotelNameParts[0];
        var secondPart = hotelNameParts.slice(1).join(' ');
        $("#hotel-name-booking").html(`<span class="fw-normal fs-2 custom-green">${firstPart}&nbsp;</span><span class="fw-normal fs-2 custom-red">${secondPart}</span>`);
    }
});

function selezionaStanza(index) {
    $('#selectRoom').val(index).change();
}

function setRefBtnPrenota() {
    endDate = $('#end-date').val();
    startDate = $('#start-date').val();

    if (typeof hotelId !== 'undefined' && hotelId !== null && hotelId !== '') {
        var selectedRoomText = $('#selectRoom option:selected').text();
        var encodeSelectedRoom = encodeURIComponent(selectedRoomText);
        var encodeHotelId = encodeURIComponent(hotelId);
        var encodeStartDate = encodeURIComponent(startDate);
        var encodeEndDate = encodeURIComponent(endDate);
        url = "../../index.php?page=book&method=prebook&nameRoom=" + encodeSelectedRoom +
            "&idHotel=" + encodeHotelId +
            "&startDate=" + encodeStartDate +
            "&endDate=" + encodeEndDate;
    }
}

function preCheckout(sessionState) {
    
    if (typeof sessionState == 'undefined' || sessionState == null || sessionState == '') {
        $('#modal-svg').html(SVG_ERROR);
        $('#modal-title').text("Accesso non verificato");
        $('#modal-desc').text("Devi essere autenticato per poter proseguire con la prenotazione.");
        $('#modal-feed').modal('show');
          $('#modal-feed').on('hidden.bs.modal', function () {
                        $('#modal-content').removeClass('show-modal');
                    });
                    $('#modal-content').delay(300).queue(function(next) {
                        $(this).addClass('show-modal');
                        next();
                    });
    } else if($('#availability-pre-booking').text() == '0'){
        $('#modal-svg').html(SVG_ERROR);
        $('#modal-title').text("Nessuna Disponibilità di Stanze");
        $('#modal-desc').text("Non ci sono stanze disponibili nella data di prenotazione scelta");
        $('#modal-feed').modal('show');
        
        $('#modal-feed').on('hidden.bs.modal', function () {
            $('#modal-content').removeClass('show-modal');
        });
        $('#modal-content').delay(300).queue(function(next) {
            $(this).addClass('show-modal');
            next();
        });

    }else {
        var startDate = new Date($('#start-date').val());
        var endDate = new Date($('#end-date').val());
        var today = new Date();

        if (startDate > endDate || (startDate.getTime() === endDate.getTime() && startDate > today)) {
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
        } else {
            window.location.href = url;
        }
    }
}

