<?php
    session_start();
?>
<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Inloggen</title>
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
    if (isset($_SESSION["inlognummer"])){
        header('Location: index.php');
    }

    if (isset($_POST["knop"])){
        $ingegevenEmail = $_POST["gebruikerEmail"];
        $ingegevenWachtwoord = $_POST["gebruikerWachtwoord"];

        $sql = 'SELECT *, count(*) AS aantal FROM tblgebruikers WHERE gebruikeremail = "'.$ingegevenEmail.'" AND wachtwoord = "'.$ingegevenWachtwoord.'"';
        $resultaat = $mysqli->query($sql);
        $row = $resultaat->fetch_assoc();

        if ($row['aantal'] == 1){
            echo 'Succes!';
            $_SESSION["inlognummer"] = $row["gebruikernummer"];
            header('Location: index.php');
        } else {
            echo '
              <div class="w3-container w3-padding-64" id="contact">
              <h1>Mislukking</h1><br>
              <p>Er is een fout met de ingegeven e-mail of wachtwoord, klik <a href="inloggen.php">hier</a> om her te proberen.</p>
            ';
        }
    } else {
        echo '
        <div class="w3-content" style="max-width:1100px">
            <div class="w3-container w3-padding-64" id="contact">
            <h1>Log in</h1><br>
            <form method="post" action="inloggen.php">
                <p><input class="w3-input w3-padding-16" type="email" placeholder="Email" required name="gebruikerEmail"></p>
                <p><input class="w3-input w3-padding-16" type="password" placeholder="Wachtwoord" required name="gebruikerWachtwoord"></p>
                <p><button class="w3-button w3-light-grey w3-section" type="submit" name="knop">Log in</button></p>
            </form>
            </div>
        </div>
        ';
    }
?>

</body>
</html>