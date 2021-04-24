    <?php
    class User{

        private $userid;
        private $username;
        private $password;
        private $email;
        private $biography;
        private $image;

        const MIN_USERNAME = 5; //Minimum amount of username characters
        const MAX_USERNAME = 20; //Maximum amount of username characters

        const MIN_PASSWORD = 5; //Minimum amount of password characters
        const MAX_PASSWORD = 200; //Maximum amount of password characters
        const MIN_CAPITAL = 1; //Minimum amount of capital characters    
        const MAX_BIO = 350;  //Maximum amount of bio characters   

        function canLogin($username, $password) {
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $query->bindValue(":username", $username);
            $query->execute();

            $user = $query->fetch();
            $hash = $user['password'];

            if(!$user) {
                return false;
            }
            
            if(password_verify($password, $hash)) {
                return true;
            } else {
                return false;
            }
        }

        public static function getUserIdByName($username){
            $conn = Database::getConnection();
            $query = $conn->prepare("SELECT id FROM users WHERE username = :username");

            $query-> bindValue(":username", $username);
            $query->execute();
            $result = $query->fetch();

            return $result['id']; 
        }

        public function setUsername($username){

            self::checkUsername($username);

            $this->username = $username;
        }

        public function getUsername(){
            return $this->username;
        }

        public static function getUsernameById($userId){
            $conn = Database::getConnection(); 
            $query = $conn->prepare("SELECT username FROM users WHERE id = :userId");
            $query->bindValue(":userId", $userId);
            $query->execute();
            $username = $query->fetch();
            return $username["username"];
        }

        public function setPassword($password){
            self::checkPassword($password);
            
            $options = [
                'cost' => 12,
            ];

            $password = password_hash($password, PASSWORD_BCRYPT, $options);

            $this->password = $password;
            return $this;
        }

        public function getPassword(){
            return $this->password;
        }

        public static function getPasswordById($userId){
            $conn = Database::getConnection(); 
            $query = $conn->prepare("SELECT password FROM users WHERE id = :userId");
            $query->bindValue(":userId", $userId);
            $query->execute();
            $password = $query->fetch();
            return $password["password"];
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

        public static function getEmailById($userId){
            $conn = Database::getConnection(); 
            $query = $conn->prepare("SELECT email FROM users WHERE id = :userId");
            $query->bindValue(":userId", $userId);
            $query->execute();
            $email = $query->fetch();
            return $email["email"];
        }

        public function setBio($biography){
            $this->biography = $biography;
        }

        public function getBio(){
            return $this->biography;
        }

        public static function getBioById($userId){
            $conn = Database::getConnection(); 
            $query = $conn->prepare("SELECT biography FROM users WHERE id = :userId");
            $query->bindValue(":userId", $userId);
            $query->execute();
            $bio = $query->fetch();
            return $bio["biography"];
        }

        public static function getPictureById($userId){
            $conn = Database::getConnection(); 
            $query = $conn->prepare("SELECT profile_picture FROM users WHERE id = :userId");
            $query->bindValue(":userId", $userId);
            $query->execute();
            $picture = $query->fetch();
            return $picture["profile_picture"];
        }

        public function save(){
            $conn = Database::getConnection();
            $query = $conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            
            $query->bindValue(":username", $this->username);
            $query->bindValue(":password", $this->password);
            $query->bindValue(":email", $this->email);  
                

            $result=$query->execute();
            return $result;
        }

        public function update($userid, $email, $biography){
            self::checkEmail($email);
            self::checkBiography($biography);
            $conn = Database::getConnection();
            $query = $conn->prepare("UPDATE users SET email=:email, biography=:biography WHERE id=:userid");

            $query->bindValue(":userid", $userid);
            $query->bindValue(":email", $email);     
            $query->bindValue(":biography", $biography);  

            $result = $query->execute();
            return $result;    
        }

        public function updatePicture($userid, $image){
           $conn = Database::getConnection();
           $query = $conn->prepare("UPDATE users SET users.image=:img WHERE id=:userid");

           $query->bindValue(":userid", $userid);
           $query->bindValue(":img", $image); 
           
           $result = $query->execute();
           return $result;    
       }


        public function changePassword($userid, $password) {
            self::checkPassword($password);

            $conn = Database::getConnection();
            $query = $conn->prepare("UPDATE users SET password=:password WHERE id=:userid");
            
            $hash = password_hash( $password, PASSWORD_DEFAULT);
            $password = $hash;

            $query->bindValue(":userid", $userid);
            $query->bindValue(":password", $password);
            
            $result=$query->execute();
            return $result;
            
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

        private function checkBiography($biography){
            if(strlen($biography) > self::MAX_BIO){
                throw new Exception("Biography's can only be ". self::MAX_BIO ." characters long");
            }
        }        

        private function checkEmail($email){
            if(empty($email)){
                throw new Exception("Email cannot be empty.");
            }

            if(!strpos($email, "@") || !strpos($email, ".") || strpos($email, " ") ){
                throw new Exception("Email is invalid");
            }
        }

        private function emailExists($email){ 
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

        private function usernameExists($username){ 
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
    

    
