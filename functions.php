<?php

function check_login($con)
{

    if(isset($_SESSION['user_id'])) //checking if the user_id exists in the superglobal value
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1"; //checking if user_id is in our database

        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
            {
            $user_data = mysqli_fetch_assoc($result); //we are searching for our associative array
            return $user_data; 
            }   
    }

    //redirect to login
    header('Location: login.php');
    die;
}

function random_num($length) //random_num created to accomodate a user signing up their username using numeric format
{
    $text = "";
    if($length < 5)
    {
        $legnth = 5;
    }

    $len = rand(4, $length);

    for($i=0; $i < $len; $i++){
        $text .= rand(0,9);
    }

    return $text;
}