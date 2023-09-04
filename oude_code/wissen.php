
<?php
include "connect.php";
echo "<h1>Record verwijderen</h1>";

$sql = "DELETE FROM tbloef7 WHERE nummer =".$_GET['tewissen'];
if ($mysqli->query($sql)) {
echo "Record succesvol gewist.";
} else {
    echo "Error record wissen:" .$mysqli->error;
}
$mysqli->close();
print "<br><a href='indexm.php'>Ga terug naar de lijst</a>";
?>