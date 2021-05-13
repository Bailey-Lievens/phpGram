document.querySelector("#newPost").style.display = "none";

document.querySelector(".new").addEventListener("click", function(e){
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
    }
});

var imageInput = document.querySelector("#inputPicturePost");
var uploadedImage = document.querySelector("#imagePreview");
var filterWrapper = document.querySelector("#filterWrapper");

//Show image in preview spot
imageInput.addEventListener("change", function(event){
    uploadedImage.src = URL.createObjectURL(event.target.files[0]);
    filterWrapper.style.display = "flex";
})

var btnCycleLeft = document.querySelector(".cycleLeft");
var btnCycleRight = document.querySelector(".cycleRight");
var filterName = document.querySelector("#filterName");
var imageWrapper = document.querySelector("#imageWrapper");
var btnSubmit = document.querySelector(".submitNewPost");
var chosenFilter = document.querySelector("#chosenFilter");
var userCity = document.querySelector("#userCity");
var userCountry = document.querySelector("#userCountry");

var postForm = document.querySelector("#postForm");

var availableFilters = ["No filter selected", "_1977", "aden", "brannan", "brooklyn",
                        "clarendon", "earlybird", "gingham", "hudson",
                        "inkwell", "kelvin", "lark", "lofi", "maven",
                        "mayfair", "moon", "nashville", "perpetua",
                        "reyes", "rise", "slumber", "stinson", "toaster",
                        "valencia", "walden", "willow", "xpro2"];

//Starting fiter index is 0 aka ""
var currentFilter = 0;

btnCycleLeft.addEventListener("click", function(event){
    if(currentFilter == 0){
        currentFilter = availableFilters.length -1;
        imageWrapper.classList.add(availableFilters[currentFilter]);
    } else {
        imageWrapper.classList.remove(availableFilters[currentFilter]);
        currentFilter--;
        if(currentFilter != 0){
            imageWrapper.classList.add(availableFilters[currentFilter]);
        }
    }
    filterName.innerHTML = availableFilters[currentFilter];
})

btnCycleRight.addEventListener("click", function(event){
    if(currentFilter == availableFilters.length -1){
        imageWrapper.classList.remove(availableFilters[currentFilter]);
        currentFilter = 0;
    } else {
        if(currentFilter != 0){
            imageWrapper.classList.remove(availableFilters[currentFilter]);
        }
        currentFilter++;
        imageWrapper.classList.add(availableFilters[currentFilter]);
    }
    filterName.innerHTML = availableFilters[currentFilter];
})

function submitPost(e){
    var geolocation = navigator.geolocation;
    geolocation.getCurrentPosition(getLocation, errorHandler);
    e.preventDefault();
}

function setPostInfo(location){
    if(currentFilter != 0){
        chosenFilter.setAttribute("value", availableFilters[currentFilter]);
    }

    if(location != null){
        userCity.setAttribute("value", location["data"][0]["county"]);
        userCountry.setAttribute("value", location["data"][0]["country"]);
    }
    postForm.submit();
}

//Get the location details of the user and callbacks setPostInfo when response has been gotten
function getLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var apiKey = "dca050e63cc912c77b94aa67b48bb187"; //De request via backend versturen is beter zodat de api key niet publiek staat
    
    //Fetch is een meer moderne optie om hetzelfde te bereiken
    var request = new XMLHttpRequest();
    request.open("GET", "https://api.positionstack.com/v1/reverse?access_key="+apiKey+"&query="+latitude+","+longitude+"&limit=1");
    request.send();
    request.onload = () => {
        if(request.status == 200){
            var response = JSON.parse(request.response);
            //Send response
            setPostInfo(response);
        } else {
            response = request.statusText;
            console.error(response);
            setPostInfo(null);
        }
    }
}

function errorHandler(){
    setPostInfo(null);
}