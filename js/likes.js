var likeButtons = document.getElementsByClassName("btnAddLike");
var buttonLength = likeButtons.length;
var amountLike = document.getElementsByClassName("countLikes");
var likeLength = amountLike.length;
var clickedPost;
var clickedButton;

function like(e){
    clickedPost = e.path[0].dataset.postid; // post_id
    userHasLiked = e.path[0].dataset.liked; // user al geliked of niet
    clickedButton = e.path[0];
    var currentSpan = amountLike[e.path[0].dataset.span]; // amountlike to get the full li

  var formData = new FormData();

    formData.append("clickedPost", clickedPost);
    formData.append("userHasLiked", userHasLiked);

    fetch("./ajax/likes.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            if(result != null){
                if(result["action"] == "Unlike"){
                    clickedButton.setAttribute("data-liked", "false");
                    clickedButton.innerHTML = "like";
                    clickedButton.style.color = "green";
                } else {
                    clickedButton.setAttribute("data-liked", "true");
                    clickedButton.innerHTML = "unlike";
                    clickedButton.style.color = "red";
                }
                currentSpan.innerHTML = result["likes"];
            }
        })
        .catch(error => {
            console.error("Error:", error);
        })    
    e.preventDefault();
}

for (i = 0; i < buttonLength; i++) {
  likeButtons[i].onclick = like;
}
