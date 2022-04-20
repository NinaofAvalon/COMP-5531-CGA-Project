<?php
   include('../session.php');
   $username = $_SESSION["username"];
   if (isset($_POST['course_name'])) {
    echo "course_id" . $_REQUEST['course_id'];
    $_SESSION['course_id'] = $_REQUEST['course_id'];
    $_SESSION['course_name']= $_REQUEST['course_name'];
    $_SESSION['course_section']= $_REQUEST['course_section'];
    header("Location: taDiscussionBoard.php");
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
                Your Courses <?php echo "what is ".isset($_POST['submit']); ?>
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

        <button align=center class="dropdownbtn">Winter 2022</button>
<?php
$user_id = $_SESSION['id'];
$query = "SELECT course.id as course_id, course.course_name,course.course_section from ta inner join course_ta ct on ta.id = ct.ta_id inner join course on course.id = ct.course_id where ta.user_id = '$user_id'";
$run = $conn->query($query);
$i=0;
while($row= $run->fetch_array()) {
  // if($i==0){
?>
<div class="dropdownlist-content">
<form class="" action="taCourses.php" method="post">
  <input  type="hidden" name="course_id" id="course_id" value="<?php echo $row['course_id']; ?>" ></input>
  <input type="submit" class="course-name" name="course_name" id="course_name" value="<?php echo $row['course_name']; ?>" ></input>
  <input  type="hidden" name="course_section" id="course_section" value="<?php echo $row['course_section']; ?>" ></input>
</form>

<?php
// }
}
 ?>


</div>
</div>
    </center>
  </body>
</html>
