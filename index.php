<?php

session_start();


    include("connection.php");
    include("functions.php");

    $user_data = check_login($con); // checking if the user is logged in, otherwise it
                                    // it will redirect the user to the login page
                                    // $con provides database connectivity
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
        <script type = "text/javascript">

            function buttonClicked()    // Called once the color change button is clicked
            {
                const colors = ["#AED9AE", "#800080", "#FFFF00", "#008000", "#FF0000", "#FF00FF"]; //six colors declared as strings stored in the array
                const randNum = Math.floor(Math.random() * 6) + 1; //random number generated between the six colors

                document.body.style.backgroundColor = colors[randNum];
            }

            function init()   // The initial function is called when the window loads
            {
            colorBtn = document.getElementById("colorBtn");   // getElementById() retrieves an element with an ID that is identical
            colorBtn.addEventListener("click", buttonClicked);    	// Calls the buttonClicked function once the color change button is clicked
            }

            window.addEventListener("load", init);    // Executes once the full page comprised of the html and css has loaded

        </script>
    </head>
<body>
    <style>
        body{
        font-family: Arial, Helvetica, sans-serif;
        }
    </style>
        <a href="logout.php" style = "color:black">Logout</a>
    <h1>Welcome to the web!</h1>

    <br>
        Hello, <?php echo $user_data['user_name']; ?>
    <br><br><br>
        <input id = "colorBtn" type = "button" value = "Change Color">
</body>
</html>