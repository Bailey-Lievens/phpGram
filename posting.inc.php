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

            $fileName = $_FILES['inputPicturePost']['name'];
            $fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];

            $post = new Post();
            $post->setUserId($userid);
            $post->setDescription($_POST['description']);
            $post->setPicture($fileName); // have to compress image
            $post->setDate(date("Y-m-d H:i:s"));  
            $post->post();

            $postOK = true;

            $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

            move_uploaded_file($fileTmpName, $uploadPath);
        } catch (\Throwable $e) {
            $error = $e->getMessage();
        }
    }?>