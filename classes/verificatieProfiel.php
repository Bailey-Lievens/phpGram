<?php

try {
    $emailAdressen = UserProfile::getEmails();

    if(!empty($_POST["email"]) && empty($_POST["emailVerification"])){
        throw new Exception("Please fill in your password");
    }

    if(!empty($_POST["email"]) && !empty($_POST["emailVerification"])){

        if(password_verify($_POST["emailVerification"], $data["password"])){
            $passwordMatch1 = true;
        }
        else{
            throw new Exception("Can't change you e-mail because password is incorrect");
            $passwordMatch1 = false;
        } 

        if(strpos($_POST["email"], $required) == false){
            throw new Exception("This isn't a correct mail-adress please add @ and .");
            $requiredVerification = false;
        }

        foreach($emailAdressen as $emailAdres){
    
            if($_POST["email"] == $emailAdres["email"]){
                throw new Exception("This e-mail is already taken");
                $emailVerification = false;
            }
        }

        if($passwordMatch1 == true && $requiredVerification == true && $emailVerification == true){
            $_SESSION["user"] = $_POST["email"];
        }

    }

    if(empty($_POST["email"]) && !empty($_POST["emailVerification"])){

        if(password_verify($_POST["emailVerification"], $data["password"])){
            throw new Exception("Fill your new e-mail in");
            
        }
        else{
            throw new Exception("Can't change e-mail because you entered a wrong password");
            $passwordMatch1 = false;
        } 
    }

    if(empty($_POST["email"]) && empty($_POST["emailVerification"])){
        $passwordMatch1 = true;
        $emailVerification = true;
        $requiredVerification = true;
        $_POST["emailVerification"] = $data["password"];
        $_POST["email"] = $data["email"];
    }
    

    

    if(!empty($_POST["passwordVerification"])){
        if(password_verify($_POST["passwordVerification"], $data["password"])){
            $passwordMatch2 = true;
        }
        else{
            throw new Exception("old password is incorrect");
            $passwordMatch2 = false;
        }

        if(empty($_POST["password"]) && empty( $_POST["passwordConfirmation"])){
            throw new Exception("You need to fill in your new password");
        }

        if(!empty($_POST["password"]) && !empty( $_POST["passwordConfirmation"]) && $_POST["password"] != $_POST["passwordConfirmation"] && $passwordMatch2 == true){
            throw new Exception("Your passwords are not the same");
            $passwordVerification = false;
        }

        if(!empty($_POST["password"]) && !empty( $_POST["passwordConfirmation"]) && $_POST["password"] == $_POST["passwordConfirmation"] && $passwordMatch2 == true){
            $securePassword = password_hash($_POST["password"], PASSWORD_DEFAULT, ["cost" => 14]);
        }
    }
    else{
        if(!empty($_POST["passwordConfirmation"]) && !empty( $_POST["password"])){
            throw new Exception("You need to give your old password before you can change it");
        }
        else{
            $passwordMatch2 = true;
            $passwordVerification = true;
            $_POST["passwordVerification"] = $data["password"];
            $_POST["passwordConfirmation"] = $data["password"];
            $_POST["password"] = $data["password"];
            $securePassword = $data["password"];
        }
    }

   

    if(!empty($_POST["bio"])){

        if(strlen($_POST["bio"]) <= 300){
            $descLengthOK = true;
        }
        else{
            throw new Exception("You're bio is too long (max 300 characters)");
            $descLengthOK = false;
        }
    }
    else{
        $_POST["bio"] = $data["bio"];
        $descLengthOK = true;
    }

    foreach($_POST as $key1 => $post){
       
        if(empty($post)){
            
            foreach($data as $key2 => $item){
                if($key1 == $key2){
                    $post = $item;
                }
            }
        }
        $_POST[$key1] = $post;
    }

    
    $userPro->setname($_POST["username"]);
    $userPro->setEmail($_POST["email"]);
    $userPro->setPassword($securePassword);
    $userPro->setDescription($_POST["bio"]);
    


} catch (\Throwable $th) {
    $error = $th->getMessage();
}

?>