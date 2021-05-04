<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedUserId = $_POST["clickedUserId"];

        $conn = Database::getConnection();

        if ($clickedUserId) {
            $query = $conn->prepare("DELETE FROM `requests` WHERE `requester_id` = :clickedUserId AND `receiver_id` = :user;");
            $action = "declined";
        } else {}

        $query->bindValue(":clickedUserId", $clickedUserId);
        $query->bindValue(":user", $_SESSION['userid']);

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