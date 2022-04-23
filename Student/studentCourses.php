<?php
   include('../session.php');
   $username = $_SESSION["username"];

   //get student_id
   $query3 = "SELECT student_id from student where user_id=(select id from users where username='$username')";
   $run3 = $conn->query($query3);
   $row3= $run3->fetch_array();
   $_SESSION['student_id'] = $row3['student_id'];
   $student_id = $_SESSION['student_id'];

   //get group_id


   if (isset($_POST['course_name'])) {
    echo "course_id" . $_REQUEST['course_id'];
    $_SESSION['course_id'] = $_REQUEST['course_id'];
    $course_id = $_SESSION['course_id'];
    $_SESSION['course_name']= $_REQUEST['course_name'];
    $_SESSION['course_section']= $_REQUEST['course_section'];
    $_SESSION['group_id']= $_REQUEST['group_id'];
    $_SESSION['course_term']=$_REQUEST['course_term'];


    header("Location: studentContact.php");
  }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Access Roles</title>
    <style><?php include '../style.css'; ?></style>
  </head>


  <body>

    <br>
    <br>
    <br>
    <table border="0" width="100%">
      <tbody>
        <tr>
          <td align="center">
            <h1>CGA</h1>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr bgcolor="#B7CADB">
          <td align="center">
            <b>
              <font size="5">
                Your Courses
              </font>
            </b>
          </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <center>
      <h3>Select A Course</h3>

      <div align=center class="dropdowndemo">

<?php

$query = "SELECT course.course_name,course.course_term,course.id as course_id,course.course_section,student.student_id
from student
inner join course_enrolled ce on student.student_id = ce.student_id
inner join course on ce.course_id = course.id
having student_id = (select student_id from student where user_id = (select id from users where username='$username'))";
?>
<button align=center class="dropdownbtn">Winter 2022</button>

<?php
$run = $conn->query($query);

while($row= $run->fetch_array()) {


 ?>

<div class="dropdownlist-content">



<form class="" action="studentCourses.php" method="post">



  <input  type="hidden" name="course_id" id="course_id" value="<?php echo $row['course_id']; ?>" ></input>
  <input type="submit" class="course-name" name="course_name" id="course_name" value="<?php echo $row['course_name']; ?>" ></input>
  <input  type="hidden" name="course_term" id="course_term" value="<?php echo $row['course_term']; ?>"></input>
  <input  type="hidden" name="course_section" id="course_section" value="<?php echo $row['course_section']; ?>" ></input>

</form>

<?php
}

 ?>


</div>
</div>
    </center>
  </body>
</html>
