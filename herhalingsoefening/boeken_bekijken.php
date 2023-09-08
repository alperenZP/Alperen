<?php
    session_start();
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeken bekijken</title>
</head>
<body>
    <h1>Boeken bekijken</h1>
    <h2><a href="index.php">Terug naar index</a></h2>
    <a href="boek_toevoegen.php"><button>Voeg boek toe</button></a>
    <?php
        $sql = 'SELECT * FROM tblboek';
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