<?php
   include('session.php');

   //keeping track of the student's course and section
   $course_name = $_SESSION['course_name'];
   $section = $_SESSION['course_section'];
   $group_id =$_SESSION['group_id'];

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
              <a href="Student/studentFeed.php">
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

      <b>
        <font size="4">
          <ul>
            <li>
              <a href="Email/inbox.php">
                <b>
                  <font color="black">Email System</font>
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
