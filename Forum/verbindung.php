<?php
$servername="localhost";
$username="root";
$password="";
$dbname="forum";

try{$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
echo "Fehler mit der Verbindung: ".$e->getMessage();


}


?>