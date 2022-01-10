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
        <div class="col-md- mx-auto">
          <div class="card">
            <div class="card-header">
              <h3>All subjects information here</h3>
            </div>
            <div class="card-body">
              <?php if (isset($updateSubject)) { ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong><?php echo $updateSubject; ?></strong>
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
                  <th scope="col">Subject name</th>
                  <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($subjectData)) {
                  foreach ($subjectData as $subject) { ?>
                    <tr>
                      <td><?php echo $subject["name"] ?></td>
                      <td>
                        <a href="action.php?edit_subject=<?php echo $subject["id"]; ?>" class="btn btn-outline-warning">Edit</a>
                        <a href="action.php?delete_subject=<?php echo $subject["id"]; ?>"
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
