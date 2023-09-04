<?php
    session_start();
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzig wachtwoord</title>
</head>
<body>
    <h1>Wijzig wachtwoord</h1>
    <?php
        if (!isset($_SESSION["inlognummer"])){
            header('Location: index.php');
        }

        if (isset($_POST["knop"])){
            $oud_wachtwoord = $_POST["oud_wachtwoord"];
            $nieuw_wachtwoord = $_POST["nieuw_wachtwoord"];
            
            $sql = 'SELECT *, count(*) AS aantal FROM tblgebruiker WHERE naam = "'.$_SESSION["naam"].'" AND wachtwoord = "'.$oud_wachtwoord.'"';
            $resultaat = $mysqli->query($sql);
            $row = $resultaat->fetch_assoc();

            if ($row['aantal'] == 1){
                $sql = 'UPDATE tblgebruiker SET wachtwoord = "'.$nieuw_wachtwoord.'" WHERE gebruikernummer = '.$_SESSION["inlognummer"].'';
                $resultaat = $mysqli->query($sql);
                if ($resultaat){
                    echo '<p>Succes. Klik <a href="index.php">hier</a> om terug te gaan.</p>';
                } else {
                    echo '<p>Error wachtwoord wijzigen, '.$mysqli->error.'</p>';
                }
            } else {
                echo '
                  <p>Er is een fout met de ingegeven wachtwoord, klik <a href="wachtwoord_wijzigen.php">hier</a> om her te proberen.</p>
                ';
            }
        } else {
            echo '
                <form method="post" action="wachtwoord_wijzigen.php">
                    <label for="oud_wachtwoord">Oud Wachtwoord:</label>
                    <input type="password" name="oud_wachtwoord" required>
                    <br>
                    <label for="nieuw_wachtwoord">Nieuw Wachtwoord:</label>
                    <input type="password" name="nieuw_wachtwoord" required>
                    <br><br>
                    <input type="submit" name="knop" value="Log in">
                </form>
            ';
        }
    ?>
</body>
</html>