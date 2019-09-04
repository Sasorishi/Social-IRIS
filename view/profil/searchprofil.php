<?php
	include ('../header.php');
	include ('../nav.php');

	$unControler->setTable("user");
	$unResultat = $unControler->displayProfil($_GET['idUser']);
?>

<body id="profil">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<div class="card margin-top-100">
					<!-- 2400x1450 -->
					<a href="" data-toggle="modal" data-target="#profilCover">
						<img class="card-img" src="<?php echo "../../public/folder/".$unResultat[0]['folder']."/".$unResultat[0]['coverUser'] ?>" alt="Card image">
					</a>
					<div class="card-img-overlay margin-top-100">
						<div class="text-center">
							<!-- 512x512 -->
							<a href="" data-toggle="modal" data-target="#profilPicture">
								<img class="card-img-top rounded-circle img-thumbnail" src="<?php echo "../../public/folder/".$unResultat[0]['folder']."/".$unResultat[0]['imgUser'] ?>" style="width: 50%" alt="Profil picture">
							</a>
						</div>
					</div>
					<div class="text-center margin-top-50">
						<div class="card-body">
						    <h5 class="card-title"><?php echo $unResultat[0]['firstName']. " " .$unResultat[0]['lastName']; ?></h5>
						</div>
					    <p class="card-text p-3"><?php echo $unResultat[0]['aboutUser'] ?></p>

					    <div class="card-group">
						  	<div class="card">
						    	<div class="card-body">
						      		<h5 class="card-title">FRIENDS</h5>
						    		<?php
						    			$unControler->setTable("friend");
										$unResultat = $unControler->selectCountFriend($unResultat[0]['idUser']);
										{ 
											echo '<a href="#">(' .$unResultat. ')</a>';
										}
										$unControler->setTable("user");
										$unResultat = $unControler->displayProfil($_GET['idUser']);
									?>
						    	</div>
						  	</div>
						  	<div class="card">
						    	<div class="card-body">
							      	<h5 class="card-title">POINTS</h5>
							      	<?php 
										$i = 2500;
										{ 
											echo '<a href="#">(' .$i. ')</a>';
										}
									?>
						    	</div>
						  	</div>
						</div>
					</div>
				</div>

				<div class="card margin-50">
					<div class="text-center">
						<div class="card-body">
					    	<h5 class="card-title">ABOUT ME</h5>
					  	</div>
					</div>
					<div class="p-3">
						<div class="row m-2">
					    	<img src="../../img/icons/work.png" style="width: 20px; height: 20px;">
					    	<div class="pl-3">
								<p>WORK at <?= $unResultat[0]['work'] ?></p>
							</div>
						</div>
						<div class="row m-2">	
					    	<img src="../../img/icons/house.png" style="width: 20px; height: 20px;">
					    	<div class="pl-3">
					    		<p>LIVES at <?= $unResultat[0]['lives'] ?></p>
					    	</div>
						</div>
						<div class="row m-2">
					    	<img src="../../img/icons/placeholder.png" style="width: 20px; height: 20px;">
					    	<div class="pl-3">
					    		<p>FROM <?= $unResultat[0]['country'] ?></p>
					    	</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-lg-6">
				<div class="card margin-top-100">
					<div class="card-header">
						<form method="post" action="">
						<div class="input-group mb-3">
							<input type="text" name="message" class="form-control" placeholder="Message" aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-comment-alt"></i></button>
							</div>
						</div>
						</form>
					</div>

					<?php
						if(isset($_POST['message'])) 
						{
							$tablePost['post'] = $_POST['message'];
							$tablePost['datePost'] = date('Y-m-d H:i:s');
							$tablePost['postLike'] = 0;
							$tablePost['idUser'] = $_GET['idUser'];
							$unControler->setTable('post');
							$unControler->insert($tablePost);
						}
						include('postUser.php');
					?>

				</div>
			</div>

			<div class="col-lg-3 margin-top-100">
				<div class="card bg-light mb-3 p-3">
					<div class="card-header text-center">
						PICTURES 
						<?php 
							$i = 140;
							{ 
								echo '<a href="pictureUser.php">(' .$i. ')</a>';
							}
						?>
					</div>

					<div class="card-deck">
						<div class="card p-1">
							<a href="" data-toggle="modal" data-target="#profilCover">
							<img class="card-img-top" src="../../img/img1.png" alt="Card image cap">
							</a>
						</div>
						<div class="card p-1">
							<a href="" data-toggle="modal" data-target="#profilCover">
							<img class="card-img-top" src="../../img/img2.png" alt="Card image cap">
							</a>
						</div>
						<div class="card p-1">
							<a href="" data-toggle="modal" data-target="#profilCover">
							<img class="card-img-top" src="../../img/img3.png" alt="Card image cap">
							</a>
						</div>
						<div class="card p-1">
							<a href="" data-toggle="modal" data-target="#profilCover">
							<img class="card-img-top" src="../../img/img4.png" alt="Card image cap">
							</a>
						</div>
					</div>

					<div class="card-deck margin-top-50">
						<div class="card p-1">
					    	<img class="card-img-top" src="../../img/img1.png" alt="Card image cap">
					    </div>

					    <div class="card p-1">
					    	<img class="card-img-top" src="../../img/img2.png" alt="Card image cap">
					    </div>

					    <div class="card p-1">
					    	<img class="card-img-top" src="../../img/img3.png" alt="Card image cap">
					    </div>

					    <div class="card p-1">
					    	<img class="card-img-top" src="../../img/img4.png" alt="Card image cap">
					    </div>
					</div>
				</div>		
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="profilPicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
	    <div class="modal-body">
	      	<img class="rounded-circle" style="width:100%;" src="<?php echo "../../public/folder/".$unResultat[0]['folder']."/".$unResultat[0]['imgUser'] ?>" style="width: 50%" alt="Profil picture">
	    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="profilCover" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
	    <div class="modal-body">
	      	<img style="width:100%;" src="<?php echo "../../public/folder/".$unResultat[0]['folder']."/".$unResultat[0]['coverUser'] ?>" alt="Card image">
	    </div>
    </div>
  </div>
</div>

</body>

<?php
	include ('../footer.php');
?>