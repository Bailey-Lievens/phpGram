<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedPost = $_POST["clickedPost"]; // post_id
        $userHasLiked = $_POST["userHasLiked"]; // geliked of niet

        $conn = Database::getConnection();

        if ($userHasLiked == "true") {
            $result = Like::deleteLike($clickedPost);
            $action = "Unlike";
        } else {
            $result = Like::addLike($clickedPost);
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