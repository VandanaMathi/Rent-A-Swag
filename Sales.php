<html>
    <head>
        <title>Sales</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>

        </script>
        <style>
            *{
                margin: 0px;
            }
            #search
            {
                height: 30px;
                width:250px;
                background-color: lightgoldenrodyellow;
                border:1px solid darkgray;
                border-radius: 5px;
            }
            button
            {
                background-color: green;
                border-radius: 50%;
                border:1px solid transparent;
                height: 35px;
                width:35px;
            }
            ::placeholder
            {
                color: black;
            }
            #form
            {
                background-color: aquamarine;
                height: 45%;
                width:70%;
                padding-top: 20px;
            }
            .but
            {
                background-color: red;
                color: white;
                border:none;
                height:40px;
                width:20%;
            }
            table
            {
                width:45%;
                height:50px;
                font-size:22px;
            }
            th,td
            {
                padding:5px;
                text-align:center;
            }
        </style>
    </head>
    <body>
        <br><br>
        <center>
            <div id="form">
                <h1>SALES DETAILS</h1><br><br>
                <form method="POST">
                    <label style="font-size:23px;">Date: </label>
                    <input type="date" id="search" placeholder="Search..." name="date">
                    <button style="font-size:20px" type="submit" name="sub1"><i class="fa fa-search" style="color:white"></i></button><br><br>
                    <label style="font-size:23px">Type:  </label>
                    <input type="text" id="search" placeholder="Search..." name="type">
                    <button style="font-size:20px" type="submit" name="sub2"><i class="fa fa-search" style="color:white"></i></button><br><br><br>
                    <input type="submit" value="VIEW ALL" class="but" name="sub3">&nbsp;&nbsp;
                    <input type="submit" value="MOST RECENT" class="but" name="sub4">
                </form>
            </div>
            <?php 
                define('DB_SERVER','localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', '');
                define('DB_DATABASE', ''); //database name  
                if(isset($_POST["sub3"]))
                {
                    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                    if($db)
                    {
                        $sql="Select * from sales";
                        $result=mysqli_query($db,$sql);
                        $rowcount=mysqli_num_rows($result);
                        if($rowcount)
                        {
                            echo "<br><br><table border='1' style='border-collapse:collapse'>";
                            echo "<tr><th>S.no</th><th>Fname</th><th>Lname</th><th>Username</th><th>Email</th><th>Phone</th></tr>";
                            while ($row = mysqli_fetch_array($result)) 
                            {
                                echo "<tr><td>".$row['id']."</td><td>".$row['Fname']."</td><td>".$row['Lname']."</td><td>".$row['Username']."</td><td>".$row['Email']."</td><td>".$row['Phone']."</td></tr>";
                            }
                            echo "</table>";
                        }
                    }
                }
                if(isset($_POST["sub4"]))
                {
                    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                    if($db)
                    {
                        $sql="Select * from sales order by id DESC LIMIT 1";
                        $result=mysqli_query($db,$sql);
                        if($result)
                        {
                            echo "<br><br><table border='1' style='border-collapse:collapse'>";
                            echo "<tr><th>S.no</th><th>Fname</th><th>Lname</th><th>Username</th><th>Email</th><th>Phone</th></tr>";
                            if($row = mysqli_fetch_row($result)) 
                                echo "<tr><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td></tr>";
                            echo "</table>";
                        }
                    }
                }
                else if(isset($_POST["sub2"]))
                {
                    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                    if($db)
                    {
                        $type=$_POST['type'];
                        $sql="Select * from sales where type='$type'";
                        $result=mysqli_query($db,$sql);
                        $rowcount=mysqli_num_rows($result);
                        if($rowcount)
                        {
                            echo "<br><br><table border='1' style='border-collapse:collapse'>";
                            echo "<tr><th>S.no</th><th>Fname</th><th>Lname</th><th>Username</th><th>Email</th><th>Phone</th></tr>";
                            while($row=mysqli_fetch_array($result))
                                echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td></tr>";                       
                        }
                    }
                }
                else if(isset($_POST["sub1"]))
                {
                    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                    if($db)
                    {
                        $date=$_POST['date'];
                        $sql="Select * from user where date='$date'";
                        $result=mysqli_query($db,$sql);
                        $rowcount=mysqli_num_rows($result);
                        if($rowcount)
                        {
                            echo "<br><br><table border='1' style='border-collapse:collapse'>";
                            echo "<tr><th>S.no</th><th>Fname</th><th>Lname</th><th>Username</th><th>Email</th><th>Phone</th></tr>";
                            while($row=mysqli_fetch_array($result))
                                echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td></tr>";                       
                        }
                    }
                }
            ?>  
        </center>
    </body>
</html>