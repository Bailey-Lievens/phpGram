<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>
<?php include_once('posting.inc.php');?>
<?php
    $conn = Database::getConnection();
    $users = $conn->query("SELECT * FROM users");
    $users->execute();
    $user = $users->fetchAll();
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
    <link rel="icon" href="images/favico.ico">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 

</head>
<body>
    <?php include_once("navigation.inc.php")?>
    <section>
        <br>
        <p class="new">New post</p>
    </section>
    
    <?php if($postOK): ?>
        <section class="congrats">
            <p>Congrats your masterpiece is posted!</p>
        </section>
    <?php endif; ?>

    <?php if(isset($error)):?>
        <section class="congrats red"> 
            <p><?php echo $error;?></p>
        </section>
    <?php endif;?>

    <form action="" method="POST" enctype="multipart/form-data">
        <section id="newPost">
                <div>
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description" cols="10" rows="3" maxlength="100"><?php if(empty($picture)) echo htmlspecialchars($description); ?></textarea>
                </div>

                <div>
                    <input type="file" name="inputPicturePost" id="inputPicturePost" accept="image/png, image/jpeg"/>
                </div>

                <button type="submit" name="submit" class="submitNewPost">post</button>
                    
                <p class="cancelBtn">cancel</p>
        </section>
    </form>

    <?php foreach($user as $u): ?>
    <section class="post">
        <header>
            <img src="images/Bailey.jpg" alt="profilePicture">
            <a href="user.php?id=<?php echo $u['id']?>"><?php echo $u['username']?></a>
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
    <?php endforeach; ?>

    <a href="#" class="loadMore">load more</a>
    <?php include_once("footer.inc.php")?>
    <script src="js/newPost.js"></script>    
</body>
</html>