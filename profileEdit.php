<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>

<?php

/*$user = new User();
$user_edit = $_SESSION["userid"];
*/

$userId = $_SESSION['userid'];

$email = User::getEmailById($userId);
$username = User::getUsernameById($userId);
$biography = User::getBioById($userId);
$picture = User::getPictureById($userId);

// edit image or delete image


$user = new User();
if (isset($_POST['imageEdit'])) {
    
    $currentDirectory = getcwd();
    $uploadDirectory = "/user_profilepictures/";

    // replace image on the same path in user_profilepictures
    $fileName = $userId."_profilePicture.jpg";
    $fileTmpName  = $_FILES['profileImage']['tmp_name'];

    $fileSaveQuality = 80; 

    $uploadPath = $currentDirectory . $uploadDirectory . $fileName; 

    move_uploaded_file($fileTmpName, $uploadPath);

    $image =  "user_profilepictures/"  .$fileName;
    $user->updatePicture($userId, $image);
    header('location: profilePage.php?user=' . $_SESSION['username']);
}

if(isset($_POST['deleteImage'])){
    $image = "user_profilepictures/default.jpg";
    $user->updatePicture($userId, $image);

    header('location: profilePage.php?user=' . $_SESSION['username']);
}

if(!empty($_POST)){
    try {
        $user->setUserId($userId);
        $user->setEmail($_POST["email"]);
        $user->setBio($_POST["biography"]);
        $user->update();
        header("Location: profilePage.php?user=".$username);
    } catch (\Throwable $e) {
        $error = $e->getMessage();
    }
}

?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile edit</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/profilePageEdit.css">
    <link rel="icon" href="images/favico.ico">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 
</head>
<body>
    <?php include_once("navigation.inc.php")?>

    <section class="flex">

<form action="#" method="post" id="profileEditForm"  enctype="multipart/form-data">
    <div>
        <div class="imageEditWrapper">
            <img id="profilePicturePreview" src=<?php echo $picture ?> alt="profilePicture">
            
            <label id="inputLabel" for="inputImageFile">Change profile picture</label>
            
            
        </div>
        <input type="file" name="profileImage" id="inputImageFile" accept="image/png, image/jpeg"/>
    </div>

    <div class="submitBtn">
    <input name="imageEdit" type="submit" id="submitBtn" value="update" >
    
    <input type="submit" name="deleteImage" id="submitBtn" value="Delete">

         <a href="profilePage.php?user=<?php echo $_SESSION['username'] ?>" style="margin-left: 2em">Cancel</a>
         
    </div>

</form>
</section>
<section class="flex">
    <form action="" method="post" id="profileEditForm"  enctype="multipart/form-data">

        <h1>Edit your account</h1>

        <?php if(isset($error)):?>
            <div class="error" style="color: white;"><?php echo($error);?></div>
        <?php endif;?>

        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo($email); ?>">
        </div>

        <div>
            <label for="biography">biography</label>
            <textarea name="biography" id="biography" cols="30" rows="10" value=""><?php echo($biography); ?></textarea>
        </div>

        <div class="submitBtn">
        <input name="edit" type="submit" id="submitBtn" value="update" >
            <a href="profilePage.php?user=<?php echo $_SESSION['username'] ?>" style="margin-left: 2em">Cancel</a>
        </div>

    </form>
</section>


<section class="flex">
    <form action="" method="post" id="profileEditForm">
        <h1>Change your password</h1>  

        <?php if(isset($error2)):?>
            <div class="error" style="color: white;">
                <?php echo $error2;?>
            </div>
        <?php endif;?>
        <div>
            <label for="password">New password</label>
            <input type="password" id="email" name="password">
        </div>

        <div class="submitBtn">
            <input name="changepass" type="submit" id="submitBtn" value="update"></input>	
            <a href="profilePage.php" style="margin-left: 2em">Cancel</a>
        </div>
    </form>
</section>

<?php include_once("footer.inc.php")?> 
<script src="js/imagePreview.js"></script>
</body>
</html>