<?php
    session_start();
?>
<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registreren</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Food-luxury-pasta.svg/320px-Food-luxury-pasta.svg.png">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="index.php" class="w3-bar-item w3-button">Il Ristorante Spettacolóso</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="artikel_menu.php" class="w3-bar-item w3-button">Menu</a>
      <?php
        if (isset($_SESSION["inlognummer"])){
            header('Location: index.php');
        } else {
          echo '
            <a href="inloggen.php" class="w3-bar-item w3-button">Log in</a>
            <a href="registreren.php" class="w3-bar-item w3-button">Registreer</a>
          ';
        }
      ?>
    </div>
  </div>
</div>

<!-- Page content -->

<?php
    if (isset($_SESSION["inlognummer"])) {
        header('Location: index.php');
    }

    
    if (isset($_POST["knop"])) {
        $email = $_POST["email"];
        $wachtwoord = $_POST["wachtwoord"];
        $naam = $_POST["naam"];
        $voornaam = $_POST["voornaam"];
        $geboortedatum = $_POST["geboortedatum"];
        $rekeningsaldo = $_POST["rekeningsaldo"];

        $sql = 'SELECT *, count(*) AS aantal FROM tblgebruikers WHERE gebruikeremail = "'.$email.'"';
        $resultaat = $mysqli->query($sql);
        $row = $resultaat->fetch_assoc();

        if ($row['aantal'] > 0){
            echo '
            <div class="w3-content" style="max-width:1100px">
            <!-- Contact Section -->
            <div class="w3-container w3-padding-64" id="contact">
                <h1>Error</h1><br>
                <p>Deze email heeft al een account. A.u.b gebruik een andere email.</p>
                <p><a href="registreren.php">Probeer het nog eens</a></p>
            </div>
            
            <!-- End page content -->
            </div>
            ';
        } else {
            $sql = '
            INSERT INTO tblgebruikers(gebruikeremail, wachtwoord, naam, voornaam, geboortedatum, rekeningsaldo)
            VALUES ("'.$email.'", "'.$wachtwoord.'", "'.$naam.'", "'.$voornaam.'", "'.$geboortedatum.'", '. $rekeningsaldo.')
            ';
            $resultaat = $mysqli->query($sql);

            if ($resultaat) {
                echo "Account succesvol gemaakt, we openen index nu...<br>";
                $sql = 'SELECT gebruikernummer FROM tblgebruikers ORDER BY gebruikernummer DESC LIMIT 1';
                $resultaat = $mysqli->query($sql);
                while($row = $resultaat->fetch_assoc()) {
                    $_SESSION["inlognummer"] = $row["gebruikernummer"];
                }
                print $_SESSION["inlognummer"];
                header('Location: index.php');
            } else {
                echo $sql;
                echo '<br><br>';
                echo "Error account maken: " . $mysqli->error . "<br>";
            }
            $mysqli->close();
        }

        

    } else {
        echo '
        <div class="w3-content" style="max-width:1100px">
            <div class="w3-container w3-padding-64" id="contact">
            <h1>Registreer</h1><br>
            <form method="post" action="registreren.php">
                <p><input class="w3-input w3-padding-16" type="email" placeholder="Email" required name="email"></p>
                <p><input class="w3-input w3-padding-16" type="password" placeholder="Wachtwoord" required name="wachtwoord"></p>
                <p><input class="w3-input w3-padding-16" type="text" placeholder="Naam" required name="naam"></p>
                <p><input class="w3-input w3-padding-16" type="text" placeholder="Voornaam" required name="voornaam"></p>
                <p><input class="w3-input w3-padding-16" type="date" placeholder="Geboortedatum" required name="geboortedatum"></p>
                <p><input class="w3-input w3-padding-16" type="number" placeholder="Rekeningsaldo" required name="rekeningsaldo" step="0.01"></p>
                <p><button class="w3-button w3-light-grey w3-section" type="submit" name="knop">Registreer</button></p>
            </form>
            </div>
        </div>
        ';
    }
?>

</body>
</html>