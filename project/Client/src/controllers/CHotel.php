<?php
/**
 * @access public
 * @package controllers
 * @author Vittorio Piotti
 *
 * Class CHotel
 */

class CHotel {
    public function index() {
        $this->getAllHotels();
    }
private function getHotels() {
    // Verifica se la chiave 'is_admin' è definita nella sessione
    $is_admin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : 0;

    $today = date('Y-m-d');
    $tomorrow = date('Y-m-d', strtotime('+1 day'));

    // Costruisci l'URL in base al ruolo dell'utente
  $is_admin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : 0;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($is_admin == 1 && isset($user_id)) {
    $url = SERVER_ORIGIN . 'type=hotel&method=getHotelsByIdAdmin&idAdmin=' . $user_id;
} else {
    $url = SERVER_ORIGIN . 'type=hotel&method=getAllHotels&today=' . urlencode($today) . '&tomorrow=' . urlencode($tomorrow);
}


    $json_data = file_get_contents($url);

    $hotels_data = json_decode($json_data, true)?? array();

    $hotels = array();

    foreach ($hotels_data as $hotel_data) {
        $hotel = new EHotel(
            $hotel_data['id'],
            $hotel_data['name'],
            $hotel_data['image'],
            $hotel_data['description'],
            $hotel_data['idAdmin'],
            $hotel_data['totalRooms'],
            $hotel_data['availability']
        );
        $hotels[] = $hotel;
    }

    return $hotels;
}

    private function getAllHotels() {
        $hotels = $this->getHotels();

        $view = new VHotel();
        // Verifica se la chiave 'is_admin' è definita nella sessione
        $is_admin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : 0;

        if ($is_admin == 1) {     
            if(count($hotels) == 0){
                $hotel = new EHotel(
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null
                );
                $hotels[] = $hotel;
            }
            $view->viewAdminHotels($hotels);
        } else {
            $view->viewListHotels($hotels);
        }
    }
}

?>

