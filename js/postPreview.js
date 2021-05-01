var imageInput = document.querySelector("#inputPicturePost");
var imageLabel = document.querySelector("#inputLabel");

var uploadedImage = document.querySelector("#imagePreview");

imageInput.addEventListener("change", function(event){
    uploadedImage.src = URL.createObjectURL(event.target.files[0]);
})