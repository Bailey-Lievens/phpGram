const loadMoreButton = document.getElementById("loadMore");
const postsNum = document.getElementById("postsNum");
const userId = document.getElementById("userId").value;
const postsTab = document.getElementById("postsTab");

loadMoreButton.onclick = (e) => {
  var formData = new FormData();
  formData.append("postsNum", postsNum.value);
  formData.append("location", "profilePage");
  formData.append("userId", userId);

  console.log(postsNum.value);
  fetch("./ajax/loadMore.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((result) => {
      console.log(result);
      if (result != null && result["posts"] != []) {
        postsNum.setAttribute("value", parseInt(postsNum.value) + 5);
        result["posts"].forEach((post) => {
          let posts = document.querySelectorAll("#postImg");
          let img = document.createElement("img");
          posts[posts.length - 1].insertAdjacentElement("afterend", img);
          img.setAttribute("id", "postImg");
          img.setAttribute("src", post["picture"]);
        });
      }
    });

  e.preventDefault();
};
