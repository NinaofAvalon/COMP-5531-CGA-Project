<?php
include('../session.php');
require_once "../php/config.php";

if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from course where id = '".$id."' ";
    $result = mysqli_query($conn,$query);

    if ($result){
        header("location:adminCourses.php");
    }
    else
    {
        echo 'Please check your Query';
    }
}
else
{
    header("location:adminCourses.php");
}

?>