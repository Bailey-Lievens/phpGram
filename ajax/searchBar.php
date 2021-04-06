<?php //Code for the search function 
    if(!empty($_POST)){

        $input = $_POST["searchInput"];

        $conn = new PDO("mysql:host=localhost:8889;dbname=testdb", "root", "root");
        if ($input[0] != '#') {
            $query = $conn->prepare("SELECT username FROM users WHERE username LIKE CONCAT( '%', :input, '%') LIMIT 5");
        } else {
            $query = $conn->prepare("SELECT tags FROM posts WHERE tags LIKE CONCAT( '%', :input, '%') LIMIT 5");
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