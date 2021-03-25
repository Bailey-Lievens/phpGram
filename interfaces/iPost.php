<?php //Currently based on the features mentioned in https://bit.ly/38Ur1z8

    interface iPost {
        public function setUser($userAccount);
        public function getUser();

        public function setTitle($title);
        public function getTitle();

        public function setDescription($description);
        public function getDescription();

        public function setTags($tags); //Maybe we can use an array for the tags? idk we'll see say hi to me if you actually read this
        public function getTags();

        public function setImage($image);
        public function getImage();

        public function getLocation(); //Based on geo location

        public function like(); //As in increase or decrease the amount of likes
        public function getLikes();

        public function setComment($user, $comment);
        public function getComments();

        public function post(); //Submit the post
        public function delete(); //Delete the post only in case it's from the user
    }
?>