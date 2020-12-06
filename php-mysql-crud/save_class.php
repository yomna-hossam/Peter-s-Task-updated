<?php

include('db.php');

if (isset($_POST['save_class'])) {
  $classname = $_POST['classname'];
  $description = $_POST['description'];
  $query = "INSERT INTO classes(classname, description) VALUES ('$classname', '$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Class Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
