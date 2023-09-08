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
    <h1>Te bestellen boeken bekijken</h1>
    <h2><a href="index.php">Terug naar index</a></h2>
    <?php
        if (!$_SESSION["is_admin"] || !isset($_SESSION["is_admin"])){
            header('Location: admin_fail.php');
        }

        $sql = 'SELECT *, SUM(tblklas.aantalleerlingen) AS "totaal_leerlingen", (SUM(tblklas.aantalleerlingen)*tblboek.prijs) AS "totaal_prijs" FROM tblklas INNER JOIn tblboekinklas ON tblboekinklas.klasnummer = tblklas.klasnummer INNER JOIN tblboek ON tblboekinklas.boeknummer = tblboek.boeknummer GROUP BY tblboek.boeknummer';
        
        $resultaat = $mysqli->query($sql);
        echo '
            <table>
                <tr>
                    <th>Boeknummer</th>
                    <th>Titel</th>
                    <th>Enige Prijs</th>
                    <th>Aantal kopies nodig</th>
                    <th>Totaal prijs</th>
                </tr>
        ';
        while($row = $resultaat->fetch_assoc()){
            echo '
                <tr>
                    <td>'.$row["boeknummer"].'</td>
                    <td>'.$row["naam"].'</td>
                    <td>€'.$row["prijs"].'</td>
                    <td>'.$row["totaal_leerlingen"].'</td>
                    <td>€'.$row["totaal_prijs"].'</td>
                </tr>
            ';
        }
        echo '</table>';
    ?>
</body>
</html>