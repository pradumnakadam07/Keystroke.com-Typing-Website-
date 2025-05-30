<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$email =$_POST['email'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//save to database
			// $user_id = random_num(20);
			$query = "insert into Login (username,email,password) values ('$username','$email','$password')";

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
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	body
	{
		background:black;
	}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	.button{

		/* padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none; */
		background: rgb(254, 237, 5);
		padding-left:30px;
  		color: #000000;
  		padding: 10px;
		margin-left:130px; 
  		font-weight: 500;
		border-radius:5px;
  		cursor: pointer;
  		/* box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
    	5px 5px 15px rgba(0, 0, 0, 0.35),
    	inset -5px -5px 15px rgba(255, 255, 255, 0.1),
    	inset 5px 5px 15px rgba(0, 0, 0, 0.35); */
	}

	#box{

		background-color: rgb(97, 97, 97);
		margin: auto;
     	width: 300px;
		position:absolute;
		top:50%;
		left:50%;
		transform:translate(-50%,-50%);
		padding: 20px;
		padding-right:40px;
		border:7px solid rgb(254, 237, 5);
		border-radius:10px;
		
	}
	.input
	{
		/* padding-right:50px;
		border-radius:8px;
		padding:6px 25px;
		margin-left:40px; */
		padding: 12px 10px 12px;
		margin-right:40px;
   		border: none;
  		width: 100%;
  		background: #000000;
  		border: 1px solid rgba(0, 0, 0, 0.1);
  		color: #fff;
  		font-weight: 300;
  		border-radius: 25px;
  		font-size: 1em;
  		box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
    	5px 5px 15px rgba(0, 0, 0, 0.35);
  		transition: 0.5s;
  		outline: none;
	}
	#button:hover
	{
		background:black;
		color:rgb(254, 237, 5);
	}
	
	


	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white; padding-left: 110px;"><h2>Sign Up!</h2></div>

			<input class="input" id="text_username" type="text" placeholder="enter username" name="username"><br><br>

			<input class="input" id="text_email" type="email" required pattern=".+\.com$" placeholder="enter email" name="email"><br><br>

			<input class="input" id="text_password" type="password" placeholder="enter password" name="password"><br><br>

			<input class="button" id="button" type="submit" value="Sign Up"><br><br>

			<a style="padding-left:50px;color:white;">Already signed up?</a><a id="link" style="color:rgb(243, 255, 81); :hover{color:blue}" href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>