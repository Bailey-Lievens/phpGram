<?php include_once('core/autoload.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengram</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/index.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 

</head>
<body>
    <?php include_once("navigation.inc.php")?>
    <section class="post">
        <header>
            <img src="https://via.placeholder.com/150" alt="profilePicture">
            <a href="#">username</a>
            <p>10 minutes ago</p>
            <a href="#">...</a>
        </header>
        <div>
            <img src="https://via.placeholder.com/250" alt="postPicture">
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
            <img src="https://via.placeholder.com/150" alt="profilePicture">
            <a href="#">username</a>
            <p>10 minutes ago</p>
            <a href="#">...</a>
        </header>
        <div>
            <img src="https://via.placeholder.com/250" alt="postPicture">
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
</body>
</html>