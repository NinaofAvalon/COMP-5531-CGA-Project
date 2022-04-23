<?php

include('../session.php'); 
if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from  student where student_id = '".$id."' ";
    $result = mysqli_query($conn,$query);

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
