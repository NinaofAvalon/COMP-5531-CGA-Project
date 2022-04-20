<?php
   require_once "../php/config.php";
   
   if (isset($_POST['insert'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
   {
       
      $CourseName = $_POST['CourseName'];
      $instructor = $_POST['instructor'];
      $CourseSection = $_POST['CourseSection'];
      $term = $_POST['term'];
      echo $instructor;
      $arrinstr = explode(' ', $instructor);
      print_r( $arrinstr);
      $fname = $arrinstr[0];
      $lname = $arrinstr[1];
      $queryintr = "select id from instructor where first_name ='$fname' and last_name ='$lname' ";
      $resintr = mysqli_query($conn,$queryintr);
      $nameterm = $CourseName.$term;
      
      $uniquequery = "SELECT concat ( course_name, course_term) as 'course_unique'  FROM course GROUP BY id";
      $uniqueresult = mysqli_query($conn,$uniquequery);
      $check = 0;
      while($uniquer = mysqli_fetch_assoc($uniqueresult)){
          
          $eachrow = $uniquer['course_unique'];
          if ($eachrow == $nameterm){
          $check = $check +1;
          }
      }
      echo $check;     
      if ($check== 0){
            while($rowintr = mysqli_fetch_assoc($resintr)){
                
                $insid = $rowintr['id'];
            }
            
            if (empty($_POST['CourseName']) || empty($_POST['instructor']) || empty($_POST['CourseSection'])  || empty($_POST['term']))
            {
                 echo 'Please Fill in the blanks';
            }else{
            
            if($instructor == 'TBA'){
                 $query = "insert into course(course_name,course_section,course_term) VALUES('$CourseName','$CourseSection','$term')";
                 $result = mysqli_query($conn,$query);

                 if ($result)
                 {
                     header("location:adminCourses.php");
                 }
                 else
                 {
                     echo 'Please check your query';
                 }
                 
            }else{
                  echo $insid;
                  $query2 = "insert into course(course_name,instructor_id,course_section,course_term) VALUES('$CourseName','$insid','$CourseSection','$term')";
                  $result2 = mysqli_query($conn,$query2);
                  $query4 = "select max(id) from course ";
                  $result4 = mysqli_query($conn,$query4);
                  while($thatcid = mysqli_fetch_assoc($result4)){
                      
                      $thatid = $thatcid['max(id)'];
                  }
        
                  
                  $query3= "insert into course_taught SELECT id, instructor_id from course where id = '$thatid'";
                  $result3 = mysqli_query($conn,$query3);

                  if ($result3)
                  {
                      header("location:adminCourses.php");
                  }
                  else
                  {
                      echo 'Please check your query';
                  }
            }
          }
      
      }else{
      echo 'Can only have one unique course name in one term';
      }

      
   }
   else
   {
       echo 'Please check your connection';
   }
?>

