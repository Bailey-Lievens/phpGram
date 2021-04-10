<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>

<?php
$user = new User();
$user_edit = $_SESSION["userid"];


 if (!empty($_POST['edit'])) {
    $username = $_POST["username"];
    $bio = $_POST["bio"];
    $email = $_POST["email"];
}

$user->update($user_edit, $username, $email, $bio);
 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile edit</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/profilePageEdit.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 
</head>
<body>
    <?php include_once("navigation.inc.php")?>

    <section class="flex">

        <form method="post" id="profileEditForm">

            <h2>Edit your account</h2>

            <?php if(isset($error)):?>
                <div class="error" style="color: white;">
                <?php echo $error;?></div>
            <?php endif;?>

            <div>
                <div class="imageEditWrapper">
                    <img id="profilePicturePreview" src="images/DefaultProfilePicture.jpg" alt="profilePicture">
                    <label id="inputLabel" for="inputImageFile">Change profile picture</label>
                </div>
                <input type="file" name="file" id="inputImageFile" accept="image/png, image/jpeg"/>
            </div>
            
            <div>
                <label for="username">Username</label>
                <input id="email" type="text" name="username" value="">
            </div>

            <div>
                <label for="bio">Biography</label>
                <textarea name="bio" id="biography" form="profileEditForm" cols="30" rows="10" value=""></textarea>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="">
            </div>

        <!--  <div>
                <label for="newPassword">New password</label>
                <input type="password" id="newPassword" name="newPassword">
            </div>

            <div>
                <label for="oldPassword">Old password</label>
                <input type="password" id="oldPassword" name="oldPassword">
            </div>  -->
   
       
            <div class="submitBtn">
                <input name="edit" type="submit" id="submitBtn" value="update">	
                <a href="profilePage.php" style="margin-left: 2em">Cancel</a>
            </div>

        </form>

    </section>

    
    <?php include_once("footer.inc.php")?> 
    <script src="js/imagePreview.js"></script>
</body>
</html>