var searchInputBar = document.getElementById("searchInput");
var searchBarOutput = document.getElementById("searchResultList");
var searchInput;

var isTag;

searchInputBar.onfocus = function(){
    searchBarOutput.style.display = "block";
}

searchInputBar.onblur = function(){
    setTimeout(function(){
        searchBarOutput.style.display = "none";
    }, 200);
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
                        listItem.innerHTML = "<a href='search.php?q="+ user.tags +"'> <img src='images/tagDefault.jpg' alt='"+ user.tags +"Picture'> <span>"+ user.tags +"</span></a>";
                    } else{
                        listItem.innerHTML = "<a href='profilePage.php?user="+ user.username +"'><img src='images/DefaultProfilePicture.jpg' alt='"+ user.username +"ProfilePicture'> <span>"+ user.username +"</span></a>";
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