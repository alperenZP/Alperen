<?php
include "connect.php";
$sql = "SELECT bestelnummer, tafelnummer, tblbestelling.dranknummer, aantal FROM tblbestelling, tbldrank WHERE tblbestelling.dranknummer = tbldrank.dranknummer";


$resultaat = $mysqli->query($sql);



echo "<table>";
echo "<tr><td>bestelnummer</td><td>tafelnummer</td><td>dranknummer</td><td>aantal</td></tr>";
while ($row = $resultaat->fetch_assoc()) {
    echo "<tr><td>". $row['bestelnummer'] . "</td><td>". $row['tafelnummer'] . "</td><td>". $row['dranknummer'] . "</td><td>". $row['aantal'] . "</td><td>
        <a href=afrekenen.php?teafrekenen=".$row["bestelnummer"]. ">afrekenen</a></td><td>
        <a href=wijzig.php?teveranderen=".$row["bestelnummer"].">aanpassen</a>
        
        </td>";
}
echo "</table>";
print "<a href='toevoegen.php'>voeg een record toe</a>";
print "<br><a href='afgerekend.php'>naar de afgerekende tafels</a>";
?>
