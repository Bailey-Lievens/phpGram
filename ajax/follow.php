<?php
    if(!empty($_POST)){
        session_start();
        $userId = $_POST["userId"];
        $isFollowing = $_POST["isFollowing"];

        $conn = new PDO("mysql:host=localhost:8889;dbname=testdb", "root", "root"); //Should work with autoloader
        //$conn = Database::getConnection();

        if ($isFollowing == "true") {
            $query = $conn->prepare("DELETE FROM followers WHERE userId = :user and followingId = :following");
            $action = "Unfollow";
        } else {
            $query = $conn->prepare("INSERT INTO followers(`userId`, `followingId`) VALUES (:user, :following)");
            $action = "Follow";
        }
        $query->bindValue(":user", $_SESSION['userid']);
        $query->bindValue(":following", $userId);
        $result = $query->execute();

        if($result){
            $response = [
                "action" => $action,
                "status" => "Success"
            ];
        }
        
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>