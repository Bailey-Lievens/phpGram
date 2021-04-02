<?php include_once('isloggedin.inc.php');
      include_once('classes/adjustProfile.php');
      
      session_start();

$userPro = new UserProfile;
$userPro->setUser($_SESSION["id"]);

$data = $userPro->fetchData();

$emailVerification = true;
$required = "@";
$requiredVerification = true;
$passwordVerification = true;
$passwordMatch1 = true;
$passwordMatch2 = true;
$securePassword;


if(!empty($_POST)){
    include_once(__DIR__ . "/classes/verificatieProfile.php");  
}

      ?>

      
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
                <a id="edit_profile" href="profilePage.php">Go back to profile</a>
            </div>
        </div>

       

        <section id="biography">

        <form id="form" action="" method="post" enctype="multipart/form-data">

<?php if(isset($error)):?>
<div class="error" style="color: red;"><?php echo $error;?></div>
<?php endif;?>
<h2>Change my name</h2>
<div>
    <p> <?php echo htmlspecialchars($data["username"]) ?></p>
    <label for="username" class="showInput changeLabel">new name</label>
    <input class="inputField showInput" type="text" id="username" name="username">
</div>
<h2>Change my password</h2>
<div id="passChange">
    <label for="passwordVerification" class="showInput changeLabel">old Password</label>
    <input class="inputField showInput" type="password" id="passwordVerification"
        name="passwordVerification">

    <label for="password" class="showInput changeLabel">new password</label>
    <input class="inputField showInput" type="password" id="password" name="password">

    <label for="passwordConfirmation" class="showInput changeLabel">confirm new password</label>
    <input class="inputField showInput" type="password" id="passwordConfirmation"
        name="passwordConfirmation">
</div>

<h2>Change my email</h2>
<div id="emailChange">
    <p><?php echo htmlspecialchars($data["email"]) ?></p>
    <label for="emailVerification" class="showInput changeLabel">Password</label>
    <input class="inputField showInput" type="password" id="emailVerification" name="emailVerification">

    <label for="email" class="showInput changeLabel">New emailadres</label>
    <input class="inputField showInput" type="text" id="email" name="email">
</div>

<h2>Change my bio</h2>
<div>
    <p><?php echo htmlspecialchars($data["bio"]) ?></p>
    <input class="inputField showInput" type="text" id="bio" name="bio">
</div>
</br>
<div>
    <input type="submit" id="submitBtn" class="hide" value="confirm changes">
    <a href='javascript:void();' id="changeProfileBtn" onclick="changeProfile()">adjust profile</a>

</div>

</form>

    </section>

        </section>

       
    <script src="js/profiel.js"></script>
    <?php include_once("footer.inc.php")?> 
    <script src="js/tabs.js"></script>
</body>
</html>