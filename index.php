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
    <link rel="stylesheet" href="css/instacss.css">
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

    <form id="postForm" action="#" method="POST" enctype="multipart/form-data" onsubmit="submitPost(event)">
        <section id="newPost">
                <div>
                    <div id="imageEditWrapper">
                        <label id="inputLabel" for="inputPicturePost">
                            <figure id="imageWrapper">
                                <img id="imagePreview" for="inputPicturePost" src="images/upload.png" alt="uploadImage">
                            </figure>                        
                        </label>
                        <div id="filterWrapper" style="display: none;">
                            <img class="cycle cycleLeft" src="images/cycleLeft.png" alt="cycleLeftButton">
                            <p id="filterName">No filter selected</p>
                            <img class="cycle cycleRight" src="images/cycleRight.png" alt="cycleRightButton">
                        </div>
                    </div>
                    <input type="file" name="inputPicturePost" id="inputPicturePost" accept="image/png, image/jpeg"/>
                </div>

                <div id="locationCheck">
                    <label for="useLocation">Add your location to your post?</label>
                    <input type="checkbox" id="useLocation" name="useLocation" value="true">
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description" cols="10" rows="3" maxlength="100"></textarea>
                </div>

                <input type="hidden" id="chosenFilter" name="chosenFilter"></input>
                <input type="hidden" id="userCity" name="userCity"></input>
                <input type="hidden" id="userCountry" name="userCountry"></input>

                <button type="submit" name="btnSubmit" class="submitNewPost">post</button>
                    
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
            <?php if($post['filter'] != null):?>
                <figure class="<?php echo($post['filter'])?>">
                    <img src="<?php echo($post['picture'])?>">
                </figure>
            <?php else: ?>
                <figure>
                    <img src="<?php echo($post['picture'])?>">
                </figure>
            <?php endif; ?>
            <?php if($post['city'] != null):?>
                <p>📍<a class="btnLocation" href="search.php?type=city&q=<?php echo($post['city']);?>"><?php echo($post['city']);?></a>, <a class="btnLocation" href="search.php?type=country&q=<?php echo($post['country']);?>"><?php echo($post['country']);?></a></p>
            <?php endif; ?>
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
                <a href="" class="commentBtn" data-postid="<?php echo $post['id'] ?>" >comment</a>
            </div>
            
            <ul class="listComments">
                <?php $comments = Post::getComments($post['id'])?>
                <?php if(!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <ul>
                        <li><?php echo User::getUsernameById($comment['user_id']); ?></li>
                        <li><?php echo Post::timeSincePost($comment['date']); ?></li>
                        <li><?php echo $comment['comment']; ?></li>
                    </ul>
                <?php endforeach; ?>
                <?php else: ?>
                    <ul>
                        <li>No comments yet</li> 
                    </ul>                   
                <?php endif; ?>
            </ul>
            
        </section>
    </section>
    <?php $counter++; ?>
    <?php endforeach; ?>


    <a href="#" id="loadMore" class="loadMore">load more</a>
    <?php include_once("footer.inc.php")?>
    <script src="js/newPost.js"></script>    
    <script src="js/likes.js"></script>  
    <script src="js/comment.js"></script>
</body>
</html>
    
