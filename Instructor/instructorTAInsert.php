<?php
include('../session.php');
$course = $_SESSION['course'];
require_once("connection.php");
$mysqli = new mysqli("localhost", "root", "root", "project");


if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['id']) || empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['phone']) || empty($_POST['email']) )
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $id = $_POST['id'];
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $query = " insert into TA(id,first_name,last_name, phone, email) VALUES('$id','$fname', '$lname', '$phone', '$email');";
        $query .= " insert into course_ta(course_id, ta_id)
VALUES('$course', '$id')";

        $result = mysqli_multi_query($mysqli, $query);

        if ($result)
        {
            header("location:instructorTutorInfo.php");
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