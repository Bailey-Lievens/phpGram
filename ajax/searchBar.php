<?php include_once(__DIR__ . "/../classes/Search.php");?>
<?php //Code for the search function 
    if(!empty($_POST)){

        $input = $_POST["searchInput"];
        $isTag = $_POST["isTag"];

        $search = new Search();

        $search->setInput($input);
        $search->setIsTag($isTag);

        $response = [
            'status' => "success",
            "input" => $input
        ];

        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>