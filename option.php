<?php
include "dbconnect.php";

$ck = "<p><select id='var_grupa' name='var_grupa' size='1'>
<option value='0'>Все</option>";
$sql = mysqli_query($conn, 'SELECT id, CageLocation FROM zoo3;');
    while ($result = mysqli_fetch_array($sql)) {
        $ck .= "<option value='".$result['id']."'>".$result['CageLocation']."</option>";
    }   

echo $ck."<br>"."<br>";
echo '</select>';
echo '<br><input class="button" type="submit" value="Посмотреть"></input>';
?>