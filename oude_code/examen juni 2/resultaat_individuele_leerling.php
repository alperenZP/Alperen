<?php

session_start();


include "connect.php";
if (isset($_SESSION['admin'])){
    if ($_SESSION['admin']==0){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
if (isset($_POST['knop'])) {

    $naam =$_POST["leerling"];
    $sql="Select * From tbl_gebruikers Where naam ='$naam'";
    $resultaat = $mysqli->query($sql);
    echo "<table>";

    while ($row = $resultaat->fetch_assoc()) {
        echo "<tr><td>". $row['naam'] . "</td>
";
        $nummer=$row['leerlingnummer'];
    }


    $sql="Select * From tbl_gemaakteoefening WHERE gebruikersnummer=".$nummer;
    $resultaat = $mysqli->query($sql);
    while ($row = $resultaat->fetch_assoc()) {
        echo "<td>". $row['antwoord'] . "</td>
";
        $volgnummer=$row['volgnummergemaakteoefening'];
    }

    $sql="Select * From tbl_oefeningen WHERE oefeningnummer=".$volgnummer;
    $resultaat = $mysqli->query($sql);
    while ($row = $resultaat->fetch_assoc()) {
        echo "<td>". $row['oefening'] . "</td><td>". $row['oplossing'] . "</td> </tr>
";
    }
    echo "</table>";

} else {
    echo '
<form method="post" action="resultaat_individuele_leerling.php" >
   <label>welke leerling wilt u bekijken</label>
  <input type="text" name="leerling" id=" leerling" >
</table>
<br>
    <input type="submit" id="knop" name="knop" value="knop">
 
</form>
';
}
?>

