<?php

    /**
     * @access public
     * @package foundation
     *
     * @author Vittorio Piotti
     *
     * Class FRoom
    */
    

    class FRoom {


        public function __construct() {
        }

        public function getRequest($apiMethod) {
            switch ($apiMethod) {
                case 'getHotelRooms':
                    $this->getHotelRooms();
                    break;
                case 'getHotelRoom':
                    $this->getHotelRoom();
                    break;
                case 'getBookingRoom':
                    $this->getBookingRoom();
                    break;
                case 'getFirstFreeRoom':
                    $this->getFirstFreeRoom();

                    break;
                default:
                    http_response_code(404);
                    echo json_encode(array("error" => "Metodo non trovato"));
                    break;
            }
        }


        public function postRequest($apiMethod) {
            switch ($apiMethod) {
                default:
                    http_response_code(404);
                    echo json_encode(array("error" => "Metodo non trovato"));
                    break;
            }
        }
        private function getFirstFreeRoom() {

            
            $roomName = isset($_GET['roomName']) ? $_GET['roomName'] : null;
            $hotelId = isset($_GET['hotelId']) ? $_GET['hotelId'] : null;
            $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
            $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;
            $model = new MRoom();

            $resp =  $model->getFirstFreeRoom($roomName,$hotelId,$startDate,$endDate);        
            echo $roomName;
        }
        private function getHotelRooms() {
            $idHotel = isset($_GET['idHotel']) ? $_GET['idHotel'] : null;
            $today = isset($_GET['today']) ? $_GET['today'] : null;
            $tomorrow = isset($_GET['tomorrow']) ? $_GET['tomorrow'] : null;
            $model = new MRoom();
            $rooms = $model->getHotelRooms($idHotel,$today, $tomorrow);
            echo $rooms;
        }

        private function getHotelRoom() {
            //http://gh.server.local:8888/index.php?type=room&method=getHotelRoom&roomName=Stanza%20Singola&idHotel=5&startDate=2003-11-11&endDate=2003-11-12
            $roomName = isset($_GET['roomName']) ? urldecode($_GET['roomName']) : null;
            $idHotel = isset($_GET['idHotel']) ? $_GET['idHotel'] : null;
            $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
            $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;
            $model = new MRoom();
            $room = $model->getHotelRoom($roomName,$idHotel,$startDate, $endDate);
            echo $room;
        }

        private function getBookingRoom(){
            $roomName = isset($_GET['roomName']) ? urldecode($_GET['roomName']) : null;
            $idHotel = isset($_GET['idHotel']) ? $_GET['idHotel'] : null;
            $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
            $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;
            $model = new MRoom();
            $room = $model->getBookingRoom($roomName,$idHotel,$startDate, $endDate);
            echo $room;
        }

    }


?>