<?php

    session_start();    // Resuming an existing session based on username and password identifiers passed through a POST request
    include("connection.php");
    include("functions.php");

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset = "UTF-8">
        <title>Administrator Page</title>
        <style>
            table, td, th{
                border-style: solid;
                border-color: green;
                color: purple;
                margin-left: auto;
                margin-right: auto;
            }
            .welcomeAdmin{
                width: 100%;
                height: 100px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
    </head>
    <body>
        <h2 class = "welcomeAdmin">Welcome, Administrator</h2>
        <table>
            <tbody>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
<?php

    $con = mysqli_connect("localhost", "root", "", "lab2");    // Establishing a connection to the database

    if(!$con)
    {
        print("</tbody></table><p>Sorry, failed to connect to database</p>");
        print( mysqli_connect_error() );          // If the connection fails to take place, we close the table and leave a message for the user as well as print the
        print("</body></html>");                  // mysqli_connect_error function which returns the last connection error
        die();                                    // die() function is used to terminate current script
    }                                             

    $sql = "SELECT user_name, password from users ORDER BY user_name ASC";
    $result = mysqli_query($con, $sql);          // Sends a select query to the database and places the resulting data into the $result variable

    while ($row = mysqli_fetch_row($result))    // Loops to fetch one row of data from the result set in order to return it as an enumerated array stored in $row
    {
        print("<tr><td>");
        print($row[0]);         // Prints the contents of the username and password columns
        print("</td><td>");     // Prints from the database into a table for the Administrator
        print($row[1]);
        print("</td></tr>");
    }

    mysqli_close($con);    // Connection to the database server using $con is closed

?>

            </tbody>
        </table>
    </body>
</html>
