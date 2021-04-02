<?php
    include_once('core/autoload.php');
    
    

    if($_SESSION["loggedin"]) {
        header("Location: index.php");   
    }

    $user = new user();

    if(!empty($_POST)) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        if($user->canLogin($username, $password)) {
            session_start(); 
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION["userid"] = $user->getUserId($username);

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
    <div class="registrationLink">
        <a href="registration.php">No account yet? Create one now.</a>
    </div>

</form>

</section>
</body>
</html>