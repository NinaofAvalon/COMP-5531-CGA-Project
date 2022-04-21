<?php

require_once("connection.php");
$mysqli = new mysqli("localhost", "root", "root", "project");


if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from  project.course_ta where ta_id = '".$id."'";
    $result = mysqli_multi_query($mysqli, $query);

    if ($result){
        header("location:instructorTutorInfo.php");
    }
    else
    {
        echo 'Please check your Query';
    }
}
else
{
    header("location:instructorTutorInfo.php");
}

?>