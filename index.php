<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>
<?php include_once('posting.inc.php');?>
<?php
    $posts = Post::getPostsFromFollowing($_SESSION['userid']);
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
    
    <?php if(isset($postOK)): ?>
        <section class="congrats">
            <p>Congrats your masterpiece is posted!</p>
        </section>
    <?php endif; ?>

    <?php if(isset($error)):?>
        <section class="congrats red"> 
            <p><?php echo $error;?></p>
        </section>
    <?php endif;?>

    <form action="#" method="POST" enctype="multipart/form-data">
        <section id="newPost">
                <div>
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description" cols="10" rows="3" maxlength="100"></textarea>
                </div>

                <div>
                    <input type="file" name="inputPicturePost" id="inputPicturePost" accept="image/png, image/jpeg"/>
                </div>

                <button type="submit" name="submit" class="submitNewPost">post</button>
                    
                <p class="cancelBtn">cancel</p>
        </section>
    </form>

    <?php $counter = 0; ?> <!-- counter to know which span we're in -->
    <?php foreach($posts as $post):?>

    <section class="post">
        <header>
            <img src="<?php echo($post['profile_picture'])?>" alt="profilePicture">
            <?php echo("<a href='profilePage.php?user=". htmlspecialchars($post["username"]) ."'> ". htmlspecialchars($post["username"]) ." </a>")?>
            <?php echo("<p>". Post::timeSincePost($post["date"]) ."</p>")?>
            <a href="#">...</a>
        </header>
        <div>
            <img src="<?php echo $post['picture'] ?>" alt="postPicture">
            <p><?php echo htmlspecialchars($post['description']) ?></p>
        </div>
        <section>
            <?php if(User::isLiked($_SESSION['userid'] , $post['id'])):?>
                <a href="" class="btnAddLike unlike" data-postid="<?php echo $post['id'] ?>" data-liked="true" data-span="<?php echo $counter; ?>" >unlike</a>
            <?php else: ?>
                <a href="" class="btnAddLike like" data-postid="<?php echo $post['id'] ?>" data-liked="false" data-span="<?php echo $counter; ?>" >like</a>
            <?php endif; ?>
            <?php if(Post::getAmountLikes($post['id']) == 1): ?>
        <p id="amountLikes"><span class="countLikes"><?php echo Post::getAmountLikes($post['id']) ?></span> like</p>
            <?php else: ?>
        <p id="amountLikes"><span class="countLikes"><?php echo Post::getAmountLikes($post['id']) ?></span> likes</p>
            <?php endif; ?>
            <div class="comment">
                <input type="text" placeholder="Add a comment">
                <a href="" class="reactBtn">comment</a>
            </div>
            <ul class="listComments">
                <ul>
                    <li>username</li>
                    <li>2 min ago</li>
                    <br>
                    <li>extreme long comment blablajbfb ueiebjnzef hurbzjd aedbeu zjdnoe hubzjd ubifzndvbzhfjne bncdbhbjb</li>
                </ul>
                <ul>
                    <li>username</li>
                    <li>2 min ago</li>
                    <br>
                    <li>comment</li>
                </ul>
            </ul>
        </section>
    </section>
    <?php $counter++; ?>
    <?php endforeach; ?>

    <a href="#" id="loadMore" class="loadMore">load more</a>
    <?php include_once("footer.inc.php")?>
    <script src="js/newPost.js"></script>    
    <script src="js/likes.js"></script>  
</body>
</html>
    
