<?php

    class User{

        private $username;
        private $password;
        private $email;

        const MIN_USERNAME = 5; //Minimum amount of username characters
        const MAX_USERNAME = 20; //Maximum amount of username characters

        const MIN_PASSWORD = 5; //Minimum amount of password characters
        const MAX_PASSWORD = 200; //Maximum amount of password characters
        const MIN_CAPITAL = 1; //Minimum amount of capital characters        

        public function setUsername($username){

            self::checkUsername($username);

            $this->username = $username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setPassword($password){

            self::checkPassword($password);
            
            $options = [
                'cost' => 12,
            ];

            $password = password_hash($password, PASSWORD_BCRYPT, $options);

            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setEmail($email){

            self::checkEmail($email);

            if($this->emailExists($email)){
                throw new Exception("This email has already been registered.");
            }

            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function save(){
            $conn = Database::getConnection();
            $query = $conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            
            $query->bindValue(":username", $this->username);
            $query->bindValue(":password", $this->password);
            $query->bindValue(":email", $this->email);            

            $query->execute();
        }

        private function checkPassword($password){
            if($password == ""){
                throw new Exception("Password cannot be empty.");
            }

            if(strpos($password, " ")){
                throw new Exception("Password cannot contain blank spaces.");
            }

            if(strlen($password) > self::MAX_PASSWORD){
                throw new Exception("Password can only be ". self::MAX_PASSWORD ." characters long.");
            }

            if(strlen($password) < self::MIN_PASSWORD){
                throw new Exception("Password must be at least ". self::MIN_PASSWORD ." characters.");
            }

            if(strlen(preg_replace('![^A-Z]+!', '', $password)) < self::MIN_CAPITAL){
                throw new Exception("Password must contain at least ". self::MIN_CAPITAL ." capital letter.");
            }
        }

        private function checkUsername($username){
            if($username == ""){
                throw new Exception("Username cannot be empty.");
            }

            if(strpos($username, " ")){
                throw new Exception("Username cannot contain blank spaces.");
            }

            if(strlen($username) > self::MAX_USERNAME){
                throw new Exception("Usernames can only be ". self::MAX_USERNAME ." characters long");
            }

            if(strlen($username) < self::MIN_USERNAME){
                throw new Exception("Usernames must be at least ". self::MIN_USERNAME ." characters");
            }

            if($this->usernameExists($username)){
                throw new Exception("This username is taken.");
            }
        }

        private function checkEmail($email){

            if($email == ""){
                throw new Exception("Email cannot be empty.");
            }

            if(!strpos($email, "@") || !strpos($email, ".") || strpos($email, " ") ){
                throw new Exception("Email is invalid");
            }
        }

        private function emailExists($email){ //checks if a record exists with the given email || true -> record found || false -> record not found
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT id FROM users WHERE email = :email");

            $query->bindValue(":email", $email);            
            $query->execute();
            $result = $query->fetch();

            if(!$result){
                return False;
            } else {
                return True;
            }
        }

        private function usernameExists($username){ //checks if a record exists with the given username || true -> record found || false -> record not found
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT id FROM users WHERE username = :username");

            $query->bindValue(":username", $username);            
            $query->execute();
            $result = $query->fetch();

            if(!$result){
                return False;
            } else {
                return True;
            }
        }
    }
?>