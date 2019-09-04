<?php
	include ('../header.php');
	include ('../nav.php');

	$unControler->setTable("user");
	$resultat = $unControler->selectAll();
	
	// var_dump($_SESSION)
?>

<body id="profil">
	<div class="container-fluid">
		<form method="post" action="" enctype="multipart/form-data">
			<div class="col-sm-6 m-5 mx-auto d-block">
		      <div class="card mr-3" style="height: 100%">
		        <div class="card-body">
		          <label for="file">Upload your picture (JPG or PNG) :</label></br>
		          <input type="file" name="file" id="file">
		        </div>
		        <button type="submit" class="btn btn-primary" name="uploadImg" onclick="return confirm('Confirm to valide your picture');">Upload</button>
		      </div>
		    </div>
		</form>

		<?php
			if(isset($_POST['uploadImg']))
		    {
		      $_FILES['file']['name'];
		      var_dump($_FILES);
		      $dirUpload = '../../public/folder/'.$_SESSION['folder'].'/img';
		      $tmp_name = $_FILES["file"]["tmp_name"];
		      $name = $_FILES['file']['name'];
		      move_uploaded_file($tmp_name, "$dirUpload/$name");
		    }
		?>

		<div class="container">
		<?php
			$urlphoto = "../../public/folder/".$_SESSION['folder']."/img";
			// Name folder where content all the pictures
			$nameFolder = "../../public/folder/".$_SESSION['folder']."/img";
			if (is_dir($nameFolder))
			{
				$folder = opendir($nameFolder);
				while ($file = readdir($folder))
			    {
			    	if ($file != "." AND $file != ".." AND (stristr($file,'.gif') OR stristr($file,'.jpg') OR stristr($file,'.png') OR stristr($file,'.bmp')))
			        {
		?>
			        	<a target="_blank" href="<?= $urlphoto."/".$file ?>">
			        		<img src="<?= $urlphoto."/".$file ?>" style="width: 15%" class="p-2">
			        	</a>
		<?php
			        }
			    }    
			   closedir($folder);
			}
			else
			{
		?>
				<p>The folder doesn't exists'</p>
		<?php
			}
		?>
		</div>
	</div>
</body>

<?php
	include ('../footer.php');
?>