<?php

include('db.php');

if (isset($_POST['submit'])) {
      $class = $_POST['class'];
      $classid = $_GET['id'];
      $id = $_GET['id'];
      $query = "INSERT INTO studentclasses(classid,studentid) VALUES ('$classid', '$id')";
      $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
    }


$_SESSION['message'] = 'class assigned Successfully';
$_SESSION['message_type'] = 'success';
header('Location: index.php');

?>