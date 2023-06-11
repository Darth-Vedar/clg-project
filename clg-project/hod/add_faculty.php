<?php
    session_start();
	include("../connection.php");
	include("../functions.php");
    
	$user_data = check_hod_login($con);

    if(isset($_POST['fSubmit']))
    {
        $name = $_POST['name'];
        $department = $user_data['department'];
        $branch = $user_data['branch'];
        $subject = $_POST['subject'];
        $semester = $_POST['semester'];
        $username = $_POST['username'];
        $hodId = $user_data['id'];

        // $query = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
        // $result = mysqli_query($con, $query);
        // $tmp = mysqli_fetch_array($result);
        // $facultyID = $tmp['id'] + 1;

        $query = "INSERT INTO users (user_name, password, type) VALUES ('$username', '12345', '2')";
        if(mysqli_query($con, $query))
        {
            $facultyID = mysqli_insert_id($con);
            $query = "INSERT INTO faculty_info (faculty_id, hod_id, name, department, branch, subject, semester) VALUES ('$facultyID', '$hodId', '$name', '$department', '$branch', '$subject', '$semester')";
            if(mysqli_query($con, $query))
            {
                header('Location: index.php');
                die;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOD - Add Faculty</title>
  <link rel="stylesheet" href="hod-homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1 class="welcome-heading">Welcome to HOD Control Panel</h1>
    <h2>Welcome <?php echo $user_data['name'] ?> </h2>
    <div class="faculty-info">
      <p><strong>Department:</strong> <?php echo $user_data['department'] ?></p>
      <p><strong>Branch:</strong> <?php echo $user_data['branch'] ?></p>
      <p><strong>Subject:</strong> <?php echo $user_data['subject'] ?></p>
      <p><strong>Current Semester:</strong> <?php echo $user_data['semester'] ?></p>
      <div class="buttons">
      <a class="btn btn-success" href="index.php">Home</a>
      <a class="btn btn-success" href="hod_announcement.php">Announcement for Faculty</a>
      <a class="btn btn-success" href="add_faculty.php">Create Faculty Id </a>
      <a href="change-password.php" class="btn btn-success">Change Password</a>
      <a class="btn btn-warning" href="logout.php">Logout</a>
    </div>
    </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center my-4">Add Faculty</h2>
                <form action="" method="post" class="text-start">
                    <div class="mb-3">
                        <label for="formControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="formControlInput1" name="name" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="formControlInput6" class="form-label">Username</label>
                        <input type="text" class="form-control" id="formControlInput6" name="username" placeholder="Username" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="formControlInput2" class="form-label">Department</label>
                        <input type="text" class="form-control" id="formControlInput2" name="department" placeholder="Department Name" required>
                    </div> -->
                    <!-- <div class="mb-3">
                        <label for="formControlInput3" class="form-label">Branch</label>
                        <input type="text" class="form-control" id="formControlInput3" name="branch" placeholder="Branch" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="formControlInput4" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="formControlInput4" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="formControlInput5" class="form-label">Semester</label>
                        <input type="text" class="form-control" id="formControlInput5" name="semester" placeholder="Semester" required>
                    </div>
                    <button type="submit" name="fSubmit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>