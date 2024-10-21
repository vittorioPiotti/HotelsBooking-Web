<?php

    /**
     * @access public
     * @package entities
     *
     * @author Vittorio Piotti
     *
     * Class EAdmin
    */


    class EAdmin {

        // Attributi
        private $id;
        private $email;
        private $password;

        // Costruttore
        public function __construct($id, $email, $password) {
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
        }

        // Metodi getter
        public function getId() {
            return $this->id;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        // Metodi setter
        public function setId($id) {
            $this->id = $id;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setPassword($password) {
            $this->password = $password;
        }
    }
?>