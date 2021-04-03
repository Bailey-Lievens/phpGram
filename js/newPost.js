document.querySelector("#newPost").style.display = "none";

document.querySelector(".new").addEventListener("click", function(e){
    console.log("ok")

    if(!open){
        document.querySelector("#newPost").style.display = "block";
        open = true;
    } else {
        document.querySelector("#newPost").style.display = "none";
        open = false;
    }
    
});

document.querySelector(".cancelBtn").addEventListener("click", function(e){

    if(this.clicked=true){
        document.querySelector("#newPost").style.display = "none";
        document.querySelector("#description").value = "";
        document.querySelector("#inputPicturePost").value = "";
        open = false;
    } else {}
    
});