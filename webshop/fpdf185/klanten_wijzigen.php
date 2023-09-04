<?php
  session_start();
?>
<?php
  include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Klanten wijzigen</title>
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
          $sql = 'SELECT * FROM tblgebruikers WHERE gebruikernummer = '.$_SESSION["inlognummer"].'';
          $resultaat = $mysqli->query($sql);
          $row = $resultaat->fetch_assoc();
          $volledige_naam = ''.$row["voornaam"].' '.$row["naam"].'';
          
          echo '
            <a href="winkelkar_kijken.php" class="w3-bar-item w3-button">🛒</a>
          ';

          if ($_SESSION["isAdmin"]){
            echo '
              <a href="adminkrachten.php" class="w3-bar-item w3-button">Admin</a>
            ';
          }

          echo '
            <a href="uitloggen.php" class="w3-bar-item w3-button">Log uit</a>
          ';
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
    if (isset($_POST["knop"])){
        $gebruikernummer = $_POST["gebruikernummer"];
        $gebruikeremail = $_POST["gebruikeremail"];
        $wachtwoord = $_POST["wachtwoord"];
        $naam = $_POST["naam"];
        $voornaam = $_POST["voornaam"];
        $geboortedatum = $_POST["geboortedatum"];
        $rekeningsaldo = $_POST["rekeningsaldo"];

        if (isset($_POST["isAdmin"])){
          $isAdmin = 1;
        } else {
          $isAdmin = 0;
        }

        $sql = '
            UPDATE tblgebruikers 
            SET gebruikeremail = "'.$gebruikeremail.'", 
            wachtwoord = "'.$wachtwoord.'", 
            naam = "'.$naam.'", 
            voornaam = "'.$voornaam.'", 
            geboortedatum = "'.$geboortedatum.'", 
            rekeningsaldo = '.$rekeningsaldo.',
            isAdmin = '.$isAdmin.'
            WHERE gebruikernummer = '.$gebruikernummer.'
        ';

        

        $resultaat = $mysqli->query($sql);

        if ($resultaat) {
            echo '
              <div class="w3-content" style="max-width:1100px">
                <div class="w3-container w3-padding-64" id="contact">
                  <h1>Succes</h1><br>
                  <p>Klant succesvol wijzigd, klik <a href="klanten_lijst.php">hier</a> om terug te gaan.</p>
                  </div> 
                </div>
            ';
        } else {
            echo '
                <div class="w3-content" style="max-width:1100px">
                    <div class="w3-container w3-padding-64" id="contact">
                        <h1>Mislukking</h1><br>
                        <p>Error klant wijzigen, '.$mysqli->error.'</p>
                    </div> 
                </div>
            ';
        }
        
        $mysqli->close();
    } else {
        $sql = "select * from tblgebruikers where gebruikernummer = ".$_GET["tewijzigen"];
        $resultaat = $mysqli->query($sql);
        $row = $resultaat->fetch_assoc();

        echo '
            <div class="w3-content" style="max-width:1100px">
            <div class="w3-container w3-padding-64" id="contact">
                <h1>Wijzig Klant '.$row["gebruikernummer"].'</h1><br>
                <form method="post" action="klanten_wijzigen.php">
                    <input type="hidden" name="gebruikernummer" value="'.$row["gebruikernummer"].'">
                    <p><input class="w3-input w3-padding-16" type="email" placeholder="Email" required name="gebruikeremail" value="'.$row["gebruikeremail"].'"></p>
                    <p><input class="w3-input w3-padding-16" type="password" placeholder="Wachtwoord" required name="wachtwoord" value="'.$row["wachtwoord"].'"></p>
                    <p><input class="w3-input w3-padding-16" type="text" placeholder="Naam" required name="naam" value="'.$row["naam"].'"></p>
                    <p><input class="w3-input w3-padding-16" type="text" placeholder="Voornaam" required name="voornaam" value="'.$row["voornaam"].'"></p>
                    <p><input class="w3-input w3-padding-16" type="date" placeholder="Geboortedatum" required name="geboortedatum" value="'.$row["geboortedatum"].'"></p>
                    <p><input class="w3-input w3-padding-16" type="number" placeholder="Rekeningsaldo" required name="rekeningsaldo" step="0.01" value="'.$row["rekeningsaldo"].'"></p>
        ';
        
        if ($row["isAdmin"]){
          echo '<p>Is deze gebruiker een admin? <input type="checkbox" name="isAdmin" checked></p>';
        } else {
          echo '<p>Is deze gebruiker een admin? <input type="checkbox" name="isAdmin"></p>';
        }

        echo '
                    <p></p>
                    <p><button class="w3-button w3-light-grey w3-section" type="submit" name="knop">Wijzigen</button></p>
                </form>
            </div>
            </div>
        ';
    }
?>