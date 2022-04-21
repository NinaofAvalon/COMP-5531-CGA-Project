<?php

require_once("connection.php");
$mysqli = new mysqli("localhost", "root", "root", "project");


if(isset($_POST['update']))
{
    $id = $_GET['Id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $group = $_POST['group'];
    $grade = $_POST['grade'];


    $query = "update project.student set first_name = '".$fname."', last_name = '".$lname."', email = '".$email."' 
                where student_id ='".$id."';";
    $query .= "update project.course_enrolled set grade = '".$grade."' 
                where student_id ='".$id."';";
    $query .= "update project.stud_in_group set group_id = '".$group."' 
                where student_id ='".$id."'";

    $result = mysqli_multi_query($mysqli, $query);

    if ($result)
    {
        header("location:instructorStudents.php");
    }
    else
    {
        echo 'Please check your query';
    }
}
else
{
    header("location:instructorStudents.php");
}


?>