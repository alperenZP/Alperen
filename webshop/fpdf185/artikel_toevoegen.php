<?php
  session_start();
?>
<?php
  include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Artikel toevoegen</title>
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
    if (isset($_SESSION["isAdmin"])) {
        if (!$_SESSION["isAdmin"]){
            header('Location: adminkrachten.php');
        }
    } else {
        header('Location: adminkrachten.php');
    }
    
    if (isset($_POST["knop"])) {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./image/" . $filename;
  
        $artikelnaam = $_POST["artikelnaam"];
        $artikelprijs = $_POST["artikelprijs"];
        $producent = $_POST["producent"];

        $sql = '
            INSERT INTO tblartikels(artikelnaam, artikelprijs, producent, filename)
            VALUES ("'.$artikelnaam.'", '. $artikelprijs.', "'.$producent.'", "'.$filename.'")
        ';
        $resultaat = $mysqli->query($sql);

        if (move_uploaded_file($tempname, $folder) && $resultaat) {
            echo '
                <div class="w3-content" style="max-width:1100px">
                    <div class="w3-container w3-padding-64" id="contact">
                        <h1>Succes</h1><br>
                        <p>Artikel succesvol toegevoegd, klik <a href="artikel_menu.php">hier</a> om terug te gaan.</p>
                    </div> 
                </div>
            ';
        } else {
            echo $sql;
            echo '<br><br>';
            echo "Error artikel toevoegen: " . $mysqli->error . "<br>";
        }
        $mysqli->close();

    } else {
        echo '
            <div class="w3-content" style="max-width:1100px">
                <div class="w3-container w3-padding-64" id="contact">
                <h1>Voeg Artikel toe</h1><br>
                <form method="post" action="artikel_toevoegen.php" enctype="multipart/form-data">
                    <p><input class="w3-input w3-padding-16" type="text" placeholder="Artikelnaam" required name="artikelnaam"></p>
                    <p><input class="w3-input w3-padding-16" type="number" placeholder="Artikelprijs" required name="artikelprijs" step="0.01"></p>
                    <p><input class="w3-input w3-padding-16" type="text" placeholder="Producent" required name="producent"></p>
                    <p><input class="w3-input w3-padding-16" type="file" required name="uploadfile"></p>
                    <p><button class="w3-button w3-light-grey w3-section" type="submit" name="knop">Voeg toe</button></p>
                </form>
                </div>
            </div>
        ';
    }
?>