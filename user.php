<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>
<?php
    $conn = Database::getConnection();
    $users = $conn->query("SELECT * FROM users WHERE id = '" .  $_GET['id']  ."' ");
    $users->execute();
    $user = $users->fetchAll();
    
    $pictures = $conn->query("SELECT * FROM posts WHERE user_id = '" .  $_GET['id']  ."' ");
    $pictures->execute();
    $picture = $pictures->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/profilePage.css">
    <link rel="icon" href="images/favico.ico">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 
</head>
<body>
    <?php include_once("navigation.inc.php")?>

    <section id="account_info">
        <div id="account_header">
            <img src="images/Bailey.jpg" alt="Profile picture" id="profile_picture">
            <?php foreach($user as $u): ?>
            <div>
                <h1 id="username_header"><?php echo $u['username']?></h1>
            </div>
            <?php endforeach; ?>
        </div>

        <section id="biography">
            <h2>Biography</h2>
            <?php foreach($user as $u): ?>
            <p><?php echo $u['biography']?></p>
            <?php endforeach; ?>
        </section>
    </section>

    <div id="postsTab">
        <img src="images/doggo.jpg">
        <img src="images/doggo.jpg"> 
        <img src="images/doggo.jpg">  
    </div>
    
    <?php include_once("footer.inc.php")?> 
</body>
</html>