<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD class FORM -->
      <div class="card card-body">
        <form action="save_class.php" method="POST">
          <div class="form-group">
            <input type="text" name="classname" class="form-control" placeholder="Class name" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Class Description"></textarea>
          </div>
          <input type="submit" name="save_class" class="btn btn-success btn-block" value="Save Class">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Class name</th>
            <th>Description</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM classes";
          $result_classes = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_classes)) { ?>
          <tr>
            <td><?php echo $row['classname']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_class.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<!-- studentform and table-->

<div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD student FORM -->
      <div class="card card-body">
        <form action="save_student.php" method="POST">
          <div class="form-group">
            <input type="text" name="firstname" class="form-control" placeholder="Student Frist name" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="lastname" class="form-control" placeholder="Student Last name" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Student Description"></textarea>
          </div>
          <input type="submit" name="save_student" class="btn btn-success btn-block" value="Save Student">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Student First name</th>
            <th>Student Last name</th>
            <th>Description</th>
            <th>Action</th>
            <th>Assign student's class</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM students";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
              <a href="editstudent.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_student.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
            <td> <form method = 'post' action = 'studentclasses.php' >  
            <select name = 'class' multiple size = 3> 
            <?php $query = "SELECT * FROM classes";
            $result_classes = mysqli_query($conn, $query);    
            while($row = mysqli_fetch_assoc($result_classes)) { ?>
            <option><?php echo $row['classname']; ?></option>   
            <?php } ?>
            </select> 
            <input type = 'submit' name = 'submit' value = Submit> 
      </form> 
            <?php      
          // Check if form is submitted successfully 
            if(isset($_POST["submit"]))  
          { 
              // Check if any option is selected 
              if(isset($_POST["class"]))  
              { 
                  // Retrieving each selected option 
                  foreach ($_POST['class'] as $class){
                      print "You selected $class<br/>"; }
              } 
          else
              echo "Select an option first !!"; 
          } 
          ?> </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>


<!-- teacherform and table-->

<div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD teacher FORM -->
      <div class="card card-body">
        <form action="save_teacher.php" method="POST">
          <div class="form-group">
            <input type="text" name="firstname" class="form-control" placeholder="Teacher Frist name" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="lastname" class="form-control" placeholder="Teacher Last name" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Teacher Description"></textarea>
          </div>
          <input type="submit" name="save_teacher" class="btn btn-success btn-block" value="Save Teacher">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Teacher First name</th>
            <th>Teacher Last name</th>
            <th>Description</th>
            <th>Action</th>
            <th>Select Teacher's classes<br/>
                (Press CTRL to select multiple)</th>


          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM teachers";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
              <a href="editteacher.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_teacher.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
            <td> <form method = 'post' action = "teacherclasses.php" >  
            <select name = 'class[]' multiple size = 3> 
            <?php $query = "SELECT * FROM classes";
            $result_classes = mysqli_query($conn, $query);    
            while($row = mysqli_fetch_assoc($result_classes)) { ?>
            <option><?php echo $row['classname']; ?></option>   
            <?php } ?>
            </select> 
            <input type = 'submit' name = 'submit' value = Submit> 
      </form> 
            <?php      
          // Check if form is submitted successfully 
            if(isset($_POST["submit"]))  
          { 
              // Check if any option is selected 
              if(isset($_POST["class"]))  
              { 
                  // Retrieving each selected option 
                  foreach ($_POST['class'] as $class){
                      print "You selected $class<br/>"; }
              } 
          else
              echo "Select an option first !!"; 
          } 
          ?> </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>         
</main>

<?php include('includes/footer.php'); ?>
