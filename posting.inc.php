<?php
    $userId = User::getUserIdByName($_SESSION['username']);

    if(isset($_POST['submit'])) {
        try {

            $currentDirectory = getcwd();
            $uploadDirectory = "/post_uploads/"; //Directory where posted image will be located

            $fileName = $userId."_post_".date("YmdHis").".jpg";
            $fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];

            $fileSaveQuality = 80; 

            $uploadPath = $currentDirectory . $uploadDirectory . $fileName; 

            move_uploaded_file($fileTmpName, $uploadPath);

            //create the image to resize from the previously stored image
            $imageToResize = imagecreatefromjpeg("post_uploads/".$fileName);
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