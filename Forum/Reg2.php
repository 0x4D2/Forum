<?php
require_once  'verbindung.php';
require './nav/nav.php';

if(isset($_POST['name'])&& isset($_POST['pw']) && isset($_POST['pw2'])&&isset($_POST['email'])
&&isset($_POST['datum'])&& isset($_POST['gender'])){

	if($_POST['pw']==$_POST['pw2']){


		$query=" INSERT INTO tblBenutzer VALUES (NULL,
		'".$_POST['name']."',
		'".$_POST['pw']."',
		'".$_POST['email']."',
		'".$_POST['datum']."',
		'".$_POST['gender']."',
		Now(),
		NULL,
		NULL,
		(SELECT p_beGrupID FROM tblBenutzergruppe WHERE beGrupName = 'USER') ); ";



try{
$stmt=$conn->prepare($query);
$stmt->execute();
}catch(PDOEXception $e){
	echo "DB_Fehler: ".$e->getMessage();
	die("Ende");
}



	}


}else{
echo "nichts gesetzt";

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Regestrierung</title>
</head>
<body>
	<h1>Regstrierung</h1>
	<form action="" method="POST">
		<table border="2">
		<tr>
		<td>Benutzername*:</td> <td><input type="text" name="name" required></td>
		</tr>

		<tr>
		<td>Passwort*:</td> <td><input type="password" name="pw" required></td>
		</tr>

		<tr>
		<td>Passwort wdh*:</td> <td><input type="password" name="pw2" required></td>
		</tr>

		<tr>
		<td>E-mail*:</td> <td><input type="text" name="email" required></td>
		</tr>

		<tr>
		<td>Gebursdatum*:</td><td><input type="date" name="datum" required></td>
		</tr>

		<tr>
		<td>Geschlecht*:</td>
		</tr>

		<tr>
		<td>Mann</td> <td><input type="radio" name="gender" value="m" required></td>
		</tr>

		<tr>
		<td>Frau</td><td><input type="radio" name="gender" value="f" required></td>
	</tr>

	<tr>
	<td><input type="submit" value="Abesenden"></td>
	</tr>
</form>
</tabel>
</body>
</html>