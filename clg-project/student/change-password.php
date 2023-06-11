<?php
  session_start();
	include("../connection.php");
	include("../functions.php");
  
	$user_data = check_student_login($con);

    if(isset($_POST['fSubmit']))
    {
        $msg = '';
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];
        $id = $user_data['student_id'];

        if($rePassword != $password)
        {
            $msg = "Password does not match.";
        }
        else 
        {
            $query = "SELECT * FROM users WHERE id='$id'";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0)
            {
                $query = "UPDATE users SET password='$password' WHERE id='$id'";
                if(mysqli_query($con, $query)) {
                    header('Location:index.php');
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="student-homepage.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Montserrat:400,700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1 class="dashboard-heading">Welcome to Student Gits Panel</h1>
    <h2>Welcome <?php echo $user_data['name']; ?> </h2>
    <div class="student-info">
      <p><strong>Roll Number: </strong><?php echo $user_data['roll_no']; ?></p>
      <p><strong>Department: </strong><?php echo $user_data['department']; ?></p>
      <p><strong>Branch: </strong><?php echo $user_data['branch']; ?></p>
      <p><strong>Semester: </strong><?php echo $user_data['semester']; ?></p>
      <a class="btn btn-primary" href="index.php">Home</a>
    <a href="student-announcements.php" class="btn btn-primary">Notifications</a>
    <a href="change-password.php" class="btn btn-primary">Change Password</a>
    <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="semester-heading mt-3">Change Password</h2>
            <?php
                if(isset($msg) && $msg!='')
                {
                    ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $msg; ?>
                </div>
                <?php
                }
            ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="formControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="formControlInput1" name="password" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="formControlInput2" class="form-label">Re-Type Password</label>
                    <input type="password" class="form-control" id="formControlInput2" name="rePassword" placeholder="" required>
                </div>
                <button type="submit" name="fSubmit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>
  </div>
</body>
</html>
