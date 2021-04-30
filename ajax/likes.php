<?php include_once("../core/autoload.php"); ?>

<?php
    if(!empty($_POST)){
        session_start();
        $clickedButton = $_POST["clickedButton"]; // geliked of niet
        $userHasLiked = $_POST["userHasLiked"]; // post_id

        $conn = Database::getConnection();

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