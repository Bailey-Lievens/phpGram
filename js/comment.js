var commentBtns = document.getElementsByClassName("commentBtn");
var buttonLength = commentBtns.length;

function comment(e){
    var postId = e.path[0].dataset.postid; // post_id
    var commentText = e.toElement.previousElementSibling.value; // comment text
    var ul = e.path[2].children[3]; // find ul where the comment must go
    var input = e.path[2].children[2].children[0]; // to see input
    var noComment = e.path[2].children[3].children[0].children[0]; // to see if there are comments

    var formData = new FormData();

    formData.append("postId", postId);
    formData.append("commentText", commentText);

    fetch("./ajax/comments.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            // disappear "no comments yet"
            if (noComment.innerHTML == "No comments yet") {
                noComment.innerHTML = "";
            } else {}

            // empty input
            input.value = "";
            // new ul
            var newUl = document.createElement('ul');
            ul.appendChild(newUl);

            // for username
            var newLiUser = document.createElement('li');
            newLiUser.innerHTML = result.user;
            newUl.appendChild(newLiUser);
            // for time
            var newLiTime = document.createElement('li');
            newLiTime.innerHTML = result.time;
            newUl.appendChild(newLiTime);
            // for text
            var newLiText = document.createElement('li');
            newLiText.innerHTML = result.input;
            newUl.appendChild(newLiText);
        })
        .catch(error => {
            console.error("Error:", error);
        });
    e.preventDefault();
}

for(i=0; i<buttonLength; i++){
    commentBtns[i].onclick = comment;
}