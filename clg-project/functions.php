<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users as a left join user_info as b on a.id = b.user_id where a.id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function check_hod_login($con)
{
	if(isset($_SESSION['hod_user_id']))
	{
		$id = $_SESSION['hod_user_id'];
		$query = "select * from users as a left join user_info as b on a.id = b.user_id where a.id = '$id' limit 1";
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	header("Location: ../login.php");
	die;
}

function check_faculty_login($con)
{
	if(isset($_SESSION['faculty_user_id']))
	{
		$id = $_SESSION['faculty_user_id'];
		$query = "select * from users as a left join faculty_info as b on a.id = b.faculty_id where a.id = '$id' limit 1";
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	header("Location: ../login.php");
	die;
}

function check_student_login($con)
{
	if(isset($_SESSION['student_user_id']))
	{
		$id = $_SESSION['student_user_id'];
		$query = "select * from users as a left join student_info as b on a.id = b.student_id where a.id = '$id' limit 1";
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	header("Location: ../login.php");
	die;
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}