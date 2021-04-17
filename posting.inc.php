<?php include_once('core/autoload.php');

    $conn = Database::getConnection();
    $query = $conn->prepare("SELECT id FROM users WHERE username = :username");
    $query->bindValue(":username", $_SESSION['username']);            
    $query->execute();
    $result = $query->fetch();
    $userid = $result['id'];

    function compressImage($source, $location, $quality) {
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];

        $fileName = $_FILES['inputPicturePost']['name'];

        switch($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                imagejpeg($image, $location, $quality); 
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                imagepng($image, $location, $quality); 
                break;
            default:
                $image = imagecreatefromjpeg($source);
                imagejpeg($image, $location, $quality); 
        }
        return $fileName;
    }

    if(!empty($_POST)) {

        try {
            $currentDirectory = getcwd();
            $uploadDirectory = "/post_uploads/";

            $fileName = $_FILES['inputPicturePost']['name'];
            $fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];
            $imageSize = $_FILES['inputPicturePost']['size'];
            
            $compressedImage = compressImage($fileTmpName, $uploadPath, 50); 

            $post = new Post();
            $post->setUserId($userid);
            $post->setDescription($_POST['description']);
            $post->setPicture($compressedImage); // have to compress image
            $post->setDate(date("Y-m-d H:i:s"));  
            $post->post();

            $postOK = true;

            $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

            move_uploaded_file($fileTmpName, $uploadPath);

            if($compressedImage){ 
            var_dump($imageSize);
            }

        } catch (\Throwable $e) {
            $error = $e->getMessage();
        }
    }
    ?>