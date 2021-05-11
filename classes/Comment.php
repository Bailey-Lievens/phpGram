<?php
    class Comment{

        private $commentText;
        private $postId;
        private $date;
        private $userId;
        
        public function getCommentText() {
            return $this->commentText;
        }

        public function setCommentText($commentText) {
            $this->commentText = $commentText;
            return $this;
        }
         
        public function getPostId() {
            return $this->postId;
        }

        public function setPostId($postId) {
            $this->postId = $postId;
            return $this;
        }
        
        public function getDate() {
            return $this->date;
        }
 
        public function setDate($date) {
            $this->date = $date;
            return $this;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
            return $this;
        }

        public function save(){
            $conn = Database::getConnection();
            $query = $conn->prepare("INSERT INTO `comments` (`id`, `post_id`, `comment`, `date`, `user_id`) VALUES (NULL, :postId, :comment, :date, :userId);");

            $query->bindValue(":postId", $this->getPostId());
            $query->bindValue(":comment", $this->getCommentText());
            $query->bindValue(":date", $this->getDate());
            $query->bindValue(":userId", $this->getUserId());
            $result = $query->execute();

            return $result;
        }
        
        public static function viewComments($postId) {
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT * FROM `comments` WHERE post_id = :postId ORDER BY date DESC");
            
            $query->bindValue(":postId", $postId);
            $query->execute();
            $comments = $query->fetchAll();

            return $comments;
        }
        
    }