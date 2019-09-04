<?php
	include('../header.php');
	include('../nav_index.php');
?>

<body>
	<img src="../../img/logo.png" class="mt-3 mb-5" style="width: 10%">
	<div class="container-fluid margin-bottom-100">
		<div class="login-form">
			<div class="main-div">
				<div class="panel">
					<h2>Register</h2>
					<p>Please enter your information to sign in</p>
				</div>
				<form method="post" action="" enctype="multipart/form-data">
				  <div class="card text-center  mx-auto d-block mt-5" style="width: 93%">
				    <div class="card-header">
				      Profil picture
				    </div>
				  </div>
				  <div class="row m-4">
				    <div class="col-sm-6">
				      <div class="card ml-3">
				        <div class="card-body">
				          <img class="card-img mx-auto d-block" style="width: 200px; height: 200px;" src="<?php echo "../../public/folder/".$_SESSION['folder']."/".$_SESSION['imgUser'] ?>" alt="Card image">
				        </div>
				      </div>
				    </div>
				    <div class="col-sm-6">
				      <div class="card mr-3" style="height: 100%">
				        <div class="card-body">
				          <label for="file">Upload your file (PNG | Size : 512x512) :</label></br>
				          <input type="file" name="file" id="file">
				        </div>
				        <button type="submit" class="btn btn-primary" name="uploadProfil" onclick="return confirm('Confirm to valide your new upload profil picture');">Upload</button>
				      </div>
				    </div>
				  </div>
				</form>

				<form method="post" action="" enctype="multipart/form-data">
				  <div class="card text-center mx-auto d-block mt-5" style="width: 93%">
				    <div class="card-header">
				      Profil cover
				    </div>
				  </div>
				  <div class="row m-4">
				    <div class="col-sm-6">
				      <div class="card ml-3">
				        <div class="card-body">
				          <img class="card-img mx-auto d-block"  src="<?php echo "../../public/folder/".$_SESSION['folder']."/".$_SESSION['coverUser'] ?>" alt="Card image">
				        </div>
				      </div>
				    </div>
				    <div class="col-sm-6">
				      <div class="card mr-3" style="height: 100%">
				        <div class="card-body">
				          <label for="file">Upload your file (PNG | Size : 2400x1450) :</label></br>
				          <input type="file" name="file" id="file">
				        </div>
				        <button type="submit" class="btn btn-primary" name="uploadCover" onclick="return confirm('Confirm to valide your new upload profil cover');">Upload</button>
				      </div>
				    </div>
				  </div>
				</form>

				<form method="post" action="">
				  <div class="card text-center mx-auto d-block mt-5" style="width: 93%">
				    <div class="card-header">
				      About you
				    </div>
				  </div>
				  <div class="row m-4">
				    <div class="col-sm-12">
				      <div class="card ml-3">
				        <div class="card-body">
				          <div class="form-group">
				            <label for="work">Work</label>
				            <input type="text" class="form-control" id="work">
				            <small id="workHelp" class="form-text text-muted">Where you are working (for example : Google, Microsoft ...)</small>
				          </div>
				          <div class="form-group">
				            <label for="lives">Lives</label>
				            <input type="text" class="form-control" id="lives">
				            <small id="livesHelp" class="form-text text-muted">Where you are living (your city or town)</small>
				          </div>
				          <div class="form-group">
				            <label for="from">From</label>
				            <input type="text" class="form-control" id="from">
				            <small id="fromHelp" class="form-text text-muted">Where you are from (your country)</small>
				          </div>
				        </div>
				      </div>
				    </div>
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary" style="width: 100%" onclick="return confirm('Confirm to valide your edit');">Submit</button>
				</form>
			</div>
		</div>

		<?php
			if(isset($_POST['uploadProfil']))
		    {
		      $_FILES['file']['name'];
		      var_dump($_FILES);
		      $dirUpload = '../../public/folder/'.$_SESSION['folder'].'/';
		      $tmp_name = $_FILES["file"]["tmp_name"];
		      $name = "profil.png";
		      move_uploaded_file($tmp_name, "$dirUpload/$name");
		    }

		    if(isset($_POST['uploadCover']))
		    {
		      $_FILES['file']['name'];
		      var_dump($_FILES);
		      $dirUpload = '../../public/folder/'.$_SESSION['folder'].'/';
		      $tmp_name = $_FILES["file"]["tmp_name"];
		      $name = "cover.png";
		      move_uploaded_file($tmp_name, "$dirUpload/$name");
		    }
		    
			if (isset($_POST['submit']))
			{
				$tableUser['imgUser'] = NULL;
				$tableUser['coverUser'] = NULL;
				$tableUser['aboutUser'] = NULL;
				$tableUser['lives'] = NULL;
				$tableUser['country'] = NULL;
				$tableUser['work'] = NULL;

				$unControler->setTable('user');
				$unControler->insert($tableUser);

				?> <div class="alert-msg"> <?php echo "Account succesful adding in social Iris !"; ?> </div> <?php
			}
		?>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="profilPicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	    		<span aria-hidden="true">&times;</span>
	    	</button>
		    <div class="modal-body">
		      	<img class="rounded-circle" style="width:100%;" src="<?php echo "../../public/folder/".$_SESSION['folder']."/".$_SESSION['imgUser'] ?>" style="width: 50%" alt="Profil picture">
		    </div>
	    </div>
	  </div>
	</div>

</body>

<?php
	include ('../footer.php');
?>
