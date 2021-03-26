function openTab(e, tabName) {
  var i;
  var x = document.getElementsByClassName("tab");

  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";

  }
  document.getElementById(tabName).style.display = "flex";

  //remove active class from all elements
  tablinks = document.getElementsByClassName("tabName");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  
  document.getElementById(tabName).style.display = "flex";
  e.currentTarget.className += " active";
}