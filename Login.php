<?php
session_start();
include("dbconfig.php")
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="Style.css">
        <style>
            img
            {
                border-radius:65px;
                height:130px;
            }
            #view
            {
                color:white;
                right:50px;
            }
        </style>
    </head>
    <body>
        <center>
            <div class="form-box">
                <h1>USER LOGIN</h1>
                <form class="input-group" method="POST" id="pos">
                    <img src="Images/user.jpg"><br><br><br>
                    <input type="text" class="input-field" placeholder="Username" name="user" required><br><br><br>
                    <input type="password" class="input-field" placeholder="Password" name="pass" required><br><br><br><br>
                    <button type="submit" class="submit-btn" name="sub"><b>Log In</b></button><br><br>;
                    <p>Don't have an account?&emsp;<a href="Registration.php">Sign up now</a></p>
                </form>
            </div>
        </center>
        <?php
            if(isset($_POST["sub"]))    
            {
                if($con)
                {
                    //real_escape_string() adds escape chracter '\' for certain char like ' or " which can give error while connecting
                    $username = mysqli_real_escape_string($con,trim($_POST['user']));
                    $password = mysqli_real_escape_string($con,trim($_POST['pass'])); 
                    $sql = "select username,pass from user where username = '$username' LIMIT 1";  
                    if($result=mysqli_query($con,$sql))
                    {   
                        if($row=mysqli_fetch_assoc($result))
                            {
                                if(!password_verify($password,$row['pass']))
                                    echo "<script>window.alert('Invalid Password');</script>";
                                else
                                {
                                    //header("Location:.php");
                                    echo "<script>window.alert('Success');</script>";
                                    $_SESSION['username']=$username;
                                    mysqli_close($con);
                                    header("location:index.php");
                                }
                            }
                        else
                            echo "<script>window.alert('Invalid Username');</script>";
                    }
                }
                else
                    die("Connection failed: " . mysqli_connect_error());
            }
        ?>
    </body>
</html>