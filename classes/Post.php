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
            self::checkDescription($description);
            $this->description = $description;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setPicture($picture){
            self::checkImage($picture);
            $this->picture = "post_uploads/" . $picture;
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
        public function selectpicture(){
            $conn = Database::getConnection();
            $query = $conn->query("SELECT * FROM posts WHERE picture=:picture LIMIT 20");

        private function checkDescription($description){
            if($description == "") {
                throw new Exception("Description cannot be empty.");
            }
        }

        private function checkImage($image){
            if ($image == "") {
                throw new Exception("You need to upload an image.");
            }
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

        //Function I stole from https://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago Converts time to time since
        public static function timeSincePost($datetime) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
        
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
        
    }