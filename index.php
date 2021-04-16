<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>
<?php include_once('posting.inc.php');

     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengram</title>

    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/index.css"/>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 

</head>
<body>
    <?php include_once("navigation.inc.php")?>
    <section>
        <p class="new">New post</p>
    </section>
    
    <?php if($postOK): ?>
    <section class="congrats">
        <p>Congrats your masterpiece is posted!</p>
    </section>
    <?php endif; ?>

    <form action="" method="post">
    <section id="newPost">
            <div>
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" cols="10" rows="3" maxlength="100"><?php if(empty($picture)) echo htmlspecialchars($description); ?></textarea>
            </div>

            <?php if($errorDescription):?>
            <div class="error">
                <p>Write a description please.</p>
            </div>
            <?php endif;?>

            <div>
                <input type="file" name="inputPicturePost" id="inputPicturePost" accept="image/png, image/jpeg"/>
            </div>

            <?php if($errorPicture):?>
            <div class="error">
                <p>Upload a picture of your masterpiece please.</p>
            </div>
            <?php endif;?>

            <button type="submit" class="submitNewPost">post</button>
            	
            <p class="cancelBtn">cancel</p>
    </section>
    </form>

    <section class="post">
        <header>
            <img src="images/Bailey.jpg" alt="profilePicture">
            <a href="#">username</a>
            <p>10 minutes ago</p>
            <a href="#">...</a>
        </header>
        <div>
            <img src="images/doggo.jpg" alt="postPicture">
            <p>description picture</p>
        </div>
        <section>
            <a href="#">
                like
            </a>
            <a href="#">
                react
            </a>
        </section>
    </section>

    <section class="post">
        <header>
            <img src="images/ellen.jpg" alt="profilePicture">
            <a href="#">username</a>
            <p>10 minutes ago</p>
            <a href="#">...</a>
        </header>
        <div>
            <img src="images/doggo.jpg" alt="postPicture">
            <p>description picture</p>
        </div>
        <section>
            <a href="#">
                like
            </a>
            <a href="#">
                react
            </a>
        </section>
    </section>

    <a href="#" class="loadMore">load more</a>
    <?php include_once("footer.inc.php")?>
    <script src="js/newPost.js"></script>    
</body>
</html>