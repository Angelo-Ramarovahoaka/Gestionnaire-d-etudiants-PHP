<?php
    class Etudiants{
        private $pdo;
        public $id;
        public $firstname;
        public $lastname;
        public $parcours;
        public $date_of_birth;
        public $adresse;
        public $sex;
        public function __construct($db){
            $this->pdo = $db;
        }
        public function read(){
            $stmt=$this->pdo->prepare('SELECT * FROM etudiants ORDER BY created_at DESC');
            $stmt->execute();
            $etudiants=$stmt->fetchAll();
            return $etudiants;
        }
        public function create(){
            $stmt = $this->pdo->prepare("INSERT INTO etudiants(firstname, lastname, parcours, date_of_birth,adresse,sex) VALUES (:firstname, :lastname, :parcours, :date_of_birth,:adresse,:sex)");
            $stmt->bindParam(":firstname", $this->firstname);
            $stmt->bindParam(":lastname", $this->lastname);
            $stmt->bindParam(":parcours", $this->parcours);
            $stmt->bindParam(":date_of_birth", $this->date_of_birth);
            $stmt->bindParam(":adresse", $this->adresse);
            $stmt->bindParam(":sex", $this->sex);
            if ($stmt->execute()) {
                return true;
            }
            else{
                return false;
            }
        }
        public function verifyEtudiants(){
            $stmt = $this->pdo-> prepare("SELECT * FROM etudiants WHERE firstname = :firstname AND lastname = :lastname");
            $stmt->bindParam(":firstname", $this->firstname);
            $stmt->bindParam(":lastname", $this->lastname);
            $stmt->execute();
            return $stmt -> fetch();
        }
        public function search(){
            $stmt = $this->pdo->prepare("
            SELECT * FROM etudiants 
            WHERE (firstname REGEXP :search 
            OR lastname REGEXP :search OR parcours REGEXP :search)
            ORDER BY created_at DESC
            ");
            // Ajouter des jokers pour REGEXP
            $searchRegExp = '.*' . $this->search . '.*';
            $stmt->bindParam(":search", $searchRegExp);
            $stmt->execute();
            // echo "ito";
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function delete(){
           $stmt = $this->pdo->prepare('DELETE FROM etudiants WHERE id = :id');
           $stmt->bindParam(':id', $this->id);
               if ($stmt->execute()) {
                   return true;
               } else {
                   return false;
               }   
        }
        public function update(){
            $stmt=$this->pdo->prepare("UPDATE etudiants SET firstname = :firstname , lastname = :lastname , parcours= :parcours , date_of_birth= :date_of_birth , adresse= :adresse , sex=:sex WHERE id = :id ");
            $stmt->bindParam(":firstname", $this->firstname);
            $stmt->bindParam(":lastname", $this->lastname);
            $stmt->bindParam(":parcours", $this->parcours);
            $stmt->bindParam(":date_of_birth", $this->date_of_birth);
            $stmt->bindParam(":adresse", $this->adresse);
            $stmt->bindParam(":sex", $this->sex);
            $stmt->bindParam(':id', $this->id);
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
            }
        public function detail(){
            $stmt = $this->pdo->prepare('SELECT * FROM etudiants WHERE id = :id');
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
            
        
    }
?>