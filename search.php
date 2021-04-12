<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>

<?php if (empty($_GET)) {
    header("Location: index.php");
}?>

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
            <h3><span id="amount_posts">25,566</span> posts</h3>
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
    </section>

    <br>
    <br>
    <br>
    <?php include_once("footer.inc.php")?>
</body>
</html>