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
    <h1>Te bestellen bekijken</h1>
    <h2><a href="index.php">Terug naar index</a></h2>
    <?php
        $sql = 'SELECT *, SUM(tblklas.aantalleerlingen) AS "totaal_leerlingen" FROM tblklas INNER JOIn tblboekinklas ON tblboekinklas.klasnummer = tblklas.klasnummer INNER JOIN tblboek ON tblboekinklas.boeknummer = tblboek.boeknummer GROUP BY tblboek.boeknummer;';
        $resultaat = $mysqli->query($sql);
        echo '
            <table>
                <tr>
                    <th>Boeknummer</th>
                    <th>Titel</th>
                    <th>Prijs</th>
                    <th>Type</th>
                </tr>
        ';
        while($row = $resultaat->fetch_assoc()){
            echo '
                <tr>
                    <td>'.$row["boeknummer"].'</td>
                    <td>'.$row["naam"].'</td>
                    <td>'.$row["prijs"].'</td>
                    <td>'.$row["type"].'</td>
                    <td><a href=boek_wijzigen.php?te_wijzigen='.$row["boeknummer"].'><button>✏️</button></a></td>
                    <td><a href=boek_verwijderen.php?te_verwijderen='.$row["boeknummer"].'><button>❌</button></a></td>
                </tr>
            ';
        }
        echo '</table>';
    ?>
</body>
</html>