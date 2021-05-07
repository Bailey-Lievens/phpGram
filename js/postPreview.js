var imageInput = document.querySelector("#inputPicturePost");
var uploadedImage = document.querySelector("#imagePreview");
var filterWrapper = document.querySelector("#filterWrapper");

//Show image in preview spot
imageInput.addEventListener("change", function(event){
    uploadedImage.src = URL.createObjectURL(event.target.files[0]);
    filterWrapper.style.display = "flex";
})