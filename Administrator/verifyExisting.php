<?php
include('../session.php');
require_once "../php/config.php";
// get data role
$Role = $_GET['Id'];
//  IS INSTRUCTOR
if($Role == 'instructor')
{
    
    $email = $_POST['email'];
    $query = "select id from users where email = '".$email."' ";
    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_assoc($result))
        {
          $intruid = $row['id'];
          }
   
    if ($intruid){
        
        while($row = mysqli_fetch_assoc($result))
            {
              $intruid = $row['id'];
              }
              
        header("location:existingUserNewRole.php?Id=$intruid&Role=$Role&email=$email");}
    else
    {
        $query2 = "select max(id) as mid from instructor";
        $result2 = mysqli_query($conn,$query2);
        while($row = mysqli_fetch_assoc($result2))
            {
              $nextid = $row['mid']+1;
              }
        header("location:addNewUserasRole.php?Id=$nextid&Role=$Role&email=$email");
        echo 'Please check your Query';
    }
}
elseif($Role == 'student'){
    $email = $_POST['email'];
    $query = "select id from users where email = '".$email."' ";
    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_assoc($result))
        {
          $studid = $row['id'];
          }
   
    if ($studid){
        
        while($row = mysqli_fetch_assoc($result))
            {
              $studid = $row['id'];
              }
              
        header("location:existingUserNewRole.php?Id=$studid&Role=$Role&email=$email");}
    else
    {
        $query2 = "select max(student_id) as mid from student";
        $result2 = mysqli_query($conn,$query2);
        while($row = mysqli_fetch_assoc($result2))
            {
              $nextuid = $row['mid']+1;
              }
        header("location:addNewUserasRole.php?Id=$nextuid&Role=$Role&email=$email");
        echo 'Please check your Query';
    }


}

    
    
/*
else
{
    header("location:adminInstructor.php");
}
*/


?>