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
if (isset($_POST['knop'])) {

 $klas =$_POST['klas'];
 $sql="Select * From tbl_gebruikers Where klas ='$klas'";
    $resultaat = $mysqli->query($sql);
    echo "<table>";
    while ($row = $resultaat->fetch_assoc()) {
        echo "<tr><td>". $row['naam'] . "</td></tr>
";
    }
    echo "</table>";


} else {
    echo '
<form method="post" action="resultaten_per_klas.php" >
   
  <select name="klas">
  <option value="6IT">6IT</option>
   <option value="5IT">5IT</option>
    <option value="6BE">6BE</option>
   
</select>
</table>
<br>
    <input type="submit" id="knop" name="knop" value="knop">
 
</form>
';
}
?>
