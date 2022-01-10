<?php

require_once "../vendor/autoload.php";

use App\classes\Auth;
use App\classes\Users;
use App\classes\Subjects;

if (isset($_POST["login_button"]))
{
  $auth = new Auth($_POST);
  $authMessage = $auth->login();
  include "login.php";
}
else if (isset($_POST["button"]))
{
  $user = new Users($_POST);
  $message = $user->saveUsers();
  include "home.php";
}
else if (isset($_POST["subject_button"]))
{
  $subject = new Subjects($_POST);
  $message = $subject->saveSubjects();
  include "add-subject.php";
}
else if (isset($_GET["status"]))
{
  if ($_GET["status"] == "manage-users")
  {
    $users = new Users();
    $usersData = $users->getUsersInfo();
    include "manage-users.php";
  }
  else if ($_GET["status"] == "manage-subjects")
  {
    $subjects = new Subjects();
    $subjectData = $subjects->getMySubject();
    include "manage-subjects.php";
  }
  else if ($_GET["status"] == "students")
  {
    $subjects = new Subjects();
    $subjects = $subjects->getMySubject();
    include "students.php";
  }
  else if ($_GET["status"] == "teachers")
  {
    $subjects = new Subjects();
    $subjects = $subjects->getMySubject();
    $students = new Users();
    $students = $students->getMyStudents();
    include "teachers.php";
  }
  else if ($_GET["status"] == "logout")
  {
    $auth = new Auth();
    $auth->logout();
  }
}
else if (isset($_GET["edit"]))
{
  $user = new Users();
  $userData = $user->getUserInfoById($_GET["edit"]);
  include "edit-users.php";
}
else if (isset($_POST["update_button"]))
{
  $user = new Users($_POST);
  $userInfo = $user->getUserInfoById($_POST["user_id"]);
  $updateUser = $user->updateUserInfo($userInfo);
  $usersData = $user->getUsersInfo();
  include "manage-users.php";
}
else if (isset($_GET["delete"]))
{
  $user = new Users();
  $user->deleteUser($_GET["delete"]);
}
else if (isset($_GET["edit_subject"]))
{
  $subject = new Subjects();
  $subjectData = $subject->getSubjectInfoById($_GET["edit_subject"]);
  include "edit-subjects.php";
}
else if (isset($_POST["subject_update_button"]))
{
  $subject = new Subjects($_POST);
  $subjectInfo = $subject->getSubjectInfoById($_POST["subject_id"]);
  $updateSubject = $subject->updateSubjectInfo($subjectInfo);
  $subjectsData = $subject->getMySubject();
  include "manage-subjects.php";
}
else if (isset($_GET["delete_subject"]))
{
  $subject = new Subjects();
  $subject->deleteSubject($_GET["delete_subject"]);
}
else {
  header("Location: ./login.php");
}
