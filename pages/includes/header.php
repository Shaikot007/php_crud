<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"/>

  <title>php crud</title>
</head>

<body>
  <?php if (isset($_SESSION["id"])) { ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <a href="home.php" class="navbar-brand">LOGO</a>
        <ul class="navbar-nav ml-auto">
          <?php if ($_SESSION["type"] == 1) { ?>
            <li><a href="home.php" class="nav-link">Add users</a></li>
            <li><a href="add-subject.php" class="nav-link">Add subjects</a></li>
            <li><a href="action.php?status=manage-users" class="nav-link">Manage users</a>
            <li><a href="action.php?status=manage-subjects" class="nav-link">Manage subjects</a></li>
            <li><a href="action.php?status=logout" class="nav-link">Log out</a></li>
          <?php } else if ($_SESSION["type"] == 2) { ?>
            <li><a href="action.php?status=students" class="nav-link">My subjects</a></li>
            <li><a href="action.php?status=logout" class="nav-link">Log out</a></li>
          <?php } else if ($_SESSION["type"] == 3) { ?>
            <li><a href="action.php?status=teachers" class="nav-link">My profile</a></li>
            <li><a href="action.php?status=logout" class="nav-link">Log out</a></li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  <?php } ?>
