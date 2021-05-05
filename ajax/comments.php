<?php include_once("../core/autoload.php"); ?>

<?php

    if(!empty($_POST)){
        session_start();
        $postId = htmlspecialchars($_POST["postId"]); // post_id
        $commentText = htmlspecialchars($_POST["commentText"]); // text comment

        if (!empty($commentText) && $commentText != " ") {
            $result = Comment::setComment($postId, $commentText);
            $text = htmlspecialchars($commentText);
        } else {}

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