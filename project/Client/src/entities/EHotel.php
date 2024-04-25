<?php

    /**
     * @access public
     * @package entities
     *
     * @author Vittorio Piotti
     *
     * Class EHotel
    */


    class EHotel {

        // Attributi
        private $id;
        private $name;
        private $image;
        private $description;
        private  $idAdmin;
        private  $totalRooms;
        private $availability;


        // Costruttore
        public function __construct($id, $name, $image, $description,$idAdmin,$totalRooms,$availability) {
            $this->id = $id;
            $this->name = $name;
            $this->image = $image;
            $this->description = $description;
            $this->idAdmin = $idAdmin;
            $this->totalRooms = $totalRooms;
            $this->availability = $availability;

        }

        // Metodi getter
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getImage() {
            return $this->image;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getIdAdmin() {
            return $this->idAdmin;
        }
        public function getTotalRooms() {
            return $this->totalRooms;
        }
        public function getAvailability() {
            return $this->availability;
        }

     

        // Metodi setter
        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function setIdAdmin($idAdmin) {
            $this->idAdmin = $idAdmin;
        }
        public function setTotalRooms($totalRooms) {
            $this->totalRooms = $totalRooms;
        }
        public function setAvailability($availability) {
            $this->availability = $availability;
        }




      
        
        

    }

   
    



?>