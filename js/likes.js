var likeButtons = document.getElementsByClassName("btnAddLike");
var buttonLength = likeButtons.length;
var clickedUserId;
var clickedButton;

function like(e){
    clickedButton = e.path[0].attributes[1].nodeValue; // post_id
    userHasLiked = e.path[0].attributes[3].nodeValue; // user al geliked of niet

    console.log("userHasLiked " + userHasLiked);
    console.log("clickedButton " + clickedButton);
    
    var formData = new FormData();

    formData.append("clickedButton", clickedButton);
    formData.append("userHasLiked", userHasLiked);

    fetch("./ajax/likes.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            console.log(result);
        })
        .catch(error => {
            console.error("Error:", error);
        })    
    e.preventDefault();
}

for(i=0; i<buttonLength; i++){
    likeButtons[i].onclick = like;
}