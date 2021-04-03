var imageInput = document.querySelector("#inputImageFile");
var imageLabel = document.querySelector("#inputLabel");

var uploadedImage = document.querySelector("#profilePicturePreview");

imageInput.addEventListener("change", function(event){
    uploadedImage.src = URL.createObjectURL(event.target.files[0]);
})