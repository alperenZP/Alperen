<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
echo "<h1>Record toevoegen</h1>";
echo '
<table>
<form action="toevoegen.php"method="post">
<tr><td>Naam:            </td>   <td><input type="text" name="naam">        </td></tr>
<tr><td>Voornaam:        </td>   <td><input type="text" name="voornaam">    </td></tr>
<tr><td>Klas:            </td>   <td><input type="text" name="klas">        </td></tr>
<tr><td>Straat:          </td>   <td><input type="text" name="straat">      </td></tr>
<tr><td>Postcode:        </td>   <td><input type="text" name="postcode">    </td></tr>
<tr><td>Plaats:          </td>   <td><input type="text" name="plaats">      </td></tr>
<tr><td>GeboorteDatum:         </td>   <td><input type="text" name="geboortedatum">      </td></tr>
<tr><td colspan=2><input type="submit" value="Aanmaken" name="submit">     </td></tr>
</form>
</table>';
if (isset($_POST['submit'])) {
    $naam = $_POST['naam'];
    $voornaam = $_POST['voornaam'];
    $klas = $_POST['klas'];
    $straat = $_POST['straat'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $geboortedatum = $_POST['geboortedatum'];
    include "connect.php";
    $sql = "INSERT INTO tbloef7 (fammilie_naam, voornaam, klas, straat, postcode, plaats, geboortedatum) VALUES ('" . $naam . "', '" . $voornaam . "', 
        '" . $klas . "', '" . $straat . "', '" . $postcode . "','" . $plaats . "','" . $geboortedatum . "')";
    if ($mysqli->query($sql)) {
        echo "Record succesvol toegevoegd<br>";
    } else {
        echo 'Error record toevoegen: ' . $mysqli->error . "<br>";
    }
    $mysqli->close();
}
print "<br><a href='indexm.php'>Ga terug naar de lijst</a>";
?>
</body>
</html>