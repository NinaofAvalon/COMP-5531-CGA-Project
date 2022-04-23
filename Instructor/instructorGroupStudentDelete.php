<?php

include('../session.php');
$course = $_SESSION['course'];
$mysqli = new mysqli("qtc5531.encs.concordia.ca", "qtc55314", "rkf3kQ", "qtc55314");


if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $group_id = $_GET['id'];

    $result = $mysqli->query("SELECT group_id FROM student inner join course_enrolled on student.student_id = course_enrolled.student_id
inner join class_group on student.student_id = class_group.leader_id WHERE course_enrolled.course_id =  '$course' and class_group.leader_id = '$id' and class_group.group_id='$group_id'");

    if($result->num_rows == 0){

    $query = "delete from stud_in_group
                where student_id ='".$id."' ";
    $result2 = mysqli_query($conn,$query);

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
