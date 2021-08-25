<?php
session_start();

    include("connection.php"); //contains all of the database connectivity parameters
    include("functions.php"); //functions that will be called when logging in

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }else
        {
            echo "Please enter some valid information!"; //if the user enters numeric values as their username, they are alerted with this message
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <style type="text/css">

    #text{
        height: 25px;
        border-radius:5px;
        padding:4px;
        border: solid thin #aaa;
        width:100%;
    }

    #button{
        padding:10px;
        width:100px;
        color:white;
        background-color: lightblue;
        border:none;
    }
    
    #box{
        background-color: pink;
        margin:auto;
        width: 400px;
        height: 300px;
        padding: 20px;
        border:solid;
    }
    body{
        background-color:blue;
        font-family: Arial, Helvetica, sans-serif;
    }

    </style>

    <div id ="box">
        <form method="post">
            <div style = "font-size: 20px; margin: 10px;color: white;">Signup</div>
            <input id = "text" type = "text" name = "user_name"><br><br>
            <input id = "text" type = "password" name = "password"><br><br>

            <input id="button" type = "submit" value = "Signup"><br><br>

            <a href = "login.php">Click to Login</a><br><br>
        </form>
    </div>
</body>
</html>