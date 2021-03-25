

<?php



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/profiel.css" />
    <link rel="stylesheet" type="text/css" href="css/navigatie.css" />
    <script src="jquery-3.4.1.min.js"></script>
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style>
</head>


<header>
        <img src="https://via.placeholder.com/200x80?text=Logo+location+probably" alt="logo">
        <nav>
            <a href="index.php">startscherm</a>
            <a href="#">Ontdek</a> <!--Maybe show all posts from everyone?--> 
            <a href="profilePage.php">Mijn profiel</a>
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


            <div>
                <p >Wachtwoord</p>
                
            </div>



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
