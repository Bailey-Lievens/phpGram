<?php  //Currently based on the features mentioned in https://bit.ly/38Ur1z8
    interface iUser {
        public function setUsername($username);
        public function getUsername();

        public function setPassword($password);
        public function getPassword();

        public function setEmail($email);
        public function getEmail();

        public function setProfilePicture($image);
        public function getProfilePicture(); //Add default picture if profile picture is not set

        public function setBiography($bioText);
        public function getBiography();

        public function setPrivacy($boolean); //True = private account || False = public account
        public function getPrivacy();

        public function saveAccount(); //Save all the set data

        public function setFollower($account); 
        public function getFollowers(); //The accounts that follow the user
        public function getFollowing(); //The accounts the user is following

        public function getFollowRequests(); //Only needed if the account is private
    }
?>