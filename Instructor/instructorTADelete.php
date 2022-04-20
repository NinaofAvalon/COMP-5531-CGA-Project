<?php

require_once("connection.php");
$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from  TA where id = '".$id."';";
    $query .= "delete from  course_ta where ta_id = '".$id."'";
    $result = mysqli_multi_query($mysqli, $query);

    if ($result){
        header("location:instructorTutorInfo.php");
    }
    else
    {
        echo 'Please check your Query';
    }
}
else
{
    header("location:instructorTutorInfo.php");
}

?>