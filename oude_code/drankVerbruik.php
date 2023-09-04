<?php
session_start();

if (isset($_SESSION["naam"])) {
    $_SESSION["aantal"]=0;
    $_SESSION["aantalcola"]=0;
    $_SESSION["aantalwater"]=0;
    $_SESSION["aantalpint"]=0;
    $_SESSION["aantalwijn"]=0;


    print "Rekening van " . $_SESSION["naam"];
    if (isset($_POST["knop"])){
       $_SESSION["aantal"]=0;
        if ($_POST["cola"]){
            $_SESSION["aantalcola"]=$_SESSION["aantal"];
        }elseif ($_POST["water"]){
            $_SESSION["aantalwater"]=$_SESSION["aantal"];
        }elseif ($_POST["pint"]){
            $_SESSION["aantalpint"]=$_SESSION["aantal"];
        }elseif ($_POST["wijn"]){
            $_SESSION["aantalwijn"]=$_SESSION["aantal"];
        }


        echo '<form method="post" action="drankVerbruik.php">
            <select id="drinken" name="drinken" size="3">
            <option name="cola" value="cola">cola</option>
            <option name="water" value="water">water</option>
            <option name="pint" value="pint">pint</option>
            <option  name="pint" value="wijn">wijn</option>
            </select>
            
            <label>aantal</label>
            <input type="number" id="aantal" name="aantal">
            
            <input type="submit" id="knop" name="knop" value="Doorsturen">
            
</form>';

        print "voor aftereken klik <a href='afrekenen.php'>hier</a>";


    }else {

        echo '<form method="post" action="drankVerbruik.php">
            <select id="drinken" name="drinken" size="3">
            <option  value="cola">cola</option>
            <option  value="water">water</option>
            <option  value="pint">pint</option>
            <option  value="wijn">wijn</option>
            </select>
            
            <label>aantal</label>
            <input type="number" id="aantal" name="aantal">
            
            <input type="submit" id="knop" name="knop" value="Doorsturen">
            
</form>';
    }
}else{
    header('Location: menu.php');
}
?>
