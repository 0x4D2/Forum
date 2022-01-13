<?php

require_once 'verbindung.php';
require './nav/nav.php';

if (isset($_POST['ben']) && isset($_POST['passwort'])) {


	$query = "SELECT p_benID FROM tblBenutzer
				  						WHERE benName = '" . $_POST['ben'] . "'
				  						AND benPassWd = '" . $_POST['passwort'] . "'";
										
										
	$query2 = "SELECT benIsBanned FROM tblBenutzer WHERE benName = '" . $_POST['ben'] . "'";


	try {
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		$stmt2 = $conn->prepare($query2);
		$stmt2->execute();
		
		
	} catch (PDOException $e) {
		header("Refresh:3;login.php");
		echo "DatenbankFehler: der Benutzer konnte nicht angelegt werden! <br>";
		echo $e->getMessage();
		die("-ENDE_");
	}

	$check = $stmt->fetch();
	$check2 = $stmt2->fetch();
	if (empty($check) && $check2['benIsBanned'] = 1 ) {
		echo "Benutzedaten sind falsch oder Sie sind gebannt";
	} else {
		header("Refresh:3;index.php");
		echo "Login Erfolgreich";
		echo " Weiterleitung";
		$_SESSION['userID'] = $check['p_benID'];


		exit();
	}
}


?>

<!DOCTYPE html>
<html>
Login<br>
</head>

<body>

	<form action="" method="post">
		Benutzer<input type="test" name="ben" required><br>
		Passwort<input type="password" name="passwort" value="" autocomplete="off" required><br>
		<input type="submit" value="Absenden"><br>
	</form>

</body>

</html>