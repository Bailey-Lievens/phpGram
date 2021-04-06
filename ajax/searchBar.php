<?php include_once("./classes/Search.php");?>
<?php //Code for the search function 
    if(!empty($_POST)){

        $c = $_POST["searchInput"];


        $response = [
            'status' => "success",
            "input" => $c
        ];

        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>