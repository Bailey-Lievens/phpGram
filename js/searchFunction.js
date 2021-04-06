var searchInputBar = document.getElementById("searchInput");
var searchBarOutput = document.getElementById("searchResultList");
var searchInput;

var isTag;

searchInputBar.onfocus = function(){
    searchBarOutput.style.display = "block";
}

searchInputBar.onblur = function(){
    searchBarOutput.style.display = "none";
}

searchInputBar.addEventListener("keyup", function(){
    searchInput = searchInputBar.value;
    var formData = new FormData();

    formData.append("searchInput", searchInput);

    fetch("./ajax/searchBar.php", {
        method: "POST",
        body:formData
    })
        .then(response => response.json())
        .then(result => {
            searchBarOutput.innerHTML = "";

            if(result != null){
                result.forEach(user => {
                    var listItem = document.createElement('li');
                    if(searchInput.charAt(0) == "#"){
                        listItem.innerHTML = "<img src='images/tagDefault.jpg' alt='"+ user.tags +"Picture'> <span>"+ user.tags +"</span>";
                    } else{
                        listItem.innerHTML = "<img src='images/DefaultProfilePicture.jpg' alt='"+ user.username +"ProfilePicture'> <span>"+ user.username +"</span>";
                    }
                    searchBarOutput.appendChild(listItem);
                });
            }
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