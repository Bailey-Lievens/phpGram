var requestButtons = document.getElementsByClassName("requestButton");
var buttonLength = requestButtons.length;
var clickedUserId;
var clickedButton;

function request(e){
    clickedUserId = e.path[0].dataset.user; // value from data-user
    isRequested = e.path[0].dataset.requested; // value from data-requested
    clickedButton = e.path[0]; // for changing innerHTML

    var formData = new FormData();

    formData.append("clickedUserId", clickedUserId);
    formData.append("isRequested", isRequested);

    fetch("./ajax/sendRequest.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            if(result != null){
                if(result["action"] == "Decline"){
                    clickedButton.classList.remove("isRequested");
                    clickedButton.setAttribute("data-requested", "false");
                    clickedButton.innerHTML = "Send request";
                } else {
                    clickedButton.classList.add("isRequested");
                    clickedButton.setAttribute("data-requested", "true");
                    clickedButton.innerHTML = "Cancel request";
                }
            }
        })
        .catch(error => {
            console.error("Error:", error);
        })
    e.preventDefault();
}

for(i=0; i<buttonLength; i++){
    requestButtons[i].onclick = request;
}