<?php

namespace App\classes;

class Users
{
  private $name;
  private $email;
  private $password;
  private $mobile;
  private $type;

  private $link;
  private $sql;
  private $queryResult;
  private $i;
  private $row;
  private $userData;
  private $data;
  private $userInfo;

  public function __construct($data = null)
  {
    if ($data) {
      $this->name = $data["name"];
      $this->email = $data["email"];
      if (isset($data["password"])) {
        $this->password = md5($data["password"]);
      }
      $this->mobile = $data["mobile"];
      $this->type = $data["type"];
    }
  }

  public function saveUsers()
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->sql = "INSERT INTO `users`(`name`, `email`, `password`, `mobile`, `type`) VALUES ('$this->name','$this->email','$this->password','$this->mobile','$this->type')";

      if (mysqli_query($this->link, $this->sql)) {
        return "Registration success";
      }
      else {
        die("Query problem..." . mysqli_error($this->link));
      }
    }
  }

  public function getUsersInfo()
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->sql = "SELECT * FROM `users`";
      if (mysqli_query($this->link, $this->sql)) {
        $this->queryResult = mysqli_query($this->link, $this->sql);

        $this->i = 0;

        while ($this->row = mysqli_fetch_assoc($this->queryResult)) {
          $this->userData[$this->i]["id"] = $this->row["id"];
          $this->userData[$this->i]["name"] = $this->row["name"];
          $this->userData[$this->i]["email"] = $this->row["email"];
          $this->userData[$this->i]["mobile"] = $this->row["mobile"];
          $this->userData[$this->i]["type"] = $this->row["type"];
          $this->i++;
        }
        return $this->userData;
      }
      else {
        die("Query problem " . mysqli_error($this->link));
      }
    }
  }

  public function getUserInfoById($id)
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    $this->sql = "SELECT * FROM `users` WHERE id='$id'";

    $this->queryResult = mysqli_query($this->link, $this->sql);

    return mysqli_fetch_assoc($this->queryResult);
  }

  public function updateUserInfo($userInfo)
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->sql = "UPDATE `users` SET `name`='$this->name',`email`='$this->email',`mobile`='$this->mobile',`type`='$this->type' WHERE `id`='$userInfo[id]'";

      if (mysqli_query($this->link, $this->sql)) {
        return "Your information update successfully.";
      }
      else {
        die("Query problem " . mysqli_error($this->link));
      }
    }
    else {
      die("Query problem " . mysqli_error($this->link));
    }
  }

  public function getMyStudents()
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->sql = "SELECT * FROM `users` WHERE `type` = 2";
      if (mysqli_query($this->link, $this->sql)) {
        $this->queryResult = mysqli_query($this->link, $this->sql);

        $this->i = 0;
        while ($this->row = mysqli_fetch_assoc($this->queryResult)) {
          $this->data[$this->i]["name"] = $this->row["name"];
          $this->data[$this->i]["email"] = $this->row["email"];
          $this->data[$this->i]["mobile"] = $this->row["mobile"];
          $this->data[$this->i]["type"] = $this->row["type"];
          $this->i++;
        }
        return $this->data;
      }
      else {
        die("Query problem..." . mysqli_error($this->link));
      }
    }
  }

  public function deleteUser($id)
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->userInfo = $this->getUserInfoById($id);

      $this->sql = "DELETE FROM `users` WHERE id='$id'";

      if (mysqli_query($this->link, $this->sql)) {
        session_start();
        $_SESSION["message"] = "Your information delete successfully.";
        header("Location: action.php?status=manage-users");
      }
      else {
        die("Query problem " . mysqli_error($this->link));
      }
    }
  }
}
