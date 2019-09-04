<?php
	ob_start();
	session_start();
?>

<header>
	<nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark">
		<a class="navbar-brand" href="#"><img src="../../img/logo.png" style="width: 15rem"></a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  	<ul class="navbar-nav mr-auto">

		    	<li class="nav-item">
		        	<a class="nav-link" href="../home/homeProfil.php">Home <i class="fas fa-home"></i></a>
		    	</li>

		    	<li class="nav-item">
		        	<a class="nav-link" href="../message/message.php">Messages <i class="fas fa-envelope"></i></a>
		    	</li>

			    <li class="nav-item">
			    	<a class="nav-link" href="../profil/user.php">Friends <i class="fas fa-user-friends"></i></a>
		    	</li>

		    	<li class="nav-item">
			    	<a class="nav-link" href="../task/task.php">Tasks <i class="fas fa-tasks"></i></a>
		    	</li>

		    	<li class="nav-item">
			    	<a class="nav-link" href="../request/request.php">Requests <i class="fas fa-share-square"></i></a>
		    	</li>

		    	<div class="ml-5">
		    	<form method="post" action="" class="form-inline my-2 my-lg-0">
		    		<div class="input-group-prepend">
			    		<span class="input-group-text" id="basic-addon1">@</span>
			    	</div>
					<input type="text" name="searchprofil" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
				<?php
					if(isset($_POST['searchprofil'])) 
					{
						$searchprofil = $_POST['searchprofil'];

						$unControler->setTable('user');
						$resultat = $unControler->searchProfil($searchprofil);
						echo $resultat[0]['idUser'];

						header('Location: searchprofil.php?idUser='.$resultat[0]['idUser']);
					}
				?>
				</form>
		    	</div>
		    </ul>

		    <ul class="navbar-nav navbar-right">
		    	<li class="nav-item">
		        	<a class="nav-link" href="../profil/profil.php">Profil <i class="fas fa-user"></i></a>
		    	</li>

		    	<li class="nav-item dropdown">
			    	<a class="nav-link" href="../setting/setting.php">Settings <i class="fas fa-sliders-h"></i>
			        </a>
		    	</li>

		    	<li class="nav-item">
		    		<form method="post" action="">
		        		<a class="nav-link" href="../home/home.php" name="logout">Logout <i class="fas fa-sign-out-alt"></i></a>
		        		<?php
		        			if(isset($_POST['logout'])) 
		        			{
		        				// Détruit toutes les variables de session
		        				$_SESSION = [];

		        				session_destroy();
		        				header('Location: ../home/home.php');
		        			}
		        		?>	
		    		</form>
		    	</li>
		    </ul>
		</div>
	</nav>
</header>