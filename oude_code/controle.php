<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
if (isset($_SESSION["inlog"])) {
    if ($_SESSION["inlog"]=="gast") {
        print "<br>je bent ingelogd ga verder naar de boodschap <a href='main.php'>hier</a> ";
    }elseif ($_SESSION["inlog"]=="admin") {
        print "<br>je bent ingelogd ga verder naar de boodschap <a href='main.php'>hier</a> ";
    }elseif ($_SESSION["inlog"]=="verkeerd"){
        print "<br>verkeerd wachtwoord, ga terug via <a href='login.php'>hier</a>";
    }
}else{
    header('Location: login.php');
}
?>
</body>
</html>
