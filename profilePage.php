<?php include_once('core/autoload.php');?>
<?php include_once('isloggedIn.inc.php');?>
<?php
    $userId = $_GET["q"];
    $username = User::getUsernameById($userId);
    $biography = User::getBioById($userId);
    $profilePicture = User::getPictureById($userId);

    $userPosts = Post::getPostsById($userId);

    $userFollowing = User::getFollowingById($userId);
    $userFollowers = User::getFollowersById($userId);

    $requests = User::hasRequests($_SESSION['userId']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo(htmlspecialchars($username)); ?></title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/profilePage.css">
    <link rel="stylesheet" href="css/instacss.css">
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

                <?php if($_SESSION["userId"] === $_GET["q"]): ?>
                    <a id="edit_profile" href="profileEdit.php">⚙️ Edit profile</a>
                <?php else: ?>

                    <?php if(User::isFollowing($_SESSION['userId'] , $userId) && User::isPrivate($userId) && User::isRequested($_SESSION["userId"], $userId)):?>
                        <a href="" class="requestButton isRequested" data-user="<?php echo($userId); ?>" data-requested="true">Cancel request</a>
                    <?php elseif(User::isFollowing($_SESSION['userId'] , $userId) && User::isPrivate($userId)):?>
                        <a href=""class="requestButton" data-user="<?php echo($userId); ?>" data-requested="false"> Send request </a>
                    <?php elseif(!User::isFollowing($_SESSION['userId'] , $userId)): ?> 
                        <a href="#"class="followButton isFollowing" data-user="<?php echo($userId); ?>" data-following="true"> Unfollow </a>
                    <?php else: ?>
                        <a href="#"class="followButton" data-user="<?php echo($userId); ?>" data-following="false"> Follow </a>
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
            <?php if($_SESSION["userId"] === $_GET["q"] && User::isPrivate($userId)): ?>
                <a class="tabName" onclick="openTab(event, 'requestsTab')">Requests</a>
            <?php endif; ?>   
        </div>

        <div id="postsTab" class="tab">
            <?php foreach($userPosts as $post): ?>

                <div>
                <?php if($post['filter'] != null):?>
                    <figure class="<?php echo($post['filter'])?>">
                        <img class="postImg" src="<?php echo($post['picture'])?>">
                    </figure>
                <?php else: ?>
                    <figure>
                        <img class="postImg" src="<?php echo($post['picture'])?>">
                    </figure>
                <?php endif; ?>
                </div>

                <?php if($_SESSION["userId"] === $_GET["q"]): ?>
                    <a href="" class="deletePost "><img src="images/svg.svg" alt="svg" data-post="<?php echo $post['id']; ?>"></a>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>

        <form >
            <input type="hidden" id="userId" name="userId" value=<?php echo $userId; ?>>
            <input type="hidden" id="postsNum" name="postsNum" value=<?php echo count($userPosts ); ?>>
            <button type="submit" id="loadMore"  class="loadMore">load more</button>
        </form>

        <div id="followersTab" class="tab" style="display:none">
            <ul>
                <?php foreach($userFollowers as $follower): ?>
                    <li>
                        <a id="profileLink" href="profilePage.php?q=<?php echo($follower['id']);?>"><img src="<?php echo $follower['profile_picture'] ?>"></a>
                        <a id="profileLink" href="profilePage.php?q=<?php echo($follower['id']);?>"><p><?php echo(htmlspecialchars($follower['username'])); ?></p></a>
                        
                        <?php if(User::isFollowing($_SESSION['userId'] , $follower['id']) && User::isPrivate($follower['id']) && User::isRequested($_SESSION["userId"], $follower['id'])):?>
                            <a href="" class="requestButton isRequested" data-user="<?php echo($follower['id']); ?>" data-requested="true">Cancel request</a>
                        <?php elseif(User::isFollowing($_SESSION['userId'] , $follower['id']) && User::isPrivate($follower['id'])):?>
                            <a href=""class="requestButton" data-user="<?php echo($follower['id']); ?>" data-requested="false"> Send request </a>
                        <?php elseif(!User::isFollowing($_SESSION['userId'] , $follower['id'])): ?> 
                            <a href="#"class="followButton isFollowing" data-user="<?php echo($follower['id']); ?>" data-following="true"> Unfollow </a>
                        <?php else: ?>
                            <a href="#"class="followButton" data-user="<?php echo($follower['id']); ?>" data-following="false"> Follow </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div id="followingTab" class="tab" style="display:none">
            <ul>
                <?php foreach($userFollowing as $follower): ?>
                    <li>
                        <a id="profileLink" href="profilePage.php?q=<?php echo($follower['id']);?>"><img src="<?php echo $follower['profile_picture'] ?>"></a>
                        <a id="profileLink" href="profilePage.php?q=<?php echo($follower['id']);?>"><p><?php echo(htmlspecialchars($follower['username'])); ?></p></a>
                        
                        <?php if(User::isFollowing($_SESSION['userId'] , $follower['id']) && User::isPrivate($follower['id']) && User::isRequested($_SESSION["userId"], $follower['id'])):?>
                            <a href="" class="requestButton isRequested" data-user="<?php echo($follower['id']); ?>" data-requested="true">Cancel request</a>
                        <?php elseif(User::isFollowing($_SESSION['userId'] , $follower['id']) && User::isPrivate($follower['id'])):?>
                            <a href=""class="requestButton" data-user="<?php echo($follower['id']); ?>" data-requested="false"> Send request </a>
                        <?php elseif(!User::isFollowing($_SESSION['userId'] , $follower['id'])): ?> 
                            <a href="#"class="followButton isFollowing" data-user="<?php echo($follower['id']); ?>" data-following="true"> Unfollow </a>
                        <?php else: ?>
                            <a href="#"class="followButton" data-user="<?php echo($follower['id']); ?>" data-following="false"> Follow </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php if($_SESSION["userId"] == $_GET["q"] && User::isPrivate($userId)): ?>
        <div id="requestsTab" class="tab" style="display:none">
            <ul>
                <?php foreach($requests as $request): ?>
                    <li>
                        <a id="profileLink" href="profilePage.php?q=<?php echo($request["requester_id"]);?>"><img src="<?php echo User::getPictureById($request["requester_id"]); ?>"></a>
                        <a id="profileLink" href="profilePage.php?q=<?php echo($request["requester_id"]);?>"><p><?php echo htmlspecialchars(User::getUsernameById($request["requester_id"])); ?></p></a>    
                    
                        <a href="" class="acceptButton" data-requester="<?php echo $request["requester_id"]; ?>"> Accept </a>
                        <a href="" class="declineButton" data-requester="<?php echo $request["requester_id"]; ?>"> Decline </a> 
                    </li>
                <?php endforeach; ?>    
            </ul>
        </div>
        <?php endif; ?>
    </section>  

    <?php include_once("footer.inc.php")?> 
    <script src="js/tabs.js"></script>
    <script src="js/follow.js"></script>
    <script src="js/loadMoreProfile.js"></script>
    <script src="js/deletePost.js"></script>
    <script src="js/requests.js"></script>
    <script src="js/sendRequest.js"></script>
</body>
</html>
    
