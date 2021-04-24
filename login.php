<?php
    include_once('core/autoload.php');
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) {
      header("Location: index.php");   
    }

    if(isset($_POST["aanmelden"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(User::canLogin($username, $password)) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION["userid"] = User::getUserIdByName($username);

            header("Location: index.php");
        } else {
            $error = "Username or password are incorrect.";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/registrationLogin.css"/>
    <link rel="icon" href="images/favico.ico">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 

    <title>Document</title>
</head>
<body>
    
<section class="flex">

<div id="logo-container">
    <img src="images/logo.png" alt="logo">
</div>

<form action="" method="post">

    <h2>Meld je aan</h2>

    <?php if(isset($error)):?>
        <div class="error" style="color: white;">
        <?php echo $error;?></div>
    <?php endif;?>

    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div class="submitBtn">
	    <input type="submit" name="aanmelden" id="submitBtn" value="Aanmelden">	
    </div>
    <div class="registrationLink">
        <a href="registration.php">No account yet? Create one now.</a>
    </div>

</form>

</section>
</body>
</html>