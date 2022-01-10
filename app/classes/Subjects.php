<?php

namespace App\classes;

class Subjects
{
  private $name;

  private $link;
  private $sql;
  private $queryResult;
  private $i;
  private $row;
  private $data;
  private $subjectInfo;

  public function __construct($data = null)
  {
    if ($data) {
      $this->name = $data["name"];
    }
  }

  public function saveSubjects()
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->sql = "INSERT INTO `subjects`(`name`) VALUES ('$this->name')";

      if (mysqli_query($this->link, $this->sql)) {
        return "Subject add successfully.";
      }
      else {
        die("Query problem..." . mysqli_error($this->link));
      }
    }
  }

  public function getSubjectInfoById($id)
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    $this->sql = "SELECT * FROM `subjects` WHERE id='$id'";

    $this->queryResult = mysqli_query($this->link, $this->sql);

    return mysqli_fetch_assoc($this->queryResult);
  }

  public function updateSubjectInfo($subjectInfo)
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->sql = "UPDATE `subjects` SET `name`='$this->name' WHERE `id`='$subjectInfo[id]'";

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

  public function getMySubject()
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->sql = "SELECT * FROM `subjects`";
      if (mysqli_query($this->link, $this->sql)) {
        $this->queryResult = mysqli_query($this->link, $this->sql);

        $this->i = 0;
        while ($this->row = mysqli_fetch_assoc($this->queryResult)) {
          $this->data[$this->i]["id"] = $this->row["id"];
          $this->data[$this->i]["name"] = $this->row["name"];
          $this->i++;
        }
        return $this->data;
      }
      else {
        die("Query problem..." . mysqli_error($this->link));
      }
    }
  }

  public function deleteSubject($id)
  {
    $this->link = mysqli_connect("localhost", "root", "", "php_crud");

    if ($this->link) {
      $this->subjectInfo = $this->getSubjectInfoById($id);

      $this->sql = "DELETE FROM `subjects` WHERE id='$id'";

      if (mysqli_query($this->link, $this->sql)) {
        session_start();
        $_SESSION["message"] = "Your information delete successfully.";
        header("Location: action.php?status=manage-subjects");
      }
      else {
        die("Query problem " . mysqli_error($this->link));
      }
    }
  }
}
