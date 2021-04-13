<?php include_once('core/autoload.php');

    $description = $_POST['description'];
    $picture = $_POST['inputPicturePost'];

    $conn = Database::getConnection();
            $query = $conn->prepare("SELECT id FROM users WHERE username = :username");
            $query->bindValue(":username", $_SESSION['username']);            
            $query->execute();
            $result = $query->fetch();
            $userid = $result['id'];

    if(!empty($_POST)) {
        if(!empty($description) && !empty($picture)) {
            $post = new Post();
            $post->setUserId($userid);
            $post->setDescription($description);
            $post->setPicture($picture); // have to compress image
            $post->setDate(date("Y-m-d H:i:s"));  
            $post->post();

            $postOK = true;

        } if(empty($description))  {
            $errorDescription = true;
            echo "<script type=\"text/javascript\">window.onload = function() 
            {document.querySelector('#newPost').style.display = 'block';
            };
            </script>";
        } if(empty($picture)) {
            $errorPicture = true;
            echo "<script type=\"text/javascript\">window.onload = function() 
            {document.querySelector('#newPost').style.display = 'block';
            };
            </script>";
        }
    }
    var_dump($_FILES["inputPicturePost"]["name"]);
    var_dump($_FILES['inputPicturePost']['size']);

    $uploads_dir = "uploads/";
    $tmp_name = $_FILES["inputPicturePost"]["tmp_name"];
    $name = basename($_FILES["inputPicturePost"]["name"]);
    $target_file = $uploads_dir . $name;
    move_uploaded_file($tmp_name, $target_file);

    ?>