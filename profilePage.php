<<<<<<< Updated upstream
<?php
?>

=======
<?php 
    include_once('isloggedin.inc.php');
    ?>
>>>>>>> Stashed changes
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <link rel="stylesheet" type="text/css" href="css/profiel.css" />
    <link rel="stylesheet" type="text/css" href="css/navigatie.css" />
    <script src="jquery-3.4.1.min.js"></script>
    <title>Document</title>
=======
    <title>My profile</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/general.css"/>
    <link rel="stylesheet" type="text/css" href="css/profilePage.css"/>
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
>>>>>>> Stashed changes
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style>
</head>


<header>
        <img src="https://via.placeholder.com/200x80?text=Logo+location+probably" alt="logo">
        <nav>
            <a href="index.php">Home</a>
            <a href="#">Discover</a> <!--Maybe show all posts from everyone?--> 
            <a href="profilePage.php">My profile</a>
            <a href="login.php">Logout</a>
        </nav>
    </header>
<body>


    <h1>Profiel</h1>

    <section class="flex">

        <form id="form" action="" method="post" enctype="multipart/form-data">

           

           
            <div>
                <p>avatar: </p>
                
            </div>

            <div>
                <p>Voornaam: </p>
                
            </div>

            <div>
                <p>Familienaam: </p>
                
            </div>

            <div>
                <p>Email: </p>
                
            </div>

    <div id="logo-container">
        <img src="images/woordlogo.png" alt="logo">
    </div>

<<<<<<< Updated upstream
            <div>
                <p >Wachtwoord</p>
                
            </div>
=======
    <form action="" method="post" class="clearfix">

    <h2>Maak een nieuw account</h2>

    <?php if(isset($error)):?>
        <div class="error" style="color: white;">
        <?php echo $error;?></div>
    <?php endif;?>

    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
    </div>

    <div>
        <label for="password">Wachtwoord</label>
        <input type="password" id="password" name="password">
    </div>

    <div class="submitBtn">
	    <input type="submit" id="submitBtn" value="Bevestig">	
    </div>

    <div class="loginLink">
        <a href="login.php">Heb je al een account? Log hier in.</a>
    </div>

</form>
>>>>>>> Stashed changes



            <div>
                <p>Profieltekst:</p>
                
            </div>


            <div>
                <p>Passie: </p>
                
            </div>


            <div>
                <p>Favoriet film genre: </p>
            </div>

            <div>
                <p>Favoriete kunststroming: </p>
           </div>

            <div>
                <p>Favoriet muziek om op te tekenen: </p>
           </div>

            <div>
                <p>Favoriete sport: </p>
        </div>

           

            <div>
                <input type="submit" id="submitBtn" class="hide" value="Bevestig veranderingen">
                

            </div>

        </form>

    </section>
  
</body>

</html>
