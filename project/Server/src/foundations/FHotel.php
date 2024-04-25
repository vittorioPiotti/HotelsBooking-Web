<?php


   /**
     * @access public
     * @package foundation
     *
     * @author Vittorio Piotti
     *
     * Class FHotel
    */

class FHotel {

  
    
    public function __construct() {
    }

    public function getRequest($apiMethod) {
        switch ($apiMethod) {
            case 'getAllHotels':
                $this->getAllHotels();
                break;
            case 'getHotelById':
                $this->getHotelById();
                break;
            case 'getHotelsByIdAdmin':
                $this->getHotelsByIdAdmin();
                break;
            default:
                http_response_code(404);
                echo json_encode(array("error" => "Metodo non trovato"));
                break;
        }
    }


    public function postRequest($apiMethod) {
        switch ($apiMethod) {
            case 'deleteHotelData':
                $this->deleteHotelData();
                break;
            case 'updateHotelData':
                $this->updateHotelData();
                break;
         
            default:
                http_response_code(404);
                echo json_encode(array("error" => "Metodo non trovato"));
                break;
        }
    }


    private function deleteHotelData(){
        $idHotel = $_POST['idHotel'] ?? null;

        $mhotel = new MHotel();
        $hotels = $mhotel->deleteHotelData( $idHotel);

        echo json_encode(array("deleteHotelData" => "okay"));

    }


public function updateHotelData(){
    
        $rooms = json_decode($_POST['rooms'],true) ?? null;
        $hotel =json_decode( $_POST['hotel'],true) ?? null;


  
        // Utilizza i dati ottenuti per eseguire l'aggiornamento nell'hotel e nelle camere
        $mhotel = new MHotel();
        $hotelResp = $mhotel->updateHotelData($hotel);
    
    

        // Ottieni l'id dell'hotel aggiornato
        $hotelRespArray = json_decode($hotelResp, true);
        $idHotel = $hotelRespArray['idHotel'];
      
        // Aggiorna i dati delle camere con l'id dell'hotel
        $mroom = new MRoom();
        $roomsResp = $mroom->updateRoomData($rooms, $idHotel);

        // Restituisci la risposta
        
                echo json_encode(array("updateHotelData" =>   $roomsResp));


}



    private function getAllHotels() {
        $today = isset($_GET['today']) ? $_GET['today'] : null;
        $tomorrow = isset($_GET['tomorrow']) ? $_GET['tomorrow'] : null;
        $model = new MHotel();
        $hotels = $model->getAllHotels($today, $tomorrow);
        echo $hotels;
    }

    private function getHotelById() {
        $idHotel = isset($_GET['idHotel']) ? $_GET['idHotel'] : null;
        $today = isset($_GET['today']) ? $_GET['today'] : null;
        $tomorrow = isset($_GET['tomorrow']) ? $_GET['tomorrow'] : null;
        $model = new MHotel();
        $hotels = $model->getHotelById($idHotel, $today, $tomorrow);
        echo $hotels;
    }


    private function getHotelsByIdAdmin() {
        $idAdmin = isset($_GET['idAdmin']) ? $_GET['idAdmin'] : null;
        $model = new MHotel();
        $hotels = $model->getHotelsByIdAdmin($idAdmin);
        echo $hotels;
    }
}


?>