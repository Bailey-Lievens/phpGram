var searchInputBar = document.getElementById("searchInput");
var searchBarOutput = document.getElementById("searchResultList");
var searchInput;
var isTag = false;

searchInputBar.onfocus = function(){
    searchBarOutput.style.display = "block";
}

searchInputBar.onblur = function(){
    searchBarOutput.style.display = "none";
}

searchInputBar.addEventListener("keyup", function(){
    searchInput = searchInputBar.value;
    var formData = new FormData();

    //Check to see if the user is searching for a tag
    if(isTag || searchInput.charAt(0) == "#"){
        isTag = true;
    } else {
        isTag = false;
    }

    formData.append("searchInput", searchInput);
    formData.append("isTag", isTag);

    fetch("./ajax/searchBar.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            console.log("succes:", result);
        })
        .catch(error => {
            console.error("Error:", error);
        })

})

searchInputBar.addEventListener("keydown", function(e){
    if(e.key == "Enter"){
        e.preventDefault();
    }
})