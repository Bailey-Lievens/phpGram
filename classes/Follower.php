<?php
    class Follower{
        public static function addFollower($user, $following){
            $conn = Database::getConnection();
            $query = $conn->prepare("INSERT INTO followers(`userId`, `followingId`) VALUES (:user, :following)");
            
            $query->bindValue(":user", $user);
            $query->bindValue(":following", $following);
            $response = $query->execute();
            
            return $response;
        }

        public static function removeFollower($user, $following){
            $conn = Database::getConnection();
            $query = $conn->prepare("DELETE FROM followers WHERE userId = :user and followingId = :following");
            
            $query->bindValue(":user", $user);
            $query->bindValue(":following", $following);
            $response = $query->execute();
            
            return $response;
        }
    }
?>