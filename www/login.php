<?php
    if(!isset($_POST['login'])){
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="p1_v2.css">
</head>
<body>

<div class = "left" >
<h1>Login</h1>
<p>Enter admin log in credentials:</p>
<br>

<form action = "" method = "post">
		Username:&emsp; <input type="text" name="username"> <br><br><br>
		Password:&emsp; <input type="password" name="password"> <br><br><br>
		<input type="submit" name="login">

</form>
</div>
</body>
</html>

<?php
    } else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "diksha" && $password == "diksha"){
            session_start();
            $_SESSION['username'] = $username;
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/';
            header('Location: ' . $home_url);
        } else{
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/login.php';
            echo "Invalid Login credentials !!";
            echo "<center><a href = 'login.php'>Back</a></center>";
        }
    }
?>