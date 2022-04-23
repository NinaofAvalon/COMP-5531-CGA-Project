<?php

require_once("connection.php");
$mysqli = new mysqli("qtc5531.encs.concordia.ca", "qtc55314", "rkf3kQ", "qtc55314");


if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from course_ta where ta_id = '".$id."'";
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