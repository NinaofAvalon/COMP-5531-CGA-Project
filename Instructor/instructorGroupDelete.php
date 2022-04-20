<?php

require_once("connection.php");

if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from  group where leader_id = '".$id."' ";
    $result = mysqli_query($con,$query);

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