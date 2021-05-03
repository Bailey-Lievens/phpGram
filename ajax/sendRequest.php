<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedUserId = $_POST["clickedUserId"];
        $isRequested = $_POST["isRequested"];

        $conn = Database::getConnection();

        if ($isRequested == "true") {
            $query = $conn->prepare("DELETE FROM `requests` WHERE `requester_id` = :user AND `receiver_id` = :clickedUserId;");
            $action = "Decline";
        } else {
            $query = $conn->prepare("INSERT INTO `requests` (`id`, `requester_id`, `receiver_id`) VALUES (NULL, :user, :clickedUserId);");
            $action = "Send";
        }
        $query->bindValue(":user", $_SESSION['userid']);
        $query->bindValue(":clickedUserId", $clickedUserId);
        $result = $query->execute();

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