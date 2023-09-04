<?php
session_start();
include "connect.php";
if (isset($_POST['knop'])) {
    $oefeningnummer=$_POST['oefeningnummer'];
    $sql="select * from tbl_oefeningen WHERE oefeningnummer='".$oefeningnummer."'";
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();

    $oplossing = $_POST['oplossing'];
    if ($oplossing!=$row['oplossing']) {
        print "fout!!!, de oplossing is ";
        print $row["oplossing"];
    }else{
        print "juist";
    }

    $sql = "INSERT INTO tbl_gemaakteoefening (volgnummergemaakteoefening,gebruikersnummer, antwoord) VALUES ('" . $oefeningnummer . "','" . $_SESSION['login'] . "', '" .$oplossing  . "')";
    if ($mysqli->query($sql)) {
        print "<br><a href='index.php'>Ga terug naar de lijst</a>";
    } else {
        echo 'Error record toevoegen: ' . $mysqli->error . "<br>";
    }
    $mysqli->close();
} else {
    $sql = "select * from tbl_oefeningen WHERE oefeningnummer = ".rand(1,318) ;
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();

    echo '
<form method="post" action="oefening.php">
    <h3>oefenen hier</h3>
   
                <label >'.$row["oefening"].'</label>
                <input type="hidden" name="oefeningnummer" id="oefeningnummer" value="'.$row["oefeningnummer"].'">
                
                  <input type="number" name="oplossing" id="oplossing" placeholder="oplossing">
             
    <input type="submit" id="knop" name="knop" value="Toevoegen">
   
</form>
';
}

