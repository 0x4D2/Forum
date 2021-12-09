<?php
require './nav/nav.php';

if(isset($_SESSION['userID'])){

session_destroy();
header("Refresh:3;index.php");
echo "Sie werden jeden Moment ausgeloggt";


}else{

	echo "Sie sind nicht eingeloggt";
	header("Refresh:3;index.php");
}

?>