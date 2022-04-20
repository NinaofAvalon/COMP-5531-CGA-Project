<?php
   require_once "../php/config.php";
   
      
   
   if (isset($_POST['insert'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
   {
      $role = $_GET['role'];
      $instrid = $_GET['Id'];
      $fname = $_POST['FirstName'];
      $lname = $_POST['LastName'];
      $phone = $_POST['phone'];
      $email = trim($_POST['email']);
      $bday = $_POST['bday'];
      
      
      $query3 = "select id from users where email ='$email'";
      $result3 = mysqli_query($conn,$query3);
      $row3 = mysqli_fetch_assoc($result3);
    if($row3 == NULL){
      if (empty($_POST['FirstName']) || empty($_POST['LastName']) || empty($_POST['email']) )
      {
           echo 'Please Fill in the blanks';
      }else{
          $a = rand(3,1000);
          $uname  = substr($fname,0,1).'_'.substr($lname,0,3).$a;
          $upass = $uname.'1234';
          $query = "select max(id) as mid from users";
          $result = mysqli_query($conn,$query);
          while($row = mysqli_fetch_assoc($result))
              {
                $nextuid = $row['mid']+1;
                }
           $query1 = "insert into users VALUES('$nextuid', '$uname','$upass','$email')";
           $result1 = mysqli_query($conn,$query1);
           
           if($role == 'instructor')
           {
                   $query2 = "insert into instructor(id, user_id, first_name, last_name, birth_date ,phone, email) VALUES('$instrid','$nextuid','$fname','$lname','$bday','$phone','$email')";
                   $result2 = mysqli_query($conn,$query2);  
                   if ($instrid)
                     {
                         header("location:adminInstructor.php");
                     }
                 else
                     {
                         echo 'Please check your query';
                     }
           }elseif($role == 'student'){
                $query3 = "insert into student(student_id, user_id, first_name, last_name, birth_date ,phone) VALUES('$instrid','$nextuid','$fname','$lname','$bday','$phone')";
                $result3 = mysqli_query($conn,$query3);
            if ($instrid)
              {
                  header("location:adminStudents.php");
              }
          else
              {
                  echo 'Please check your query';
              }
           
           
           
           
           }
            

          
                 
          
          
          
      }
      
      
      }else
      {
          echo 'This email is already in the database';
      }
      
   }
   else
   {
       echo 'Please check your connection';
   }
?>

