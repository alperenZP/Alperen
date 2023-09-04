<?php
echo "<h1>Tabel aanpassen</h1>";
include "connect.php";
if (isset($_POST['veranderen'])){
    $dranknummer = $_POST['nummer'];
    $naam = $_POST['dranknaam'];
    $prijs = $_POST['prijs'];


    $sql = "UPDATE tbldrank SET dranknaam = '".$naam."', prijs = '".$prijs."' WHERE dranknummer =".$dranknummer;

    if ($mysqli->query($sql)) {
        echo "Record succesvol bijgewerkt";
    } else {
        echo "Error record wijzigen: ".$mysqli->error;
    }
    print "<br><a href='openstaand.php'>Ga terug naar de lijst</a>";
}
else {

    $sql = "select * from tbldrank where dranknummer = ".$_GET['teveranderen'];
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();
    echo '<table>
             <form action=wijzig.php method="post">
             <tr><td>nummer   </td>     <td> '.$row["dranknummer"].' <input type="hidden" name="nummer" value="'.$row["dranknummer"].'">

             <tr><td>dranknaam       </td> <td> '.$row["dranknaam"].'     <input type="hidden" name="dranknaam" value="'.$row['dranknaam'].'"></td></tr>
             <tr><td>prijs   </td> <td>      <input type="text" name="prijs" value="'.$row["prijs"].'"></td></tr>
             <tr><td colspan=2> <input type="submit" value="veranderen" name="veranderen">  </td></tr>
</form>
</table>';
}
$mysqli->close();
?>
