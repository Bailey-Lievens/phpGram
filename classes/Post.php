<?php
    class Post {
        private $userid;
        private $description;
        private $picture;
        private $date;

        public function setUserid($userid){
            $this->userid = $userid;
        }  

        public function getUserId(){
            return $this->userid;
        }      

        public function setDescription($description){
            $this->description = $description;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setPicture($picture){
            $this->picture = $picture;
        }

        public function getPicture(){
            return $this->picture;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }

        public function post(){
            $conn = Database::getConnection();
            $query = $conn->prepare("INSERT INTO posts (user_id, description, picture, date) VALUES (:userid, :description, :picture, :date)");

            $query->bindValue(":userid", $this->userid);
            $query->bindValue(":description", $this->description);
            $query->bindValue(":picture", $this->picture);     
            $query->bindValue(":date", $this->date);  

            $result = $query->execute();
            return $result; 
        }
        public function selectpicture(){
            $conn = Database::getConnection();
            $query = $conn->query("SELECT * FROM posts WHERE picture=:picture LIMIT 20");

            if($query->num_rows > 0){
                while($row = $query->fetch_all()){
                    
                }
            }
      
        
    }
        
    }