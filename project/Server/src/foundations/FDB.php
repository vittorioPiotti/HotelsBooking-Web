<?php

    /**
     * @access public
     * @package foundation
     *
     * @author Vittorio Piotti
     *
     * Class FDB
    */

    class FDB {
        // Variabile statica privata per contenere l'istanza unica della connessione
        private static $instance = null;

        // Variabili per le credenziali di accesso al database
        private $host = 'localhost';
        private $username = 'id22013064_admin'; // Il tuo username di MAMP
        private $password = 'Uva12345!'; // La tua password di MAMP
        private $database = 'id22013064_gestionehotel'; // Nome del database

        // Connessione al database
        private $conn;

        // Metodo privato per il costruttore per impedire l'istanziazione diretta
        private function __construct() {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Errore di connessione: " . $e->getMessage();
            }
        }

        // Metodo pubblico statico per ottenere l'istanza unica della connessione
        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = new FDB(); // Modifica qui il nome della classe
            }
            return self::$instance;
        }

        // Metodo pubblico per ottenere l'oggetto PDO della connessione
        public function getConnection() {
            return $this->conn;
        }

        // Metodo pubblico per chiudere la connessione
        public function closeConnection() {
            $this->conn = null;
        }

        // Metodo privato per evitare la clonazione dell'istanza
        public function __clone() {}

        // Metodo privato per evitare la serializzazione dell'istanza
        public function __wakeup() {}
    }

    
?>