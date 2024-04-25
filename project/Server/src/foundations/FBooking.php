<?php

    /**
     * @access public
     * @package foundation
     *
     * @author Vittorio Piotti
     *
     * Class FBooking
    */
    

    class FBooking {


        public function __construct() {
        }

        public function getRequest($apiMethod) {
            switch ($apiMethod) {
                case 'getClientBookings':
                    $this->getClientBookings();
                    break;
                case 'getAdminBookings':
                    $this->getAdminBookings();
                    break;
                default:
                    http_response_code(404);
                    echo json_encode(array("error" => "Metodo non trovato"));
                    break;
            }
        }


        public function postRequest($apiMethod) {
            switch ($apiMethod) {
                case 'newbooking':
                    $this->newBooking();
                    break;
                default:
                    http_response_code(404);
                    echo json_encode(array("error" => "Metodo non trovato"));
                    break;
            }
        }

        public function getClientBookings(){
    $clientId = isset($_GET['clientId']) ? $_GET['clientId'] : null;
    $mBook = new MBooking();
    $bookings = $mBook->getClientBookings($clientId);

    // Se vuoi una rappresentazione JSON dei dati, converte l'array in JSON
    echo json_encode($bookings);
}


public function getAdminBookings(){
    $adminId = isset($_GET['adminId']) ? $_GET['adminId'] : null;
    $mBook = new MBooking();
    $bookings = $mBook->getAdminBookings($adminId);
    echo json_encode($bookings);

    

   
}

        
        



        public function newBooking(){
          $roomName = $_POST['roomName'] ?? null;
        $hotelId = $_POST['hotelId'] ?? null;
        $startDate = $_POST['startDate'] ?? null;
        $endDate = $_POST['endDate'] ?? null;
        $clientId = $_POST['clientId'] ?? null;
$mRoom = new MRoom();
            $roomId = $mRoom->getFirstFreeRoom($roomName,$hotelId,$startDate,$endDate);
            if ($roomId != false){
                $mBook = new MBooking();
                $booked = $mBook->newBooking($clientId, $roomId, $startDate, $endDate);
                echo json_encode(array("booked" => $booked));
                
            }else{
                echo json_encode(array("booked" =>  $roomId));

            }
            
        }




        

    }


?>