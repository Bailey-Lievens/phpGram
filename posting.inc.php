<?php
    $userId = User::getUserId($_SESSION['username']);

    if(isset($_POST['submit'])) {
        try {

            $currentDirectory = getcwd();
            $uploadDirectory = "/post_uploads/"; //Directory where posted image will be located

            $fileName = $userId."_post_".date("YmdHis").".jpg";
            $fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];

            $fileSaveQuality = 80; 

            $uploadPath = $currentDirectory . $uploadDirectory . $fileName; 

            move_uploaded_file($fileTmpName, $uploadPath);

            $post = new Post();
            $post->setUserId($userId);
            $post->setDescription($_POST['description']);
            $post->setPicture($fileName); 
            $post->setDate(date("Y-m-d H:i:s"));  
            $post->post();

            $postOK = true;
        } catch (Throwable $e) {
            $error = $e->getMessage();
        }
    }
    ?>