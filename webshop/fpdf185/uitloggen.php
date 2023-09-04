<?php
  session_start();
?>

<?php
  include "connect.php";
  session_destroy();
  
  session_start();
  $_SESSION["isAdmin"] = false;
?>

<!DOCTYPE html>
<html>
<head>
<title>Uitloggen</title>
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
    </div>
  </div>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">
  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Uitgelogd</h1><br>
    <p>Je bent succesvol uitgelogd, klik <a href="index.php">hier</a> om terug te gaan.</p>
  </div>
  
<!-- End page content -->
</div>

</body>
</html>
