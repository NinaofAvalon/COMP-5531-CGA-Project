<?php

require_once("connection.php");
$mysqli = new mysqli("localhost", "root", "root", "project");
$course = $_SESSION['course'];



if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['group_id']) || empty($_POST['groupName']) || empty($_POST['leader_id']) )
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $id = $_POST['group_id'];
        $groupName = $_POST['groupName'];
        $leaderID = $_POST['leader_id'];

        $query = " insert into project.class_group(group_id, group_name, leader_id, course_id) VALUES('$id','$groupName','$leaderID', '$course');";
        $query .= " update project.stud_in_group set group_id = '$id' where student_id = '$leaderID'";

        $result = mysqli_multi_query($mysqli, $query);

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