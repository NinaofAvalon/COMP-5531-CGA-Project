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

$query = "SELECT course_id from course_enrolled where student_id=(select student_id from student where user_id=(select id from users where username='$username'))";
$run = $conn->query($query);
?>
<button align=center class="dropdownbtn">Winter 2022</button>

<?php
while($row= $run->fetch_array()) {
  $course_id = $row['course_id'];
  $query2 = "SELECT * from course where id='$course_id'";
  $run2 = $conn->query($query2);
  while($row2= $run2->fetch_array()){
 ?>

<div class="dropdownlist-content">
<form class="" action="../welcome.php" method="post">

  <input type="submit" class="course-name" name="course_name" value="<?php echo $row2['course_name'];?>" ></input>


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
