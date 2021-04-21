<?php include_once('core/autoload.php');
include_once('isloggedin.inc.php');

    $conn = Database::getConnection();
    $query = $conn->prepare("SELECT id FROM users WHERE username = :username");
    $query->bindValue(":username", $_SESSION['username']);            
    $query->execute();
    $result = $query->fetch();
    $userid = $result['id'];

    if(isset($_POST['submit'])) {

        try {

            $currentDirectory = getcwd();
            $uploadDirectory = "/post_uploads/";

            $fileName = $_SESSION["username"]."_post_".date("YmdHis").".jpg";
            $fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];

            $fileSaveQuality = 80; 

            $uploadPath = $currentDirectory . $uploadDirectory . $fileName; 

            move_uploaded_file($fileTmpName, $uploadPath);

            $post = new Post();
            $post->setUserId($userid);
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