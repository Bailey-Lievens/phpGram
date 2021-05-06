<?php include_once("../core/autoload.php"); ?>
<?php
    if(!empty($_POST)){

        $input = $_POST["searchInput"];

        if ($input[0] != '#') {
            $response = User::getSearchResultsByInput($input);
        } else {
            $response = Post::getTagsByInput($input);
        }

        if (empty($input)) {
            $response = null;
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>