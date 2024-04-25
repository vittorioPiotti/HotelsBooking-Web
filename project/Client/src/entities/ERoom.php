<?php

    /**
     * @access public
     * @package entities
     *
     * @author Vittorio Piotti
     *
     * Class ERoom
    */

    class ERoom {

       // Attributi
        private $id;
        private $name;
        private $image;
        private $description;
        private $number;
        private $cost;
        private $totalRooms;
        private $availability;

        // Costruttore
        public function __construct($id, $name, $image, $description, $number, $cost,$totalRooms,$availability) {
            $this->id = $id;
            $this->name = $name;
            $this->image = $image;
            $this->description = $description;
            $this->number = $number;
            $this->cost = $cost;
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

        public function getNumber() {
            return $this->number;
        }

        public function getCost() {
            return $this->cost;
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

        public function setNumber($number) {
            $this->number = $number;
        }

        public function setCost($cost) {
            $this->cost = $cost;
        }


        public function setTotalRooms($totalRooms) {
            $this->totalRooms = $totalRooms;
        }
        public function setAvailability($availability) {
            $this->availability = $availability;
        }
    
       


      
    }


    

?>
