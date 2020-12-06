<?php

include('db.php');

if (isset($_POST['save_student'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $description = $_POST['description'];
  $query = "INSERT INTO students(firstname,lastname, description) VALUES ('$firstname', '$lastname','$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'student Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
