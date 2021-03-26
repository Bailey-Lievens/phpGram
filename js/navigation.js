function openMenu() {
    console.log("okok");

    if(document.getElementById("home").style.display === "inline") {
        document.getElementById("home").style.display = "none";
        document.getElementById("discover").style.display = "none";
        document.getElementById("profile").style.display = "none";
        document.getElementById("logout").style.display = "none";
    } else {
        document.getElementById("home").style.display = "inline";
        document.getElementById("discover").style.display = "inline";
        document.getElementById("profile").style.display = "inline";
        document.getElementById("logout").style.display = "inline";

    }
}

