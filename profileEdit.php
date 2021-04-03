<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>

<?php
    
    if(!empty($_POST)){
        try {
            $user = new User();

            $userid = $_SESSION["userid"];
            $user->setusername($_POST["username"]);
            $user->setemail($_POST["email"]);
            $user->setbio($_POST["bio"]);
            $user->setUserId($userid);
        }
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
    <title>My profile</title>
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
                <label for="bio">Biography</label>
                <textarea name="bio" id="biography" form="profileEditForm" cols="30" rows="10"></textarea>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            </div>

            <div>
                <label for="newPassword">New password</label>
                <input type="password" id="newPassword" name="newPassword">
            </div>

            <div>
                <label for="oldPassword">Old password</label>
                <input type="password" id="oldPassword" name="oldPassword">
            </div>

            <div class="submitBtn">
                <input type="submit" id="submitBtn" value="Save changes">	
                <a href="profilePage.php" style="margin-left: 2em">Cancel</a>
            </div>

        </form>

    </section>

    
    <?php include_once("footer.inc.php")?> 
    <script src="js/imagePreview.js"></script>
</body>
</html>