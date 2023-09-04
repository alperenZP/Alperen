<?php
include "connect.php";
$sql = "select * from tbloef7";


$resultaat = $mysqli->query($sql);



echo "<table>";
while ($row = $resultaat->fetch_assoc()) {
    echo "<tr><td>". $row['nummer'] ."</td><td>". $row['fammilie_naam'] . "</td><td>". $row['voornaam'] . "</td><td>". $row['klas'] . "</td><td>". $row['straat'] . "</td><td>"
        . $row['postcode'] . "</td><td>". $row['plaats'] . "</td><td>". $row['geboortedatum'] . "</td><td>
        <a href=wissen.php?tewissen=".$row["nummer"]. ">Wissen</a></td><td>
        <a href=wijzig.php?teveranderen=".$row["nummer"].">wijzig</a>
        
        </td>";
}
echo "</table>";
print "<a href='toevoegen.php'>voeg een record toe</a>"
?>
