<?php
    class User{
        private $pdo;
        public $id;
        public $email;
        public $username;
        public $password;
        public function __construct($db){
            $this->pdo = $db;
        }
        public function verifyEmail(){
            $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            return $stmt -> fetch();
        }
        public function update(){
            $stmt = $this->pdo->prepare("UPDATE users SET password = :password WHERE email = :email");
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":email", $this->email);
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        public function create(){
            $stmt = $this->pdo->prepare("INSERT INTO users(username, email, password) VALUES ( :username, :email, :password)");
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
            if ($stmt->execute()) {
                return true;
            }
            else{
                return false;
            }
        }
        public function verifyUser(){
            $stmt = $this->pdo-> prepare("SELECT * FROM users WHERE username = :username OR email = :email");
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            return $stmt -> fetch();
        }
        public function login(){
            $stmt = $this->pdo->prepare("SELECT * fROM users WHERE email = :email");
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            return $stmt -> fetch();
        }
        
        
    }
?>