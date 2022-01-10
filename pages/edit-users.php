<?php include "./includes/header.php"; ?>

  <?php
    if(!isset($_SESSION["id"]))
    {
      header("Location: ./login.php");
    }
    else if($_SESSION["type"] == 2)
    {
      header("Location: ./students.php");
    }
    else if($_SESSION["type"] == 3)
    {
      header("Location: ./teachers.php");
    }
  ?>

  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Users information update form</h4>
            </div>
            <div class="card-body">
              <?php if(isset($message)) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?php echo $message; ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>
              <form action="action.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $userData["id"]; ?>" />
                <div class="form-group row">
                  <label for="name" class="col-form-label col-md-3">
                    Name
                  </label>
                  <div class="col-md-9">
                    <input type="text" name="name" id="name" value="<?php echo $userData["name"]; ?>" class="form-control" required />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-form-label col-md-3">
                    Email
                  </label>
                  <div class="col-md-9">
                    <input type="email" name="email" id="email" value="<?php echo $userData["email"]; ?>" class="form-control" required />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="mobile" class="col-form-label col-md-3">
                    Mobile
                  </label>
                  <div class="col-md-9">
                    <input type="number" name="mobile" id="mobile" value="<?php echo $userData["mobile"]; ?>" class="form-control" required />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="type" class="col-form-label col-md-3">
                    User type
                  </label>
                  <div class="col-md-9">
                    <?php if($userData["type"] == 1) { ?>
                      <label for="type">
                        <input type="radio" name="type" id="type" value="1" checked required /> Admin
                      </label>
                      <label for="type">
                        <input type="radio" name="type" id="type" value="2" required /> Student
                      </label>
                      <label for="type">
                        <input type="radio" name="type" id="type" value="3" required /> Teacher
                      </label>
                    <?php } else if($userData["type"] == 2) { ?>
                      <label for="type">
                        <input type="radio" name="type" id="type" value="1" required /> Admin
                      </label>
                      <label for="type">
                        <input type="radio" name="type" id="type" value="2" checked required /> Student
                      </label>
                      <label for="type">
                        <input type="radio" name="type" id="type" value="3" required /> Teacher
                      </label>
                    <?php } else if($userData["type"] == 3) { ?>
                      <label for="type">
                        <input type="radio" name="type" id="type" value="1" required /> Admin
                      </label>
                      <label for="type">
                        <input type="radio" name="type" id="type" value="2" required /> Student
                      </label>
                      <label for="type">
                        <input type="radio" name="type" id="type" value="3" checked required /> Teacher
                      </label>
                    <?php } ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-3">
                  </label>
                  <div class="col-md-9">
                    <input type="submit" name="update_button" value="Edit info" class="btn btn-outline-primary btn-block" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include "./includes/footer.php"; ?>
