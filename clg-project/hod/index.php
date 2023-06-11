<?php
    session_start();
	include("../connection.php");
	include("../functions.php");
    
	$user_data = check_hod_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HOD - Homepage</title>
  <link rel="stylesheet" href="hod-homepage.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
    <div class="semester-info">
      <h2 class="semester-heading"> Subject Teachers</h2>
      <?php
      $hodId = $user_data['id'];
      $query = "SELECT * FROM users as a LEFT JOIN faculty_info as b ON a.id = b.faculty_id WHERE a.type = 2 AND b.hod_id = '$hodId'";
      $result = mysqli_query($con, $query);
      ?>
      <table>
        <thead>
          <tr>
            <th>Subject</th>
            <th>Assigned Teacher</th>
            <th>Semester</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
        while($data = mysqli_fetch_array($result))
        {
        ?>
          <tr class="text-center">
            <td class="text-center"><?php echo $data['subject'] ?></td>
            <td class="text-center"><?php echo $data['name'] ?></td>
            <td class="text-center"><?php echo $data['semester'] ?></td>
            <td class="text-center"><a href="edit-faculty.php?facultyId=<?php echo $data['faculty_id']; ?>" class="btn btn-secondary">Edit</a></td>
          </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
