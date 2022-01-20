<?php

require_once 'verbindung.php';
require './nav/nav.php';

#Hier wird überprüft ob der schon Seassion gesetzt wurde um eine dopplte Anmeldung nich möglich zu machen
if (isset($_SESSION['userID'])) {
	echo "Sie sind bereits eingeloggt";
	exit();
	#Hier wird beendet
} else {

	if (isset($_POST['ben']) && isset($_POST['passwort'])) {
#Hier wird überprüft ob, die Loginmaske aus gefüllt ist.

		$query = "SELECT p_benID FROM tblBenutzer WHERE benName = '" . $_POST['ben'] . "' AND benPassWd = '" . $_POST['passwort'] . "'";
		$query2 = "SELECT benIsBanned FROM tblBenutzer WHERE benName = '" . $_POST['ben'] . "'";
		#Hier werden die SQL-Stamtments vorbereitet ob es den User mit den dazugehören Passwort gibt
		#Zusätzlich wird überprüft on der User gebannt is


		try {
			$stmt = $conn->prepare($query);
			$stmt->execute();

			$stmt2 = $conn->prepare($query2);
			$stmt2->execute();
			
		} catch (PDOException $e) {
			header("Refresh:3;login.php");
			#Bein Fehlerhafte Daten wird die login neu gelanden, damit man es erneut versuchen kann.
			echo $e->getMessage();
			die("-ENDE_");
		}

		$check = $stmt->fetch();
		$check2 = $stmt2->fetch();
		if (empty($check) && $check2['benIsBanned'] = 1) {
			echo "Benutzedaten sind falsch oder Sie sind gebannt";
			#Überprüfung des Staments oder ob User gebannt ist
		} else {
			header("Refresh:3;index.php");
			echo "Login Erfolgreich";
			echo " Weiterleitung";
			$_SESSION['userID'] = $check['p_benID'];
			#Seession Cookie wird gesetzt 


			exit();
		}
	}
}

?>

<!DOCTYPE html>
<html>
Login<br>
</head>

<!-- Einfacher HTML Code mit Post methode die REST-API angespricht und die Daten übergibt / -->
<body>

	<form action="" method="post">
		Benutzer<input type="test" name="ben" required><br>
		Passwort<input type="password" name="passwort" value="" autocomplete="off" required><br>
		<input type="submit" value="Absenden"><br>
	</form>

</body>

</html>