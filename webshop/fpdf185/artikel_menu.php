<?php
  session_start();
?>

<?php
  include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Artikel menu</title>
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

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
    <h1 class="w3-xxlarge">u</h1>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">
  <h1 class="w3-xxlarge">Menu</h1>
  <!-- About Section -->
  <?php
    if (!isset($_SESSION["isAdmin"])){
      $_SESSION["isAdmin"] = false;
    }

    if ($_SESSION["isAdmin"]){
      echo '<a href="artikel_toevoegen.php"><button><h1 class="w3-xxlarge">➕ Voeg nieuw artikel toe</h1></button></a>';
    }


    $sql = 'SELECT * FROM tblartikels';
    $resultaat = $mysqli -> query($sql);

    while ($row = $resultaat->fetch_assoc()) {
        echo '
          <div class="w3-row w3-padding-64" id="about">
            <div class="w3-col m6 w3-padding-large w3-hide-small">
              <img src="./image/'.$row["filename"].'" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
            </div>
        ';

        if ($_SESSION["isAdmin"]){
          echo '
            <a href=artikel_wijzigen.php?tewijzigen='.$row["artikelnummer"].'><button>✏️</button></a>
            <a href=artikel_verwijderen.php?teverwijderen='.$row["artikelnummer"].'><button>❌</button></a>
          ';
        }

          if (isset($_SESSION["inlognummer"])){
            echo '
            <a href=artikel_bestellen.php?tebestellen='.$row["artikelnummer"].'><button>🛒</button></a>
            ';
          }

        echo '
            <div class="w3-col m6 w3-padding-large">
              <h1 class="w3-center">'.$row["artikelnaam"].'</h1><br>
              <h5 class="w3-center">€'.$row["artikelprijs"].'</h5>
              <p class="w3-large">Gemaakt door: '.$row["producent"].'</p>
            </div>
          </div>
          <hr>
        ';
    }

    
  ?>

</body>
</html>

