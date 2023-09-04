<?php
include 'connect.php';
session_start();


$sql = "SELECT * FROM tbl_gemaakteoefening WHERE gebruikersnummer=".$_SESSION['login'];


$resultaat = $mysqli->query($sql);



echo "<table>";
echo "<tr><td> volgnummer </td><td> gebruikernummer</td><td>antwoord</td><td>gemaakt op</td></tr>";
while ($row = $resultaat->fetch_assoc()) {
    echo "<tr><td>". $row['volgnummergemaakteoefening'] . "</td><td>". $row['gebruikersnummer'] . "</td><td>". $row['antwoord'] . "</td><td>". $row['gemaaktop'] . "</td><td>
";
    $volgnummer=$row["volgnummergemaakteoefening"];
    $antwoord=$row["antwoord"];

}

echo "</table>";
print "<br><a href='index.php'>Ga terug naar de lijst</a>";