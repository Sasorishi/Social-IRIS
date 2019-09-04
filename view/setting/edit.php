<?php
  include ('../header.php');
  include ('../nav.php');
  $unControler->setTable("user");
  $unResultat = $unControler->selectAll();
?>

<form class="p-3">  
  <div class="form-row margin-top-100">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First name</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="First name">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Last name</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Last name">
    </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Upload new profil picture</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>

  <div class="form-group">
    <label for="inputAddress">Phone</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Phone" style="width: 50%">
  </div>

  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>

    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>

  <button type="submit" class="btn btn-primary float-right mt-5" style="width: 20rem">Submit</button>
</form>

<?php
  include ('../footer.php');
?>