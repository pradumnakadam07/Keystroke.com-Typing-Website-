<?php 
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password) && !is_numeric($username)) {
        // Read from database
        $query = "SELECT * FROM login WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result) {
            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password) {
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: index.html");
                    die;
                    alert("Login successful");
                }
            }
        }
        
        echo "Wrong username or password!";
    } else {
        echo "Wrong username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>KeyStroke.com  | Login</title>
    <link rel="icon" type="image/x-icon" href="assets/keyboard.png" />
</head>
<body>

<style type="text/css">
body {
    background: linear-gradient(120deg, #2980b9, #8e44ad);
}

#text {
    height: 25px;
    border-radius: 5px;
    padding: 4px;
    border: solid thin #aaa;
    width: 100%;
}

#button {
    background: rgb(254, 237, 5);
    padding-left:30px;
    color: #000000;
    padding: 10px;
    margin-left:130px; 
    font-weight: 500;
    cursor: pointer;
    border-radius:5px ;
}

#box {
    background-color: rgba(255, 255, 255, 0.5);
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

.input {
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

#button:hover {
    background:black;
    color:rgb(254, 237, 5);
}
</style>

<div id="box">
    
    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: black;padding-left:110px"><h2>Login</h2></div>

        <input class="input" id="text_username" type="text" placeholder="Enter username" name="username"><br><br>

        <input class="input" id="text_password" type="password" placeholder="Enter password" name="password"><br><br>

        <input id="button" type="submit" value="Login"><br><br>

        <a style="color:black;padding-left:50px">Not yet signed up? </a><a href="signup.php" style="color:rgb(243, 255, 81);">Click to Signup</a><br><br>
    </form>
</div>

</body>
</html>
