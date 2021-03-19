<?php
    include_once('core/autoload.php');
    include_once('database/database_connection.inc.php');

    $query = $conn->query("SELECT * FROM users");
    $query->execute();
    $res = $query->fetchAll();

    $dum = new dummy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengram</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/general.css"> 
</head>
<body>
    <header>
        <img src="https://via.placeholder.com/200x80?text=Logo+location+probably" alt="logo">
        <nav>
            <a href="index.php">Home</a>
            <a href="#">Discover</a> <!--Maybe show all posts from everyone?--> 
            <a href="profilePage.php">My profile</a>
            <a href="login.php">Logout</a>
        </nav>
    </header>    

    <h1>Best team</h1>

    <?php foreach($res as $user): ?>
        
        <li><?php echo $user["username"] ?></li>
        
    <?php endforeach; ?>

</body>
</html>