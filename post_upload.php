<?php
    $currentDirectory = getcwd();
    $uploadDirectory = "/post_uploads/";

    $fileName = $_FILES['inputPicturePost']['name'];
    $fileTmpName  = $_FILES['inputPicturePost']['tmp_name'];

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {
        move_uploaded_file($fileTmpName, $uploadPath);
    }
?>