<?php

require_once("connection.php");

if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from  project.student where student_id = '".$id."' ";
    $result = mysqli_query($con,$query);

    if ($result){
        header("location:instructorStudents.php");
    }
    else
    {
        echo 'Please check your Query';
    }
}
else
{
    header("location:instructorStudents.php");
}

?>
