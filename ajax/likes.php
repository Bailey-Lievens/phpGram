<?php

    if(!empty($_POST)){
        session_start();
        $clickedPost = $_POST["clickedPost"]; // post_id
        $userHasLiked = $_POST["userHasLiked"]; // geliked of niet
        $amountLikes = $_POST["amountLikes"]; // hoeveel likes er zijn

        $conn = new PDO("mysql:host=localhost:8889;dbname=testdb", "root", "root"); //Should work with autoloader
        //$conn = Database::getConnection();

        if ($userHasLiked == "true") {
            $query = $conn->prepare("DELETE FROM likes WHERE post_id = :postId and  liked_by_user_id = :user");
            $action = "Unlike";
            $amountLikes = "down";
        } else {
            $query = $conn->prepare("INSERT INTO likes(`post_id`, `liked_by_user_id`) VALUES (:postId, :user)");
            $action = "Like";
            $amountLikes = "up";
        }

        // amountLikes gaat maar neemt telkens de originele amountLikes om iets bij te tellen

        $query->bindValue(":postId", $clickedPost);
        $query->bindValue(":user", $_SESSION["userid"]);
        $result = $query->execute();

        if($result){
            $response = [
                "action" => $action,
                "status" => "Success",
                "amountLikes" => $amountLikes
            ];
        }
        
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>