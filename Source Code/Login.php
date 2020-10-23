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
                    <img src="user.jpg"><br><br><br>
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
                define('DB_SERVER','localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', '');
                define('DB_DATABASE', '');
                $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                if($db)
                {
                    //real_escape_string() adds escape chracter '\' for certain char like ' or " which can give error while connecting
                    $username = mysqli_real_escape_string($db,trim($_POST['user']));
                    $password = mysqli_real_escape_string($db,trim($_POST['pass'])); 
                    $sql = "select Username,Password from user where Username = '$username' LIMIT 1";  
                    if($result=mysqli_query($db,$sql))
                    {   
                        if($row=mysqli_fetch_row($result))
                            {
                                if($row[1]!=$password)
                                    echo "<script>window.alert('Invalid Password');</script>";
                                else
                                {
                                    //header("Location:.php");
                                    echo "<script>window.alert('Success');</script>";
                                    mysqli_close($db);
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