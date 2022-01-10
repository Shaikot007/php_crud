<?php include "./includes/header.php" ?>

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

  <section class="py-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">
          <div class="card">
            <div class="card-header">
              <h3>All users information here</h3>
            </div>
            <div class="card-body">
              <?php if (isset($updateUser)) { ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong><?php echo $updateUser; ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>
              <?php if (isset($_SESSION["message"])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?php echo $_SESSION["message"];
                    unset($_SESSION["message"]); ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>
              <table class="table table-bordered text-center">
                <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mobile</th>
                  <th scope="col">User type</th>
                  <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($usersData)) {
                  foreach ($usersData as $user) { ?>
                    <tr>
                      <td><?php echo $user["name"] ?></td>
                      <td><?php echo $user["email"] ?></td>
                      <td><?php echo $user["mobile"] ?></td>
                      <td><?php echo $user["type"] == 1 ? "Admin" : ($user["type"] == 2 ? "Student" : ($user["type"] == 3 ? "Teacher" : null)) ?></td>
                      <td>
                        <a href="action.php?edit=<?php echo $user["id"]; ?>" class="btn btn-outline-warning">Edit</a>
                        <a href="action.php?delete=<?php echo $user["id"]; ?>"
                           onclick="return confirm('Are you sure to delete this?')"
                           class="btn btn-outline-danger">Delete</a>
                      </td>
                    </tr>
                  <?php }
                } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include "./includes/footer.php" ?>
