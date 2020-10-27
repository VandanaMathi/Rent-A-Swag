<?php
include("nav.php");
include("sidebar.php");
require("dbconfig.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Rent-a-Swag</title>
<link rel="stylesheet" type="text/css" href="indexstyle.css">
</head>
<body>
<?php

$a = "select * from products";
$result =mysqli_query($con,$a);
if (mysqli_num_rows($result) > 0) {
  // output data of each row

  while ($row =mysqli_fetch_assoc($result)) {


?>
    <div class="image-cls">
      <span role='link' tabindex='0' onclick="location.href='product.php?id=<?php echo $row['p_id'] ?>'">
        <img class="image" src="<?php echo $row["imagepath1"]; ?>" style="height:300px;width:300px;">
      </span>
    </div>
<?php
  }
} ?>
</body>
</head>
</html>