<?php

/**
 * @access public
 * @package entities
 *
 * @author Vittorio Piotti
 *
 * Class EBooking
*/


class EBooking {
    // Attributi
    private $bookingId;
    private $bookingStartDate;
    private $bookingEndDate;
    private $bookingRoomNumber;
    private $roomName;
    private $totalCost;
    private $roomHotelId;
    private $hotelName;
    private $clientId; // Nuovo attributo per l'ID del cliente
    private $clientName; // Nuovo attributo per il nome del cliente

    // Costruttore
    public function __construct($bookingId, $bookingStartDate, $bookingEndDate, $bookingRoomNumber, $roomName, $totalCost, $roomHotelId, $hotelName,  $clientName) {
        $this->bookingId = $bookingId;
        $this->bookingStartDate = $bookingStartDate;
        $this->bookingEndDate = $bookingEndDate;
        $this->bookingRoomNumber = $bookingRoomNumber;
        $this->roomName = $roomName;
        $this->totalCost = $totalCost;
        $this->roomHotelId = $roomHotelId;
        $this->hotelName = $hotelName;
        $this->clientName = $clientName;
        
    }

    // Metodi getter
    public function getBookingId() {
        return $this->bookingId;
    }

    public function getBookingStartDate() {
        return $this->bookingStartDate;
    }

    public function getBookingEndDate() {
        return $this->bookingEndDate;
    }

    public function getBookingRoomNumber() {
        return $this->bookingRoomNumber;
    }

    public function getRoomName() {
        return $this->roomName;
    }

    public function getTotalCost() {
        return $this->totalCost;
    }

    public function getRoomHotelId() {
        return $this->roomHotelId;
    }

    public function getHotelName() {
        return $this->hotelName;
    }



    public function getClientName() {
        return $this->clientName;
    }

    // Metodi setter
    public function setBookingId($bookingId) {
        $this->bookingId = $bookingId;
    }

    public function setBookingStartDate($bookingStartDate) {
        $this->bookingStartDate = $bookingStartDate;
    }

    public function setBookingEndDate($bookingEndDate) {
        $this->bookingEndDate = $bookingEndDate;
    }

    public function setBookingRoomNumber($bookingRoomNumber) {
        $this->bookingRoomNumber = $bookingRoomNumber;
    }

    public function setRoomName($roomName) {
        $this->roomName = $roomName;
    }

    public function setTotalCost($totalCost) {
        $this->totalCost = $totalCost;
    }

    public function setRoomHotelId($roomHotelId) {
        $this->roomHotelId = $roomHotelId;
    }

    public function setHotelName($hotelName) {
        $this->hotelName = $hotelName;
    }

  

    public function setClientName($clientName) {
        $this->clientName = $clientName;
    }
}

?>
