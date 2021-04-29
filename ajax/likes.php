<?php
    if(!empty($_POST)){
        session_start();
        $clickedButton = $_POST["clickedButton"]; // geliked of niet
        $userHasLiked = $_POST["userHasLiked"]; // post_id

        $conn = new PDO("mysql:host=localhost:8889;dbname=testdb", "root", "root"); //Should work with autoloader
        //$conn = Database::getConnection();

        if ($clickedButton == "true") {
            $query = $conn->prepare("DELETE FROM likes WHERE post_id = :postId and  liked_by_user_id = :user");
            $action = "Unlike";
        } else {
            $query = $conn->prepare("INSERT INTO likes(`post_id`, `liked_by_user_id`) VALUES (:postId, :user)");
            $action = "Like";
        }
        $query->bindValue(":user", $_SESSION['userid']);
        $query->bindValue(":postId", $userHasLiked);
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