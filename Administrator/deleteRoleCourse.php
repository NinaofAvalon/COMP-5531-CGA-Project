<?php
include('../session.php');
require_once "../php/config.php";


if( isset($_GET['del']))
{
    $pid = $_GET['del'];
    $Role = $_GET['Role'];
    $cname = $_GET['cname'];
    if($Role == 'Instructor'){
        $queryforinst = "delete from course where instructor_id = $pid and course_name = '$cname' ";
        $resultforinst = mysqli_query($conn,$queryforinst);
        $delintable = 'course_taught';
        $query = "delete from $delintable where instructor_id = $pid ";
     
        $result = mysqli_query($conn,$query);
        header("location:admin$Role.php");
    } elseif($Role == 'Student'){
        $delintable = 'course_enrolled';
        $queryst = "delete from $delintable where student_id = $pid ";
      
        $result = mysqli_query($conn,$queryst);
        header("location:adminStudents.php");
    }elseif($Role == 'TA'){
        $cid = $_GET['cid'];
        $delintable = 'course_ta';
        $queryta = "delete from $delintable where ta_id = $pid and course_id = $cid ";      
        $result = mysqli_query($conn,$queryta);
        $quertanum = "select count(*) as num from course_ta  where ta_id = $pid";
        
        $resultnum = mysqli_query($conn,$quertanum);
        while($tanum = mysqli_fetch_assoc($resultnum))
        {
         $num = $tanum['num'];
         }
         if($num == 0){
             $delta = "delete from TA where id = $pid ";      
             $dresult = mysqli_query($conn,$delta);
             if($dresult){header("location:courseTA.php?Id=".$cid."&cname=".$cname);}else{
                 echo "Please check your query!";  
             }
             
         }else{
             header("location:courseTA.php?Id=".$cid."&cname=".$cname);
         }
        
    }
    
    
}
else
{
    header("location:adminHome.php");
}

?>