<?php

    /**
     * @access public
     * @package models
     *
     * @author Vittorio Piotti
     *
     * Class MHotel
    */

    class MHotel {

        private $db;

        private $queryDeleteHotel = "DELETE FROM Hotels
        WHERE Id = :idHotel;
        ";

private $queryGetHotelName = "SELECT 
      b.name
  FROM 
      Hotels b
  WHERE 
      b.Id = :id;";
      
        private $queryUpdateHotel = "UPDATE Hotels 
        SET 
            Name = :name,
            Image = :image,
            Description = :description
        WHERE 
            Id = :idHotel;
      ";
    
    private $queryAddNewHotel = "INSERT INTO Hotels 
    (IdAdmin, Name, Image, Description) 
    VALUES 
    (:idAdmin, :name, :image, :description)
    ";
  private $queryFindHotel = "SELECT COUNT(*) AS numHotels FROM Hotels WHERE Id = :idHotel";
        
      private $queryGetHotelsByIdAdmin = "SELECT * FROM Hotels WHERE IdAdmin = :idAdmin";

        private $queryGetAllHotels = "SELECT 
        h.*, 
        (SELECT COUNT(*) FROM Rooms r WHERE r.IdHotel = h.Id) AS TotalRooms,
        (SELECT COUNT(*) 
            FROM Rooms r 
            LEFT JOIN Bookings b 
                ON r.Id = b.IdRoom 
            WHERE h.Id = r.IdHotel 
                AND (b.Id IS NULL OR :startDate > b.EndDate OR :endDate < b.StartDate)
        ) AS Availability
    FROM 
        Hotels h;
    ";



        private  $queryGetHotelById = "SELECT 
        h.*, 
        COUNT(r.Id) AS TotalRooms,
        SUM(CASE 
                WHEN b.IdRoom IS NULL THEN 1 
                WHEN :startDate > b.EndDate OR :endDate < b.StartDate THEN 1 
                ELSE 0 
            END) AS Availability
        FROM 
        Hotels h 
        LEFT JOIN 
        Rooms r ON h.Id = r.IdHotel 
        LEFT JOIN 
        Bookings b ON r.Id = b.IdRoom
        WHERE 
        h.Id = :id 
        GROUP BY 
        h.Id";

      private $queryCheckExistHotel = "";

        public function __construct() {
            $this->db = FDB::getInstance()->getConnection();
        }


       public function updateHotelData($hotel) {
       $name = $hotel['name'];
$idHotel = $hotel['idHotel'];
$adminId = $hotel['adminId'];
$desc = $hotel['description'];
$image = $hotel['image'];
    
        // Check if the hotel already exists
        $statement = $this->db->prepare($this->queryFindHotel);
        $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $numHotels = $result['numHotels'] ?? 0;
    
        if ($numHotels > 0) {
            // Update existing hotel data
            $statement = $this->db->prepare($this->queryUpdateHotel);
            $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':image', $image, PDO::PARAM_STR);
            $statement->bindParam(':description', $desc, PDO::PARAM_STR);
            $success = $statement->execute();
        } else {
            // Insert new hotel data
            $statement = $this->db->prepare($this->queryAddNewHotel);
            $statement->bindParam(':idAdmin', $adminId, PDO::PARAM_INT);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':image', $image, PDO::PARAM_STR);
            $statement->bindParam(':description', $desc, PDO::PARAM_STR);
            $success = $statement->execute();
            $idHotel = $this->db->lastInsertId();
        }
    
        if ($success) {
            return json_encode(array("idHotel" => $idHotel));
        } else {
            throw new Exception("Failed to update or insert hotel data.");
        }
   
}

      
      
      
      
      
     



        public function deleteHotelData($idHotel) {
            $statement = $this->db->prepare($this->queryDeleteHotel);
            $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
            $success = $statement->execute();

            if ($success) {
                return json_encode(array("check" => "Hotel eliminato correttamente"));
            } else {
                return json_encode(array("error" => "Impossibile eliminare l'hotel"));
            }
        }

        

        public function getAllHotels($startDate, $endDate) {
          $statement = $this->db->prepare($this->queryGetAllHotels);
          $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
          $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
          $statement->execute();
          $this->closeConnection();
          return ($statement) ? json_encode($this->fetchHotels($statement)) : json_encode([]);
      }
              
        public function getHotelById($id, $startDate, $endDate) {
          $statement = $this->db->prepare($this->queryGetHotelById);
          $statement->bindParam(':id', $id, PDO::PARAM_INT); 
          $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR); 
          $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
          $statement->execute();
          $hotel = $statement->fetch(PDO::FETCH_ASSOC); 
          $this->closeConnection();
          return ($hotel) ? json_encode(SHotel::serializeSingle($hotel)) : json_encode([]);

      }

      public function getHotelsByIdAdmin($idAdmin){
        $statement = $this->db->prepare($this->queryGetHotelsByIdAdmin);
        $statement->bindParam(':idAdmin', $idAdmin, PDO::PARAM_INT); 
        $statement->execute();
        $this->closeConnection();
        return ($statement) ? json_encode($this->fetchHotels($statement)) : json_encode([]);
      }
      
        public function closeConnection() {
            FDB::getInstance()->closeConnection();
        }
                  
        private function fetchHotels($statement) {
          $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
          return SHotel::serializeArray($rows);
      }
      
    }


?>
