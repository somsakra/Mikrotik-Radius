<?php

    class DbOperations {

        private $con;

        function __construct(){

            require_once dirname(__FILE__).'/DbConnect.php';

            $db = new DbConnect();

            $this->con = $db->connect();
        }
        /* Incase of we need to query data */
        
        public function getUserByUsername($username){
            $stmt = $this->con->prepare("SELECT `username`, `value` FROM `radcheck` WHERE `radcheck`.`username` = ?");
            $stmt->bind_param("s",$username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
            }

        public function getAllUser(){        
            $result = $this->con->query("SELECT `id`,`username`, `value` FROM `radcheck`");
            
            if ($result == false) {
                return false;
            } 
            
            $rows = array();
            
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }           
            return $rows;
            }

        public function createUser($username, $password){
            if($this->isUserExist($username)){
                return 0;
            }else{
            $stmt = $this->con->prepare("INSERT INTO `radcheck` (`id`, `username`, `attribute`, `op`, `value`) VALUES (NULL, ?, 'Cleartext-Password', ':=', ?);");
            $stmt->bind_param("ss",$username,$password);

            if($stmt->execute()){
                return 1;
            }else{
                return 2;
            }
            }
        }

        public function updateUser($username,$password){            
            $stmt = $this->con->prepare("UPDATE `radcheck` SET `value`=? WHERE `radcheck`.`username` = ?");
            $stmt->bind_param("ss",$password,$username);
            $stmt->execute();
            return true;
        }

        public function deleteUser($username) {
        $stmt = $this->con->prepare("DELETE FROM `radcheck` WHERE `radcheck`.`username` = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        return true;
        }

        public function userLogin($username, $pass){
            $password = md5($pass);
            $stmt = $this->con->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
            $stmt->bind_param("ss",$username,$password);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }

        private function isUserExist($username){
            $stmt = $this->con->prepare("SELECT id FROM radcheck WHERE username = ?");
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;           
        }
    } 