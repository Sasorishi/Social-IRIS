<?php
  include ('../header.php');
  include ('../nav.php');

  $resultats = $unControler->selectFriend($_SESSION['idUser']);
?>

<body>
  <div class="container">

  <?php
    //Columns must be a factor of 12 (1,2,3,4,6,12)
    $numOfCols = 5;
    $rowCount = 0;
  ?>
    <div class="row">
      <div class="card-deck margin-top-100">
  <?php
    foreach ($resultats as $unResultat)
    {
      $dirProfil = "../../public/folder/".$unResultat["folder"]."/profil.png";
  ?>  
      <div class='card'>
        <img class='card-img-top' src="<?php echo $dirProfil ?>" alt='Card image cap'>
          <div class='card-body'>
            <div class="text-center">
              <h5 class='card-title'><?php echo $unResultat['firstName']. " " .$unResultat['lastName'] ?></h5>
            </div>
          </div>
          <div class="text-center">
            <a href="searchprofil.php?idUser=<?php echo $unResultat["idUser"] ?>"><button type="submit" class="btn btn-primary">VIEW PROFIL</button></a>  
          </div>
        </div>
  <?php
        $rowCount++;
        if($rowCount % $numOfCols == 0) echo '</div></div><div class="row"><div class="card-deck margin-top-100">';
    }
  ?>
      </div>
    </div>
  </div>
</body>

<?php
  include ('../footer.php');
?>