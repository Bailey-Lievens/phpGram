<?php
    class Like{

        public static function getAmountLikes($postId) {
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT count(*) as likes FROM `likes` WHERE post_id = :postId");

            $query->bindValue(":postId", $postId);
            $query->execute();
            $likes = $query->fetch();

            return $likes["likes"];
        }

        public static function deleteLike($clickedPost) {
            $conn = Database::getConnection();
            $query = $conn->prepare("DELETE FROM likes WHERE post_id = :postId and  liked_by_user_id = :user");

            $query->bindValue(":postId", $clickedPost);
            $query->bindValue(":user", $_SESSION["userid"]);
            $result = $query->execute();
            
            return $result;
        }

        public static function addLike($clickedPost) {
            $conn = Database::getConnection();
            $query = $conn->prepare("INSERT INTO likes(`post_id`, `liked_by_user_id`) VALUES (:postId, :user)");

            $query->bindValue(":postId", $clickedPost);
            $query->bindValue(":user", $_SESSION["userid"]);
            $result = $query->execute();
            
            return $result;
        }

        

    }