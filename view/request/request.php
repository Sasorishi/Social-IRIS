<?php
	include ('../header.php');
	include ('../nav.php');

	$unControler->setTable("user");
	$unResultat = $unControler->selectAll();
	
	var_dump($_SESSION)
?>

<body id="profil">


</body>
<?php
	include ('../footer.php');
?>