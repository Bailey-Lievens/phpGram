<?php include_once('core/autoload.php');?>
<?php include_once('isloggedin.inc.php');?>
<?php
    $userId = User::getUserIdByName($_GET['user']);
    $username = User::getUsernameById($userId);
    $biography = User::getBioById($userId);
    $profilePicture = User::getPictureById($userId);

    $userPosts = Post::getPostsById($userId);

    $userFollowing = User::getFollowingById($userId);
    $userFollowers = User::getFollowersById($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($user_info["username"]); ?></title>
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
            <img src="<?php echo($profilePicture);?>" alt="<?php echo("profile_picture_". htmlspecialchars($username) ."");?>" id="profile_picture">
            <div>
                <h1 id="username_header"><?php echo(htmlspecialchars($username));?></h1>
                <?php if($_SESSION["username"] === $_GET["user"]): ?>
                    <a id="edit_profile" href="profileEdit.php">⚙️ Edit profile</a>
                <?php else: ?>
                    <a href="#"class="followButton"> Follow </a>
                <?php endif; ?>
            </div>
        </div>

        <section id="biography">
            <h2>Biography</h2>
            <p><?php echo(htmlspecialchars($biography));?></p>
        </section>
    </section>

    <section id="tabs">
        <div id="tabBar">
            <a class="tabName active" onclick="openTab(event, 'postsTab')">Posts</a>
            <a class="tabName" onclick="openTab(event, 'followersTab')">Followers</a>
            <a class="tabName" onclick="openTab(event, 'followingTab')">Following</a>
        </div>

        <div id="postsTab" class="tab">
            <?php foreach($userPosts as $post): ?>
                <img id="postImg" src="<?php echo $post['picture'] ?>">
            <?php endforeach; ?>
        </div>
        
        <div id="followersTab" class="tab" style="display:none">
            <ul>
                <li>
                    <img src="user_profilepictures/Ellen.jpg">
                    <p>Ellen</p>
                    <a href="#">Follow</a>
                </li>
                <li>
                    <img src="user_profilepictures/Amelie.jpg">
                    <p>Amelie</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
                <li>
                    <img src="user_profilepictures/Bailey.jpg">
                    <p>Bailey</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
            </ul>
        </div>
        
        <div id="followingTab" class="tab" style="display:none">
            <ul>
                <li>
                    <img src="user_profilepictures/Ellen.jpg">
                    <p>Ellen</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
                <li>
                    <img src="user_profilepictures/Amelie.jpg">
                    <p>Amelie</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
                <li>
                    <img src="user_profilepictures/Bailey.jpg">
                    <p>Bailey</p>
                    <a href="#" class="isFollowing">Unfollow</a>
                </li>
            </ul>
        </div>
    </section>  

    <?php include_once("footer.inc.php")?> 
    <script src="js/tabs.js"></script>
</body>
</html>
    
