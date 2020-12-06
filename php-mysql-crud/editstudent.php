<?php
include("db.php");
$firstname = '';
$lastname = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM students WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $description = $row['description'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $description = $_POST['description'];

  $query = "UPDATE students set firstname = '$firstname',lastname = '$lastname', description = '$description' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Student Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editstudent.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
            <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" placeholder="Update Frist name" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" placeholder="Update last name" autofocus>
          </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
