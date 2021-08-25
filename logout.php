<?php

session_start();

if(isset($_SESSION['user_id'])) //checking if 'user_id' is signed in
{
    unset($_SESSION['user_id']); //if decision is to sign out
}                                //'unset' function will destroy specified variable

header("Location: login.php");   //will then redirect user to the login page
die;