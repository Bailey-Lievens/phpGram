let select1 = document.querySelector("#select1");
let select2 = document.querySelector("#select2");
let select3 = document.querySelector("#select3");
let select4 = document.querySelector("#select4");


submit.addEventListener("click", function(){
   select1.removeAttribute("disabled");
   select2.removeAttribute("disabled");
   select3.removeAttribute("disabled");
   select4.removeAttribute("disabled");
 
});

var p = 0;
function changeProfile(){
var changeProfileBtn = document.querySelector("#changeProfileBtn");
var submitBtn = document.querySelector("#submitBtn");
submitBtn.classList.toggle("hide");


if(changeProfileBtn.innerHTML == "adjust profile"){
    changeProfileBtn.innerHTML="Annulate";
}else{
    changeProfileBtn.innerHTML="Padjust profile";
}

var inputFields = document.querySelectorAll(".showInput");
console.log(inputFields);
 for (i = 0; i < inputFields.length; i++) {
    inputFields[i].classList.toggle('show');
}
}
;

