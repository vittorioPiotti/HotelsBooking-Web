<?php

/**
 * @access public
 * @package views
 * @author Vittorio Piotti
 *
 * Class VBooking
 */
class VBooking {
    public function showPreBooking($roomName, $rooms, $hotel, $startDate, $endDate) {
            $selected_index = null; // Inizializziamo selected_index a null

    // Assicurati che $_room sia definita prima di utilizzarla
    foreach ($rooms as $index => $_room) {
        if ($_room && $_room->getName() === $roomName) {
            $selected_index = $index; // Salva l'indice se il nome corrisponde
            break; // Esci dal ciclo una volta trovata la corrispondenza
        }
    }
    ?>
    <script>
        const bookingPage = true;
        const hotelName = "<?php echo $hotel->getName(); ?>";
        const startDateBook = "<?php echo $startDate; ?>";
        const endDateBook = "<?php echo $endDate; ?>";
        const selectedIndex = "<?php echo $selected_index; ?>";
        const hotelId = "<?php echo $hotel->getId(); ?>";
        const userId = "<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>"; // Assicurati che $_SESSION['user_id'] sia definito
    </script>

        <div class="container marketing mb-5 mt-5">
            <div class="pricing-container m-auto">
                <div class="pricing-header  pb-md-4 mx-auto text-center mb-5">
                    <h1 class="display-4 fw-normal custom-red">Checkout</h1>
                    <p class="lead text-body-secondary fs-4">Ecco un riepilogo della prenotazione. Verifica i tuoi dati e conferma la prenotazione.</p>
                </div>
            </div>
            <hr class="featurette-divider">

            <?php foreach ($rooms as $_key => $_room): ?>
                <div class="row featurette room-checkout" id="stanza-checkout-<?php echo $_key;?>" style="<?php echo ($_key === $selected_index) ? '' : 'display: none;'; ?>">
                    <div class="col-12 col-lg-6 mb-5">
                        <h2 class="featurette-heading custom-green featurette-heading-stanza fw-normal lh-1" id="nome-stanza-checkout-<?php echo $_key;?>"><?php echo $_room->getName(); ?></h2>
                        <p class="lead"><?php echo $_room->getDescription(); ?></p>
                        <ul class="list-group list-group-flush p-1 3">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                Costo al Giorno
                                <span class="fs-5 mb-0"><?php echo $_room->getCost(); ?><small class="text-body-secondary fw-light ms-2">€/gg</small></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                Camere Totali
                                <span class="badge bg-primary text-light"><?php echo $_room->getTotalRooms(); ?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-12 col-lg-6 position-relative" style="min-width:300px;">
                        <div class="nav nav-tabs overflow-x-auto flex-nowrap" id="roomTabs">
                            <?php foreach ($rooms as $__key => $__room): ?>
                                <div class="nav-item custom-nav-item d-inline-block">
                                    <a class="nav-link border border-1 text-nowrap <?php if ($__key === $_key) echo ' active'; ?>" data-key="<?php echo $__key; ?>"><?php echo $__room->getName(); ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <img class="mx-auto w-100 h-100 border border-1 rounded rounded-top-0 shadow" src="<?php echo $_room->getImage(); ?>" alt="Immagine stanza">
                    </div>
                    <hr class="featurette-divider">
                </div>
            <?php endforeach; ?>

            <div class="row featurette" id="stanza-<?php echo $rooms[$selected_index]->getId();?>">
                <div class="col-12 col-lg-6 order-lg-2 mb-5">
                    <h2 class="featurette-heading custom-green featurette-heading-stanza fw-normal lh-1">Conferma Soggiorno</h2>
                    <p class="lead">Seleziona la data di inizio e quella di fine della prenotazione della tua vacanza nella stanza dell'hotel e preparati per il Checkout</p>
                    <ul class="list-group list-group-flush p-1 3">
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                            Costo Totale
                            <span class="fs-5 mb-0" id="cost-booking"><?php echo $rooms[$selected_index]->getCost(); ?><small class="text-body-secondary fw-light ms-2">€/gg</small></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                            Disponibili
                            <span id="availability-booking" class="badge bg-primary text-light"><?php echo $rooms[$selected_index]->getAvailability(); ?></span>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-lg-6 order-lg-1 position-relative" style="min-width:300px;">
                    <div id="calendar" style="margin-left:auto;margin-top:auto;"></div>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="container marketing mb-5 mt-5">
                <div class="row featurette" id="stanza-<?php echo $rooms[$selected_index]->getId();?>">
                    <div class="col-12 col-lg-6 mb-5">
                        <h2 class="featurette-heading custom-green featurette-heading-stanza fw-normal lh-1">Completa Checkout</h2>
                        <p class="lead">Ora che hai scelto la camera dell'Hotel in cui soggiornare e la durata della vacanza completa la prenotazione</p>
                        <a id="btn-checkout-stanza" class="btn btn-lg fs-5 btn-success mb-2 mt-2">Prenota</a>
                    </div>

                    <div class="col-12 col-lg-6 position-relative" style="min-width:300px;">
                        <div class="card mb-4 rounded-3 shadow">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal custom-green">Riepilogo Checkout</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush mt-2">
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Hotel:
                                        <span class="custom-red"><?php echo $hotel->getName(); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Tipo Stanza:
                                        <span id="choice-room" class="custom-green"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Inizio Prenotazione:
                                        <div>
                            </span> <input type="date" id="startDate" name="startDate" class="text-end" value="2003-10-23"></span>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
  <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
</svg></span></div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Fine Prenotazione:
                                        <div>
                            </span> <input type="date" id="endDate" name="startDate" class="text-end" value="2003-10-23"></span>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
  <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
</svg></span></div>                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Camere prenotabili
                                        <span class="badge bg-secondary text-light" id="availability-checkout">5</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Camere prenotate:
                                        <span class="badge bg-primary text-light" id="availability-checkout">1</span>
                                    </li>
                                </ul>
                                <hr class="featurette-divider mt-4 mb-4">
                                <h1 class="card-title pricing-card-title text-end mt-1" id="cost-checkout">100<small class="text-body-secondary fw-light">€/gg</small></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }


    public function showBookings($bookings){


        ?>
        <script>
                const hideDinamicItem = true;
                <?php if (count($bookings) < 4): ?>
                    const fixedBottom = "fixed-bottom";
                   
                <?php endif; ?>
        </script>
            <?php 
            if (count($bookings) === 0) {
                ?>
            <div class="form-signin m-0 p-0 text-center " style="background-color: transparent;">
               <div class="modal-content pattern-mono-js p-5 border rounded shadow">
                    <div class="modal-body text-center m-1 pt-4" >
                     

                        <p class="fw-bold fs-3 " id="modal-title">             
  <?php
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
        echo "Nessuna prenotazione registrata.";
    } else {
        echo "Nessuna prenotazione effettuata.";
    }
    ?>
                        </p>
                        <p class="fs-6 text-muted" id="modal-desc">
                            
                              <?php
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
        echo "Non ci sono clienti che hanno effettuato prenotazioni presso i tuoi hotel.";
    } else {
        echo "Effettua la prenotazione per il tuo pernottamento in uno dei nostri hotel.";
    }
    ?>
    
                        </p>

                    </div>
                </div>
            </div>
            </div>
                <?php 
            } else {
                ?>
          <div class="album py-5">
                <div class="container">
                    <div class="row row-cols-sm-1 row-cols-md-2  row-cols-lg-3 g-3" id="hotels-list">
                     <?php foreach ($bookings as $book): ?>
                        <div class="p-3"> 
                                <div class="card shadow border border-1 p-0 pattern-mono">
                                <div class="card-header py-3">
                                <h4 class="my-0 fw-normal custom-green">Prenotazione N.<?php echo $book->getBookingId(); ?></h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush mt-2">
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Hotel:
                                        <span class="custom-red"><?php echo $book->getHotelName(); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Stanza:
                                        <span id="choice-room" class="custom-green"><?php echo $book->getRoomName(); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Inizio:
                                        <div>
                                      <span type="date" class="me-2"id="startDate" disabled name="startDate" ><?php echo $book->getBookingStartDate(); ?></span><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
  <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
</svg></span>
                     </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Fine:
             <div>
                                      <span type="date" class="me-2"id="startDate" disabled name="startDate" ><?php echo $book->getBookingEndDate(); ?></span><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
  <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
</svg></span>
                     </div>                                    </li>
                                    
                                    <?php
                                    
                                    if($_SESSION['is_admin'] == 1){
                                        ?>

                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                        Cliente:
                                        <span class=" text-dark  " id="availability-checkout"><?php echo $book->getClientName(); ?></span>
                                    </li>
          

                                        <?php
                                    }else{
                              
                                    }
                                    
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center fs-5" style="background-color: transparent;">
                                        Numero Stanza:
                                        <span class="badge bg-primary text-light  " id="availability-checkout"><?php echo $book->getBookingRoomNumber(); ?></span>
                                    </li>
                                </ul>
                                <hr class="featurette-divider mt-4 mb-4">
                                <h1 class="card-title pricing-card-title text-end mt-1" id="cost-checkout"><?php echo $book->getTotalCost(); ?><small class="text-body-secondary fw-light">€/gg</small></h1>
                            </div>
                                </div>
                                </div>
                                <?php endforeach; ?>

                    </div>
                </div>
            </div>
        <?php
            }
    }
}
?>

