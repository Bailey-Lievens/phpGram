<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>

<?php 
    //If user somehow goes to this page without a search parameter redirect to index.php
    if (empty($_GET)) {
        header("Location: index.php");
    }

    //Set title and posts based on the type of search that has been requested 
    if($_GET["type"] == "tag") {
        $title = "#".$_GET["q"];
        $posts = Post::getPostsByTag($_GET["q"]);
    }else{
        $title = "📍".ucfirst($_GET["q"]);
        if($_GET["type"] == "city") {
            $posts = Post::getPostsByCity(ucfirst($_GET["q"]));
        }else{
            $posts = Post::getPostsByCountry(ucfirst($_GET["q"]));
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($title);?> </title>

    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="css/instacss.css">
    <link rel="icon" href="images/favico.ico">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style>
</head>

<body>
    <?php include_once("navigation.inc.php")?>

    <section id="tag_posts">

        <section id="tag_title_section">
            
            <h1 id="tag_title"><?php echo($title);?></h1>
            <h3><span id="amount_posts"><?php echo count($posts)?></span> 
                <?php if (count($posts) != 1) {
                    echo("posts");
                } else {
                    echo("post");
                }?>
            </h3>
        </section>

        <?php $counter = 0; ?>
        <!-- counter to know which span we're in -->
        <?php foreach($posts as $post):?>

        <section class="post">
            <header>
                <img src="<?php echo($post["profile_picture"]) ?>"
                    <?php echo("alt='profilePicture_".htmlspecialchars($post["username"])."'")?>>
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
                <?php echo("<p>". htmlspecialchars($post["description"]) ."</p>")?>
            </div>
            <section>
                <?php if(Like::isLiked($_SESSION['userid'] , $post['id'])):?>
                <a href="" class="btnAddLike unlike" data-postid="<?php echo $post['id'] ?>" data-liked="true"
                    data-span="<?php echo $counter; ?>">unlike</a>
                <?php else: ?>
                <a href="" class="btnAddLike like" data-postid="<?php echo $post['id'] ?>" data-liked="false"
                    data-span="<?php echo $counter; ?>">like</a>
                <?php endif; ?>
                <?php if(Like::getAmountLikes($post['id']) == 1): ?>
                <p id="amountLikes"><span class="countLikes"><?php echo Like::getAmountLikes($post['id']) ?></span> like
                </p>
                <?php else: ?>
                <p id="amountLikes"><span class="countLikes"><?php echo Like::getAmountLikes($post['id']) ?></span>
                    likes</p>
                <?php endif; ?>
                <div class="comment">
                    <input type="text" placeholder="Add a comment">
                    <a href="" class="commentBtn" data-postid="<?php echo $post['id'] ?>">comment</a>
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
                </div>
            </section>

            </section>
        </section>
        <?php $counter++; ?>
        <?php endforeach;?>
    </section>

    <br>
    <br>
    <br>
    <?php include_once("footer.inc.php")?>
    <script src="js/likes.js"></script>
    <script src="js/postPreview.js"></script>
    <script src="js/comment.js"></script>
</body>

</html>