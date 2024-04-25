<?php

/**
 * @access public
 * @package models
 *
 * @author Vittorio Piotti
 *
 * Class MBooking
 */

class MBooking {
    private $db; // Variabile per la connessione al database

    private $queryNewBooking = "INSERT INTO Bookings (IdClient, IdRoom, StartDate, EndDate) VALUES (:idClient, :idRoom, :startDate, :endDate)";
    private $queryGetClientBookings = "SELECT 
        b.Id AS BookingId,
        b.StartDate AS BookingStartDate,
        b.EndDate AS BookingEndDate,
        r.Number AS BookingRoomNumber,
        r.Name AS RoomName,
        r.Cost * DATEDIFF(b.EndDate, b.StartDate) AS TotalCost,
        r.IdHotel AS RoomHotelId,
        h.Name AS HotelName
    FROM 
        Bookings b
    JOIN 
        Rooms r ON b.IdRoom = r.Id
    JOIN 
        Hotels h ON r.IdHotel = h.Id
    WHERE 
        b.IdClient = :idClient";

    private $queryGetAdminlBookings = "SELECT 
    Bookings.Id AS BookingId, 
    Bookings.StartDate AS BookingStartDate,
    Bookings.EndDate AS BookingEndDate, 
    Rooms.Number AS BookingRoomNumber, 
    Rooms.Name AS RoomName, 
    Rooms.Cost * DATEDIFF(Bookings.EndDate, 
    Bookings.StartDate) AS TotalCost, 
    Hotels.Id AS RoomHotelId, 
    Hotels.Name AS HotelName, 
    Clients.Email AS ClientEmail 
    FROM Bookings JOIN Rooms 
    ON Rooms.Id = Bookings.IdRoom 
    JOIN Hotels ON Hotels.Id = Rooms.IdHotel 
    JOIN Admins ON Admins.Id = Hotels.IdAdmin 
    JOIN Clients ON Clients.id = Bookings.IdClient
    WHERE Admins.Id = :adminId
    GROUP BY Bookings.Id,Clients.Email;";

    public function __construct() {
        // Ottieni un'istanza della connessione al database
        $this->db = FDB::getInstance()->getConnection();
    }

    public function closeConnection() {
        // Chiudi la connessione al database
        FDB::getInstance()->closeConnection();
    }

    public function newBooking($idClient, $idRoom, $startDate, $endDate) {
        $statement = $this->db->prepare($this->queryNewBooking);
        $statement->bindParam(':idClient', $idClient, PDO::PARAM_INT); 
        $statement->bindParam(':idRoom', $idRoom, PDO::PARAM_INT); 
        $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR); 
        $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $success = $statement->execute(); // Esegui la query e controlla se ha avuto successo
        $this->closeConnection();
        
        return $success;
    }

    public function getClientBookings($clientId) {
        $statement = $this->db->prepare($this->queryGetClientBookings);
        $statement->bindParam(':idClient', $clientId, PDO::PARAM_INT);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return SBooking::serializeArray($rows);
    }

    public function getAdminBookings($adminId) {
        $statement = $this->db->prepare($this->queryGetAdminlBookings);
        $statement->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return SBooking::serializeArrayAdmin($rows);
    }
}

?>
