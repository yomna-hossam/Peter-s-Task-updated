<?php

include('db.php');

if (isset($_POST['save_teacher'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $description = $_POST['description'];
  $query = "INSERT INTO teachers(firstname,lastname, description) VALUES ('$firstname', '$lastname','$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'teacher Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
