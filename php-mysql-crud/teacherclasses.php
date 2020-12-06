<?php

include('db.php');

if (isset($_POST['submit'])) {

    foreach ($_POST['class'] as $class){
      $classid = $_GET['id'];
      $id = $_GET['id'];
      $query = "INSERT INTO teacherclasses(classid,teacherid) VALUES ('$classid', '$id')";
      $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
    }

}
$_SESSION['message'] = 'class assigned Successfully';
$_SESSION['message_type'] = 'success';
header('Location: index.php');

?>