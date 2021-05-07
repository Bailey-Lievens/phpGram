<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedUserId = $_POST["clickedUserId"];
        $isRequested = $_POST["isRequested"];

        if ($isRequested == "true") {
            $decline = new User();
            $decline->setClickedUserId($clickedUserId);
            $decline->setUserId($_SESSION['userId']);

            $result = $decline->cancelFollowRequest();   

            $action = "Decline";
        } else {
            $send = new User();
            $send->setClickedUserId($clickedUserId);
            $send->setUserId($_SESSION['userId']);

            $result = $send->sendFollowRequest(); 

            $action = "Send";
        }

        if($result){
            $response = [
                "action" => $action,
                "status" => "Success"
            ];
        } else {
            $response = [
                "status" => "Fail"
            ];
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>