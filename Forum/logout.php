<?php
require './nav/nav.php';
#Beim ausloggen wird der Cookie zersört und und man wird zur Startseite weitergeleitet 
if (isset($_SESSION['userID'])) {
	session_destroy();
	header("Refresh:3;index.php");
	echo "Sie werden jeden Moment ausgeloggt";
} else {

	echo "Sie sind nicht eingeloggt";
	header("Refresh:3;index.php");
}
