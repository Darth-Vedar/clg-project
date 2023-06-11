<?php
  session_start();
	include("../connection.php");
	include("../functions.php");
  
	$user_data = check_student_login($con);
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
    <div class="semester-info mt-3">
      <h2 class="semester-heading">Current Subjects Status</h2>
      <table>
        <thead>
          <tr class="text-center">
            <th>Subject</th>
            <th>Assigned Teacher</th>
            <th>First Midterm</th>
            <th>Second Midterm</th>
            <th>Assignment Submitted</th>
            <th>Final Grade</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $facultyId = $user_data['faculty_id'];
          // echo "<pre>";print_r($user_data);die;
          $studentId = $user_data['student_id'];
          $semester = $user_data['semester'];
          $query = "SELECT a.*, b.*, a.name as faculty_name FROM faculty_info as a LEFT JOIN student_data as b ON a.faculty_id = b.faculty_id AND b.student_id='$studentId' WHERE a.semester = '$semester' ";
          // $query = "SELECT * FROM student_data as a LEFT JOIN faculty_info as b ON a.faculty_id = b.faculty_id WHERE b.semester = '$semester' AND a.student_id='$studentId'";
          // print_r($studentId);die;
          $result = mysqli_query($con, $query);

          while($data = mysqli_fetch_array($result))
          {

            // echo "<pre>"; print_r($data);die;
          ?>
          <tr>
            <td class="text-center"><?php echo $data['subject']; ?></td>
            <td class="text-center"><?php echo $data['faculty_name']; ?></td>
            <td class="text-center"><?php echo isset($data['mid_term1'])?$data['mid_term1']:''; ?></td>
            <td class="text-center"><?php echo isset($data['mid_term2'])?$data['mid_term2']:''; ?></td>
            <td class="text-center">
              <?php 
              if(isset($data['assignment']) && $data['assignment'] == 1) {
              ?>
              <span class="p-2 bg-success text-white rounded-1 d-block"><b>Done</b></span>
              <?php
              }
              else {?>
              <span class="p-2 bg-danger text-white rounded-1 d-block"><b>Due</b></span>
              <?php
              }
              ?>
            </td>
            <td class="text-center"><?php echo isset($data['grade'])?$data['grade']:''; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
