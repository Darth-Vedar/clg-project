<?php
    session_start();
	include("../connection.php");
	include("../functions.php");
    
	$user_data = check_faculty_login($con);
  // echo "<pre>"; print_r($user_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Faculty Homepage</title>
  <link rel="stylesheet" href="faculty-homepage.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <div class="container">
    <h1 class="welcome-heading">Welcome to Faculty Gits Panel</h1>
    <h2>Welcome <?php echo $user_data['name'] ?></h2>
    <div class="faculty-info">
      <p><strong>Department:</strong> <?php echo $user_data['department'] ?></p>
      <p><strong>Branch:</strong> <?php echo $user_data['branch'] ?></p>
      <p><strong>Subject:</strong> <?php echo $user_data['subject'] ?></p>
      <p><strong>Current Semester:</strong> <?php echo $user_data['semester'] ?></p>
      <div class="buttons">
      <a class="btn btn-success" href="index.php">Home</a>
      <a class="btn btn-success" href="hod-announcement.php">Notifications from HOD</a>
      <a class="btn btn-success" href="faculty-announcement.php">Announcement for Students</a>
      <a class="btn btn-success" href="add-student.php">Create Student Id </a>
      <a href="change-password.php" class="btn btn-success">Change Password</a>
      <a class="btn btn-warning" href="logout.php">Logout</a>
    </div>
    </div>
    <div class="student-list">
    <div class="students-list">
      <h2 class="my-5">Students List</h2>
      <?php
      $facultyId = $user_data['faculty_id'];
      $semester = $user_data['semester'];
      $query = "SELECT *, b.student_id FROM users as a LEFT JOIN student_info as b ON a.id = b.student_id LEFT JOIN student_data as c ON c.student_id=a.id AND c.faculty_id='$facultyId' WHERE a.type = 3 AND b.semester = '$semester'";
      $result = mysqli_query($con, $query);
      ?>
      <table>
        <thead>
          <tr>
            <th>Roll No.</th>
            <th>Name</th>
            <th>Midterm 1 Marks</th>
            <th>Midterm 2 Marks</th>
            <th>Assignment Submitted</th>
            <th>Grade</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($data = mysqli_fetch_array($result))
          {
          ?>
          <tr>
            <td class="text-center"><?php echo $data['student_id'] ?></td>
            <td class="text-center"><?php echo $data['name'] ?></td>
            <td class="text-center"><?php echo $data['mid_term1'] ?></td>
            <td class="text-center"><?php echo $data['mid_term2'] ?></td>
            <td class="text-center"><?php echo $data['assignment']==1? 'Yes' : 'No' ; ?></td>
            <td class="text-center"><?php echo $data['grade'] ?></td>
            <td class="text-center">
              <a class="btn btn-secondary btn-sm" href="edit-student.php?id=<?php echo $data['student_id']; ?>">Edit</button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
