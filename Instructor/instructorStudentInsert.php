<?php

include('../session.php');
$course = $_SESSION['course'];
require_once("connection.php");
$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['id']) || empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['email']) || empty($_POST['group']) || empty($_POST['grade']))
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $id = $_POST['id'];
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $group = $_POST['group'];
        $grade = $_POST['grade'];
        $email = $_POST['email'];

        $query = " insert into student(student_id,first_name,last_name,email)
VALUES('$id','$fname','$lname','$email');";
        $query .= " insert into course_enrolled(course_id, student_id, grade)
VALUES('$course', '$id', '$grade');";
        $query .= " insert into stud_in_group(group_id, student_id)
VALUES('$group', '$id')";

        $result = mysqli_multi_query($mysqli, $query);

        if ($result)
        {
            header("location:instructorStudents.php");
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
