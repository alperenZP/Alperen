<!DOCTYPE html>
<html lang="en">
<head>
  <title>Examen databases - juni 2023</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>Examen databases - 5IF - juni 2023</h1>
  <p>Naam: Xander Nauwelaerts  klas: 5IF</p>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Opties voor iedereen</h3>
        <p><a href="login.php">Login</a></p>
        <?php
        session_start();
        if (isset($_SESSION["login"])){
            echo "
            <p><a href='loguit.php'>loguit</a></p>
            <p><a href='wijzig_wachtwoord.php'>wijzig</a></p>
            ";
            if ($_SESSION["admin"]==0){
                echo "<p><a href='oefening.php'>oefeningen maken</a></p>";
                echo "<p><a href='oefeningen_herbekijken.php'>oefeningen herbekijken</a></p>";
            }elseif ($_SESSION["admin"]==1){
                echo "<p><a href='resultaten_per_klas.php'>resultaten bekijken per klas</a></p>";
                echo "<p><a href='resultaat_individuele_leerling.php'>resultaten bekijken per leerling</a></p>";
                echo "<p><a href='wissen.php'>wissen</a></p>";
                echo "<p><a href='gebruikers_toevoegen.php'>gebruikers toevoegen</a></p>";
            }
        }
        ?>
    </div>
    <div class="col-sm-4">
      <h3>Opties voor leerling (alleen zichtbaar voor leerlingen)</h3>
      <p>Oefenigen maken + verbetering krijgen + resultaten opslagen in tbl_gemaakteoefening (25p)</p>
      <p>Gemaakte oefeningen herbekijken (10p)</p>
    </div>
    <div class="col-sm-4">
      <h3>Opties voor leerkracht (alleen zichtbaar voor leerkrachten)</h3>
      <p>Resulaten van alle leerlingen per klas kunnen bekijken (15p)</p>
      <p>Per leerling oefeningen tonen met opgave, juist antwoord en antwoord van de leerling (15p)</p>
      <p>Leerlingen wissen, ook de gerelateerde gegevens uit tabel tbl_gemaakteoefening worden gewist (5p)</p>
      <p>Nieuwe gebruikers aanmaken met alle velden van tbl_gebruiker (10p)</p>
    </div>
  </div>
</div>
<div class="jumbotron text-center">
    <h2>Examen volledig opnemen met screenrec: <a href="https://screenrec.com/">https://screenrec.com/</a><BR>Registreer je en stuur de link mee door bij uploaden op smartschool!</h2>
    <h2>Examen uploaden in smartschool!</h2>
    <h2>Examen tonen voor je het lokaal verlaat!</h2>
</div>
</body>
</html>

<?php

?>

