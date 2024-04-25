<?php

    /**
     * @access public
     * @package models
     *
     * @author Vittorio Piotti
     *
     * Class MRoom
    */

    class MRoom {
        private $db; // Variabile per la connessione al database


        private $queryNewRoom = "INSERT INTO Rooms (IdHotel, Name, Image, Description, Cost, Number)
        SELECT :idHotel, :name, :image, :description, :cost, IFNULL(MAX(Number) + 1, 1) AS NewNumber
        FROM Rooms
        WHERE IdHotel = :idHotel AND Name = :name";
    

   

    private $queryUpdateRoom = "UPDATE Rooms 
        SET 
            Name = :name,
            Image = :image,
            Description = :description,
            Cost = :cost
        WHERE 
            IdHotel = :idHotel 
        AND 
            Name = :name;
    ";
  

    private $queryCountRooms = "SELECT COUNT(*) AS totalRooms
        FROM Rooms
        WHERE IdHotel = :idHotel
        AND Name = :name;
    ";

    private $queryDeleteSingleRoom = "DELETE FROM Rooms
    WHERE IdHotel = :idHotel
    AND Name = :name
    LIMIT 1;
    ";



        private $queryGetBookingRoom = "    SELECT 
        DATEDIFF(:endDate, :startDate) * MAX(r.Cost) AS Cost, 
        SUM(
            CASE 
                WHEN b.IdRoom IS NULL THEN 1 
                WHEN :startDate > b.EndDate OR :endDate < b.StartDate THEN 1 
                ELSE 0 
            END
        ) AS Availability 
    FROM 
        Rooms AS r 
    LEFT JOIN 
        Bookings AS b ON r.Id = b.IdRoom 
    WHERE 
        r.IdHotel = :hotelId 
        AND r.Name LIKE CONCAT('%', :roomName, '%') 
    GROUP BY 
        r.Name
    ";
    

        private $queryGetHotelRooms = "SELECT 
        r.Name,
        MAX(r.Image) AS Image,
        MAX(r.Description) AS Description,
        MAX(r.Cost) AS Cost,
        COUNT(r.Id) AS TotalRooms,
        SUM(CASE 
                WHEN b.IdRoom IS NULL THEN 1 
                WHEN :startDate > b.EndDate OR :endDate < b.StartDate THEN 1 
                ELSE 0 
            END) AS Availability
    FROM 
        Rooms AS r
    LEFT JOIN 
        Bookings AS b ON r.Id = b.IdRoom
    WHERE 
        r.IdHotel = :hotelId
    GROUP BY 
        r.Name
    ORDER BY 
        Cost ASC;
    ";

private $queryGetHotelRoom = "SELECT 
    r.Name, 
    MAX(r.Image) AS Image, 
    MAX(r.Description) AS Description, 
    DATEDIFF(:endDate, :startDate) * MAX(r.Cost) AS Cost, 
    COUNT(r.Id) AS TotalRooms, 
    SUM(
        CASE 
            WHEN b.IdRoom IS NULL THEN 1 
            WHEN :startDate > b.EndDate OR :endDate < b.StartDate THEN 1 
            ELSE 0 
        END
    ) AS Availability 
FROM 
    Rooms AS r 
LEFT JOIN 
    Bookings AS b ON r.Id = b.IdRoom 
WHERE 
    r.IdHotel = :hotelId 
    AND r.Name LIKE CONCAT('%', :roomName, '%') 
GROUP BY 
    r.Name";
    


    private $queryGetFirstFreeRoom ="SELECT 
    r.Id AS RoomId
FROM 
    Rooms AS r 
LEFT JOIN 
    Bookings AS b ON r.Id = b.IdRoom 
WHERE 
    r.IdHotel = :hotelId 
    AND r.Name LIKE CONCAT('%', :roomName, '%') 
    AND (
        b.IdRoom IS NULL 
        OR :startDate > b.EndDate 
        OR :endDate < b.StartDate
    )
GROUP BY 
    r.Id, r.Name
LIMIT 1;

";



        public function __construct() {
            $this->db = FDB::getInstance()->getConnection();
        }
    
        public function getFirstFreeRoom($roomName, $hotelId, $startDate, $endDate) {
            $statement = $this->db->prepare($this->queryGetFirstFreeRoom);
            $statement->bindParam(':roomName', $roomName, PDO::PARAM_STR);
            $statement->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
            $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result['RoomId'];
            } else {
                return false; 
            }
        }
        

        
        private function getRooms($roomsData){
            $rooms = array();
            foreach ($roomsData as $roomData) {
                $name = isset($roomData['name']) ? $roomData['name'] : $roomData['Name'];
                $totalRooms = isset($roomData['totalRooms']) ? $roomData['totalRooms'] : $roomData['TotalRooms'];
                $rooms[$name] = $totalRooms;
            }
            return $rooms;
        }
        
        
        private function toUpdate($rooms, $_rooms) {
            $toUpdate = array();
            foreach ($rooms as $key => $value) {
                if (array_key_exists($key, $_rooms)) {
                    $difference = $value - $_rooms[$key];
                    $toUpdate[$key] = $difference;
                }
            }
            
            return $toUpdate;
        }
            

        private function toDelete($rooms, $_rooms) {
            $toDelete = array();
            foreach ($_rooms as $key => $value) {
                if (!array_key_exists($key, $rooms)) {
                    $toDelete[$key] = $value;
                }
            }
            
            return $toDelete;
        }
        
        
        private function toCreate($rooms,$_rooms){
            $toCreate = array();
            foreach ($rooms as $key => $value) {
                if (!array_key_exists($key, $_rooms)) {
                    $toCreate[$key] = $value;
                }
            }
            
            return $toCreate;
        }
        
        
        
        
        
        private function create($toCreate, $roomsData, $idHotel){
            if (!empty($toCreate)) {
                foreach ($toCreate as $key => $value) { 
                    $this->_create($idHotel, $value, $roomsData,$key);
                }
            }
        }
        
        private function _create($idHotel, $value, $roomsData,$key){
             foreach ($roomsData as $roomData) {
                if ($roomData['name'] === $key) { 
                    for ($i = 0; $i < $value; $i++) {
                        $statement = $this->db->prepare($this->queryNewRoom);
                        $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
                        $statement->bindParam(':name', $roomData['name'], PDO::PARAM_STR);
                        $statement->bindParam(':image', $roomData['image'], PDO::PARAM_STR);
                        $statement->bindParam(':description', $roomData['description'], PDO::PARAM_STR);
                        $statement->bindParam(':cost', $roomData['cost'], PDO::PARAM_INT);
                        $statement->execute();
                    }
                    break;
                }
             }
        }
        
        private function update($toUpdate, $roomsData, $idHotel){
            if (!empty($toUpdate)) {
                foreach ($toUpdate as $key => $value) {
                    if ($value > 0) {
                        $this->_update($idHotel, $roomsData, $key);
                        $this->_create($idHotel, $value, $roomsData,$key);
                    } elseif ($value < 0) {
                        $value = abs($value); 
                        $this->_delete($idHotel, $key, $value);
                        $this->_update($idHotel, $roomsData, $key);

                    } else {
                        $this->_update($idHotel, $roomsData, $key);
                    }
                }
            }
        }
        
        private function _update($idHotel, $roomsData, $key) {
            foreach ($roomsData as $roomData) {
                if ($roomData['name'] === $key) { 
                    $statement = $this->db->prepare($this->queryUpdateRoom);
                    $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
                    $statement->bindParam(':name', $roomData['name'], PDO::PARAM_STR);
                    $statement->bindParam(':image', $roomData['image'], PDO::PARAM_STR);
                    $statement->bindParam(':description', $roomData['description'], PDO::PARAM_STR);
                    $statement->bindParam(':cost', $roomData['cost'], PDO::PARAM_INT);
                    $statement->execute();
                    break; 
                }
            }
        }
        
        private function delete($toDelete, $idHotel){
            if (!empty($toDelete)) {
                foreach ($toDelete as $key => $value) {
                    $this->_delete($idHotel, $key, $value);
                }
            }
        }
        
        private function _delete($idHotel, $key, $value){
            $statement = $this->db->prepare($this->queryDeleteSingleRoom);
            $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
            $statement->bindParam(':name', $key, PDO::PARAM_STR);
            for ($i = 0; $i < $value; $i++) {
                $statement->execute();
            }
        }



           public function updateRoomData($roomsData, $idHotel) {
     
            $statement = $this->db->prepare($this->queryGetHotelRooms);
            $statement->bindParam(':hotelId', $idHotel, PDO::PARAM_INT);
            $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
            $statement->execute();
            
            $_roomsData = $statement->fetchAll(PDO::FETCH_ASSOC);
            $rooms = $this->getRooms($roomsData);
            $_rooms = $this->getRooms($_roomsData);
            $toUpdate = $this->toUpdate($rooms, $_rooms);
            $toDelete = $this->toDelete($rooms, $_rooms);
            $toCreate = $this->toCreate($rooms, $_rooms);
            
            $this->update($toUpdate, $roomsData, $idHotel);
            $this->delete($toDelete, $idHotel);
            $this->create($toCreate, $roomsData, $idHotel);

            return json_encode(array(
                "toUpdate" => $toUpdate,
                "toDelete" => $toDelete,
                "toCreate" => $toCreate
            ));
        }
        






        


        public function getHotelRooms($hotelId, $startDate, $endDate) {
            $statement = $this->db->prepare($this->queryGetHotelRooms);
            $statement->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
            $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
            $statement->execute();
            $this->closeConnection();
            return ($statement) ? json_encode($this->fetchRooms($statement)) : json_encode([]);
        }
        public function getHotelRoom($roomName, $hotelId, $startDate, $endDate) {
            $statement = $this->db->prepare($this->queryGetHotelRoom);
            $statement->bindParam(':roomName', $roomName, PDO::PARAM_STR);
            $statement->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
            $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC); 
            $this->closeConnection();
            return ($statement) ? json_encode(SRoom::serializeSingle($row)) : json_encode();
        }

        public function getBookingRoom($roomName, $hotelId, $startDate, $endDate) {
            
            $statement = $this->db->prepare($this->queryGetBookingRoom); // Changed query here
            $statement->bindParam(':roomName', $roomName, PDO::PARAM_STR);
            $statement->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
            $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC); 
            $this->closeConnection();
            return ($statement) ? json_encode(SRoom::serializeSingleBooking($row)) : json_encode();
        }
        
        
    
    
        public function closeConnection() {
            FDB::getInstance()->closeConnection();
        }


        private function fetchRooms($statement) {
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            return SRoom::serializeArray($rows);
        }
    }
    

    
?>