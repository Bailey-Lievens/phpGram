<?php include_once("../core/autoload.php"); ?>

<?php

    if(!empty($_POST)){
        session_start();
        $clickedPost = $_POST["clickedPost"]; // post_id

        $conn = Database::getConnection();

        if ($clickedPost) {
            $query = $conn->prepare("DELETE FROM posts WHERE id = :postId and user_id = :user");
            $action = "delete";
        } else {}

        $query->bindValue(":postId", $clickedPost);
        $query->bindValue(":user", $_SESSION["userid"]);
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