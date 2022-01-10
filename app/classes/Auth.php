<?php

namespace App\classes;

class Auth
{
  private $email;
  private $password;

  private $link;
  private $queryResult;
  private $sql;
  private $user;

  public function __construct($data = null)
  {
    if ($data) {
      $this->email = $data["email"];
      $this->password = md5($data["password"]);
    }
  }

  public function home()
  {
    header("Location: ./pages/login.php");
  }

  public function login()
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->sql = "SELECT * FROM `users` WHERE email = '$this->email' AND password = '$this->password'";

      if (mysqli_query($this->link, $this->sql)) {
        $this->queryResult = mysqli_query($this->link, $this->sql);

        $this->user = mysqli_fetch_assoc($this->queryResult);

        if ($this->user) {
          session_start();
          $_SESSION["id"] = $this->user["id"];
          $_SESSION["name"] = $this->user["name"];
          $_SESSION["type"] = $this->user["type"];

          if ($this->user["type"] == 1) {
            header("Location: ./home.php");
          }
          else if ($this->user["type"] == 2) {
            header("Location: ./action.php?status=students");
          }
          else if ($this->user["type"] == 3) {
            header("Location: ./action.php?status=teachers");
          }
        }
        else {
          return "Email or password invalid.";
        }
      }
      else {
        die("Query problem..." . mysqli_error($this->link));
      }
    }
  }

  public function logout()
  {
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    unset($_SESSION["type"]);
    header("Location: ../index.php");
  }
}
