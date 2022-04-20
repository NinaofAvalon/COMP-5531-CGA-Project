<?php

require_once("connection.php");

if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from project.stud_in_group
                where student_id ='".$id."' ";
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