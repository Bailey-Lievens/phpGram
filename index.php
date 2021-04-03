<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>

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
    <section class="new">
        <p>New post</p>
    </section>

    <section id="newPost">
            <div>
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" cols="10" rows="3" maxlength="100"></textarea>
            </div>

            <div class="error">
                <p>Write a description please.</p>
            </div>

            <div>
                <input type="file" name="inputPicturePost" id="inputPicturePost" accept="image/png, image/jpeg"/>
            </div>

            <div class="error">
                <p>Upload a picture of your masterpiece please.</p>
            </div>

            <div class="submitNewPost">
                <a type="submit">post</a>
            </div>
            	
            <p class="cancelBtn">cancel</p>
    </section>

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