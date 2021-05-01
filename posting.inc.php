<?php
    $userId = User::getUserIdByName($_SESSION['username']);

    if(isset($_POST['submit'])) {
        try {
            $currentDirectory = getcwd();
            $uploadDirectory = "/post_uploads/"; //Directory where posted image will be located

            $fileName = $userId."_post_".date("YmdHis").".jpg";
            //$fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];  Ask Joris if this is ok

            $fileSaveQuality = 60; 

            //$uploadPath = $currentDirectory . $uploadDirectory . $fileName; Ask Joris if this is ok

            //move_uploaded_file($fileTmpName, $uploadPath); Ask Joris if this is ok

            //create the image to resize
            $imageToResize = imagecreatefromjpeg($_POST["bakedImgSrc"]);
            imagejpeg($imageToResize, 'post_uploads/'.$fileName, $fileSaveQuality);
            imageDestroy($imageToResize);

            $post = new Post();
            $post->setUserId($userId);
            $post->setDescription($_POST['description']);
            $post->setPicture($fileName); 
            $post->setDate(date("Y-m-d H:i:s"));  
            $post->submitPost();

            $postOK = true;
        } catch (Throwable $e) {
            $error = $e->getMessage();
        }
    }
    ?>