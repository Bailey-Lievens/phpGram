<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $userId = $_POST["userId"];
        $isFollowing = $_POST["isFollowing"];

        if ($isFollowing == "true") {
            $result = Follower::removeFollower($_SESSION['userId'], $userId);
            $action = "Unfollow";
        } else {
            $result = Follower::addFollower($_SESSION['userId'], $userId);
            $action = "Follow";
        }

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