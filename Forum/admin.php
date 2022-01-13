<?php
require_once 'verbindung.php';
require './nav/nav.php';


if (isset($_SESSION['userID'])) {

	$query = " Select benName, f_beGrupID from tblBenutzer inner join tblBenutzergruppe on(f_beGrupID=p_beGrupID) Where beGrupName='Administator' AND p_benID='" . $_SESSION['userID'] . "'";

	try {

		$stmt = $conn->prepare($query);
		$stmt->execute();
		$erg = $stmt->fetch();
	} catch (PDOException $e) {

		die("Fehler");
	}

	if (empty($erg)) {
		echo "Keine Adminrechte";
	} else {

		$query2 = 'Select benName, benMail from tblBenutzer';
		$stmt = $conn->prepare($query2);
		$stmt->execute();
		echo 'Auflistung der User <br><br>';
		echo '<table border = "1">
			  <tr><th>Username</th>
		      <th>Email</th>
			  </tr>';
		while ($row = $stmt->fetch()) {

			echo '<tr><td>' . $row['benName'] . '</td> <td>' . $row['benMail'] . '</td></tr>';
		}
		echo "</table>";
	}
} else {

	echo 'Sie sind nicht eingeloggt';
	echo '<a href=login.php>Zum Login....</a>';
	exit();
}
