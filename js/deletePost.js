var deleteButtons = document.getElementsByClassName("deletePost");
var buttonLength = deleteButtons.length;

var clickedPost;
var binPost;
var imagePost;

function deletePost(e){
    clickedPost = e.path[0].dataset.post; // post_id
    binPost = e.path[0]; // get vuilbakje
    imagePost = e.path[0].parentElement.previousElementSibling; // get image

    console.log(e);
    console.log(clickedPost);
    console.log(binPost);
    console.log(imagePost);

    var formData = new FormData();

    formData.append("clickedPost", clickedPost);

    fetch("./ajax/deletePost.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            console.log(result);
            binPost.className = "hideImg"; // nodeValue veranderens
            imagePost.className = "hideImg"; // klasse toevoegen bij image
        })
        .catch(error => {
            console.error("Error:", error);
        })
    e.preventDefault();
}

for(i=0; i<buttonLength; i++){
    deleteButtons[i].onclick = deletePost;
}