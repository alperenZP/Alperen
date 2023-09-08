<?php
    session_start();
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boek verwijderen</title>
</head>
<body>

    <?php
        $sql = 'DELETE FROM tblboekinklas WHERE volgnummer = '.$_GET["te_verwijderen"].'';
        $resultaat = $mysqli->query($sql);

        if ($resultaat){
            echo '
                <h1>Succes</h1><br>
                <p>Boek vanuit klas succesvol verwijderd, klik <a href="gegevens_bekijken.php">hier</a> om terug te gaan.</p>
            ';
        } else {
            echo '
                <h1>Mislukking</h1><br>
                <p>Error boek vanuit klas verwijderen, '.$mysqli->error.'</p>
                ';
        }
    ?>
</body>
</html>