<?php
  if(isset($_POST['uploadProfil']))
  {
    $_FILES['file']['name'];
    var_dump($_FILES);
    $dirUpload = '../../public/folder/'.$_SESSION['folder'].'/';
    $tmp_name = $_FILES["file"]["tmp_name"];
    $name = "profil.png";
    move_uploaded_file($tmp_name, "$dirUpload/$name");

    ?>
    
    </br>
    <div class="alert-msg mb-5">Account succesful updating !</div>
    </br>
    
    <?php

    header("Refresh:1");
  }

  if(isset($_POST['uploadCover']))
  {
    $_FILES['file']['name'];
    var_dump($_FILES);
    $dirUpload = '../../public/folder/'.$_SESSION['folder'].'/';
    $tmp_name = $_FILES["file"]["tmp_name"];
    $name = "cover.png";
    move_uploaded_file($tmp_name, "$dirUpload/$name");

    ?>
    
    </br>
    <div class="alert-msg mb-5">Account succesful updating !</div>
    </br>
    
    <?php

    header("Refresh:1");
  }

  if (isset($_POST['submit1'])) 
  {
    $unControler->setTable('user');

    $tab = array("work"=>$_POST['work'], "lives"=>$_POST['lives'], "country"=>$_POST['country']);
    $where = array('idUser'=>$_SESSION['idUser']);
    $unControler->update($tab, $where);

    $_SESSION['work'] = $_POST['work'];
    $_SESSION['lives'] = $_POST['lives'];
    $_SESSION['country'] = $_POST['country'];
    
    ?>
    
    </br>
    <div class="alert-msg mb-5">Account succesful updating !</div>
    </br>
    
    <?php

    header("Refresh:1");
  }

  if (isset($_POST['submit2'])) 
  {
    $unControler->setTable('user');


    $tab = array("email"=>$_POST['email'], "sexe"=>$_POST['sexe']);
    $where = array('idUser'=>$_SESSION['idUser']);
    $unControler->update($tab, $where);

    $_SESSION['email'] = $_POST['email'];
    $_SESSION['sexe'] = $_POST['sexe'];

    ?>

    </br>
    <div class="alert-msg mb-5">Account succesful updating !</div>
    </br>
    
    <?php

    header("Refresh:1");
  }

  if (isset($_POST['submit3'])) 
  {
    $unControler->setTable('user');


    $tab = array("aboutUser"=>$_POST['aboutUser']);
    $where = array('idUser'=>$_SESSION['idUser']);
    $unControler->update($tab, $where);

    $_SESSION['aboutUser'] = $_POST['aboutUser'];

    ?>

    </br>
    <div class="alert-msg mb-5">Account succesful updating !</div>
    </br>
    
    <?php

    header("Refresh:1");
  }
?>

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
            <label for="aboutUser">Description</label>
            <input type="text" name="aboutUser" class="form-control" id="aboutUser" placeholder="<?= $_SESSION['aboutUser'] ?>" value="<?= $_SESSION['aboutUser'] ?>">
            <small id="aboutUserHelp" class="form-text text-muted">Write something about you</small>
          </div>
          <button type="submit" name="submit3" class="btn btn-primary" style="width: 100%" onclick="return confirm('Confirm to valide your edit');">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row m-4">
    <div class="col-sm-6">
      <div class="card ml-3">
        <div class="card-body">
          <div class="form-group">
            <label for="work">Work</label>
            <input type="text" name="work" class="form-control" id="work" placeholder="<?= $_SESSION['work'] ?>" value="<?= $_SESSION['work'] ?>">
            <small id="workHelp" class="form-text text-muted">Where you are working (for example : Google, Microsoft ...)</small>
          </div>
          <div class="form-group">
            <label for="lives">Lives</label>
            <input type="text" name="lives" class="form-control" id="lives" placeholder="<?= $_SESSION['lives'] ?>" value="<?= $_SESSION['lives'] ?>">
            <small id="livesHelp" class="form-text text-muted">Where you are living (your city or town)</small>
          </div>
          <div class="form-group">
            <label for="from">From</label>
            <input type="text" name="country" class="form-control" id="from" placeholder="<?= $_SESSION['country'] ?>" value="<?= $_SESSION['country'] ?>">
            <small id="fromHelp" class="form-text text-muted">Where you are from (your country)</small>
          </div>
          <button type="submit" name="submit1" class="btn btn-primary" style="width: 100%" onclick="return confirm('Confirm to valide your edit');">Submit</button>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="card mr-3">
        <div class="card-body">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="<?= $_SESSION['email'] ?>" value="<?= $_SESSION['email'] ?>">
            <small id="emailHelp" class="form-text text-muted">Change your email (for example : Gmail, Yahoo, Orange ...)</small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" placeholder="Enter your new password">
            <small id="passwordHelp" class="form-text text-muted">Change your password</small>
          </div>
          <div class="form-group">
            <label for="sexe">Sexe</label>
            <input type="text" class="form-control" id="sexe" placeholder="<?= $_SESSION['sexe'] ?>" value="<?= $_SESSION['sexe'] ?>">
            <small id="sexeHelp" class="form-text text-muted">Are you a man or a woman</small>
          </div>
          <button type="submit" name="submit2" class="btn btn-primary" style="width: 100%" onclick="return confirm('Confirm to valide your edit');">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>