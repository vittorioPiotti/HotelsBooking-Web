<?php

    /**
     * @access public
     * @package models
     *
     * @author Vittorio Piotti
     *
     * Class MAdmin
    */
    class MAdmin extends MUser {
        public function __construct() {
            // Chiamata al costruttore della classe genitore MUser
            parent::__construct(
                "SELECT * FROM Admins WHERE Email = :email AND Password = :password",
                "INSERT INTO Admins (Email, Password) VALUES (:email, :password)",
                "DELETE FROM Admins WHERE Id = :userId",
                "SELECT Email FROM Admins WHERE Email = :email"
            );
        }
    }
    

?>