<?php
session_start();
if (isset($_SESSION['admin'])){
    if ($_SESSION['admin']==0){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}

include "connect.php";
echo "<h1>Record verwijderen</h1>";
if (isset($_POST['knop'])) {
    $sql = "DELETE FROM tbl_gebruikers WHERE leerlingnummer =" . $_POST['leerling'];
    if ($mysqli->query($sql)) {

    } else {
        echo "Error record wissen:" . $mysqli->error;
    }
    $sql = "DELETE FROM tbl_gemaakteoefening WHERE gebruikersnummer =" . $_POST['leerling'];
    if ($mysqli->query($sql)) {

    } else {
        echo "Error record wissen:" . $mysqli->error;
    }
    $mysqli->close();

    print "<form><a href='index.php'>Ga terug naar de lijst</a></form>";
}else {

    echo '
<form method="post" action="wissen.php" >
   <label>welke leerling wilt u wissen</label>
  <input type="number" name="leerling" id=" leerling" >
</table>
<br>
    <input type="submit" id="knop" name="knop" value="knop">
 
</form>';
}

?>