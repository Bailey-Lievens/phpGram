const loadMoreButton = document.getElementById("loadMore");
const postsNum = document.getElementById("postsNum");
loadMoreButton.onclick = (e) => {
  var formData = new FormData();
  formData.append("postsNum", postsNum.value);
  formData.append("location", "index");

  console.log(postsNum.value);
  fetch("./ajax/loadMore.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((result) => {
      console.log(result);
      if (result != null && result["posts"] != []) {
        postsNum.setAttribute("value", parseInt(postsNum.value) + 20);
        result["posts"].forEach((post) => {
          let posts = document.querySelectorAll(".post");
          let section = document.createElement("section");
          section.classList.add("post");
          section.innerHTML =
            "<header><img src='" +
            post["profile_picture"] +
            "?>' alt='profilePicture'><a href='profilePage.php?user=<?php echo htmlspecialchars(" +
            post["username"] +
            ")?>'><?php echo htmlspecialchars(" +
            post["username"] +
            ")?></a><p> <?php echo  Post::timeSincePost(" +
            post["date"] +
            ") ?></p><a href='#'>...</a></header><div><img src='" +
            post["picture"] +
            "?>' alt='postPicture'><p><?php echo htmlspecialchars(" +
            post["description"] +
            ")?></p></div><section><?php if(Like::isLiked($_SESSION['userId'] , " +
            post["id"] +
            "):?><a href='' class='btnAddLike' data-postid='<?php echo " +
            post["id"] +
            " ?>' data-liked='true' data-likes='<?php echo Post::amountLikes(" +
            post["id"] +
            ") ?>'>unlike</a><?php else: ?><a href='' class='btnAddLike' data-postid='<?php echo " +
            post["id"] +
            "?>' data-liked='false' data-likes='<?php echo Post::amountLikes(" +
            post["id"] +
            ")?>''>like</a><?php endif; ?><a href=''>react</a><?php if(Post::amountLikes(" +
            post["id"] +
            ") == 1): ?><p id='amountLikes'><span class='countLikes'><?php echo Post::amountLikes(" +
            post["id"] +
            ")?></span> like</p><?php else: ?><p id='amountLikes'><span  class='countLikes'><?php echo Post::amountLikes(" +
            post["id"] +
            ")?></span> likes</p><?php endif; ?></section>";
          posts[posts.length - 1].insertAdjacentElement("afterend", section);
        });
      }
    });

  e.preventDefault();
};
