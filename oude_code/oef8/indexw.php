<?php
include "connect2.php";
$sql = "SELECT nummer, voornaam, naam, straat, tbloef8.postcode, plaats FROM tbloef8, tblpostcode WHERE tbloef8.postcode = tblpostcode.postcode";


$resultaat = $mysqli->query($sql);



echo "<table>";
while ($row = $resultaat->fetch_assoc()) {
    echo "<tr><td>". $row['nummer'] . "</td><td>". $row['naam'] . "</td><td>". $row['voornaam'] . "</td><td>". $row['straat'] . "</td><td>"
        . $row['postcode'] . "</td><td>". $row['plaats'] . "</td><td>
        <a href=wissen2.php?tewissen=".$row["nummer"]. ">Wissen</a></td><td>
        <a href=wijzig2.php?teveranderen=".$row["nummer"].">wijzig</a>
        
        </td>";
}
echo "</table>";
print "<a href='toevoegen2.php'>voeg een record toe</a>"
?>
