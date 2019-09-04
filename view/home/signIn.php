<?php
	include('../header.php');
	include('../nav_index.php');
?>

<!DOCTYPE html>
<body id="LoginForm">
	<img src="../../img/logo.png" class="mt-3 mb-5" style="width: 10%">
	<div class="container-fluid margin-100">
		<div class="login-form">
			<div class="main-div">
				<div class="panel">
					<h2>Register</h2>
					<p>Please enter your information to sign in</p>
				</div>
				<form id="Login" method="post">
				    <div class="form-group">
				        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail">
				    </div>

				    <div class="form-group">
				        <input type="text" name="username" class="form-control" placeholder="Usename">
				    </div>

				    <div class="form-group">
				        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
				    </div>

				    <div class="form-group">
				        <input type="text" name="lastName" class="form-control" placeholder="First Name">
				    </div>

				    <div class="form-group">
				        <input type="text" name="firstName" class="form-control" placeholder="Last Name">
				    </div>

				    <div class="form-group">
				        <select name="sexe">
							<option value="">--Please choose an option--</option>
						    <option value="man">Man</option>
						    <option value="woman">Woman</option>
						</select>
				    </div>
				        
				    <button type="submit" name="register" class="btn btn-primary">REGISTER</button>
				</form>
			</div>
		</div>

		<?php
			if (isset($_POST['register'])) 
			{
				$dirname = uniqid();
				$folderImg = $dirname. "/img";
				$folderVideo = $dirname. "/video";
				
				$tableUser['username'] = $_POST['username'];
				$tableUser['sexe'] = $_POST['sexe'];
				$tableUser['password'] = md5($_POST['password']);
				$tableUser['lastName'] = $_POST['lastName'];
				$tableUser['firstName'] = $_POST['firstName'];
				$tableUser['email'] = $_POST['email'];
				$tableUser['folder'] = $dirname;
				$tableUser['imgUser'] = "profil.png";
				$tableUser['coverUser'] = "cover.png";
				$tableUser['aboutUser'] = "No description";
				$tableUser['lives'] = NULL;
				$tableUser['country'] = NULL;
				$tableUser['work'] = NULL;

				$unControler->setTable('user');
				$unControler->insert($tableUser);

				?> <div class="alert-msg"> <?php echo "Account succesful adding in social Iris !"; ?> </div> <?php
				$unControler->createFolderUser($dirname);

				$unControler->createFolderUser($folderImg);
				$unControler->createFolderUser($folderVideo);

				copy("../../public/folder/default/cover.png", "../../public/folder/".$dirname."/cover.png");
				copy("../../public/folder/default/profil.png", "../../public/folder/".$dirname."/profil.png");

				//header("Location : signInContinue.php");
			}
		?>
	</div>

</body>

<?php
	include ('../footer.php');
?>
