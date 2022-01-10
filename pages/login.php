<?php include "./includes/header.php"; ?>

  <section class="py-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-header text-center">
              <h4>Login form</h4>
            </div>
            <div class="card-body">
              <?php if (isset($authMessage)) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong><?php echo $authMessage; ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>
              <form action="action.php" method="post">
                <div class="form-group row">
                  <label for="" class="col-form-label col-md-3">
                    Email
                  </label>
                  <div class="col-md-9">
                    <input type="email" name="email" class="form-control" required/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-form-label col-md-3">
                    Password
                  </label>
                  <div class="col-md-9">
                    <input type="password" name="password" class="form-control" required/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-form-label col-md-3">
                  </label>
                  <div class="col-md-9">
                    <input type="submit" name="login_button" value="Login" class="btn btn-outline-primary btn-block"/>
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
