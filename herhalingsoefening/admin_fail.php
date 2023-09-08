<?php
    session_start();
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te bestellen boeken bekijken</title>
</head>
<body>
    <h1>Geen admin</h1>
    <h2><a href="index.php">Terug naar index</a></h2>
    <?php
        if (!$_SESSION["is_admin"] || !isset($_SESSION["is_admin"])){
            echo ("u bent geen admin, u hebt geen toegang tot deze pagina.");
        } else {
            header('Location: index.php');
        }
    ?>
</body>
</html>