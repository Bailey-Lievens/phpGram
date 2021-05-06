<?php
    $userId = $_SESSION['userId'];

    if(!empty($_POST)) {
        try {
            $currentDirectory = getcwd();
            $uploadDirectory = "/post_uploads/"; //Directory where posted image will be located

            $finalFileName = $userId."_post_".date("YmdHis").".jpg";

            if($_FILES["inputPicturePost"]["type"] != "image/png"){
                $fileName = $finalFileName;
            } else {
                $fileName = $userId."_post_".date("YmdHis").".png";
            }
            
            $fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];

            $post = new Post();
            $post->setUserId($userId);
            $post->setDescription($_POST['description']);
            $post->setFilter($_POST['chosenFilter']);
            $post->setPicture($finalFileName); 
            $post->setDate(date("Y-m-d H:i:s"));

            if(isset($_POST["useLocation"])){
                $post->setCity($_POST["userCity"]);
                $post->setCountry($_POST["userCountry"]);
            }

            $post->submitPost();            

            $fileSaveQuality = 60; 

            $uploadPath = $currentDirectory . $uploadDirectory . $fileName;

            move_uploaded_file($fileTmpName, $uploadPath);

            if($_FILES["inputPicturePost"]["type"] != "image/png"){
                $imageToResize = imagecreatefromjpeg("post_uploads/".$fileName);
            } else {
                $imageToResize = imagecreatefrompng("post_uploads/".$fileName);
                unlink("post_uploads/".$fileName);
            }

            imagejpeg($imageToResize, 'post_uploads/'.$finalFileName, $fileSaveQuality);
            imageDestroy($imageToResize);

            $postOK = true;
        } catch (Throwable $e) {
            $error = $e->getMessage();
        }
    }
    ?>