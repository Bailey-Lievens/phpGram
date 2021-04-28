var followButtons = document.getElementsByClassName("followButton");
var buttonLength = followButtons.length;
var clickedUserId;
var clickedButton;

function follow(e){
    clickedUserId = e.path[0].attributes[2].nodeValue; //Getting the value from the data attribute data-user
    clickedUserIsFollowing = e.path[0].attributes[3].nodeValue; //Getting the value from data-following
    clickedButton = e.path[0];

    console.log(clickedButton);
    
    var formData = new FormData();

    formData.append("userId", clickedUserId);
    formData.append("isFollowing", clickedUserIsFollowing);

    fetch("./ajax/follow.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            if(result != null){
                if(result["action"] == "Unfollow"){
                    clickedButton.classList.remove("isFollowing");
                    clickedButton.setAttribute("data-following", "false");
                    clickedButton.innerHTML = "Follow";
                } else {
                    clickedButton.classList.add("isFollowing");
                    clickedButton.setAttribute("data-following", "true");
                    clickedButton.innerHTML = "Unfollow";
                }
            }
        })
        .catch(error => {
            console.error("Error:", error);
        })    
    e.preventDefault();
}

for(i=0; i<buttonLength; i++){
    followButtons[i].onclick = follow;
}