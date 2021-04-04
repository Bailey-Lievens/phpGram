<?php include_once('core/autoload.php');

    $description = $_POST['description'];
    $picture = $_POST['inputPicturePost'];
    
    //var_dump($userId = $_SESSION['userid']); // tried to get the userid    

    if(!empty($_POST)) {
        if(!empty($description) && !empty($picture)) {
            $post = new Post();
            $post->setUserId($_SESSION["userid"]); // dunno how to get and set the correct userid
            $post->setDescription($description);
            $post->setPicture($picture); // have to compress image
            $post->setDate(date("Y-m-d H:i:s"));  
            
            $post->post();

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
    ?>