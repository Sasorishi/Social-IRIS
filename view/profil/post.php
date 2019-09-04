<?php
  	$unControler->setTable('post');
  	$resultats = $unControler->displayPost($_SESSION['idUser']);

	foreach ($resultats as $unResultat)
	{
?>	
		<div class="card text-black bg-light">
			<div class="card-body">
				<h5 class="card-title"><img class="rounded-circle img-thumbnail mr-4" src="<?php echo "../../public/folder/".$_SESSION['folder']."/".$_SESSION['imgUser'] ?>" style="width: 10%" alt="Profil picture"><?= $unResultat['post'] ?></h5>
				<br>
				<button type="button" class="btn btn-light"><p class="card-text"><i class="fas fa-heart"></i> <?= $unResultat['postLike'] ?></p></button>
				<button type="button" class="btn btn-light"><p class="card-text"><i class="fas fa-share-square"></i></p></button>
				<p class="card-text"><small class="text-muted float-right"><?= $unResultat['datePost'] ?></small></p>
				<input class="mt-3 rounded" type="text" name="" placeholder="write your comment ..." style="width: 100%">
			</div>
		</div>
		
<?php
	}
?>