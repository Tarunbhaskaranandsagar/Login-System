<?php
session_start();
include("connection.php");
include("functions.php");
if(isset($_SESSION['user_id']))
{
    header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //save to database
        $user_id = random_num(8);

        $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
        mysqli_query($con,$query);
        header("Location: login.php");
        die;
    }else
    {
        echo "Please Enter one Valid Information";
    }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <style type = "text/css">
        #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border : solid thin #aaa;
            width:100%;
        }

        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color: Lightblue;
            border: none;

        }
        #box{
            background-color: grey;
            margin: auto;
            width: 300px;
            padding : 20px;
        }
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px;margin:10px;color:white;">Sign Up</div>   
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="login.php">Click TO Login</a><br><br>
        </form>

    </div>
</body>
</html>