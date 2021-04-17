<?php include_once('core/autoload.php');

    $conn = Database::getConnection();
    $query = $conn->prepare("SELECT id FROM users WHERE username = :username");
    $query->bindValue(":username", $_SESSION['username']);            
    $query->execute();
    $result = $query->fetch();
    $userid = $result['id'];

    if(!empty($_POST)) {

        try {

            $currentDirectory = getcwd();
            $uploadDirectory = "/post_uploads/";

            //Filename is based on username and time the post was submitted as to avoid any possible duplicate names
            $fileName = $_SESSION["username"]."_post_".date("YmdHis").".jpg";
            $fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];

            $fileSaveQuality = 80; //Quality of files saved in %

            $uploadPath = $currentDirectory . $uploadDirectory . $fileName; //Where the file will be stored

            move_uploaded_file($fileTmpName, $uploadPath);
            
            //create the image to resize from the previously stored image
            $imageToResize = imagecreatefromjpeg("post_uploads/".$fileName);
            imagejpeg($imageToResize, 'post_uploads/'.$fileName, $fileSaveQuality);
            imageDestroy($imageToResize);

            $post = new Post();
            $post->setUserId($userid);
            $post->setDescription($_POST['description']);
            $post->setPicture($fileName); 
            $post->setDate(date("Y-m-d H:i:s"));  
            $post->post();

            $postOK = true;

        } catch (\Throwable $e) {
            $error = $e->getMessage();
        }
    }
    ?>