var acceptButton = document.getElementsByClassName("acceptButton");
var declineButton = document.getElementsByClassName("declineButton");
var buttonLength = acceptButton.length;
var clickedUserId;
var li;

function accept(e){
    clickedUserId = e.path[0].dataset.requester; // follower id -> data-requester
    li = e.path[1]; // get the li to delete after 

    var formData = new FormData();

    formData.append("clickedUserId", clickedUserId);

    fetch("./ajax/requestsAccept.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            li.style.display = "none"; // delete li
        })
        .catch(error => {
            console.error("Error:", error);
        })
    e.preventDefault();
}

function decline(e) {
    clickedUserId = e.path[0].dataset.requester; // follower id -> data-requester
    li = e.path[1]; // get the li to delete after 
    
    var formData = new FormData();

    formData.append("clickedUserId", clickedUserId);

    fetch("./ajax/requestsDecline.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            li.style.display = "none"; // delete li
        })
        .catch(error => {
            console.error("Error:", error);
        })
    e.preventDefault();
}

for(i=0; i<buttonLength; i++){
    acceptButton[i].onclick = accept;
}

for(i=0; i<buttonLength; i++){
    declineButton[i].onclick = decline;
}