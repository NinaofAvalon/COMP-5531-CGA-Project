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
       
    }


}elseif($Role == 'TA'){
    $cid = $_POST['CourseID'];
    $email = $_POST['email'];
    $query = "select id from users where email = '".$email."' ";
    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_assoc($result))
        {
          $tauid = $row['id'];
          }
   
    if ($tauid){
        
        while($row = mysqli_fetch_assoc($result))
            {
              $tauid = $row['id'];
              }
       
        $queryta = "select id from TA where user_id = '".$tauid."' ";
        $resultta = mysqli_query($conn,$queryta);    
         while($rowta = mysqli_fetch_assoc($resultta))
             {
               $inta = $rowta['id'];
               }
       
        if($inta){
            $queryinta = "select id from course_ta where ta_id = '".$inta."' and course_id = '".$cid."'";
            $resultinta = mysqli_query($conn,$queryinta);
          
            while($rowinta = mysqli_fetch_assoc($resultinta))
                {
                  $duplicate = $rowinta['id'];
                  
                  }
            if($duplicate !=  null){echo "This record is already in the database!";}else{
            $query5 = "insert into course_ta(course_id, ta_id) VALUES('$cid','$inta')";
            $result5 = mysqli_query($conn,$query5);
            header("location:adminCourses.php");
            }
            
        
        }else
        {header("location:existingUserNewRole.php?Id=$tauid&Role=$Role&email=$email&cid=$cid");}
        }
    else
    {
        $query2 = "select max(id) as mid from TA";
        $result2 = mysqli_query($conn,$query2);
        while($row = mysqli_fetch_assoc($result2))
            {
              $nextuid = $row['mid']+1;
              }
        header("location:addNewUserasRole.php?Id=$nextuid&Role=$Role&email=$email&cid=$cid ");
      
    }


}

    
    
/*
else
{
    header("location:adminInstructor.php");
}
*/


?>