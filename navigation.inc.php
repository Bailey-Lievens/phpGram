<link rel="stylesheet" type="text/css" href="css/navigation.css"/>
<header>
    <div id="logoSearchWrapper">
        <a href="index.php"><img id="logo" src="images/logo.png" alt="logo"></a>
        <form method="get">
            <label id="searchLabel" for="searchInput">Search here!</label>
            <input autocomplete="off" placeholder="Search Pengram" type="search" id="searchInput" name="searchInput">
            <ul id="searchResultList">
                
            </ul>
            <input id="searchSubmit" type="submit">
        </form>
    </div>
    <nav>
        <div id="navWrapper">
            <a href="index.php">Home</a>
            <a href="#">Discover</a> <!--Maybe show all posts from everyone?--> 
            <a href="profilePage.php?user=<?php echo htmlspecialchars($_SESSION['username']) ?>">My profile</a>
            <a href="logout.php">Logout</a>
        </div>
        <a href="#" id="menuButton"><div class="menu"></div><div class="menu"></div></a>
    </nav>
    <script src="js/slideOutMenu.js"></script>
    <script src="js/searchFunction.js"></script>
</header> 