<?php
include "dbconnect.php";

$sql = mysqli_query($conn, 'SELECT zoo2.Kind, zoo3.CageLocation, zoo3.Coo1, zoo3.Coo2 FROM zoo2 JOIN zoo3 ON zoo2.NoCageLocation=zoo3.id ORDER BY zoo2.Kind;');
  while ($result = mysqli_fetch_array($sql)) {
    //echo '<li>'.'<a class="product-card" href="contact.php?coo1='.$result['Coo1'].'&coo2='.$result['Coo2'].'">'.'<img src="img/animals/'.$result['Kind'].'.jpg" width="156" height="180">'.'<h3>'.$result['Kind'].'</h3>'.'<span class="price">'.$result['CageLocation'].'</span>'.'</a>'.'</li>';
    echo '<li>'.'<a style="text-decoration: none;" class="product-card" href="animal.php?kind='.$result['Kind'].'">'.'<img src="img/animals/'.$result['Kind'].'.jpg" width="156" height="180">'.'<h5 style="color: black;">'.$result['Kind'].'</h5>'.'<span class="price">'.$result['CageLocation'].'</span>'.'</a>'.'</li>';
  }
?>