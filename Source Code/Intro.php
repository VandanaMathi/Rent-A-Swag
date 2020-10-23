<html>
    <head>
        <title>Rent-A-Swag</title>
        <style>
            *
            {
                margin:0px;
            }
            h1
            {
                font-size:40px;
            }
            #vertical
            {
                border-left: 6px solid gold; 
                height: 200px; 
                position:absolute; 
                left: 50%;
            }
            #Login,#Signup
            {
                position:absolute;
                color:white;
                background-color:#0192ed;
                border:1px solid transparent;
                width:190px;
                height:50px;
                font-size:17px;
            }
            #Login
            {
                top:80px;
                left:450px;
            }
            #Signup
            {
                top:80px;
                left:735px;
            }
            img
            {
                height:30%;
            }
        </style>
    </head>
    <body>
        <div style="background-color:purple;width:100%;height:70px">
        </div><br><br><br>
        <center>
        <form method="POST">
            <div style="position:relative">
                <button type="submit" id="Login" name="log"><b>Existing Customer</b></button>
                <div id="vertical"></div>
                <button type="submit" id="Signup" name="sign"><b>New to Rent A Swag?</b></button>
            <div>
        </form>
        </center>
        <?php
            if(isset($_POST['sign']))
                header('location:Registration.php');
            else if(isset($_POST['log']))
                header('location:Login.php');
        ?>
    </body>
</html>