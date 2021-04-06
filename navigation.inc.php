<link rel="stylesheet" type="text/css" href="css/navigation.css"/>
<header>
    <div id="logoSearchWrapper">
        <img id="logo" src="images/logo.png" alt="logo">
        <form method="get">
            <label id="searchLabel" for="q">Search here!</label>
            <input placeholder="Search Pengram" type="search" id="searchInput" name="q">
            <ul id="searchResultList">
                <li> <img src="images/Bailey.jpg" alt="BaileyProfilePicture"> <span>Bailey Lievens</span></li>
                <li> <img src="images/Amelie.jpg" alt="AmelieProfilePicture"> <span>Amelie Gosiau</span></li>
                <li> <img src="images/Ellen.jpg" alt="EllenProfilePicture"> <span>Ellen Hiel</span></li>
            </ul>
            <input id="searchSubmit" type="submit">
        </form>
    </div>
    <nav>
        <div id="navWrapper">
            <a href="index.php">Home</a>
            <a href="#">Discover</a> <!--Maybe show all posts from everyone?--> 
            <a href="profilePage.php">My profile</a>
            <a href="logout.php">Logout</a>
        </div>
        <a href="#" id="menuButton"><div class="menu"></div><div class="menu"></div></a>
    </nav>
    <script src="js/slideOutMenu.js"></script>
    <script src="js/searchFunction.js"></script>
</header> 