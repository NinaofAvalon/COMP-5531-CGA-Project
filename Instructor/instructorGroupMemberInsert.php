<?php

require_once("connection.php");


if (isset($_POST['update'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['student_id']))
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $id = $_POST['id'];
        $student_id = $_POST['student_id'];

        $query = " insert into project.stud_in_group(group_id,student_id)
VALUES('$id','$student_id')";

        $result = mysqli_query($con,$query);

        if ($result)
        {
            header("location:addGroupMember.php?id=".$id);
        }
        else{
            echo 'Please check your query';
        }
    }
}
else
{
    echo 'Please check your connection';
}

?>