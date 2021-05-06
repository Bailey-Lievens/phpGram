<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedUserId = $_POST["clickedUserId"];

        if ($clickedUserId) {
            $result = User::acceptFollowRequest($clickedUserId);
            $result1 = User::deleteFollowRequest($clickedUserId);
            $action = "accepted";
        }

        if($result && $result1){
            $response = [
                "action" => $action,
                "status" => "Success"
            ];
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>