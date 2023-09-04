<?php
echo "<h1>Tabel aanpassen</h1>";
include "connect2.php";
if (isset($_POST['veranderen'])){
    $nummer = $_POST['nummer'];
    $naam = $_POST['naam'];
    $voornaam = $_POST['voornaam'];
    $straat = $_POST['straat'];
    $postcode= $_POST['postcode'];
    $plaats = $_POST['plaats'];

    $sql = "UPDATE tbloef8,tblpostcode SET naam = '".$naam."', voornaam = '".$voornaam."', straat = '".$straat."',
    plaats = '".$plaats."' WHERE nummer =".$nummer;
    print $sql;

    if ($mysqli->query($sql)) {
        echo "Record succesvol bijgewerkt";
    } else {
        echo "Error record wijzigen: ".$mysqli->error;
    }
    print "<br><a href='indexw.php'>Ga terug naar de lijst</a>";
}
else {

    $sql = "select * from tbloef8,tblpostcode where nummer = ".$_GET['teveranderen'];
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();
    echo '<table>
             <form action=wijzig2.php method="post">
             <tr><td>nummer   </td>     <td> '.$row["nummer"].' <input type="hidden" name="nummer" value="'.$row["nummer"].'">

             <tr><td>naam       </td> <td>     <input type="text" name="naam" value="'.$row['naam'].'"></td></tr>
             <tr><td>Voornaam   </td> <td>      <input type="text" name="voornaam" value="'.$row["voornaam"].'"></td></tr>
             <tr><td>Straat     </td> <td>      <input type="text" name="straat" value="'.$row["straat"].'"></td></tr>
             <tr><td>Postcode   </td> <td>      <input type="text" name="postcode" value="'.$row["postcode"].'"></td></tr>
             <tr><td>Plaats     </td> <td>      <input type="text" name="plaats" value="'.$row["plaats"].'"></td></tr>
             <tr><td colspan=2> <input type="submit" value="veranderen" name="veranderen">  </td></tr>
</form>
</table>';
}
$mysqli->close();
?><?php
