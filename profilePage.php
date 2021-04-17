<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>
<?php
    $conn = Database::getConnection();
    $query = $conn->prepare("SELECT id FROM users WHERE username = :username");
    $query->bindValue(":username", $_SESSION['username']);            
    $query->execute();
    $result = $query->fetch();
    $userid = $result['id'];

    $users = $conn->query("SELECT * FROM users WHERE username = '" .  $_GET['user']  ."' ");
    $users->execute();
    $userpage = $users->fetchAll();

    $pictures = $conn->query("SELECT * FROM posts WHERE user_id = '" .  $userid  ."' ");
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

    <?php foreach($userpage as $u): ?>
    <section id="account_info">
        <div id="account_header">
            <img src="images/Bailey.jpg" alt="Profile picture" id="profile_picture">
            <div>
                <h1 id="username_header"><?php echo $u['username'] ?> </h1>
                <?php if($userid === $u['id']): ?>
                    <a id="edit_profile" href="profileEdit.php">⚙️ Edit profile</a>
                <?php endif; ?>
            </div>
        </div>

        <section id="biography">
            <h2>Biography</h2>
            <p><?php echo $u['biography'] ?></p>
        </section>
    </section>
    <?php endforeach; ?>

    <section id="tabs">
        <div id="tabBar">
            <a class="tabName active" onclick="openTab(event, 'postsTab')">Posts</a>
            <a class="tabName" onclick="openTab(event, 'followersTab')">Followers</a>
            <a class="tabName" onclick="openTab(event, 'followingTab')">Following</a>
        </div>

        <div id="postsTab" class="tab">
            <?php foreach($picture as $p): ?>
                <img src="<?php echo $p['picture'] ?>">
            <?php endforeach; ?>
        </div>
        
        <div id="followersTab" class="tab" style="display:none">
            <ul>
                <li>
                    <img src="images/Ellen.jpg">
                    <p>Ellen</p>
                    <a href="#">Follow</a>
                </li>
                <li>
                    <img src="images/Amelie.jpg">
                    <p>Amelie</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
                <li>
                    <img src="images/doggo.jpg">
                    <p>best Doggo</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
            </ul>
        </div>
        
        <div id="followingTab" class="tab" style="display:none">
            <ul>
                <li>
                    <img src="images/Ellen.jpg">
                    <p>Ellen</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
                <li>
                    <img src="images/Amelie.jpg">
                    <p>Amelie</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
                <li>
                    <img src="images/doggo.jpg">
                    <p>best Doggo</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
            </ul>
        </div>
    </section>  

    <?php include_once("footer.inc.php")?> 
    <script src="js/tabs.js"></script>
</body>
</html>