<?php
include('../session.php');
require_once "../php/config.php";


if( isset($_GET['del']))
{
    $pid = $_GET['del'];
    $Role = $_GET['Role'];
    $cname = $_GET['cname'];
    if($Role = 'Instructor'){
        $queryforinst = "delete from course where instructor_id = $pid and course_name = '$cname' ";
        $resultforinst = mysqli_query($conn,$queryforinst);
        $delintable = 'course_taught';
        $query = "delete from $delintable where instructor_id = $pid ";
        echo $query;
        $result = mysqli_query($conn,$query);
        header("location:admin$Role.php");
    } elseif($Role = 'Student'){
        $delintable = 'course_enrolled';
        $queryst = "delete from $delintable where student_id = $pid ";
        echo $queryst;
        $result = mysqli_query($conn,$queryst);
        header("location:adminStudents.php");
    }
    
    
}
else
{
    header("location:adminHome.php");
}

?>