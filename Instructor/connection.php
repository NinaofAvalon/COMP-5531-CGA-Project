 <?php
session_start();

// $con = mysqli_connect("localhost","root","root","project");
$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if(!$con)
{
    die("Connection Error");
}

 ?>