<?php include_once("../core/autoload.php"); ?>

<?php //Code for the search function 
    if(!empty($_POST)){

        $input = $_POST["searchInput"];

        $conn = Database::getConnection();
        if ($input[0] != '#') {
            $query = $conn->prepare("SELECT username, profile_picture FROM users WHERE username LIKE CONCAT( '%', :input, '%') LIMIT 5");
        } else {
            $query = $conn->prepare("SELECT tag_name FROM tags WHERE tag_name LIKE CONCAT( '%', :input, '%') LIMIT 5");
        }
        $query->bindValue(":input", $input);
        $query->execute();
        $response = $query->fetchAll();

        if (empty($input)) {
            $response = null;
        }

        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>