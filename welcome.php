<?php
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
                  <a href="welcome.php">
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
            <li>
              <a href="Student/studentContact.php">
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
              <a href="Student/studentGroup.php">
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
              <a href="Student/studentGroupChat.php">
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
              <a href="Student/studentGroupDiscussion.php">
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
              <a href="Student/studentAgenda.php">
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
              <a href="studentFeed.php">
                <b>
                  <font color="black">Feed</font>
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
    </div>

    <!-- Main section -->
    <div class="main_home">

      <p>
       This webpage allows you to share information and ideas with your teammates via pages and shared files.
       The features offered as menus are explained below.

   </p>

   <p>
       <strong>Features</strong>
   </p>

   <ul>
       <li><strong>Contact Information</strong></li>
   </ul>

   <p>
       List the contact information for the instructor and tutor for the course.
   </p>

   <ul>
       <li><strong>Course Group</strong></li>
   </ul>

   <p>
       List detail information of your current group.
   </p>

   <ul>
       <li><strong>Group Discussion</strong></li>
   </ul>

   <p>
       Share and discuss ideas with your teammates on a message board.
   </p>

   <ul>
       <li><strong>Assignment/Project Upload</strong></li>
       <ul>
           <li>Upload/Update your submission files before preset deadline</li>
       </ul>
       <ul>
           <li>Upload your late submission files with preset penalty</li>
       </ul>
       <ul>
           <li>View your current upload info for your individual/group works</li>
       </ul>
       <ul>
           <li>View your current upload info for your individual/group works</li>
       </ul>
       <ul>
           <li><strong>Note: For group work, only the group leader can upload files. Make sure the group members agree on the contents of the files being uploaded.</strong></li>
       </ul>
   </ul>

   <ul>
       <li><strong>Change Password</strong></li>
   </ul>

   <p>
       Change your password for access to the system.
   </p>

   <ul>
       <li><strong>Change Username</strong></li>
   </ul>

   <p>
       Update your username which is recorded in the system. Make sure to change your username to the ones as required by the instructor.
   </p>

   <!-- Links -->
   <br>
   <hr>

   <a href="studentContact.html">
       <ul>
           <li><strong>Contact Information</strong></li>
       </ul>
   </a>
   <a href="studentGroup.html">
       <ul>
           <li><strong>Course Group</strong></li>
       </ul>
   </a>
   <a href="studentGroupDiscussion.html">
       <ul>
           <li><strong>Group Discussion</strong></li>
       </ul>
   </a>
   <a href="studentProjects.html">
       <ul>
           <li><strong>Assignment/Project Upload</strong></li>
       </ul>
   </a>
   <a href="studentPassword.html">
       <ul>
           <li><strong>Change Password</strong></li>
       </ul>
   </a>
   <a href="studentUsername.html">
       <ul>
           <li><strong>Change Username</strong></li>
       </ul>
   </a>

    </div>

</body>
</html>
