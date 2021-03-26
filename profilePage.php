<?php 
    include_once('isloggedin.inc.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/general.css"/>
    <link rel="stylesheet" type="text/css" href="css/profilePage.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 
</head>
<body>
    <header>
        <?php include ("navigation.inc.php"); ?>
    </header>
    
<section class="flex">

    <div id="logo-container">
        <img src="images/woordlogo.png" alt="logo">
    </div>

    <form action="" method="post" class="clearfix">

    <h2>Maak een nieuw account</h2>

    <?php if(isset($error)):?>
        <div class="error" style="color: white;">
        <?php echo $error;?></div>
    <?php endif;?>

    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
    </div>

    <div>
        <label for="password">Wachtwoord</label>
        <input type="password" id="password" name="password">
    </div>

    <div class="submitBtn">
	    <input type="submit" id="submitBtn" value="Bevestig">	
    </div>

    <div class="loginLink">
        <a href="login.php">Heb je al een account? Log hier in.</a>
    </div>

</form>

</section>

</body>
</html>