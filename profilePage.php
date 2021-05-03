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
    <title><?php echo($username); ?></title>
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
                    <?php if(User::isFollowing($_SESSION['userid'] , $userId)):?>
                        <a href="#"class="followButton" data-user="<?php echo($userId); ?>" data-following="false"> Follow </a>
                    <?php else: ?>
                        <a href="#"class="followButton isFollowing" data-user="<?php echo($userId); ?>" data-following="true"> Unfollow </a>
                    <?php endif; ?>
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
            <?php if($_SESSION["username"] === $_GET["user"]): ?>
                <a class="tabName" onclick="openTab(event, 'requestsTab')">Requests</a>
            <?php endif; ?>   
        </div>

        <div id="postsTab" class="tab">
            <?php foreach($userPosts as $post): ?>
                <img class="postImg " src="<?php echo $post['picture'] ?>">
                <?php if($_SESSION["username"] === $_GET["user"]): ?>
                <a href="" class="deletePost " data-post="<?php echo $post['id']; ?>"><img src="images/svg.svg" alt="svg"></a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <div id="followersTab" class="tab" style="display:none">
            <ul>
                <?php foreach($userFollowers as $follower): ?>
                    <li>
                        <a id="profileLink" href="profilePage.php?user=<?php echo(htmlspecialchars($follower['username']));?>"><img src="<?php echo $follower['profile_picture'] ?>"></a>
                        <a id="profileLink" href="profilePage.php?user=<?php echo(htmlspecialchars($follower['username']));?>"><p><?php echo(htmlspecialchars($follower['username'])); ?></p></a>
                        
                        <?php if (User::isFollowing($userId, $follower['id'])):?>
                            <a href="#" class="followButton" data-user="<?php echo($follower['id']); ?>" data-following="false"> Follow </a>
                        <?php else: ?>
                            <a href="#" class="isFollowing followButton" data-user="<?php echo($follower['id']); ?>" data-following="true"> Unfollow </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div id="followingTab" class="tab" style="display:none">
            <ul>
                <?php foreach($userFollowing as $follower): ?>
                    <li>
                        <a id="profileLink" href="profilePage.php?user=<?php echo(htmlspecialchars($follower['username']));?>"><img src="<?php echo $follower['profile_picture'] ?>"></a>
                        <a id="profileLink" href="profilePage.php?user=<?php echo(htmlspecialchars($follower['username']));?>"><p><?php echo(htmlspecialchars($follower['username'])); ?></p></a>
                        
                        <?php if (User::isFollowing($userId, $follower['id'])):?>
                            <a href="#" class="followButton" data-user="<?php echo($follower['id']); ?>" data-following="false"> Follow </a>
                        <?php else: ?>
                            <a href="#" class="followButton isFollowing" data-user="<?php echo($follower['id']); ?>" data-following="true"> Unfollow </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php if($_SESSION["username"] === $_GET["user"]): ?>
        <div id="requestsTab" class="tab" style="display:none">
            <ul>
                <li>
                    <a id="profileLink" href="profilePage.php?user=<?php echo(htmlspecialchars("username"));?>"><img src="images/doggo.jpg"></a>
                    <a id="profileLink" href="profilePage.php?user=<?php echo(htmlspecialchars("username"));?>"><p><?php echo(htmlspecialchars("username")); ?></p></a>    
                
                    <a href="#" class="acceptButton" data-user="<?php echo("username"); ?>" data-accept="true"> Accept </a>
                    <a href="#" class="declineButton" data-user="<?php echo("username"); ?>" data-accept="false"> Decline </a> 
                </li>
            </ul>
        </div>
        <?php endif; ?>
    </section>  

    <?php include_once("footer.inc.php")?> 
    <script src="js/tabs.js"></script>
    <script src="js/follow.js"></script>
    <script src="js/deletePost.js"></script>
</body>
</html>
    
