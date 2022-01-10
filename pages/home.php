<?php include "./includes/header.php"; ?>

  <?php
    if (!isset($_SESSION["id"]))
    {
      header("Location: ./login.php");
    }
    else if ($_SESSION["type"] == 2)
    {
      header("Location: ./students.php");
    }
    else if ($_SESSION["type"] == 3)
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
              <h4>Users registration form</h4>
            </div>
            <div class="card-body">
              <?php if (isset($message)) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?php echo $message; ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>
              <form action="action.php" method="post">
                <div class="form-group row">
                  <label for="name" class="col-form-label col-md-3">
                    Name
                  </label>
                  <div class="col-md-9">
                    <input type="text" name="name" id="name" class="form-control" required/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-form-label col-md-3">
                    Email
                  </label>
                  <div class="col-md-9">
                    <input type="email" name="email" id="email" class="form-control" required/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-form-label col-md-3">
                    Password
                  </label>
                  <div class="col-md-9">
                    <input type="password" name="password" id="password" class="form-control" required/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="mobile" class="col-form-label col-md-3">
                    Mobile
                  </label>
                  <div class="col-md-9">
                    <input type="number" name="mobile" id="mobile" class="form-control" required/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="type" class="col-form-label col-md-3">
                    User type
                  </label>
                  <div class="col-md-9">
                    <label for="type">
                      <input type="radio" name="type" id="type" value="1" required/> Admin
                    </label>
                    <label for="type">
                      <input type="radio" name="type" id="type" value="2" required/> Student
                    </label>
                    <label for="type">
                      <input type="radio" name="type" id="type" value="3" required/> Teacher
                    </label>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-3">
                  </label>
                  <div class="col-md-9">
                    <input type="submit" name="button" value="Submit" class="btn btn-outline-primary btn-block"/>
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
