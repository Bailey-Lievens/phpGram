var likeButtons = document.getElementsByClassName("btnAddLike");
var buttonLength = likeButtons.length;
var amountLike = document.getElementsByClassName("countLikes"); // likes
var likeLength = amountLike.length; // likes
var clickedButton;

function like(e){
    clickedPost = e.path[0].attributes[2].nodeValue; // post_id
    userHasLiked = e.path[0].attributes[3].nodeValue; // user al geliked of niet
    clickedButton = e.path[0];
    amountLikes = e.path[0].attributes[4].nodeValue;

    var formData = new FormData();

    formData.append("clickedPost", clickedPost);
    formData.append("userHasLiked", userHasLiked);
    formData.append("amountLikes", amountLikes);

    fetch("./ajax/likes.php", { // documentatie van internet gehaald
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            console.log(result);
            if(result != null){
                if(result["action"] == "Unlike"){
                    clickedButton.setAttribute("data-liked", "false");
                    clickedButton.innerHTML = "like";
                } else {
                    clickedButton.setAttribute("data-liked", "true");
                    clickedButton.innerHTML = "unlike";
                }

                if(result["amountLikes"] == "down") {
                    amountLikes--;
                } else {
                    amountLikes++;
                }
            }
            
            console.log(amountLikes);
        })
        .catch(error => {
            console.error("Error:", error);
        })    
    e.preventDefault();
}

for(i=0; i<buttonLength; i++){
    likeButtons[i].onclick = like;
}