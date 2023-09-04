
<?php
include "connect2.php";
echo "<h1>Record verwijderen</h1>";

$sql = "DELETE FROM tbloef8 WHERE nummer =".$_GET['tewissen'];
if ($mysqli->query($sql)) {
    echo "Record succesvol gewist.";
} else {
    echo "Error record wissen:" .$mysqli->error;
}
$mysqli->close();
print "<br><a href='indexw.php'>Ga terug naar de lijst</a>";
?><?php
