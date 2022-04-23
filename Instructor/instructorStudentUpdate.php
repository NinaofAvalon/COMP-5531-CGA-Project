<?php

require_once("connection.php");
$mysqli = new mysqli("qtc5531.encs.concordia.ca", "qtc55314", "rkf3kQ", "qtc55314");


if(isset($_POST['update']))
{
    $id = $_GET['Id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $grade = $_POST['grade'];

    $query = "update student set first_name = '".$fname."', last_name = '".$lname."' 
                where student_id ='".$id."';";
    $query .= "update student SET last_name = TRIM(last_name);";
    $query .= "update course_enrolled set grade = '".$grade."' 
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