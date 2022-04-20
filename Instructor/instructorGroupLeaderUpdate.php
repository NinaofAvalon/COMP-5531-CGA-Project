<?php

require_once("connection.php");

if(isset($_POST['update']))
{
    $id = $_GET['Id'];
    $leader_id = $_POST['leader_id'];

    $query = "update project.class_group set leader_id = '".$leader_id."' 
                where group_id ='".$id."' ";
    $result = mysqli_query($con,$query);

    if ($result)
    {
        header("location:instructorGroups.php");
    }
    else
    {
        echo 'Please check your query';
    }
}
else
{
    header("location:instructorGroups.php");
}


?>