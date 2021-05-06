<?php
    class Comment{

        public static function setComment($postId, $commentText){
            $conn = Database::getConnection();
            $query = $conn->prepare("INSERT INTO `comments` (`id`, `post_id`, `comment`, `date`, `user_id`) VALUES (NULL, :postId, :comment, :date, :userId);");

            $query->bindValue(":postId", $postId);
            $query->bindValue(":comment", $commentText);
            $query->bindValue(":date", date("Y-m-d H:i:s"));
            $query->bindValue(":userId", $_SESSION['userId']);
            $result = $query->execute();

            return $result;
        }
        
        public static function getComments($postId) {
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT * FROM `comments` WHERE post_id = :postId ORDER BY date DESC /*LIMIT 3*/");
            
            $query->bindValue(":postId", $postId);
            $query->execute();
            $comments = $query->fetchAll();

            return $comments;
        }
    }