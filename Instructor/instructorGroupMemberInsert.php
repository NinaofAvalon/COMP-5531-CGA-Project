<?php
include('../session.php');
$mysqli = new mysqli("qtc5531.encs.concordia.ca", "qtc55314", "rkf3kQ", "qtc55314");
require_once("connection.php");
$course = $_SESSION['course'];


if (isset($_POST['update'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['student_id']))
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $id = $_GET['Id'];
        $student_id = $_POST['student_id'];

        $result = $mysqli->query("SELECT course_id FROM course_enrolled WHERE student_id = '$student_id' and course_id = '$course'");
        if($result->num_rows == 0){header("location:instructorGroupMemberIncorrect.php?id=".$id);}
        else{
        $result2 = $mysqli->query("SELECT student.student_id from student inner join course_enrolled on student.student_id = course_enrolled.student_id
inner join stud_in_group on student.student_id = stud_in_group.student_id
where course_enrolled.course_id = '$course' and student.student_id = '$student_id'");


        if($result2->num_rows == 0){
        $query = " insert into stud_in_group(group_id,student_id)
VALUES('$id','$student_id')";

        $result3 = mysqli_query($con,$query);

        if ($result3)
        {
            header("location:addGroupMember.php?id=".$id);
        }
        else{
            echo 'This student is already in this group';
        }
      }  
      else{header("location:instructorGroupMemberAlreadyinGroup.php?id=".$id);}
    } }  
}    
else
{
    echo 'Please check your connection';
}

?>