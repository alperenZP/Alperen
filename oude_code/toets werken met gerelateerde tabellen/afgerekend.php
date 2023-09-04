<?php
include "connect.php";
$sql="SELECT afrekeningnummer,tafelnummer,totaal,betaalmethode,tijd FROM tblafrekening ORDER BY tijd";


$resultaat = $mysqli->query($sql);

echo "<table>";
echo "<tr><td>afrekennummer</td><td>tafelnummer</td><td>totaal</td><td>betaalmethode</td><td>tijd</td></tr>";
while ($row = $resultaat->fetch_assoc()) {
    echo "<tr><td>" . $row['afrekeningnummer'] . "</td><td>" . $row['tafelnummer'] . "</td><td>" . $row['totaal'] . "</td><td>" . $row['betaalmethode'] . "</td>
    <td>" . $row['tijd'] . "</td></tr>";
}
$sql="Select tafelnummer,SUM(totaal) From tblafrekening group by tafelnummer";
$resultaat = $mysqli->query($sql);
echo "<tr><td>tafelnummer</td><td>totaal</td></tr>";
while ($row = $resultaat->fetch_assoc()) {
    echo "<tr><td>" . $row['tafelnummer'] . "</td><td>" . $row['SUM(totaal)'] . "</td></tr>";
}
