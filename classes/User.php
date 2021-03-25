<?php

    class User{

        private $username;
        private $password;
        private $email;

        public function setUsername($username){
            $this->username = real_escape_string($username);
        }

        public function getUsername(){
            return $this->username;
        }

        public function setPassword($password){
            
            $options = [
                'cost' => 12,
            ];

            $password = password_hash(real_escape_string($password), PASSWORD_BCRYPT, $options);

            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setEmail($email){
            $this->email = real_escape_string($email);
        }

        public function getEmail(){
            return $this->email;
        }

        public function saveDetails(){
            include_once('database/database_connection.inc.php');

            $query = $conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            
            $query->bindValue(":username", $this->username);
            $query->bindValue(":password", $this->password);
            $query->bindValue(":email", $this->email);            

            $query->execute();
        }
    }
?>