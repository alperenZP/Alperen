<?php
    session_start();
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gegevens bekijken</title>
</head>
<body>
    <h1>Gegevens bekijken</h1>
    <h2><a href="index.php">Terug</a></h2>
    <?php
        $sql = 'SELECT * FROM tblklas';
        $resultaat = $mysqli->query($sql);
        while($row = $resultaat->fetch_assoc()){
            echo '
                <h3>'.$row["klasnaam"].'</h3>
            ';
            $sql2 = 'SELECT tblboek.naam, tblboek.prijs, tblboek.type FROM tblboekinklas INNER JOIN tblboek ON tblboek.boeknummer = tblboekinklas.boeknummer WHERE klasnummer = '.$row["klasnummer"].'';
            $resultaat2 = $mysqli->query($sql2);
            
            echo '
                <table>
                    <tr>
                        <th>Titel</th>
                        <th>Prijs</th>
                        <th>Type</th>
                    </tr>
                
            ';

            
            while($row2 = $resultaat2->fetch_assoc()){
                echo '
                    <tr>
                        <td>'.$row2["naam"].'</td>
                        <td>€'.$row2["prijs"].'</td>
                        <td>'.$row2["type"].'</td>
                    </tr>
                ';
            }
            echo '</table>';

            $sql2 = 'SELECT SUM(tblboek.prijs) AS "totaal" FROM tblboekinklas INNER JOIN tblboek ON tblboek.boeknummer = tblboekinklas.boeknummer WHERE klasnummer = '.$row["klasnummer"].'';
            $resultaat2 = $mysqli->query($sql2);
            $row2 = $resultaat2->fetch_assoc();
            echo '<h4>Totaal: €'.$row2["totaal"].'</h4>';
        }
    ?>
</body>
</html>