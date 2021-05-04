var imageInput = document.querySelector("#inputPicturePost");
var uploadedImage = document.querySelector("#imagePreview");
var filterWrapper = document.querySelector("#filterWrapper");
var canvas;

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
var imgSrc = document.querySelector("#chosenFilter");

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

function setFilter(){
    if(currentFilter != 0){
        imgSrc.setAttribute("value", availableFilters[currentFilter]);
    }
}