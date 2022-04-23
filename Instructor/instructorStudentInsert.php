<?php

include('../session.php');
$course = $_SESSION['course'];
$mysqli = new mysqli("qtc5531.encs.concordia.ca", "qtc55314", "rkf3kQ", "qtc55314");

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['user_id']) || empty($_POST['student_id']) || empty($_POST['fName']) || empty($_POST['lName']))
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $user_id = $_POST['user_id'];
        $student_id = $_POST['student_id'];
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];

        $result = $mysqli->query("SELECT id FROM users WHERE id = '$user_id'");

        if($result->num_rows == 0){header("location:instructorStudentsIncorrect.php");}
        else{
        $query = " insert into student(student_id,user_id, first_name,last_name)
VALUES('$student_id','$user_id','$fname','$lname');";
        $query .= "update student SET last_name = TRIM(last_name);";
        $query .= " insert into course_enrolled(course_id, student_id)
VALUES('$course', '$student_id')";

        $result2 = mysqli_multi_query($mysqli, $query);

        if ($result2)
        {
            header("location:instructorStudents.php");
        }
        else{
            echo 'This id is already assigned to a student in this course.';
        }
}   }}
else
{
    echo 'Please check your connection';
}

?>
