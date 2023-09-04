<?php
include "connect2.php";
echo '<h1>Record toevoegen</h1>';

if (isset($_POST["knop"])){
    $naam = $_POST["naam"];
    $voornaam = $_POST["voornaam"];
    $straat = $_POST["straat"];
    $postcode = $_POST["postcode"];

    echo 'De postcode: '.$postcode.' <br>';

    $sql = "SELECT count(*) as aantal FROM tblpostcode WHERE postcode ='".$postcode."'";
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();

    print "Er zijn ".$row['aantal']." postcodes gevonden <br>";

    if ($row['aantal'] == 0) {
        echo '
De plaatsnaam van postcode [' . $postcode . '] bestaat niet.
<br> Voer een plaats in:
<br><br>
<form action="toevoegen2.php" method="post">
<input type="text" name="plaats" required>
<input type="hidden" name = '.$postcode.'>
<input type="hidden" name = '.$naam.'>
<input type="hidden" name = '.$voornaam.'>
<input type="hidden" name = '.$straat.'>

<br><br>
<input type="submit" name="plaatsknop" value="Voeg plaats toe">
</form>
';
    }
        $sql = "
INSERT INTO tbloef8 (
voornaam, 
naam, 
straat, 
postcode
) VALUES (
'".$voornaam."', 
'".$naam."', 
'".$straat."', 
'".$postcode."'
)
";

        if ($mysqli->query($sql)) {
            echo "Record succesvol toegevoegd<br>";
        } else {
            echo "Error record toevoegen: " . $mysqli->error."<br>";
        }
        $mysqli->close();

} else {
    echo '
<form action="toevoegen2.php" method="post">
Naam: <input type="text" name="naam" required>
<br>
Voornaam: <input type="text" name="voornaam" required>
<br>
Straat: <input type="text" name="straat" required>
<br>
Postcode: <input type="text" name="postcode" required>
<br><br>
<input type="submit" name="knop" value="Voeg toe">
</form>
';
}
if (isset($_POST["plaatsknop"])){
    $plaats = $_POST["plaats"];

    $sql = "
INSERT INTO tbloef8 (
voornaam, 
naam, 
straat, 
postcode
) VALUES (
'".$voornaam."', 
'".$naam."', 
'".$straat."', 
'".$postcode."'
)
";
    print $sql;
    if ($mysqli->query($sql)) {
        $sql = "
INSERT INTO tblpostcode (
postcode, 
plaats
) VALUES (
'".$postcode."', 
'".$plaats."'
)
";
        if ($mysqli->query($sql)) {
            echo "Record succesvol toegevoegd<br>";
        } else {
            echo "Error record toevoegen: " . $mysqli->error."<br>";
        }
    } else {
        echo "Error record toevoegen: " . $mysqli->error."<br>";
    }
    $mysqli->close();
}

echo '
<br><br><br>
<b><a href="indexw.php">Terug naar index.</a></b>';
?>
