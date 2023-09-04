<?php
session_start();
if (!isset($_SESSION['aantalkeerbezocht'])) {
    $_SESSION['aantalkeerbezocht'] = 0;
    $_SESSION['punten'] = 0;
} else {
    $_SESSION['aantalkeerbezocht']++;
}
?>
<html>
<head>
    <title></title>
</head>
<body>

    <h1>oef op jsfdjksfdjksfd</h1>

<?php
$a = rand(0,10);
$b= rand(0,10);
$tekens = rand(1,4);

switch ($tekens){
    case 1:
        $operator = "+";
        break;
    case 2:
        $operator = "-";
        break;
    case 3:
        $operator = "*";
        break;
    case 4:
        $operator = "/";
        break;
}


    if ($_SESSION['aantalkeerbezocht'] >= 1 || isset($_POST["knop"])){
        echo '
              <h2>Je maakt '.$_SESSION['aantalkeerbezocht'].' oefeningen.</h2>';
        switch ($_POST["tekenoperator"]){
            case '+':
                $antwoord = $_POST["nummer1"] + $_POST["nummer2"];
            break;
            case '-':
                 $antwoord = $_POST["nummer1"] - $_POST["nummer2"];
            break;
            case '*':
                $antwoord = $_POST["nummer1"] * $_POST["nummer2"];
            break;
            case '/':
                $antwoord = $_POST["nummer1"] / $_POST["nummer2"];
            break;
    }

    echo '
              Verbetering van de laatste oefening: '.$_POST["value_a"].' '.$_POST["tekens"].' '.$_POST["value_b"].' = '.$antwoord.'
              <br>
              Jouw antwoord was: '.$_POST["gegeven"].'
              <br><br>
            ';

    if ($_POST["gegeven"] == $antwoord){
        echo '
                Je antwoord was juist!
              ';
        $_SESSION['punten']++;
    } else {
        echo '
                het is fout, je antwoorde: '.$_POST["gegeven"].'
              ';
    }

    echo '
              <h2>Je behaalde '.$_SESSION['punten'].' op '.$_SESSION['aantalkeerbezocht'].'</h2>
            ';
}


if ($_SESSION['aantal'] < 10){
    $_SESSION['aantal']++;
    echo '
          Oefening nummer '.$_SESSION['aantal'].':
          <br><br>
        ';
    $_SESSION['aantal']--;

    echo '
          <b>Rekenen</b>
          <br><br>
          <form method="post" action = "oef_5.php">
            '.$a.' '.$operator.' '.$b.' = <input type="number" name="gegeven">
            <input type="hidden" name="value_1" value='.$a.'>
            <input type="hidden" name="Value_2" value='.$b.'>
            <input type="hidden" name="tekenoperator" value='.$operator.'>
            <a href="oefeningen.php"><input type="submit" name="knop" value="Controleer!"></a>
          </form>
        ';
} else {
    echo '
           je behaalde '.$_SESSION['punten'].' op '.$_SESSION['aantal'].'
          <form>
            <input type="submit" name="reset" value="Opnieuw!">
          </form>
        ';
    session_destroy();
}

?>
</body>
</html>