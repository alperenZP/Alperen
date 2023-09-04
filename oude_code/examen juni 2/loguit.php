<?php
session_start();
?>

<?php
session_destroy();
print "<h3><br>Je bent uitgelogd.</h3>";
print "<form><br><a href='index.php'>Ga terug naar de home home pagina</a></form>";
?>
