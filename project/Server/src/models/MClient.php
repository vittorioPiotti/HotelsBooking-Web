<?php

    /**
     * @access public
     * @package models
     *
     * @author Vittorio Piotti
     *
     * Class MClient
    */
    class MClient extends MUser {
        public function __construct() {
            // Chiamata al costruttore della classe genitore MUser
            parent::__construct(
                "SELECT * FROM Clients WHERE Email = :email AND Password = :password",
                "INSERT INTO Clients (Email, Password) VALUES (:email, :password)",
                "DELETE FROM Clients WHERE Id = :userId",
                "SELECT Email FROM Clients WHERE Email = :email"
            );
        }
    }

?>