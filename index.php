<?php
session_start();
include("connection.php");
include("fucntion.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//save to database
			
			$query = "insert into Login (username,email,password) values ('$username','$email','$pass')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?> 



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="style.css">
	<script>
		function onclick()
		{
			window.location.href='project.html';
		}
	</script>
	
</head>
<body>
	
    <div class="container">
        <div class="form signup">
            <h2>Sign Up</h2>
            <div class="inputBox">
                <input type="text" required="required" name="username">
                <i class="fa-regular fa-user"></i>
                <span style="color:#ffffff">username</span>
            </div>
            <div class="inputBox">
                <input type="text" required="required" name="email">
                <i class="fa-regular fa-envelope"></i>
                <span style="color:#ffffff">email address</span>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="pass">
                <i class="fa-solid fa-lock"></i>
                <span style="color:#ffffff">create password</span>
            </div>
            <div class="inputBox">
                <input type="password" required="required">
                <i class="fa-solid fa-lock"></i>
                <span style="color:#ffffff">confirm password</span>
            </div>
            <div class="inputBox">
                <input type="submit" value="Signup">
            </div>
            <p>Already a member ? <a href="#" class="login">Log in</a></p>
        </div>
    </div>


		
		<form onsubmit="open(); return false;" >
		<div class="form signin">
			<h2>Sign In</h2>
			<div class="inputBox">
				<input type="text" required="required" name="username1">
				<i class="fa-regular fa-user"></i>
				<span>username</span>
			</div>
			<div class="inputBox">
				<input type="password" required="required" name="pass1">
				<i class="fa-solid fa-lock"></i>
				<span>password</span>
			</div>
			<div class="inputBox">
				<input type="submit" value="Login" >
			</div>
		</form>
			<p>Not Registered ? <a href="#" class="create">Create an account</a></p>
		</div>

	</div>

	<script>
		let login = document.querySelector('.login');
		let create = document.querySelector('.create');
		let container = document.querySelector('.container');

		login.onclick = function(){
			container.classList.add('signinForm');
		}
		
		create.onclick = function(){
			container.classList.remove('signinForm');
		}
		
		
	
	</script>
</body>
</html>