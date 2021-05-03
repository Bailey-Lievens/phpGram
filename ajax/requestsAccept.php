<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){
        session_start();
        $clickedUserId = $_POST["clickedUserId"];

        $conn = Database::getConnection();

        if ($clickedUserId) {
            $query = $conn->prepare("INSERT INTO followers(`userId`, `followingId`) VALUES (:clickedUserId, :user)");
            $query1 = $conn->prepare("DELETE FROM `requests` WHERE `requester_id` = :clickedUserId AND `receiver_id` = :user;");
            $action = "accepted";
        } else {}

        $query->bindValue(":clickedUserId", $clickedUserId);
        $query->bindValue(":user", $_SESSION['userid']);

        $query1->bindValue(":clickedUserId", $clickedUserId);
        $query1->bindValue(":user", $_SESSION['userid']);

        $result = $query->execute();
        $result1 = $query1->execute();

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