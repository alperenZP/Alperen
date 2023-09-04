<?php


session_start();
include "connect.php";

if (isset($_POST["knop"])) {
    $sql = "SELECT leerlingnummer,naam,wachtwoord,klas FROM tbl_gebruikers WHERE naam='".$_POST['naam']."' and wachtwoord='".$_POST['password']."'";
    $resultaat = $mysqli->query($sql);

    $row = $resultaat->fetch_assoc();
    $row_cnt = $resultaat->num_rows;

    if ($row_cnt==1) {
        $_SESSION["login"]=$row["leerlingnummer"];
        if ($row['klas']=='lkr'){
            $_SESSION['admin']=1;
        }else{
            $_SESSION['admin']=0;
        }

        header('location: index.php');

    } else {
        $_SESSION["login"] = 0;
        echo "u wachtwoord of gebruikernaam is niet correct";
    }
}
echo' <form method="post" action="login.php">
        <h3>Login Hier</h3>

        <label for="naam">naam</label>
        <input type="text" placeholder="naam" name="naam" id="naam">
            <br><br>
        <label for="password">Password</label>
        <input type="password" placeholder="password" name="password" id="password">

        <input type="submit" id="knop" name="knop" value="Login">
        </form>';
?>

