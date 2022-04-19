 <?php
session_start();

$con = mysqli_connect("localhost","root","root","project");

if(!$con)
{
    die("Connection Error");
}
else
{

    echo 'Connection Successfull';
}

 ?>