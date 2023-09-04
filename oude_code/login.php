<?php
session_start();
?>
<?php
if (isset($_POST["knop"])){
    if (($_POST["gebruikernaam"]=="admin") && ( $_POST["wachtwoord"]=="admin")){
       $_SESSION["inlog"]="admin";
        header('location: controle.php');
    }elseif (($_POST["gebruikernaam"]=="gast") &&( $_POST["wachtwoord"]=="gast")){
        $_SESSION["inlog"]="gast";
        header('location: controle.php');
    }else{
        $_SESSION["inlog"]="verkeerd";
        header('location: controle.php');
    }


}else{
    echo '<form method="post" action="login.php">
    <label for="gebruikernaam">gebruikersnaam: </label>
    <input type="text" id="gebruikernaam" name="gebruikernaam">
    <br><br>
    <label for="wachtwoord">gebruikersnaam: </label>
    <input type="password" id="wachtwoord" name="wachtwoord">
    <br><br><br>
    <input type="submit" id="knop" name="knop" value="Doorsturen">
    </form>
    ';
}

?>
