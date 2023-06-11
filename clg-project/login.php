<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						if($user_data['type'] == 1) {
							$_SESSION['hod_user_id'] = $user_data['id'];
							header("Location: hod");
							die;
						}
						elseif($user_data['type'] == 2) {
							$_SESSION['faculty_user_id'] = $user_data['id'];
							header("Location: faculty");
							die;
						}
						elseif($user_data['type'] == 3) {
							$_SESSION['student_user_id'] = $user_data['id'];
							header("Location: student");
							die;
						}
						else {
							echo "Something went wrong.";
						}
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<html>
    <head>
        <title>Login Page Design</title>
        <link rel="stylesheet" type="text/css" href="login-style.css">
        <body>
            <div class="loginbox">
                <img src="avatar.jpg" class="avatar">
                <h1>GITS Login Here</h1>
                <form action="" method="post">
                    <P>Username</P>
                    <input type="text" name="user_name" placeholder="Enter Username">
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Password">
                    <input type="submit" name="" value="Login">
                    <a href="#">Lost your password</a><br>
                    <a href="/CODING/Registration Page.html">Don't have an account? Click Here to Register</a>
                </form>
            </div>

        </body>
    </head>
</html>