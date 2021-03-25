<?php
    include_once('registration.inc.php');
    include_once('database/database_connection.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/registratieLogin.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 

    <title>Document</title>
</head>
<body>
    
<section class="flex">

<div id="logo-container">
    <img src="images/woordlogo.png" alt="logo">
</div>

<form action="" method="post">

    <h2>Meld je aan</h2>

    <?php if(isset($error)):?>
        <div class="error" style="color: white;">
        <?php echo $error;?></div>
    <?php endif;?>

    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>

    <div class="submitBtn">
	    <input type="submit" id="submitBtn" value="Aanmelden">	
    </div>
    <div class="registratieLink">
        <a href="registratie.php">No account yet? Create one now.</a>
    </div>

</form>

</section>
</body>
</html>