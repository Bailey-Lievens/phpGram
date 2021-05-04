<?php include_once("../core/autoload.php"); ?>

<?php

    if(!empty($_POST)){
        session_start();
        $clickedPost = $_POST["clickedPost"]; // post_id

        if ($clickedPost) {
            $result = Post::deletePost($clickedPost);
            $action = "delete";
        } else {}

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