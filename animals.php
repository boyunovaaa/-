<?php
include "dbconnect.php";

$ck = "<p><select id='var_grupa' name='var_grupa' size='1'>
<option value='0'>Все</option>";
/*if (isset($_POST['var_grupa']) & $_POST['var_grupa'] != ''){
    $sql = mysqli_query($conn, "SELECT CageLocation FROM zoo3 WHERE id=".$_POST['var_grupa'].";");
    while ($result = mysqli_fetch_array($sql)) {
        $ck .= "<option disabled>".$result['CageLocation']."</option>";
    }
}
else{*/
    
//}


$sql = mysqli_query($conn, 'SELECT id, CageLocation FROM zoo3;');
    while ($result = mysqli_fetch_array($sql)) {
        $ck .= "<option value='".$result['id']."'>".$result['CageLocation']."</option>";
    }   


echo $ck."<br>"."<br>";

echo '</select>';
echo '<br><input class="button" type="submit" value="Посмотреть"></input>';
?>