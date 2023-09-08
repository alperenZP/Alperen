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
        if (!$_SESSION["is_admin"] || !isset($_SESSION["is_admin"])){
            header('Location: admin_fail.php');
        }

        $sql = 'SELECT *, count(*) AS aantal FROM tblboekinklas WHERE boeknummer = '.$_GET["te_verwijderen"].'';
        $resultaat = $mysqli->query($sql);
        $row = $resultaat->fetch_assoc();

        if ($row["aantal"] == 0){
            $sql = 'DELETE FROM tblboek WHERE boeknummer = '.$_GET["te_verwijderen"].'';
            $resultaat = $mysqli->query($sql);

            if ($resultaat){
                echo '
                    <h1>Succes</h1><br>
                    <p>Boek succesvol verwijderd, klik <a href="boeken_bekijken.php">hier</a> om terug te gaan.</p>
                ';
            } else {
                echo '
                    <h1>Mislukking</h1><br>
                    <p>Error boek verwijderen, '.$mysqli->error.'</p>
                ';
            }
        } else {
            echo '
                <h1>Mag niet verwijderen</h1>
                <p>Deze boek is al in gebruik. Je mag hij niet verwijderen, klik <a href="boeken_bekijken.php">hier</a> om terug te gaan.</p>
            ';
        }
    ?>
</body>
</html>