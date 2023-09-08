<?php
    session_start();
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boek toevoegen</title>
</head>
<body>

    <?php
        if (isset($_POST["knop"])){
            $naam = $_POST["naam"];
            $prijs = $_POST["prijs"];
            $type = $_POST["type"];

            $sql = 'INSERT INTO tblboek(naam, prijs, type) VALUES ("'.$naam.'", '.$prijs.', "'.$type.'")';
            $resultaat = $mysqli->query($sql);

            if ($resultaat){
                echo '
                    <h1>Succes</h1><br>
                    <p>Boek succesvol toegevoegd, klik <a href="boeken_bekijken.php">hier</a> om terug te gaan.</p>
                ';
            } else {
                echo '
                    <h1>Mislukking</h1><br>
                    <p>Error boek toevoegen, '.$mysqli->error.'</p>
                ';
            }
        } else {

            echo '
                <h1>Voeg boek toe</h1><br>
                <form method="post" action="boek_toevoegen.php">
                    Titel: <input type="text" name="naam" required>
                    <br>
                    Prijs: <input type="number" step="0.01" name="prijs" required>
                    <br>
                    Type: <select name="type">
                        <option value="huur">huur</option>
                        <option value="koop">koop</option>
                    </select>
                    <br><br>
                    <input type="submit" name="knop" value="Voeg toe">
                </form>
            ';
        }
    ?>
</body>
</html>