<?php
    session_start();
	include("../connection.php");
	include("../functions.php");
    
	$user_data = check_faculty_login($con);

    if(isset($_POST['fSubmit'])) {
        $subject = $_POST['subject'];
        $message = $_POST['announcement'];
        $facultyId = $_SESSION['faculty_user_id'];
        $query = "INSERT INTO faculty_announcement (faculty_id, subject, message) VALUES('$facultyId', '$subject', '$message')";
        if(mysqli_query($con, $query)) {
            header('Location: faculty-announcement.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - Announcements</title>
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
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center my-4">Announcements</h2>
                <form action="" method="post" class="text-start">
                    <div class="mb-3">
                        <label for="formControlInput1" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="formControlInput1" name="subject" placeholder="Announcement Subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="formControlInput2" class="form-label">Message</label>
                        <textarea type="text" class="form-control" id="formControlInput2" name="announcement" placeholder="Announcement Content" required></textarea>
                    </div>
                    <button type="submit" name="fSubmit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center bg-secondary text-white">
                                    <h5>Recent Announcements</h5>
                                </th>
                            </tr>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $facultyId = $_SESSION['faculty_user_id'];
                            $i=1;
                            $query="SELECT * FROM faculty_announcement WHERE faculty_id='$facultyId'";
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                while($data = mysqli_fetch_array($result)) {
                            ?>
                            <tr class="text-center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['subject']; ?></td>
                                <td>
                                <?php echo $data['message']; ?>
                                </td>
                            </tr>
                            <?php
                            $i++;
                                }
                            }
                            else {
                            ?>
                            <tr class="text-center">
                                <td colspan="3">No Data!</td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>