/*
  Hotels Booking Web v1.0.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/releases/tag/1.0.0)
  Copyright 2024 Vittorio Piotti
  Licensed under GPL-3.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/blob/main/LICENSE.md)
*/


function getBookingRoomData(roomName, idHotel, startDate, endDate,callback,state) {
    // Definisci l'URL per la richiesta
    var apiUrl = SERVER_ORIGIN+`type=room&method=getBookingRoom&roomName=${encodeURIComponent(roomName)}&idHotel=${encodeURIComponent(idHotel)}&startDate=${encodeURIComponent(startDate)}&endDate=${encodeURIComponent(endDate)}`;

    // Esegui la richiesta AJAX utilizzando jQuery
    $.ajax({
      url: apiUrl,
      method: "GET",
      dataType: "json",
      success: function(data) {
        // La richiesta Ã¨ stata completata con successo
    
        if (typeof callback === "function") {

          callback(data,startDate,endDate,state,roomName,idHotel);
          
        }        
      },
      error: function(xhr, status, error) {
        // C'Ã¨ stato un errore durante la richiesta
        console.error("Errore durante la richiesta:", status, error);
      }
      
    });
  }




function updateHotelData(rooms, hotel) {
    var url = SERVER_ORIGIN + "type=hotel&method=updateHotelData";

    var requestData = {
        rooms: JSON.stringify(rooms),
        hotel: JSON.stringify(hotel)
    };
    
    // Converti l'oggetto requestData in una stringa query
    var requestBody = Object.keys(requestData)
        .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(requestData[key]))
        .join('&');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
            var response = JSON.parse(xhr.responseText);
            console.log(response);
        
    };
    xhr.send(requestBody);
}


function deleteHotelData(idHotel) {
    var url = SERVER_ORIGIN + "type=hotel&method=deleteHotelData";
    
    var requestData = {
        idHotel: idHotel
    };
    
    // Converti l'oggetto requestData in una stringa query
    var requestBody = Object.keys(requestData)
        .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(requestData[key]))
        .join('&');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            console.log(response);
        }
    };
    xhr.send(requestBody);
}



function newBooking(roomName, hotelId, startDate, endDate, clientId) {
    var url = SERVER_ORIGIN + "type=book&method=newbooking";
    
    var requestData = {
        roomName: roomName,
        hotelId: hotelId,
        startDate: startDate,
        endDate: endDate,
        clientId: clientId
    };
    
    // Converti l'oggetto requestData in una stringa query
    var requestBody = Object.keys(requestData)
        .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(requestData[key]))
        .join('&');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            console.log(response);
        }
    };
    xhr.send(requestBody);
}


