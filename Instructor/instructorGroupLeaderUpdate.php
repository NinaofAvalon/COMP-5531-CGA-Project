<?php

require_once("connection.php");
$mysqli = new mysqli("localhost", "root", "root", "project");
$course = $_SESSION['course'];

if(isset($_POST['update']))
{
    $id = $_GET['Id'];
    $leader_id = $_POST['leader_id'];

        $result = $mysqli->query("SELECT student.student_id FROM student inner join course_enrolled on student.student_id = course_enrolled.student_id
WHERE course_id = '$course' and student.student_id = '$leader_id'");

        if($result->num_rows == 0){header("location:instructorGroupEditIncorrectStudent.php?GetId=".$id);}
        else{

        $result2 = $mysqli->query("SELECT student.student_id FROM student inner join stud_in_group on student.student_id = stud_in_group.student_id
inner join course_enrolled on student.student_id = course_enrolled.student_id
WHERE course_id = '$course' and student.student_id = '$leader_id'");

        if($result2->num_rows == 0){
        header("location:instructorLeaderAlreadyEdit.php?GetId=".$id);
                                    }
     
        
        else{ $query = "update project.class_group set leader_id = '".$leader_id."' 
                where group_id ='".$id."' ";
        $result3 = mysqli_query($con,$query);

        if ($result3)
        {
            header("location:instructorGroups.php");
        }
        else{
            echo 'This group ID is already taken';
        }}
             
            }
}   
else
{
    echo 'Please check your connection';
}

?>