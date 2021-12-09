<?php

require_once 'verbindung.php';
require './nav/nav.php';

if(isset($_POST['ben']) && isset($_POST['passwort'])){


										$query="SELECT p_benID FROM tblBenutzer
				  						WHERE benName = '".$_POST['ben']."'
				  						AND benPassWd = '".$_POST['passwort']."'";
									



								try{
											$stmt=$conn->prepare($query);
											$stmt->execute();


										}catch(PDOException $e){
											header("Refresh:3;login.php");
											echo "DatenbankFehler: der Benutzer konnte nicht angelegt werden! <br>";
											echo $e->getMessage();
											die("-ENDE_");

										}

										$check=$stmt->fetch();
										if(empty($check)){
										echo "Benutzedaten sind falsch";

										}else{
											header("Refresh:3;index.php");
											echo "Login Erfolgreich";
											echo " Weiterleitung";
											$_SESSION['userID']=$check['p_benID'];


											exit();
										}

}


?>

<!DOCTYPE html>
<html>
Login
</head>
<body>
	<br>
<form action="" method="post">
Benutzer<input type="test" name="ben"  required><br>
Passwort<input type="password" name="passwort"  required><br>
<input type="submit" value="Absenden"><br>
</form>

</body>
</html>

