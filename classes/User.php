<?php

    class User{

        private $username;
        private $password;
        private $email;

        public function setUsername($username){

            if($username == ""){
                throw new Exception("Username cannot be empty.");
            }

            if(strlen($username) > 20){
                throw new Exception("Usernames can only be 20 characters long");
            }

            if($this->usernameExists($username)){
                throw new Exception("This username is taken.");
            }

            $this->username = $username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setPassword($password){

            if($password == ""){
                throw new Exception("Password cannot be empty.");
            }
            
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

            if($email == ""){
                throw new Exception("Email cannot be empty.");
            }

            if($this->emailExists($email)){
                throw new Exception("This email has already been registered.");
            }

            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function saveDetails(){
            $conn = database::getConnection();
            $query = $conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            
            $query->bindValue(":username", $this->username);
            $query->bindValue(":password", $this->password);
            $query->bindValue(":email", $this->email);            

            $query->execute();
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