<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedUserId = $_POST["clickedUserId"];
        $isRequested = $_POST["isRequested"];

        $conn = Database::getConnection();

        if ($isRequested == "true") {
            $result = User::cancelFollowRequest($clickedUserId);
            $action = "Decline";
        } else {
            $result = User::sendFollowRequest($clickedUserId);
            $action = "Send";
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