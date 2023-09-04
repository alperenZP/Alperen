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
<tr><td>tafelnummer           </td>   <td><select name="tafelnummer" id="tafelnummer" >
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>      </td></tr>
<tr><td>drank:     </td>   <td><select name="drank" id="drank">
<option value="cola">cola</option>
<option value="water">water</option>
<option value="bier">bier</option>
<option value="wijn">wijn</option>
</select>    </td></tr>
<tr><td>aantal:            </td>   <td><input type="number" name="aantal" id="aantal">        </td></tr>
<tr><td colspan=2><input type="submit" value="Aanmaken" name="submit">     </td></tr>
</form>
</table>';
if (isset($_POST['submit'])) {
    $tafelnummer = $_POST['tafelnummer'];
    if ($_POST["drank"]=="cola"){
        $drank = 1;
    }elseif ($_POST["drank"]=="water"){
        $drank = 2;
    }elseif ($_POST["drank"]=="bier"){
        $drank = 3;
    }else{
        $drank = 4;
    }
    $aantal = $_POST['aantal'];

    include "connect.php";
    $sql = "INSERT INTO tblbestelling (tafelnummer, dranknummer, aantal) VALUES ('" . $tafelnummer . "', 
        '" . $drank . "', '" . $aantal ."')";
    if ($mysqli->query($sql)) {
        echo "Record succesvol toegevoegd<br>";
    } else {
        echo 'Error record toevoegen: ' . $mysqli->error . "<br>";
    }
    $mysqli->close();
}
print "<br><a href='openstaand.php'>Ga terug naar de lijst</a>";
?>
</body>
</html>
