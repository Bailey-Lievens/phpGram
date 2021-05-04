<?php

    if(!empty($_POST)){
        session_start();
        $postsNum = $_POST['postsNum'];

        $conn = new PDO("mysql:host=localhost:8889;dbname=testdb", "root", "root"); //Should work with autoloader
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_AUTOCOMMIT,FALSE);
        //$conn = Database::getConnection();
        if(isset($_POST['location']) && $_POST['location'] === "index"){
            $query_posts = $conn->prepare("SELECT DISTINCT users.username,users.profile_picture, posts.description, posts.picture, posts.date, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id INNER JOIN followers ON users.id = followers.followingId WHERE followers.userId = :userId ORDER BY posts.date DESC LIMIT :postsNum , 20");
            $query_posts->bindValue(":userId", $_SESSION['userid'] );
            $query_posts->bindValue(":postsNum", $postsNum, PDO::PARAM_INT );
            $query_posts->execute();
            $result = $query_posts->setFetchMode(PDO::FETCH_ASSOC);
            if(!$result){
                 $posts = [];
                $action = "Posts Not Loaded";
           
            }else{
                    $posts =  $query_posts->fetchAll();
                $action = "Posts Loaded";
            }
        }else if(isset($_POST['location']) && $_POST['location'] === "profilePage"){
            $userId = $_POST['userId'];
            $query_profileposts = $conn->prepare("SELECT DISTINCT posts.picture FROM posts WHERE posts.user_id = :userId ORDER BY posts.date DESC LIMIT :postsNum , 5");
            $query_profileposts->bindValue(":userId", $userId );
            $query_profileposts->bindValue(":postsNum", $postsNum, PDO::PARAM_INT );
            $query_profileposts->execute();
            $result = $query_profileposts->setFetchMode(PDO::FETCH_ASSOC);

            if(!$result){
                  $posts = [];
                $action = "Profile Posts Not Loaded";
               
            }else{
               $posts =  $query_profileposts->fetchAll();
                $action = "Profile Posts Loaded";
            }
        }else{
            $result = false;
            $action = "Posts Not Loaded";
            $posts = [];
        }
        
        if(!$result){
            $posts =  [];
            $response = [
                "action" => $action,
                "status" => "Failure",
                "posts" => $posts
            ];
        }else{
            $response = [
                "action" => $action,
                "status" => "Success",
                "posts" => $posts
            ];
        }
        
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>