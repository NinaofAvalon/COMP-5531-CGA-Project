<?php
   include('../session.php');
   $username = $_SESSION["username"];

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

$query = "SELECT course.course_name,course.course_term,course.course_id,course.course_section, instructor.id
from instructor
inner join course_taught ct on instructor.id = ct.instructor_id
inner join course on ct.course_id = course.course_id
having instructor.id = (select instructor.id from instructor where user_id = (select id from users where username='$username'))";

$run = $conn->query($query);
$i=0;
while($row= $run->fetch_array()) {
  if($i==0){
?>
<button align=center class="dropdownbtn">Winter 2022</button>
<div class="dropdownlist-content">
<form class="" action="../welcome.php" method="post">
  <?php $_SESSION['course_name']= $row['course_name'];
        $_SESSION['course_section']= $row['course_section'];
        $_SESSION['course']= $row['course_id'];
  ?>
  <input type="submit" class="course-name" name="course_name" value="<?php echo $row['course_name']; ?>" ></input>
</form>

<?php
}
}
 ?>


</div>
</div>
    </center>
  </body>
</html>