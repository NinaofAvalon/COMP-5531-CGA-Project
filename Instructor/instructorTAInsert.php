<?php
include('../session.php');
$course = $_SESSION['course'];
$mysqli = new mysqli("qtc5531.encs.concordia.ca", "qtc55314", "rkf3kQ", "qtc55314");


if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['user_id']) || empty($_POST['ta_id']) || empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['phone']))
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $user_id = $_POST['user_id'];
        $ta_id = $_POST['ta_id'];
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $phone = $_POST['phone'];
        $birthdate = $_POST['birth_date'];

        $result = $mysqli->query("SELECT id FROM users WHERE id = '$user_id'");

        if($result->num_rows == 0){header("location:instructorTutorInfoIncorrect.php");}
        else{

        $query = " select @email from users where id = '".$user_id."'";
        $query = " insert into TA(id,user_id,first_name,last_name,birth_date, phone) VALUES('$ta_id','$user_id','$fname', '$lname','$birth_date', '$phone';";
        $query = " insert into course_ta(course_id, ta_id)
VALUES('$course', '$ta_id')";


        $result2 = mysqli_multi_query($mysqli, $query);

        if ($result2)
        {
            header("location:instructorTutorInfo.php");
        }
        else{
            echo 'Please check your query';
        }
    }}
}
else
{
    echo 'Please check your connection';
}

?>
