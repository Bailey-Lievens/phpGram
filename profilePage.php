<?php include_once('isloggedin.inc.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/profilePage.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 
</head>
<body>
    <?php include_once("navigation.inc.php")?>

    <section id="account_info">
        <div id="account_header">
            <img src="images/Bailey.jpg" alt="Profile picture" id="profile_picture">
            <div>
                <h1 id="username_header">Bailey Lievens</h1>
                <a id="edit_profile" href="#">⚙️ Edit profile</a>
            </div>
        </div>

        <section id="biography">
            <h2>Biography</h2>
            <p>~ Pretentious living being 🕶 <br>
                ~ @bailey.lievens 🖌<br>
                ~ aspiring dilf 🧔</p>
        </section>
    </section>

    <section id="tabs">
        <div id="tabBar">
            <a class="tabName active" onclick="openTab(event, 'postsTab')">Posts</a>
            <a class="tabName" onclick="openTab(event, 'followersTab')">Followers</a>
            <a class="tabName" onclick="openTab(event, 'followingTab')">Following</a>
        </div>

        <div id="postsTab" class="tab">
            <img src="images/doggo.jpg">
            <img src="images/doggo.jpg">
            <img src="images/doggo.jpg">
            <img src="images/doggo.jpg">
            <img src="images/doggo.jpg">
            <img src="images/doggo.jpg">
            <img src="images/doggo.jpg">
            <img src="images/doggo.jpg">
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

    <script src="js/tabs.js"></script>
</body>
</html>