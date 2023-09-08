<?php
    session_start();
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boek in klas toevoegen</title>
</head>
<body>
    <h1>Boek in klas toevoegen</h1>
    <?php
        if (isset($_POST["knop"])){

        } else {
            echo '
                <form method="post" action="boek_in_klas_toevoegen.php">
                    Boek: <select name="boeknummer">
            ';
            $sql = 'SELECT * FROM tblboek';
            $resultaat = $mysqli->query($sql);
            while ($row = $resultaat->fetch_assoc()){
                echo '
                    <option value="'.$row["boeknummer"].'">'.$row["naam"].'</option>
                ';
            }
            echo '
                </select>
                <br>
                Klas: <select name="klas">
            ';
            $sql = 'SELECT * FROM tblklas';
            $resultaat = $mysqli->query($sql);
            while ($row = $resultaat->fetch_assoc()){
                echo '
                    <option value="'.$row["klasnummer"].'">'.$row["klasnaam"].'</option>
                ';
            }
            echo '
                </select>
                <br><br>
                <input type="submit" name="knop" value="Voeg toe">
                </form>
            ';
        }
    ?>
</body>
</html>