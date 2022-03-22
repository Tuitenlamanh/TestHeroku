<?php 
 session_start();
?>
<DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="CSS/style.css">
            <title>Trang Login</title>
    </head>
    <body class="loginpage" style="background-image: url(Images/spotify1.png);">
    <?php												
        include 'connect.php';
        if(isset($_POST['login']))
        {
            $UserName = $_POST['UserName'];
            $Password = $_POST['Password'];
            $sql = "SELECT * FROM `users` WHERE `UserName` = '$UserName' and Password = '$Password'";
            $result = mysqli_query($connect, $sql);
			$row_user = mysqli_fetch_array($result);
            $check_login = mysqli_num_rows($result);
            if($check_login > 0){
				$_SESSION['FullName'] = $row_user['FullName'];
				$_SESSION['UserName'] = $row_user['UserName'];
				echo $_SESSION['UserName'];
                echo "
                <script>alert('Welcome $UserName');
                    window.open('index.php', '_self');</script>
                ";
            }
            else 
            {
                echo "Failed!";
            }
        }
    ?>
		<div class="login">
		<h1>Login</h1>
		<form method="POST">
			<div>
			<p>Username</p>
			<input type="text" name="UserName" placeholder="Enter Username"> 
			</div>
			<div>
			<p>Password</p>
			<input type="Password" name="Password" placeholder="Enter Password">
            <br>
			<a href="#" style="color: #FFF1AF;">Forgot your password?</a>
			</div><br>	
			<div class="signin">
            <input type="submit" name="login" value="Login">			
			</div><br>	
			<p>Login with
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-google-plus"></i></a>
			</p>
			<a href="register.php" style="color: #FFF1AF;">Dont have an account?</a>
		</form>
	    </div>      
    </body>
</html>
