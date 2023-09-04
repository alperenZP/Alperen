<?php
echo "<h1>Tabel aanpassen</h1>";
include "connect.php";
   if (isset($_POST['veranderen'])){
    $nummer = $_POST['nummer'];
    $naam = $_POST['naam'];
    $voornaam = $_POST['voornaam'];
    $klas = $_POST['klas'];
    $straat = $_POST['straat'];
    $postcode= $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $geboortedatum= $_POST['geboortedatum'];
    $sql = "UPDATE tbloef7 SET fammilie_naam = '".$naam."', voornaam = '".$voornaam."', klas = '".$klas."', straat = '".$straat."',
    plaats = '".$plaats."', geboortedatum = '".$geboortedatum."' WHERE nummer =".$nummer;
    print $sql;

    if ($mysqli->query($sql)) {
       echo "Record succesvol bijgewerkt";
    } else {
        echo "Error record wijzigen: ".$mysqli->error;
    }
    print "<br><a href='indexm.php'>Ga terug naar de lijst</a>";
}
   else {

       $sql = "select * from tbloef7 where nummer = ".$_GET['teveranderen'];
       $resultaat = $mysqli->query($sql);
       $row = $resultaat->fetch_assoc();
       echo '<table>
             <form action=wijzig.php method="post">
             <tr><td>nummer   </td>     <td> '.$row["nummer"].' <input type="hidden" name="nummer" value="'.$row["nummer"].'">

             <tr><td>naam       </td> <td>     <input type="text" name="naam" value="'.$row['fammilie_naam'].'"></td></tr>
             <tr><td>Voornaam   </td> <td>      <input type="text" name="voornaam" value="'.$row["voornaam"].'"></td></tr>
             <tr><td>Klas       </td> <td>      <input type="text" name="klas" value="'.$row["klas"].'"></td></tr>
             <tr><td>Straat     </td> <td>      <input type="text" name="straat" value="'.$row["straat"].'"></td></tr>
             <tr><td>Postcode   </td> <td>      <input type="text" name="postcode" value="'.$row["postcode"].'"></td></tr>
             <tr><td>Plaats     </td> <td>      <input type="text" name="plaats" value="'.$row["plaats"].'"></td></tr>
             <tr><td>geboorteDatum     </td> <td>      <input type="text" name="geboortedatum" value="'.$row["geboortedatum"].'"></td></tr>
             <tr><td colspan=2> <input type="submit" value="veranderen" name="veranderen">  </td></tr>
</form>
</table>';
   }
$mysqli->close();
?>
