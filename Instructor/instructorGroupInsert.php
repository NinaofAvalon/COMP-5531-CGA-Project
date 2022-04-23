<?php

include('../session.php');
$mysqli = new mysqli("qtc5531.encs.concordia.ca", "qtc55314", "rkf3kQ", "qtc55314");
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

        $result = $mysqli->query("SELECT student.student_id FROM student inner join course_enrolled on student.student_id = course_enrolled.student_id
WHERE course_id = '$course' and student.student_id = '$leaderID'");

        if($result->num_rows == 0){header("location:instructorGroupInsertIncorrectStudent.php");}
        else{

        $result2 = $mysqli->query("SELECT student.student_id FROM student inner join stud_in_group on student.student_id = stud_in_group.student_id
inner join course_enrolled on student.student_id = course_enrolled.student_id
WHERE course_id = '$course' and student.student_id = '$leaderID'");

        if($result2->num_rows == 0){
        $query = " insert into class_group(group_id, group_name, leader_id, course_id) VALUES('$id','$groupName','$leaderID', '$course');";
        $query .= " update stud_in_group set group_id = '$id' where student_id = '$leaderID';";
        $query .= " insert into stud_in_group(group_id, student_id) VALUES('$id','$leaderID')";

        $result3 = mysqli_multi_query($mysqli, $query);

        if ($result3)
        {
            header("location:addGroupMember.php?id=".$id);
        }
        else{
            echo 'This group ID is already taken';
        }}


        else{header("location:instructorLeaderAlreadyInserted.php");}}
}   }
else
{
    echo 'Please check your connection';
}

?>
