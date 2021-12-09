<?php
#Test
require_once 'verbindung.php';
require './nav/nav.php';

$query = "Select okatname, ukatname From tbloberkategorien inner join tblUnterkategorie on (p_okatID=f_okatID)";

try{

$stmt = $conn->prepare($query);
$stmt ->execute();
while($row = $stmt->fetch()) {
   #echo '<a href="unterkat.php?id='.$row['okatname']."'::'".$row['ukatname']."'<p>";
   echo '<li><a href="unterkat.php?id='.$row['okatname'].'">'.$row['ukatname'].'</a></li>';

 

}

}catch(PDOException $e){
echo "Fehler: Ausgabe der Oberkatiegorien, Unterkatiegorien nicht möglich<br>";
echo $e->getMessage();
die("-Ende-");






}



?>
