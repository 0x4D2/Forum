<?php
require_once 'verbindung.php';
require './nav/nav.php';






		if (    isset($_POST['userName']) && 
			isset($_POST['password1'])&&
			isset($_POST['email'])&&
			isset($_POST['gebDatum'])&&
			isset($_POST['gender']) && 
			isset($_POST['password2'])  ) {


			
	
				if($_POST['password1'] ==$_POST['password2']) {


						$query = "INSERT INTO tblBenutzer VALUES ( 	NULL, 
												'".$_POST['userName']."',
												'".$_POST['password1']."',
												'".$_POST['email']."',
												'".$_POST['gebDatum']."',
												'".$_POST['gender']."',
												NOW(),
												NULL,
												NULL,
												NULL,
												(SELECT p_beGrupID FROM tblBenutzergruppe WHERE beGrupName = 'User') );";
				




try{
			$stmt=$conn->prepare($query);
			$stmt->execute();
		}catch(PDOException $e){
			echo "Datenbank Fehler: der Benutzer konnte nicht angelegt werden! <br>";
			echo $e->getMessage();
			die("-ENDE_");

		}
		echo "Der Benutzer wurde erfolgreich angelegt<br><br>";
		header ("Refresh:3;login.php");
		exit("Weiterleitung in 3 Sekunden...");




				}else{echo 'Pw stimmt nicht übereindt';}
			



		

























		}
				
			



?>


<html>
	<head>
		<title>Registrierung</title>
	</head>
	<body>
		<form action="" method="POST">
			<table>
				<tr>
					<td>Benutzername*:</td><td><input type="text" name="userName" value="" required></td>
				</tr>
				<tr>
					<td>Passwort*:</td><td><input type="password"  name="password1" value="" required></td>
				</tr>
				<tr>
					<td>Passwort wiederholen*:</td><td><input type="password"  name="password2" value="" required></td>
				</tr>
				<tr>
					<td>E-Mail*:</td><td><input type="text"  name="email" value="" required></td>
				</tr>
				<tr>
					<td>Geburtsdatum*:</td><td><input type="date"  name="gebDatum" value="" required></td>
				</tr>
				<tr>
					<td>Geschlecht*:</td><td><input type="radio" name="gender" value="m" required>M&auml;nnlich<br><input type="radio" name="gender" value="f" required>Weiblich<br></td>
				</tr>
				<tr>
					<td>*Benötigte Felder</td><td><input type="submit" value="Registrieren"></td>
				</tr>
			</table>
		</form>
	</body>
</html>