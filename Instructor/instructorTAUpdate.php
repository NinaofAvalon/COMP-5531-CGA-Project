<?php

require_once("connection.php");

if(isset($_POST['update']))
{
    $id = $_GET['Id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "update project.TA set phone = '".$phone."' , email = '".$email."'  
                where id ='".$id."' ";
    $result = mysqli_query($con,$query);

    if ($result)
    {
        header("location:instructorTutorInfo.php");
    }
    else
    {
        echo 'Please check your query';
    }
}
else
{
    header("location:instructorTutorInfo.php");
}


?>