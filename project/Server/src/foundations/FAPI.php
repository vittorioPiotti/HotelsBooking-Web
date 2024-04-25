<?php

/**
 * @access public
 * @package foundation
 * @author Vittorio Piotti
 * Class FAPI
 */


class FAPI {


    public function listener() {
        $serverMethod = $_SERVER['REQUEST_METHOD'];
        
        $apiType = isset($_GET['type']) ? $_GET['type'] : null;
        
        switch ($serverMethod) {
            case 'GET':
                $this->getRequest($apiType);
                break;
            case 'POST':
                $this->postRequest($apiType);
                break;
            default:
                http_response_code(405);
                echo json_encode(array("error" => "Metodo non consentito"));
                break;
        }
    }

    private function getRequest($apiType) {
        $apiMethod = isset($_GET['method']) ? $_GET['method'] : null;

        switch ($apiType) {
            case 'hotel':
                $fHotel = new FHotel();
                $fHotel->getRequest($apiMethod);
                break;
            case 'room':
                $fRoom = new FRoom();
                $fRoom->getRequest($apiMethod);
                break;
            case 'auth':
                $fAuth = new FAuth();
                $fAuth->getRequest($apiMethod);
                break;
            case 'book':
                $fBooking = new FBooking();
                $fBooking->getRequest($apiMethod);
                break;
            default:
                http_response_code(404);
                echo json_encode(array("error" => "API non trovata"));
                break;
        }
    }

    private function postRequest($apiType) {
        $apiMethod = isset($_GET['method']) ? $_GET['method'] : null;

        switch ($apiType) {
            case 'hotel':
                $fHotel = new FHotel();
                $fHotel->postRequest($apiMethod);
                break;
            case 'room':
                $fRoom = new FRoom();
                $fRoom->postRequest($apiMethod);
                break;
            case 'auth':
                $fAuth = new FAuth();
                $fAuth->postRequest($apiMethod);
                break;
            case 'book':
                $fBooking = new FBooking();
                $fBooking->postRequest($apiMethod);
                break;
            default:
                http_response_code(404);
                echo json_encode(array("error" => "API non trovata"));
                break;
        }
    }





}


?>
