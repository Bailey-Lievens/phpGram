<?php //Code for the search function 
    if(!empty($_POST)){

        $input = $_POST["searchInput"];
        $isTag = $_POST["isTag"];

        $conn = new PDO("mysql:host=localhost:8889;dbname=testdb", "root", "root");
        $query = $conn->prepare("SELECT username FROM users WHERE username LIKE CONCAT( '%', :input, '%') LIMIT 5");
        $query->bindValue(":input", $input);
        $query->execute();
        $r = $query->fetchAll();


        $response = [
            'status' => "success",
            'results' => $r
        ];

        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>