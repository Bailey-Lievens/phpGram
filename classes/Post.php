<?php
    class Post {
        private $userid;
        private $description;
        private $filter = null;
        private $picture;
        private $date;
        private $click;

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

        public function setFilter($filter){
            if ($filter != "") {
                $this->filter = $filter;
            }
        }

        public function getFilter(){
            return $this->filter;
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

        public function getClick()
        {
             return $this->click;
        }

        public function setClick($click)
        {
            $this->click = $click *20;
            //HIER NOG MAAL 20 ;
            return $this;
        }

        public function submitPost(){
            $conn = Database::getConnection();
            $query = $conn->prepare("INSERT INTO posts (user_id, description, filter, picture, date) VALUES (:userid, :description, :filter, :picture, :date)");

            $query->bindValue(":userid", $this->userid);
            $query->bindValue(":description", $this->description);
            $query->bindValue(":filter", $this->filter);
            $query->bindValue(":picture", $this->picture);     
            $query->bindValue(":date", $this->date);  

            $r = $query->execute();
            return $r; 
        }

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

        //Returns time based on given date
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
        
            $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

        //Returns posts based on given amount
        public static function getPostsByAmount($amount){
            $conn = Database::getConnection();
            $query = $conn->query("SELECT users.username,users.profile_picture, posts.description, posts.filter, posts.picture, posts.date, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.date DESC LIMIT ".$amount."");
            $query->execute();
            $posts = $query->fetchAll();
            return $posts;
        }

        //Returns posts based on given tag 
        //If no amount is specified it returns 20
        public static function getPostsByTag($tag, $amount = 20){
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT users.username,users.profile_picture, users.id, posts.description, posts.filter, posts.picture, posts.date, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id WHERE description like CONCAT( '%', :tag, '%') ORDER BY date DESC LIMIT ".$amount."");
            $query->bindValue(":tag","#".$tag);
            $query->execute();
            $posts = $query->fetchAll();
            return $posts;
        }

        //Returns all posts posted by the given userId
        public static function getPostsById($userId, $amount = 5){
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT picture, filter, id FROM posts WHERE user_id = :userId ORDER BY posts.date DESC LIMIT ".$amount."");
            $query->bindValue(":userId", $userId);
            $query->execute();
            $posts = $query->fetchAll();
            return $posts;
        }

        //Returns all posts posted by the people the user follows
        public static function getPostsFromFollowing($userId, $amount = 20){
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT users.username,users.profile_picture, posts.description, posts.filter, posts.picture, posts.date, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id INNER JOIN followers ON users.id = followers.followingId WHERE followers.userId = :userId ORDER BY date DESC LIMIT ".$amount."");
            $query->bindValue(":userId", $userId);
            $query->execute();
            $posts = $query->fetchAll();
            return $posts;
        }

        public static function getAmountLikes($postId) {
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT count(*) as likes FROM `likes` WHERE post_id = :postId");
            $query->bindValue(":postId", $postId);
            $query->execute();
            $likes = $query->fetch();
            return $likes["likes"];
        }
        
 //load 20 more posts 
    public function loadMore($userId, $amount = 20){
        $conn = Database::getConnection();
        $query=$conn->prepare("SELECT TOP 20 name, row_number() OVER (ORDER BY id) AS RN FROM Products
        ORDER BY id)
        SELECT 
               MAX(CASE WHEN RN <=10 THEN name END) AS Col1,
               MAX(CASE WHEN RN > 10 THEN name END) AS Col2
        FROM T       
        GROUP BY RN % 10");
        
        $query->bindValue(":userId", $userId);
        $query->execute();
        $posts = $query->fetchAll();
        return $posts;
      } 


    //delete je eigen post
    public static function deletePost($clickedPost){
        $conn = Database::getConnection();
        $query = $conn->prepare("DELETE FROM posts WHERE id = :postId and user_id = :user");

        $query->bindValue(":postId", $clickedPost);
        $query->bindValue(":user", $_SESSION["userid"]);
        $result = $query->execute();

        return $result;

    }
        
    public static function getComments($postId) {
        $conn = Database::getConnection();
        $query = $conn->prepare("SELECT * FROM `comments` WHERE post_id = :postId ORDER BY date DESC LIMIT 3");
        $query->bindValue(":postId", $postId);
        $query->execute();
        $comments = $query->fetchAll();
        return $comments;
    }

    }

?>