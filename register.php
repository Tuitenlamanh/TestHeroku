<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="CSS/style.css">
        <title>Trang Register</title>
    </head>
    <body class="loginpage" style="background-image: url(Images/spotify1.png);">
    <?php
        include 'connect.php';
        if(isset($_POST['signup']))
            {
            $Username = $_POST['Username'];
            $Password = $_POST['Password'];
            $FullName = $_POST['FullName'];
            $PhoneNumber = $_POST['PhoneNumber'];
            $Address = $_POST['Address'];
            $DoB = $_POST['DoB'];
            $Email = $_POST['Email'];
            $Role = $_POST['Role'];
            $Gender = $_POST['Gender'];
            $sql = " INSERT INTO `users`(`Username`, `Password`, `FullName`, `PhoneNumber`, `Address`, `DoB`, `Email`, `Role`, `Gender`) VALUES ('$Username','$Password','$FullName','$PhoneNumber','$Address','$DoB','$Email','$Role','$Gender')";
            $signup = mysqli_query($connect,$sql);
                if($signup){
                    echo " Sign-Up Successfully
                        <script>alert('Welcome $Username, Login Now!');
                        window.open('index.php', '_self');</script>";
                            }
                else{
                    echo "Error!";
                    }
            }
        ?>
        <div class="login">
        <form method="POST">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <p>Username</p>
                            <input type="text" name="Username" placeholder="Enter your name"> 
                        </div>
                        <div>
                            <p>Password</p>
                            <input type="Password" name="Password" placeholder="Enter Password">           
                        </div>
                        <div>
                            <p>Fullname</p>
                            <input type="text" name="FullName" placeholder="Enter your name"> 
                        </div>
                        <div>
                            <p>Phone Number</p>
                            <input type="text" name="PhoneNumber" placeholder="Enter your name"> 
                        </div>
                        <div>
                            <p>Address</p>
                            <input type="text" name="Address" placeholder="Enter your name"> 
                        </div>                         
                    </div>
                    <div class="col-lg-6">    
                        <div>
                            <p>Birthday</p>
                            <input type="text" name="DoB" placeholder="Enter your name"> 
                        </div>
                        <div>
                            <p>Email</p>
                            <input type="text" name="Email" placeholder="Enter your name"> 
                        </div>
                        <div>
                            <p>Role</p>
                            <input type="text" name="Role" placeholder="Enter your name"> 
                        </div>
                        <div>
                            <p>Gender</p>
                            <input type="text" name="Gender" placeholder="Enter your name"> 
                        </div>           	
                    </div>
                </div>   
            </div>
            <div class="signin">
                <a href="Login.php">
                <input type="submit" name="signup" value="Register">
                </a>			
            </div>
            <hr>
            <a href="index.php">Go to main menu</a>
		</form>
        </div>
    </body>
</html>