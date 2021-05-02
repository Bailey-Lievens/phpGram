<?php include_once("../core/autoload.php"); ?>

<?php

    if(!empty($_POST)){
        session_start();
        $postId = $_POST["postId"]; // post_id
        $commentText = $_POST["commentText"]; // text comment

        $conn = Database::getConnection();

        if (!empty($commentText) && $commentText != " ") {
            $query = $conn->prepare("INSERT INTO `comments` (`id`, `post_id`, `comment`, `date`, `user_id`) VALUES (NULL, :postId, :comment, :date, :userId);");
            $text = htmlspecialchars($commentText);
        } else {}

        $query->bindValue(":postId", $postId);
        $query->bindValue(":comment", $commentText);
        $query->bindValue(":date", date("Y-m-d H:i:s"));
        $query->bindValue(":userId", $_SESSION['userid']);
        $result = $query->execute();

        if($result){
            $response = [
                "user" => User::getUsernameById($_SESSION['userid']),
                "time" => Post::timeSincePost(date("Y-m-d H:i:s")),
                "input" => $text,
                "status" => "Success"
            ];
        }
        
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>