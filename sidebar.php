<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family:"sans-serif";
}

.sidenav {
  display: none;
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #142b47;
  overflow-x: hidden;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: pink;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a style="color:white;"><b><u>Shop</u></b></a>
  <a href="#" style="color:#e75480;">For Him+</a>
  <a href="#">Ethnic</a>
  <a href="#">Modern</a><br>
  <a href="#" style="color:#e75480;">For Her+</a>
  <a href="#">Ethnic</a>
  <a href="#">Modern</a><br><br><hr>
  <a style="color:white;"><b><u>Help</u></b></a>
  <a href="#">Your account</a>
  <a href="#">Customer Service</a>
  <a href="#">Sign in</a><br>
 
 
</div>

<button style="background:pink;color:black;">
<span style="font-size:16px;cursor:pointer;" onclick="openNav()"><b> &#9776; ALL </b></span>
</button>

<script>
function openNav() {
  document.getElementById("mySidenav").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidenav").style.display = "none";
}
</script>
   
</body>
</html>