<?php
    include_once('core/autoload.php');

    if(!empty($_POST)){
        try {
            $user = new User();

            $user->setUsername($_POST["username"]);
            $user->setPassword($_POST["password"]);
            $user->setEmail($_POST["email"]);

            $user->saveDetails();
            
        } catch (\Throwable $e) {
            $errorMessage = $e->getMessage();
            echo ($errorMessage);
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

    <form method="post" class="clearfix">

    <h2>Create a new account</h2>

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
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>

    <div class="submitBtn">
	    <input type="submit" id="submitBtn" value="Sign up">	
    </div>

    <div class="loginLink">
        <a href="login.php">Already created an account? Log in here.</a>
    </div>

</form>

</section>

</body>
</html>