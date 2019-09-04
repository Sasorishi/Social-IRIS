<?php
	include('../header.php');
	include('../nav_index.php');
?>

<body id="LoginForm">

	<img src="../../img/logo.png" class="mt-3 mb-5" style="width: 10%">
	<!-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,  sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,  sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p> -->

	<div class="container-fluid margin-100">

	<?php
		include('login.php');

		if(isset($_POST['login']))
		{
			$champs = array("idUser", "username", "firstName", "lastName", "email", "sexe", "folder", "imgUser", "coverUser", "aboutUser", "lives", "country", "work");
			$where = array("username"=>$_POST['username'], "password"=>md5($_POST['password']));
			$unControler->setTable("user");
			$unResultat = $unControler->login($champs, $where, "and");
			if($unResultat['number'] == 0)
			{
				?> <div class="alert-msg"> <?php echo "Username or password are wrong !"; ?> </div> <?php
			}
			else
			{
				session_start();
				$_SESSION['username'] = $unResultat['username'];
				$_SESSION['idUser'] = $unResultat['idUser'];
				$_SESSION['firstName'] = $unResultat['firstName'];
				$_SESSION['lastName'] = $unResultat['lastName'];

				$_SESSION['email'] = $unResultat['email'];
				$_SESSION['sexe'] = $unResultat['sexe'];
				$_SESSION['folder'] = $unResultat['folder'];
				$_SESSION['imgUser'] = $unResultat['imgUser'];
				$_SESSION['coverUser'] = $unResultat['coverUser'];

				$_SESSION['aboutUser'] = $unResultat['aboutUser'];
				$_SESSION['lives'] = $unResultat['lives'];
				$_SESSION['country'] = $unResultat['country'];
				$_SESSION['work'] = $unResultat['work'];

				header('Location: ../profil/profil.php');
			}
		}
	?>
	</div>
</body>

<?php
	include ('../footer.php');
?>