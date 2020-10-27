<!DOCTYPE html>
<?php
include("nav.php");
require("dbconfig.php");
?>
<html>
<head>
<title>Rent-a-Swag Profile</title>
<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>
<?php
if(isset($_SESSION['username'])){
  $username=$_SESSION['username'];
  $userquery= mysqli_query($con,"select * from user where username='$username';")or die("The query could not be completed.!! Please try again later!!");
  if(mysqli_num_rows($userquery)!=1){
    die("That username could not be found!!");
    }
    while($row=mysqli_fetch_assoc($userquery)){
      $dbusername=$row['username'];
      $firstname=$row['fname'];
      $lastname=$row['lname'];
      $email=$row['email'];

    }
    if($username!=$dbusername){
      die("There has been a fatal error: Please try again!!!");
      }

  ?>
  <div class="box">
<h2 class="t1"><?php echo $firstname;?> <?php echo $lastname;?>'s Profile</h2><br>
<table>
  <tr><td>Firstname:</td><td><?php echo $firstname;?></td></tr>
  <tr><td>Lastname:</td><td><?php echo $lastname;?></td></tr>
  <tr><td>Email:</td><td><?php echo $email;?></td></tr>
  <tr><td>Username:</td><td><?php echo $dbusername;?></td></tr>
</div>
  <?php
}else die("You need to specify a username.");
 ?>
</body>
</html>
