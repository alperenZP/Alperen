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
                <td>'.$row["boeknummer"].'</td>
                <td>'.$row["naam"].'</td>
                <td>'.$row["prijs"].'</td>
                <td>'.$row["type"].'</td>
            ';
        }
        echo '</table>';
    ?>
</body>
</html>