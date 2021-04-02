<?php include_once('isloggedin.inc.php');
      include_once('classes/User.php');

    

    
    if (!empty($_POST['edit'])) {
        $user = new User();
        $userid = $_SESSION["userid"];
        $user->setusername($_POST["username"]);
        $user->setemail($_POST["email"]);
        $user->setbio($_POST["bio"]);
        $user->setUserid($userid);
    }
        

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
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
                
                <h1 id="username_header"><?php echo $_SESSION['username']; ?></h1>
                <a id="edit_profile" href="profilePage.php">Go back to profile</a>
            </div>
        </div>

       

        <section id="biography">

        <form action="profilePage.php" method="POST">
        <div>
        <label for="username"><a>Name:</a></label>
        <input type="text" name="username"  value=""/>
        </div>

        <div>
        <label for="email"><a>Email:</a></label>
        <input type="text" name="email"  value=""/>
        </div>
        <div>
        <label for="bio"><a>Bio:</a></label>
        <textarea name="bio" rows="10" cols="30"></textarea>
        </div>

        <input name="edit" type="submit"  value="Update">
        <div>
        </div>

        </form>

    </section>

        </section>

       
    <script src="js/profiel.js"></script>
    <?php include_once("footer.inc.php")?> 
    <script src="js/tabs.js"></script>
</body>
</html>