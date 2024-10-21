<?php
/**
 * @access public
 * @package views
 * @author Vittorio Piotti
 *
 * Class CRoom
 */
  require_once __DIR__ . '/../views/VRoom.php';
  require_once __DIR__ . '/../entities/EHotel.php';
    require_once __DIR__ . '/../entities/ERoom.php';
class CRoom {

    public function index() {
        $this->getHotelRooms();
    }


    private function getHotelRooms() {
        $rooms = [];
        $hotel = null;

        if (isset($_GET['hotelId']) && $_GET['hotelId'] != 'newHotel') {
            $hotelId = $_GET['hotelId'];
            $today = date('Y-m-d');
            $tomorrow = date('Y-m-d', strtotime('+1 day'));

            $url = SERVER_ORIGIN . 'type=hotel&method=getHotelById&idHotel=' . urlencode($hotelId) . '&today=' . urlencode($today) . '&tomorrow=' . urlencode($tomorrow);
            $hotel_data = json_decode(file_get_contents($url), true);

            if ($hotel_data) {
                $hotel = new EHotel(
                    $hotel_data['id'],
                    $hotel_data['name'],
                    $hotel_data['image'],
                    $hotel_data['description'],
                    $hotel_data['idAdmin'],
                    $hotel_data['totalRooms'],
                    $hotel_data['availability']
                );

                $urlGetHotelRooms = SERVER_ORIGIN . 'type=room&method=getHotelRooms&idHotel=' . urlencode($hotelId) . '&today=' . urlencode($today) . '&tomorrow=' . urlencode($tomorrow);
                $rooms_data = json_decode(file_get_contents($urlGetHotelRooms), true);

                foreach ($rooms_data as $room_data) {
                    $room = new ERoom(
                        $room_data['id'] ?? null,
                        $room_data['name'] ?? '',
                        $room_data['image'] ?? null,
                        $room_data['description'] ?? null,
                        $room_data['number'] ?? null,
                        $room_data['cost'] ?? null,
                        $room_data['totalRooms'] ?? null,
                        $room_data['availability'] ?? null
                    );
                    $rooms[] = $room;
                }
            } else {
                echo "Error fetching hotel data.";
            }
        } else {
            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
                $hotel = new EHotel(
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null
                );

                $room = new ERoom(
                    null,
                    '',
                    null,
                    null,
                    null,
                    null,
                    null,
                    null
                );
                $rooms[] = $room;
            } else {
                echo "Hotel ID not specified.";
            }
        }

        $view = new VRoom();
        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
            $view->viewEditRoom($rooms, $hotel);
        } else {
            $view->viewListRoom($rooms, $hotel);
        }
    }
}
?>
