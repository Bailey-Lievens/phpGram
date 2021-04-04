<?php include_once('core/autoload.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

        $description = $_POST['description'];
        var_dump($description);


    if(!empty($_POST)) {
        var_dump("not empty");

        if(!empty($description)) {

        } else {
            $errorDescription = true;
        }

    }

    ?>