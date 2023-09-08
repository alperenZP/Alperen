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
            $boeknummer = $_POST["boeknummer"];
            $klasnummer = $_POST["klasnummer"];


            $sql = 'INSERT INTO tblboekinklas(klasnummer, boeknummer) VALUES ('.$klasnummer.', '.$boeknummer.')';
            $resultaat = $mysqli->query($sql);
            
            if ($resultaat){
                echo '
                    <h1>Succes</h1><br>
                    <p>Boek succesvol toegevoegd, klik <a href="boeken_bekijken.php">hier</a> om terug te gaan.</p>
                ';
            } else {
                echo '
                    <h1>Mislukking</h1><br>
                    <p>Error boek verwijderen, '.$mysqli->error.'</p>
                ';
            }
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