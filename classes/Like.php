<?php
    class Like{

        private $userId;
        private $postId;

        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
            return $this;
        }
        
        public function getPostId() {
            return $this->postId;
        }

        public function setPostId($postId) {
            $this->postId = $postId;
            return $this;
        }

        public static function isLiked($currentUser, $postToCheck) {
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT likes.id FROM likes WHERE likes.liked_by_user_id = :currentUser AND likes.post_id = :postToCheck");
            
            $query->bindValue(":currentUser", $currentUser);            
            $query->bindValue(":postToCheck", $postToCheck);
            $query->execute();
            $result = $query->fetch();

            if($result){
                return True;
            } else {
                return False;
            }
        }

        public static function getAmountLikes($postId) {
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT count(*) as likes FROM `likes` WHERE post_id = :postId");

            $query->bindValue(":postId", $postId);
            $query->execute();
            $likes = $query->fetch();

            return $likes["likes"];
        }

        public function deleteLike() {
            $conn = Database::getConnection();
            $query = $conn->prepare("DELETE FROM likes WHERE post_id = :postId and  liked_by_user_id = :user");

            $query->bindValue(":postId", $this->getPostId());
            $query->bindValue(":user", $this->getUserId());
            $result = $query->execute();
            
            return $result;
        }

        public function addLike() {
            $conn = Database::getConnection();
            $query = $conn->prepare("INSERT INTO likes(`post_id`, `liked_by_user_id`) VALUES (:postId, :user)");

            $query->bindValue(":postId", $this->getPostId());
            $query->bindValue(":user", $this->getUserId());
            $result = $query->execute();
            
            return $result;
        }
    }