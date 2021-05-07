<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedUserId = $_POST["clickedUserId"];

        if ($clickedUserId) {
            $decline = new User();
            $decline->setClickedUserId($clickedUserId);
            $decline->setUserId($_SESSION['userId']);

            $result = $decline->cancelFollowRequest();   

            $action = "declined";
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