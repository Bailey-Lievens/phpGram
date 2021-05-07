<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $postId = $_POST["postId"]; // post_id
        $commentText = htmlspecialchars($_POST["commentText"]); // text comment

        if (!empty($commentText) && $commentText != " ") {
            $comment = new Comment();
            $comment->setCommentText($commentText);
            $comment->setPostId($postId);
            $comment->setDate(date("Y-m-d H:i:s"));
            $comment->setUserId($_SESSION['userId']);

            $result = $comment->insertComment();

            $text = $comment->getCommentText();
        }

        if($result){
            $response = [
                "user" => User::getUsernameById($_SESSION['userId']),
                "userId" => $_SESSION['userId'],
                "time" => Post::timeSincePost(date("Y-m-d H:i:s")),
                "input" => $text,
                "status" => "Success"
            ];
        } else {
            $response = [
                "status" => "fail"
            ];
        }
        
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>