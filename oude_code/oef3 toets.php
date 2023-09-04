<?php

if (isset($_POST["knop"])) {

    print "je hebt ".$_POST["groot"]."grote spaggeti's en".$_POST["klein"]."kleine spaggeti's";
    if ($_POST["ja"]){
        print "je hebt korting";
    }else{
        print "je hebt geen korting";
    }
    $prijsG=$_POST["groot"]*15;
    $prijsK=$_POST["klein"]*11;
    $prijstotaal=$prijsG+$prijsK;
    print "subtotaal: ".$prijstotaal;



}else{
    echo '
        <form method="post" action="discriminant.php">
            <label for="groot" >hoeveel grote spagettis willt jij hebben?</label>
            <select name="groot" id="groot">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
            <option value=6>6</option>
            <option value=7>7</option>
            <option value=8>8</option>
            <option value=9>9</option>
            <option value=10>10</option>
            </select>
            <br>
            <br>
            <label for="klein">hoeveel kleine spagettis willt u hebben?</label>
            <select name="klein" id="klein">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
            <option value=6>6</option>
            <option value=7>7</option>
            <option value=8>8</option>
            <option value=9>9</option>
            <option value=10>10</option>
            </select>
            <br>
            <br>
            <p>hebt u korting</p>
            
            <input type="checkbox" id="ja" name="ja" value="ja"  >
            <label>ja</label>
            <input type="checkbox" id="nee" name="nee" value="nee"  >
            <label>nee</label>
            
            <br>
            <br>
            <input type="submit" id="knop" name="knop" value="Doorsturen">
        </form>
        ';
}

?>