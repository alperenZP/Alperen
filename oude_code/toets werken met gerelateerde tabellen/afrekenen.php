<?php

if (isset($_POST["knop"])){
    $tafelnummer=$_POST["tafelnummer"];
    $betaalmethode=$_POST["afrekenen"];
    include "connect.php";
    $sql="SELECT afrekeningnummer, tblbestelling.tafelnummer, totaal, betaalmethode,tijd FROM tblbestelling,tblafrekening WHERE tblbestelling.tafelnummer = tblafrekening.tafelnummer";

    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();

    $totaal=$row["totaal"];
    echo "<table>";
    echo "<tr><td>betaalmethode</td><td>tafelnummer</td><td>totaal</td></tr>";

        echo "<tr><td>". $betaalmethode . "</td><td>". $tafelnummer . "</td><td>". $totaal . "</td></tr>";
    $sql="INSERT INTO  tblafrekening (tafelnummer,totaal,betaalmethode)VALUES ('".$tafelnummer."','".$totaal."','".$betaalmethode."')";
    if ($mysqli->query($sql)) {
        echo "Record succesvol toegevoegd<br>";
    } else {
        echo "Error record toevoegen: " . $mysqli->error."<br>";
    }
    $sql="DELETE FROM tblbestelling Where tafelnummer='".$tafelnummer."'";

    if ($mysqli->query($sql)) {
        echo "Record succesvol toegevoegd<br>";
    } else {
        echo "Error record toevoegen: " . $mysqli->error."<br>";
    }
    print "<a href='openstaand.php'> ga terug</a>";
}else{
    echo '
    <form action="afrekenen.php" method="post">
    tafelnummer: <input type="text" name="tafelnummer" id="tafelnummer">
    hoe wilt u betalen: <input type="text" name="afrekenen" id="afrekenen">
    <input type="submit"  value="knop" name="knop">
</form>
    ';
}
?>