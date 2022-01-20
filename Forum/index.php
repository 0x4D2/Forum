<?php
require_once 'verbindung.php';
require './nav/nav.php';
#Hier wird die Verbindung 1x eingebunden damit die Verbindung nicht mehrmals aufgebaut

$query = "Select okatname, ukatname From tbloberkategorien inner join tblUnterkategorie on (p_okatID=f_okatID)";
#SQL Statment wird übergeben

try {

   $stmt = $conn->prepare($query);
   $stmt->execute();
   #Statment wird ausgeführt
   while ($row = $stmt->fetch()) {
      #echo '<a href="unterkat.php?id='.$row['okatname']."'::'".$row['ukatname']."'<p>";
      echo '<li><a href="unterkat.php?id=' . $row['okatname'] . '">' . $row['ukatname'] . '</a></li>';
      #Query wird mit Schleife ausgegebeben und zusätzlich als HTML 
   }
} catch (PDOException $e) {
   #Fehlerbehandlung
   echo "Fehler: Ausgabe der Oberkatiegorien, Unterkatiegorien nicht möglich<br>";
   echo $e->getMessage();
   die("-Ende-");
   #Abbruch bei Fehler
}
