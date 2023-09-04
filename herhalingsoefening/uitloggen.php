<?php
    session_start();
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uitloggen</title>
</head>
<body>
    <h1>Log uit</h1>
    
    <?php
        session_destroy();
        echo 'Succesvol uitgelogd. Klik <a href="index.php">hier</a> om terug te gaan.';
    ?>

</body>
</html>