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
            self::checkTags($description);
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

            $r = $query->execute();
            return $r; 
        }

        //If tag exists don't do anything, if tag does not exist insert it into tags table
        private function checkTags($description){
            $desc_array = explode(" ", $description);

            for ($i=0; $i< count($desc_array) ; $i++) { 
                if ($desc_array[$i][0] == "#") {
                    $conn = Database::getConnection();
                    $query = $conn->prepare("SELECT id FROM tags WHERE tag_name = :currentTag");

                    $query->bindValue(":currentTag", $desc_array[$i]);            
                    $query->execute();
                    $result = $query->fetch();

                    //If tag is not found insert into tags table
                    if(!$result){
                        $conn = Database::getConnection();
                        $query = $conn->prepare("INSERT INTO tags (tag_name) VALUES (:currentTag)");

                        $query->bindValue(":currentTag", $desc_array[$i]);            
                        $query->execute();
                    }
                }
            }
        }
        
    }