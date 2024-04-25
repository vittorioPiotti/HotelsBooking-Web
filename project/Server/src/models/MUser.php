<?php

   /**
     * @access public
     * @package models
     *
     * @author Vittorio Piotti
     *
     * Class MUser
    */

    class MUser {
        
        protected $db;
        private $loginQuery;
        private $registerQuery;
        private $deleteAccountQuery;
        private $emailExistsQuery;
    
        public function __construct($loginQuery, $registerQuery, $deleteAccountQuery, $emailExistsQuery) {
            $this->db = FDB::getInstance()->getConnection();
            $this->loginQuery = $loginQuery;
            $this->registerQuery = $registerQuery;
            $this->deleteAccountQuery = $deleteAccountQuery;
            $this->emailExistsQuery = $emailExistsQuery;
        }
    
        public function login($email, $password) {
            $query = $this->loginQuery;
            $statement = $this->db->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);
            $statement->execute();
    
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $this->closeConnection();

            if ($user ) {
                return $user['Id'];
            } else {
                return false;
            }
        }
    
        public function register($email, $password) {
            if (!$this->checkEmail($email) || !$this->checkPassword($password)) {
                return false;
            }
    
            if ($this->emailExists($email)) {
                return false;
            }
    
    
            $query = $this->registerQuery;
            $statement = $this->db->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);
            $success = $statement->execute();
            $this->closeConnection();

            return true;
        }
    
        public function deleteAccount($userId) {
            $query = $this->deleteAccountQuery;
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userId', $userId);
            $success = $statement->execute();
            $this->closeConnection();

            return $success;
        }
    
        protected function emailExists($email) {
            $query = $this->emailExistsQuery;
            $statement = $this->db->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->execute();
    
            $existingEmail = $statement->fetch(PDO::FETCH_ASSOC);
    
            return $existingEmail !== false;
        }
    
        protected function checkEmail($email) {
            return !empty($email);
        }
    
        protected function checkPassword($password) {
            return !empty($password);
        }


        public function closeConnection() {
            FDB::getInstance()->closeConnection();
        }

    }
    
?>