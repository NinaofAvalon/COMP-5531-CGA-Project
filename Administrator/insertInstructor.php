<?php
   require_once "../php/config.php";
   
   if (isset($_POST['insert'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
   {
       
      $userid = $_POST['userid'];
      $instrid = $_POST['id'];
      $fname = $_POST['FirstName'];
      $lname = $_POST['LastName'];
      $bday = $_POST['bday'];
      $phone = $_POST['phone'];
      
      if (empty($_POST['userid']) || empty($_POST['id']) || empty($_POST['email']) )
      {
           echo 'Please Fill in the blanks';
      }else{
      
          $query = "insert into instructor(id, user_id, first_name, last_name, birth_date, phone) VALUES('$instrid','$userid','$fname','$lname','$bday','$phone')";
          $result = mysqli_query($conn,$query);

          if ($result)
          {
              header("location:adminInstructor.php");
          }
          else
          {
              echo 'Please check your query';
          }
          
      }
      
   }
   else
   {
       echo 'Please check your connection';
   }
?>

