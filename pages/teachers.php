<?php include "./includes/header.php"; ?>

  <?php
    if (!isset($_SESSION["id"]))
    {
      header("Location: ./login.php");
    }
    else if ($_SESSION["type"] == 1)
    {
      header("Location: ./home.php");
    }
    else if ($_SESSION["type"] == 2)
    {
      header("Location: ./students.php");
    }
  ?>

  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>My profile</h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>Subjects name</th>
                </tr>
                <tr class="text-justify">
                  <td>
                    <?php if (isset($subjects)) {
                      foreach ($subjects as $subject) { ?>
                        <span><?php echo "# " . $subject["name"]; ?></span>
                      <?php }
                    } ?>
                  </td>
                </tr>
              </table>

              <table class="table table-bordered table-hover">
                <tr>
                  <th>Students name</th>
                </tr>
                <tr class="text-justify">
                  <td>
                    <?php if (isset($students)) {
                      foreach ($students as $student) { ?>
                        <span><?php echo "# " . $student["name"] . ", " . $student["email"] . ", " . $student["mobile"] . "<br/>"; ?></span>
                      <?php }
                    } ?>
                  </td>
                </tr>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include "./includes/footer.php"; ?>
