<?php
Session_start();

#Einbindung der Navigationsleite
?>
<html>
<head>
	<link rel="stylesheet" href="./css/stylesheet.css">
	<title></title>
</head>
<body>
<ul class="topnav">
  

  <?php
  echo "<html>";
  if(isset($_SESSION['userID'])){
    echo "<li><a href='index.php'>Startseite</a></li>";
    echo "<li><a href='suche.php'>Suche</a></li>";
    echo "<li><a href='admin.php'>Adminbereich</a></li>";
    echo "<li><a href='profil.php'>Profil</a></li>";
    echo "<li class='right'><a href='logout.php'>Logout</a></li>";
    echo "<li class='right'><a href='impressum.php'>Impressum</a></li>";


  }else{
    echo "<li><a href='index.php'>Startseite</a></li>";
    echo "<li><a href='login.php'>Login</a></li>";
    echo "<li><a href='reg.php'>Registierung</a></li>";
    echo "<li class='right'><a href='impressum.php'>Impressum</a></li>";




  }

  ?>





</ul>



</body>
</html>
</body>
</html> 