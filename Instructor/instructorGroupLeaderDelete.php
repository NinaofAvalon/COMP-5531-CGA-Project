<?php

require_once("connection.php");

if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from  class_group where group_id = '".$id."' ";
    $result = mysqli_query($con,$query);

    if ($result){
        header("location:instructorGroups.php");
    }
    else
    {
        echo 'Please check your Query';
    }
}
else
{
    header("location:instructorGroups.php");
}

?>