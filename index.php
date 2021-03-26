<?php
    include_once('core/autoload.php');
    include_once('database/database_connection.inc.php');

    $query = $conn->query("SELECT * FROM users");
    $query->execute();
    $res = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengram</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/general.css"> 
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">

</head>
<body>
    <header>
        <?php include_once('navigation.inc.php'); ?>
    </header>    

    <h1>Best team</h1>

    <?php foreach($res as $user): ?>
        
        <li><?php echo $user["username"] ?></li>
        
    <?php endforeach; ?>

</body>
</html>