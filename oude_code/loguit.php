<?php
// Start de sessie.  Begin hier telkens mee op elke pagina!
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
session_destroy();
print "<br>Je bent uitgelogd.";
print "<br><a href='login.php'>Ga naar index.php.</a>";
?>
</body>
</html>