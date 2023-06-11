<?php
    session_start();
	include("../connection.php");
	include("../functions.php");
    
	$user_data = check_faculty_login($con);
    $studentId = $_GET['id'];
    $facultyId = $user_data['faculty_id'];

    $query = "SELECT * FROM users as a LEFT JOIN student_info as b ON a.id = b.student_id LEFT JOIN student_data as c ON c.student_id=a.id AND c.faculty_id='$facultyId' WHERE a.type = 3 AND b.student_id = '$studentId' LIMIT 1";
    $result = mysqli_query($con, $query);
    $studentData = mysqli_fetch_array($result);
// echo "<pre>"; print_r($studentData);die;
    if(isset($_POST['fSubmit']))
    {
        $midTerm1 = $_POST['mid_term1'];
        $midTerm2 = $_POST['mid_term2'];
        // $subject = $_POST['subject'];
        $assignment = $_POST['assignment'];
        $grade = $_POST['grade'];
        // $studentId = $studentData['student_id'];
        $facultyId = $user_data['faculty_id'];

        $query = "SELECT * FROM student_data WHERE student_id='$studentId' AND faculty_id='$facultyId'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0)
        {
            $query = "UPDATE student_data SET mid_term1='$midTerm1', mid_term2='$midTerm2', assignment='$assignment', grade='$grade' WHERE student_id='$studentId' AND faculty_id='$facultyId'";
            if(mysqli_query($con, $query)) {
                header('Location:index.php');
            }
        }
        else 
        {
            $query = "INSERT INTO student_data (faculty_id, student_id, mid_term1, mid_term2, assignment, grade) VALUES('$facultyId', '$studentId', '$midTerm1', '$midTerm2', '$assignment', '$grade')";
            if(mysqli_query($con, $query)) {
                header('Location:index.php');
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
    <title>Faculty - Edit Student</title>
  <link rel="stylesheet" href="faculty-homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center my-4">Edit Student</h2>
                <form action="" method="post" class="text-start">
                    <div class="mb-3">
                        <label for="formControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="formControlInput1" name="name" value="<?php echo $studentData['name'] ?>" placeholder="Name" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="formControlInput7" class="form-label">Roll No.</label>
                        <input type="text" class="form-control" id="formControlInput7" name="rollNo" value="<?php echo $studentData['roll_no'] ?>" placeholder="Roll No." disabled>
                    </div>
                    <div class="mb-3">
                        <label for="formControlInput3" class="form-label">Mid Term 1 Marks</label>
                        <input type="text" class="form-control" id="formControlInput3" name="mid_term1" value="<?php echo $studentData['mid_term1'] ?>" placeholder="Marks">
                    </div>
                    <div class="mb-3">
                        <label for="formControlInput3" class="form-label">Mid Term 1 Marks</label>
                        <input type="text" class="form-control" id="formControlInput3" name="mid_term2" value="<?php echo $studentData['mid_term2'] ?>" placeholder="Marks">
                    </div>
                    <div class="mb-3">
                        <label for="formControlInput3" class="form-label">Assignment Status</label>
                        <select name="assignment" id="" class="form-control">
                            <option value="1" <?php echo $studentData['assignment']==1? 'selected' : '' ; ?> >Yes</option>
                            <option value="0" <?php echo $studentData['assignment']==0? 'selected' : '' ; ?> >No</option>
                        </select>
                        <!-- <input type="text" class="form-control" id="formControlInput3" name="branch" placeholder="Branch" required> -->
                    </div>
                    <div class="mb-3">
                        <label for="formControlInput3" class="form-label">Grade</label>
                        <select name="grade" id="" class="form-control">
                            <option value="A+" <?php echo $studentData['grade']=='A+'? 'selected' : '' ; ?> >A+</option>
                            <option value="A" <?php echo $studentData['grade']=='A'? 'selected' : '' ; ?>>A</option>
                            <option value="A-" <?php echo $studentData['grade']=='A-'? 'selected' : '' ; ?>>A-</option>
                            <option value="B+" <?php echo $studentData['grade']=='B+'? 'selected' : '' ; ?>>B+</option>
                            <option value="B" <?php echo $studentData['grade']=='B'? 'selected' : '' ; ?>>B</option>
                            <option value="B-" <?php echo $studentData['grade']=='B-'? 'selected' : '' ; ?>>B-</option>
                            <option value="C+" <?php echo $studentData['grade']=='C+'? 'selected' : '' ; ?>>C+</option>
                            <option value="C" <?php echo $studentData['grade']=='C'? 'selected' : '' ; ?>>C</option>
                            <option value="C-" <?php echo $studentData['grade']=='C-'? 'selected' : '' ; ?>>C-</option>
                            <option value="D+" <?php echo $studentData['grade']=='D+'? 'selected' : '' ; ?>>D+</option>
                            <option value="D" <?php echo $studentData['grade']=='D'? 'selected' : '' ; ?>>D</option>
                            <option value="D-" <?php echo $studentData['grade']=='D-'? 'selected' : '' ; ?>>D-</option>
                            <option value="F" <?php echo $studentData['grade']=='F'? 'selected' : '' ; ?>>F</option>
                        </select>
                        <!-- <input type="text" class="form-control" id="formControlInput3" name="branch" placeholder="Branch" required> -->
                    </div>
                    <button type="submit" name="fSubmit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>