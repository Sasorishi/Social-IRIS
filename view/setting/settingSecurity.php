<form method="post" action="" enctype="multipart/form-data">
  <div class="card text-center  mx-auto d-block mt-5" style="width: 93%">
    <div class="card-header">
      Activity
    </div>
  </div>
  <div class="row m-4">
    <div class="col-sm-6">
      <div class="card ml-3" style="width: 100%">
        <div class="card-body">
          <p>Who can see your activity ?</p>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="activity1">
              Default (Everyone)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
              Only my friend
            </label>
          </div>
          <div class="form-check disabled">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
            <label class="form-check-label" for="exampleRadios3">
              Nobody
            </label>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%" onclick="return confirm('Confirm to valide your edit');">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>