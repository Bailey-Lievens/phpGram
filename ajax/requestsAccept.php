<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedUserId = $_POST["clickedUserId"];

        if ($clickedUserId) {
            $accept = new User();
            $accept->setClickedUserId($clickedUserId);
            $accept->setUserId($_SESSION['userId']);
            
            $result = $accept->acceptFollowRequest();            
            $result1 = $accept->deleteFollowRequest();

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