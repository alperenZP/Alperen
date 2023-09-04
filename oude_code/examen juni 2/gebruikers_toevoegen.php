<?php
session_start();
if (isset($_SESSION['admin'])){
    if ($_SESSION['admin']==0){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
if (isset($_POST['knop'])) {
    $naam = $_POST['naam'];
    $wachtwoord = $_POST['wachtwoord'];
    $klas = $_POST['klas'];


    include "connect.php";
    $sql = "INSERT INTO tbl_gebruikers (naam, wachtwoord,klas ) VALUES ('" . $naam . "',   '" . $wachtwoord . "', '" . $klas . "')";

    if ($mysqli->query($sql)) {
        echo "Record succesvol toegevoegd<br>";
    } else {
        echo 'Error record toevoegen: ' . $mysqli->error . "<br>";
    }
    $mysqli->close();
    print "<form><br><a href='index.php'>Ga terug naar de lijst</a></form>";
}else{

    echo'
<form method="post" action="gebruikers_toevoegen.php">
    <h3>toevoegen hier</h3>
   
                <label for="naam"></label>
                <input type="text" name="naam" id="naam" placeholder="naam">
                <br><br>
                  <input type="password" name="wachtwoord" id="wachtwoord" placeholder="wachtwoord">
                  <br><br>
                  <input type="text" name="klas" id="klas" placeholder="klas">
<br><br>



    <input type="submit" id="knop" name="knop" value="Toevoegen">
</form>
';
}

?>