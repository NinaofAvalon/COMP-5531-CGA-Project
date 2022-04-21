<?php
   include('../session.php');

  $course_section=  $_SESSION["course_section"];
  $student_id =$_SESSION["student_id"];
  $course_id = $_SESSION["course_id"];

  //student group_id
  $query4= "SELECT group_id from group_full_info where course_id='$course_id' and student_id='$student_id'";
  $run4 = $conn->query($query4);
  $row4= $run4->fetch_array();
  $_SESSION['group_id'] = $row4['group_id'];
  $group_id = $_SESSION['group_id'];

?>
﻿<!DOCTYPE html>
<html>
<head>
    <title>Contact Information</title>
    <style><?php include '../style.css'; ?></style>

</head>
<body>
  <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Contact Information</b></font></td>
        </tr>
      </tbody>
    </table>
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td align="left"><font class="font-header" size="3">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?> ! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font></td>
          <td align="right">
            <i>
              <b>
                <a href="StudentFeed.php">
                  <font class="home_link" color="black">Home</font>
                </a>
              </b>
            </i>
            <i>
              <b>
                <a href="../logout.php">
                  <font color="black">Logout</font>
                </a>
              </b>
            </i>
            <br>
          </td>
        </tr>
      </tbody>
    </table>
  </div>


  <!-- menu -->
  <div class="menu" height="100%" width="150px">
    <hr>
    <b >
      <font size="4">
        <i>
          <?php echo htmlspecialchars($_SESSION["course_name"]); ?>/Winter 2022
          <br>
          SECTION <?php echo htmlspecialchars($_SESSION["course_section"]); ?>
        </i>
      </font>
    </b>
    <hr>
    <b>
      <font size="4">
        <ul>
          <li>
            <a href="studentContact.php">
              <b>
                <font color="black">Contact Information</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>

    <b>
      <font size="4">
        <ul>
          <li>
            <a href="studentGroup.php">
              <b>
                <font color="black">Course Group</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>

    <b>
      <font size="4">
        <ul>
          <li>
            <a href="studentGroupChat.php">
              <b>
                <font color="black">Group Chat</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>

    <b>
      <font size="4">
        <ul>
          <li>
            <a href="studentGroupDiscussion.php">
              <b>
                <font color="black">Discussion Board</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>

    <b>
      <font size="4">
        <ul>
          <li>
            <a href="studentAgenda.php">
              <b>
                <font color="black">Agenda</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>

    <b>
      <font size="4">
        <ul>
          <li>
            <a href="studentProjects.php">
              <b>
                <font color="black">Upload Files</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>


    <b>
      <font size="4">
        <ul>
          <li>
            <a href="studentPassword.php">
              <b>
                <font color="black">Change Password</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>

    <b>
      <font size="4">
        <ul>
          <li>
            <a href="studentEmail.php">
              <b>
                <font color="black">Change Email</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>

    <b>
      <font size="4">
        <ul>
          <li>
            <a href="studentProfilePicture.php">
              <b>
                <font color="black">Change Profile Picture</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>
  </div>


    <!-- Table -->
    <div class="main_home">

      <b>Course Instructor</b>
      <br>
      <br>

    <?php
    $coursename = $_SESSION['course_name'];
    $course_id = $_SESSION['course_id'];
    $query = "SELECT * from instructor where id=(select instructor_id from course_taught where course_id='$course_id')";
    $run = $conn -> query($query);
    $row = $run -> fetch_array();
     ?>
    <table border="1" width="100%">
      <tbody>
            <tr bgcolor="F6E5F5">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
            <tr>
              <td><?php echo $row['first_name']; ?></td>
              <td><?php echo $row['last_name']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><?php echo $row['email']; ?></td>
            </tr>
        </tbody>
    </table>

    <br>

    <hr>

    <b>Course TA</b>
    <br>
    <br>
    <?php
    $query = "SELECT * FROM TA
    join course_ta ct on TA.id = ct.TA_id
    join course on course.id = ct.course_id
    where course.course_name='$coursename' and course.course_section='$course_section'";
    $run = $conn -> query($query);
    $row = $run -> fetch_array();
     ?>
  <table border="1" width="100%">
    <tbody>
          <tr bgcolor="F6E5F5">
              <th>First name</th>
              <th>Last name</th>
              <th>Phone</th>
              <th>Email</th>
          </tr>
          <tr>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
          </tr>
      </tbody>
  </table>

    <div class="main_home">

</body>
</html>
