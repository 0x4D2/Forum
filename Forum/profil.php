<?php
require_once 'verbindung.php';
require './nav/nav.php';

#Überprüfun ob Cookie gesetzt ist
if(isset($_SESSION['userID'])){
	$query="Select p_benID, benName From tblBenutzer Where p_benID= '".$_SESSION['userID']."' ";
	#Für die passende Begrüßung wird sich der Name aus der Datenbank geholt

try{
$stmt=$conn->prepare($query);
$stmt->execute();

}catch(PDOException $e){
	echo "DatenbankFehler";
	echo $e->getMessage();
	$e = die("Ende");


}
$check=$stmt->fetch();
if(empty($check)){
	echo "leer";
}else{

	echo "<h1> <center> Herzlich Wilkommen <b> ".$check['benName']." </b> </center> </h1>";
	echo "<h3> <center> Hier finden Sie alle Daten zu ihrem Nutzer </center> </h3>";
	#Begrüßung des Users


$query3 = "Select benUeberMich from tblBenutzer Where p_benID= '".$_SESSION['userID']."'";

try{
$stmt = $conn->prepare($query3);
$stmt->execute();
$uber=$stmt->fetch();
#Ein Übermich Text wird ausgegeben, wenn man diesen gesetzt hat

}catch(PDOException $e){

	echo "DB-FEHLER<br>" .$e->getMessage();
}



#HTML Code in PHP code 
echo ' <!DOCTYPE html> 
<html>
<head>
</head>
<body >
<form action="" method="POST" align="center" >
Passwort:       <input type="text" name="pw"  required ><br>
PAsswort wdh:   <input type="text" name="pw2" value="" required><br>
<input type="submit" value="Abschicken">
<br><br>
</form>




<form action="" method="POST">
	<textarea id="text" name="um" cols="100" rows="20"></textarea><br>
	<input type="submit" Value="Setzen">
	



</form>


<h3>&Uuml;ber Mich:</h3> ';
echo " Dein Text:<br> '".$uber['benUeberMich']."'  ";
#Ausgabe Übermich Text



echo '




</form>
</body>
</html> ';


if(isset($_POST['pw'])&&isset($_POST['pw2'])){
if($_POST['pw']==$_POST['pw2']){
#Überprüfen ob die Passwörter gleich sind und überhaupt gesetzt sind

}

}



if(isset($_POST['um'])){
	$um=$_POST['um'];
#Hier wird der Übermich Text gesetzt wenn man diesen ändern möchte
$quer2=" Update tblbenutzer
set benUeberMich='".$um."'
Where p_benID= '".$_SESSION['userID']."' ";


try{
	$stmt=$conn->prepare($quer2);
	$stmt->execute();
	header("Refresh:0.1;profil.php");
}catch(PDOException $e){

echo "DB-Fehler" .$e->getMessage();

}




}


}

}else{
	echo "Sie sind nicht eingeloggt";
}

?>
