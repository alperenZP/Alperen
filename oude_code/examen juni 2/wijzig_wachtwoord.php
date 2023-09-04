<?php
session_start();

echo "<h2>Tabel aanpassen</h2><br>";
include "connect.php";
if (isset($_POST['knop'])){
    $wachtwoord = $_POST['wachtwoord'];

    $sql = "UPDATE tbl_gebruikers SET wachtwoord = '".$wachtwoord."' WHERE leerlingnummer =".$_SESSION["login"];

    if ($mysqli->query($sql)) {
        echo "Record succesvol bijgewerkt";
    } else {
        echo "Error record wijzigen: ".$mysqli->error;
    }
    header('Location: index.php');

}else{

    $sql = "select * from tbl_gebruikers where leerlingnummer = ".$_SESSION["login"];
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();
    echo'
<form method="post" action="wijzig_wachtwoord.php">
    <h3>toevoegen hier</h3>
   
              <table>
            

              <p>'.$row["naam"].'</p>
              <p>'.$row["klas"].'</p>
              <input type="text" name="wachtwoord" value="'.$row["wachtwoord"].'">
             
         

</table>
<br>
    <input type="submit" id="knop" name="knop" value="Wijzigen">
 
</form>
';
}
?>
