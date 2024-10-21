<?php

/*
  Hotels Booking Web v1.0.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/releases/tag/1.0.0)
  Copyright 2024 Vittorio Piotti
  Licensed under GPL-3.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/blob/main/LICENSE.md)
*/


require_once __DIR__ . '/../entities/ERoom.php';
require_once __DIR__ . '/../entities/EHotel.php';
require_once __DIR__ . '/../views/VRoom.php';
require_once __DIR__ . '/../views/VBooking.php';
/**
 * @access public
 * @package views
 * @author Vittorio Piotti
 *
 * Class CBooking
 */

class CBooking {
    public function index() {
        if (isset($_SESSION['email']) && isset($_SESSION['is_admin'])) {     
            $_method = isset($_GET['method']) ? $_GET['method'] : '';
            switch($_method) {
                case 'prebook':
                    $this->showPreBooking();
                    break;
                case 'bookings':
                    $this->showBookings();
                    break;
                default:
                    break;
            }
        } else {
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }

    private function showPreBooking() {
        $_userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $_email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
        $_isAdmin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : '';
        $isSessionActive = isset($_SESSION['user_id']) && isset($_SESSION['email']);
        $nameRoom = isset($_GET['nameRoom']) ? $_GET['nameRoom'] : '';
        $idHotel = isset($_GET['idHotel']) ? $_GET['idHotel'] : '';
        $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
        $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
        $today = date("Y-m-d");
        $tomorrow = date("Y-m-d", strtotime('+1 day'));
        $urlHotel = SERVER_ORIGIN . 'type=hotel&method=getHotelById&idHotel=' . urlencode($idHotel) . '&today=' . urlencode($startDate) . '&tomorrow=' . urlencode($endDate);
        $jsonContent = file_get_contents($urlHotel);
        $hotel_data = json_decode($jsonContent, true);

        $urlGetHotelRooms = SERVER_ORIGIN . 'type=room&method=getHotelRooms&idHotel=' . urlencode($idHotel) . '&today=' . urlencode($today) . '&tomorrow=' . urlencode($tomorrow);
        $json_data_rooms = file_get_contents($urlGetHotelRooms);
        $rooms_data = json_decode($json_data_rooms, true);
        $rooms = array();
        if (is_array($rooms_data)) {
            foreach ($rooms_data as $room_data) {
                $_room = new ERoom(
                    $room_data['id'] ?? null,
                    $room_data['name'] ?? '',
                    $room_data['image'] ?? '',
                    $room_data['description'] ?? '',
                    $room_data['number'] ?? '',
                    $room_data['cost'] ?? '',
                    $room_data['totalRooms'] ?? '',
                    $room_data['availability'] ?? ''
                );
                $rooms[] = $_room;
            }
        }

        $hotel = new EHotel(
            $hotel_data['id'] ?? null,
            $hotel_data['name'] ?? '',
            $hotel_data['image'] ?? '',
            $hotel_data['description'] ?? '',
            $hotel_data['idAdmin'] ?? '',
            $hotel_data['totalRooms'] ?? '',
            $hotel_data['availability'] ?? ''
        );
        if(!$isSessionActive) {
            $view = new VRoom();
            $view->showRooms($rooms, $hotel);
        } else {
            $view = new VBooking();
            $view->showPreBooking($nameRoom,$rooms,$hotel,$startDate,$endDate);
        }
    }

    private function showBookings() {
        // Ottenere l'ID del cliente
        $_userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        // URL per ottenere le prenotazioni del cliente
        $urlBookings = ($_SESSION['is_admin'] == 1) ? SERVER_ORIGIN .'type=book&method=getAdminBookings&adminId=' . urlencode($_userId) : SERVER_ORIGIN .'type=book&method=getClientBookings&clientId=' . urlencode($_userId);
        // Ottenere i dati delle prenotazioni del cliente
        $jsonContent = file_get_contents($urlBookings);
        $bookings_data = json_decode($jsonContent, true);

        $bookings = array();
        if (is_array($bookings_data)) {
            foreach ($bookings_data as $booking_data) {
                $_booking = new EBooking(
                    $booking_data['bookingId'] ?? null,
                    $booking_data['bookingStartDate'] ?? '',
                    $booking_data['bookingEndDate'] ?? '',
                    $booking_data['bookingRoomNumber'] ?? '',
                    $booking_data['roomName'] ?? '',
                    $booking_data['totalCost'] ?? '',
                    $booking_data['roomHotelId'] ?? '',
                    $booking_data['hotelName'] ?? '',
                    ($_SESSION['is_admin'] == 1) ? $booking_data['clientEmail'] ?? '' :  ""
                );
                $bookings[] = $_booking;
            }
        }

        // Passare le prenotazioni all'interfaccia utente per la visualizzazione
        $view = new VBooking();
        $view->showBookings($bookings);
    }
}

?>
