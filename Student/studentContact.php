<?php
   include('../session.php');

  $course_section=  $_SESSION["course_section"];
  $student_id =$_SESSION["student_id"];
  $course_id = $_SESSION["course_id"];
  $course_term = $_SESSION["course_term"];

  //student group_id
  $query4= "SELECT group_id from group_full_info where course_id='$course_id' and student_id='$student_id'";
  $query4 = "SELECT class_group.course_id, stud_in_group.group_id, stud_in_group.student_id
from stud_in_group
inner join class_group on class_group.group_id = stud_in_group.group_id
having student_id ='$student_id' and course_id='$course_id'";
  $run4 = $conn->query($query4);
  $row4= $run4->fetch_array();
    $count = mysqli_num_rows($run4);
  if($count== 1){
    $_SESSION['group_id'] = $row4['group_id'];
    $group_id = $_SESSION['group_id'];
  }

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
  <div class="menu-welcome" height="100%" width="150px">
    <hr>
    <b >
      <font size="4">
        <i>
          <?php echo htmlspecialchars($_SESSION["course_name"]); ?>/<?php echo htmlspecialchars($_SESSION["course_term"]); ?>
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
                               <a href="../Email/inbox.php">
                                   <b>
                                       <font color="black">Email</font>
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
    <b>
       <font size="4">
         <ul>
               <b>
                 <form>
<input type="button" class="button-email" value="Back" onclick="history.back()">
</form>
               </b>
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
    $query = "SELECT instructor.first_name, instructor.last_name, instructor.phone, users.email, users.username, course.id
from instructor
inner join users on instructor.user_id = users.id
inner join course on course.instructor_id = instructor.id
having id = '$course_id'";
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
    $query = "SELECT TA.first_name, TA.last_name, TA.phone, users.email, users.username, course_ta.course_id
from TA
inner join users on TA.user_id = users.id
inner join course_ta on course_ta.ta_id = TA.id
having course_id = '$course_id'";
    $run = $conn -> query($query);
    $count = mysqli_num_rows($run);
    if ($count != 0){

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
  <?php

  }
   ?>

</div>
</body>
</html>
