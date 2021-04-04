<?php include_once('core/autoload.php');

    $description = $_POST['description'];
    $picture = $_POST['inputPicturePost'];


    if(!empty($_POST)) {

        if(!empty($description) && !empty($picture)) {
            var_dump("ok");

        } if(empty($description))  {
            $errorDescription = true;
        } if(empty($picture)) {
            $errorPicture = true;
        }
    }
// when click on post the tab 'new post' closes but have to be open when there is an error
    ?>