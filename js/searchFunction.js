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
                        listItem.innerHTML = "<a href='search.php?type=tag&q="+ htmlspecialchars(user.tag_name.substring(1))/*remove the #*/ +"'> <img src='images/tagDefault.jpg' alt='"+ htmlspecialchars(user.tag_name) +"Picture'> <span>"+ htmlspecialchars(user.tag_name) +"</span></a>";
                    } else{
                        listItem.innerHTML = "<a href='profilePage.php?q="+ user.id +"'><img src='"+ user.profile_picture +"' alt='"+ htmlspecialchars(user.username) +"ProfilePicture'> <span>"+ htmlspecialchars(user.username) +"</span></a>";
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

function htmlspecialchars(string) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#x27;',
        "/": '&#x2F;',
    };
    const reg = /[&<>"'/]/ig;
    return string.replace(reg, (match)=>(map[match]));
}