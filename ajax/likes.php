<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedPost = $_POST["clickedPost"]; // post_id
        $userHasLiked = $_POST["userHasLiked"]; // geliked of niet

        if ($userHasLiked == "true") {
            $dislike = new Like();
            $dislike->setPostid($clickedPost);
            $dislike->setUserid($_SESSION['userId']);

            $result = $dislike->deleteLike();

            $action = "Unlike";
        } else {
            $like = new Like();
            $like->setPostid($clickedPost);
            $like->setUserid($_SESSION['userId']);

            $result = $like->addLike();

            $action = "Like";
        }
        
        $likes = Like::getAmountLikes($clickedPost);

        if($result){
            $response = [
                "action" => $action,
                "status" => "Success",
                "likes" => $likes
            ];
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>