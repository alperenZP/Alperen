<?php
    session_start();
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Log in</h1>
    
    <?php
        if (isset($_POST["knop"])){
            $naam = $_POST["naam"];
            $wachtwoord = $_POST["wachtwoord"];

            $sql = 'SELECT *, count(*) AS aantal FROM tblgebruiker WHERE naam = "'.$naam.'" AND wachtwoord = "'.$wachtwoord.'"';
            $resultaat = $mysqli->query($sql);
            $row = $resultaat->fetch_assoc();

            if ($row['aantal'] == 1){
                echo 'Succes!';
                $_SESSION["inlognummer"] = $row["gebruikernummer"];
                $_SESSION["naam"] = $row["naam"];
                $_SESSION["is_admin"] = ($row["gebruikstype"] == "admin");
                header('Location: index.php');
            } else {
                echo '
                  <p>Er is een fout met de ingegeven naam of wachtwoord, klik <a href="inloggen.php">hier</a> om her te proberen.</p>
                ';
            }

        } else {
            echo '
                <form method="post" action="inloggen.php">
                    <label for="naam">Naam: </label>
                    <input type="text" name="naam" required>
                    <br>
                    <label for="wachtwoord">Wachtwoord: </label>
                    <input type="password" name="wachtwoord" required>
                    <br><br>
                    <input type="submit" name="knop" value="Log in">
                </form>
            ';
        }
    ?>
</body>
</html>