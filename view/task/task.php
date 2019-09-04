<?php
  include ('../header.php');
  include ('../nav.php');
  $champs = array("nameTask", "username", "firstName", "lastName");
  $where = array("username"=>$_POST['username'], "password"=>$_POST['password']);

  $unControler->setTable("task");
  $resultats = $unControler->selectMultipleTables($champs, $where);
?>

<body>
  <div class="container">

  <?php
    //Columns must be a factor of 12 (1,2,3,4,6,12)
    $numOfCols = 2;
    $rowCount = 0;
    ?>
    <div class="row">
    <?php
    foreach ($resultats as $unResultat)
    {
    ?>  
      <div class="card mb-3 margin-50 margin-left-15" style="width: 34rem">
        <img class="card-img-top" src=".../100px180/" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $unResultat['nameTask'] ?></h5>
          <p class="card-text"><?php echo $unResultat['description'] ?></p>
          <p class="card-text"><small class="text-muted"><?php echo $unResultat['difficulty'] ?></small></p>
          <p class="card-text"><small class="text-muted">Date : </small></p>
        </div>
      </div>

    <?php
        $rowCount++;
        if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
    }
  ?>

  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
</body>