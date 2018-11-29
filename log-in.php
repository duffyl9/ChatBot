<?php
  session_start();
  include('scripts/db_connect.php');

  $stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?;");
  $stmt->bind_param("s", $_POST['email']);
  $stmt->execute();
  $stmt->bind_result($id, $password);
  $stmt->fetch();

  if ($id && md5($_POST['password']== $password)) {
        //add id to the session and redirect to the homepage
        $_SESSION['user_id'] = $id;
      //  $_SESSION['message'] = "correct password";
        header("location: home.php");
    }
else {

    $_SESSION['message'] = "Incorrect email or password";
    header("location: index.php");
  }
?>
