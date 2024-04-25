/**
 * @author Vittorio Piotti
 *
 * Script hotel
*/

$(function() {
    
    if (typeof hotelName !== 'undefined' && hotelName !== null  ) {
   
    
        var hotelNameParts = hotelName.split(' '); // Dividi hotelName in parti separate da spazi
        var firstPart = hotelNameParts[0]; // Prima parte del nome dell'hotel
        var secondPart = hotelNameParts.slice(1).join(' '); // Rimuovi la prima parte e unisci il resto

        $("#hotel-name").html(`<span class="display-4 fw-normal custom-green">${firstPart}&nbsp;</span><span class="display-4 fw-normal custom-red">${secondPart}</span>`);
        $("#dinamic-nav-item").html(`<span class="text-title-first-header custom-green">${firstPart}&nbsp;</span> <span class="text-title-second-header custom-red">${secondPart}</span>`);
        
    }
    


});



