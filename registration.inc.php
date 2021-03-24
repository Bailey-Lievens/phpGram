<?php
    include_once('core/autoload.php');

    if(!empty($_POST)){    
        $user = new User();

        $user->setUsername($_POST["username"]);
        $user->setPassword($_POST["password"]);
        $user->setEmail($_POST["email"]);

        $user->saveDetails();
    }


?>