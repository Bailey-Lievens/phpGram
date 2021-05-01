<?php
  include_once("../classes/Post.class.php"); 
   
if(!empty($_POST)){
    session_start();
    $i=$_POST['i'];
   
    $post = new Post();
    $post->setClick($i);
    $collection=[];
  
    $collection=$post->getPostsById($userId, $amount = 20)->fetchAll(PDO::FETCH_ASSOC);
    $count=$post->getPostsById($userId, $amount = 20)->rowCount();
   
    //Als er 21 resultaten zijn, halen we de laatste weg (want we tonen per 20 resultaten)
    if($count==21){
        $collection= array_slice($collection, 0, 20);  
    }        
   
    $response= [
        "status" => "succes",
        "collection" => $collection,
        "count"=> $count
    ];
    header('Content-Type: application/json');
    echo json_encode($response);  
}
    
?>