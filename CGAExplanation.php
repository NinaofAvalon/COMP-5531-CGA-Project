<?php
   require('php/utils.php');
   include('session.php');


   //get student id
   $student_id = $_SESSION['student_id'];


   // $_SESSION["course_name"] = $course_name;
   $course_name = $_POST["course_name"];
   $_SESSION['course_name'] = $course_name;


      $sql = "SELECT course_section, course_term, id from course where course_name='$course_name'";
      $run = $conn->query($sql);
      $row = $run->fetch_array();
      $_SESSION["course_section"] = $row['course_section'];
      $_SESSION["course_term"] = $row['course_term'];
     $_SESSION["id"] = $row['id'];
     $id =$_SESSION["id"];




      //establish the group_id for the student
      $query = "SELECT class_group.group_id,class_group.group_name,class_group.leader_id,class_group.course_id, stud_in_group.student_id
                FROM class_group
                left join stud_in_group ON class_group.group_id=stud_in_group.group_id
                having student_id='$student_id' and course_id='$id'";
      $run2 = $conn->query($query);
      $row2 = $run2->fetch_array();
      $_SESSION["group_name"] = $row2['group_name'];
      $_SESSION["leader_id"] = $row2['leader_id'];
      $_SESSION["group_id"] = $row2['group_id'];


?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style><?php include 'style.css'; ?></style>

</head>
<body>

    <!-- header -->
    <div class="header" height="20%" scrolling="no">
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td width="5%" align="left"><h2>CGA</h2></td>
            <td align="center"><font size="5"><b>Homepage</b></font></td>
          </tr>
        </tbody>
      </table>
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td align="left"><font size="3">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font></td>
            <td align="right">
              <i>
                <b>
                  <a href="Student/StudentFeed.php">
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
            <?php echo $_SESSION["course_name"]; ?>/ <?php echo $_SESSION["course_term"]; ?>
            <br>
            SECTION <?php echo $_SESSION["course_section"];?>
          </i>
        </font>
      </b>
      <hr>
      <b>
        <font size="4">
          <ul>
            <li <?php echo (in_array("student", $userRoles))? "" : "style='display:none;'" ?>>
              <a href="Student/studentCourses.php">
                <b>
                  <font color="black">Student Section</font>
                </b>
              </a>
            </li>
          </ul>
        </font>
      </b>
      <b>
        <font size="4">
          <ul>
            <li <?php echo (in_array("ta", $userRoles))? "" : "style='display:none;'" ?>>
              <a href="TA/taCourses.php">
                <b>
                  <font color="black">TA Section</font>
                </b>
              </a>
            </li>
          </ul>
        </font>
      </b>
      <b>
        <font size="4">
          <ul>
            <li <?php echo (in_array("instructor", $userRoles))? "" : "style='display:none;'" ?>>
              <a href="Instrucotr/">
                <b>
                  <font color="black">Instructor Section</font>
                </b>
              </a>
            </li>
          </ul>
        </font>
      </b>
      <b>
      <b>
        <font size="4">
          <ul>
            <li <?php echo (in_array("administrator", $userRoles))? "" : "style='display:none;'" ?>>
              <a href="Administrator/adminHome.php">
                <b>
                  <font color="black">Administrator Section</font>
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
              <a href="Email/inbox.php">
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
              <a href="Student/studentProjects.php">
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
              <a href="Student/studentPassword.php">
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
              <a href="Student/studentEmail.php">
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

    <!-- Main section -->
    <div class="main_home">

      <p>
       This webpage allows you to navigate to Student, TA, Insturctor, Administrator section based on your roles.

   </p>

   
    </div>

</body>
</html>
