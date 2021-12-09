<?php
require_once 'verbindung.php';
require './nav/nav.php';


if(isset($_SESSION['userID']) ){



 $query=" Select benName, f_beGrupID from tblBenutzer inner join tblBenutzergruppe on(f_beGrupID=p_beGrupID) Where beGrupName='Admin' AND p_benID='".$_SESSION['userID']."'";


try{

$stmt=$conn->prepare($query);
$stmt->execute();
$erg=$stmt->fetch();
}catch(PDOException $e){

	die("Fehler");
}

if(empty($erg)){
	echo "Keine Adminrechte";
}else{
	echo "Hallo Admin";
}


}else{

echo 'Sie sind nicht eingeloggt';
echo '<a href=login.php>Zum Login....</a>';
exit();

}

?>