<?php
    $userId = $_SESSION['userid'];

    if(isset($_POST['submit'])) {
        try {

            $currentDirectory = getcwd();
            $uploadDirectory = "/post_uploads/"; //Directory where posted image will be located

            $fileName = $userId."_post_".date("YmdHis").".jpg";
            $fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];

            $post = new Post();
            $post->setUserId($userId);
            $post->setDescription($_POST['description']);
            $post->setFilter($_POST['chosenFilter']);
            $post->setPicture($fileName); 
            $post->setDate(date("Y-m-d H:i:s"));  
            $post->submitPost();

            $fileSaveQuality = 60; 

            $uploadPath = $currentDirectory . $uploadDirectory . $fileName;

            move_uploaded_file($fileTmpName, $uploadPath);

            //create the image to resize
            $imageToResize = imagecreatefromjpeg("post_uploads/".$fileName);
            imagejpeg($imageToResize, 'post_uploads/'.$fileName, $fileSaveQuality);
            imageDestroy($imageToResize);

            $postOK = true;
        } catch (Throwable $e) {
            $error = $e->getMessage();
        }
    }
    ?>