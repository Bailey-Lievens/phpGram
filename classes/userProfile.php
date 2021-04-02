<?php

include_once("/Database.php");

class UserProfile{
    private $username;
    private $password;
    private $email;
    private $bio;


    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->username;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($username)
    {
        $this->username = $username;

        return $this;
    }

   

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

   

    /**
     * Get the value of bio
     */ 
    public function getDescription()
    {
        return $this->bio;
    }

    /**
     * Set the value of bio
     *
     * @return  self
     */ 
    public function setDescription($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function fetchData(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select * from users where id like :username" );

        $username = $this->getUser();

        $statement->bindValue(":username", $username);

        $statement->execute();
        
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $data;
    }

    public static function getEmails(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select email from users");
        
        $statement->execute();
        
        $emailAdressen = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $emailAdressen;
    }

    public function save(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("update users set bio=:bio, password=:password, email=:email where id like :username");
        
        $username = $this->getUser();  
        $email = $this->getEmail();
        $bio = $this->getDescription();
        $password = $this->getPassword();

        $statement->bindValue(":username", $username);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":bio", $bio);
        $statement->bindValue(":password", $password);

        
        $result = $statement->execute();
        
        return $result;
        
        
    }

}

?>