<?php
//database connection initialization
$dbhost = "localhost"; 
$dbuser = "root";
$dbpass = "";
$dbname = "lab2";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{ //if either of these are unable to connect
    die("failed to connect!"); //spew the "failed to connect!" error message
}