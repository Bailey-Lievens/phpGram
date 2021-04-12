<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>

<?php 
    if (empty($_GET)) {
        header("Location: index.php");
    }

    $conn = Database::getConnection();
    $query = $conn->prepare("SELECT username, description, picture, date FROM posts INNER JOIN users ON posts.user_id = users.id WHERE description like CONCAT( '%', :searchQ, '%')");

    $query->bindValue(":searchQ","#".$_GET[q]);
    $query->execute();
    $result = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#<?php echo $_GET[q]?> </title>

    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">
    <link rel="icon" href="images/favico.ico">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 
</head>
<body>
    <?php include_once("navigation.inc.php")?>
    
    <section id="tag_posts">

        <section id="tag_title_section">
            
            <h1 id="tag_title">#<?php echo $_GET[q]?></h1>
            <h3><span id="amount_posts"><?php echo count($result)?></span> posts</h3>
        </section>

        <?php foreach($result as $post):?>

            <?php var_dump($post);?>
        
            <section class="post">
                <header>
                    <img src="images/Bailey.jpg" <?php echo("alt='profilePicture_".$post["username"]."'")?>> <!-- Add path to profile image-->
                    <?php echo("<a href='profilePage.php?user='". $post["username"] ."> ". $post["username"] ." </a>")?>
                    <p>10 minutes ago</p>
                    <a href="#">...</a>
                </header>
                <div>
                    <img src="images/doggo.jpg" alt="postPicture"> <!-- Add path to post image-->
                    <?php echo("<p>". $post["description"] ."</p>")?> 
                </div>
                <section>
                    <a href="#">like</a>
                    <a href="#">react</a>
                </section>
            </section>

        <?php endforeach;?>
    </section>

    <br>
    <br>
    <br>
    <?php include_once("footer.inc.php")?>
</body>
</html>