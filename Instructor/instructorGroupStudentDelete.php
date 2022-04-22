<?php

require_once("connection.php");
$course = $_SESSION['course'];
$mysqli = new mysqli("localhost", "root", "root", "project");


if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $group_id = $_GET['id'];

    $result = $mysqli->query("SELECT group_id FROM student inner join course_enrolled on student.student_id = course_enrolled.student_id
inner join class_group on student.student_id = class_group.leader_id WHERE course_enrolled.course_id =  '$course' and class_group.leader_id = '$id'");

    if($result->num_rows == 0){

    $query = "delete from project.stud_in_group
                where student_id ='".$id."' ";
    $result2 = mysqli_query($con,$query);

    if ($result2){
        header("location:instructorGroupMembersInfo.php?GetId=".$group_id);
    }
    else
     {
        echo 'Please check your Query';

     }}
    else{header("location:instructorDeletingGroupLeader.php?id=".$group_id);}
}

else
{
    header("location:instructorGroups.php");
}

?>