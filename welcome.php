<?php
   require('php/utils.php');
   include('session.php');
   if (!isset($_SESSION['id'])) {
    header('Location: Index.php');
   }
   $userRoles = getRoleByUserId($conn, $_SESSION['id']);

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
                  <a href="logout.php">
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
            <li <?php echo (in_array("TA", $userRoles))? "" : "style='display:none;'" ?>>
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
              <a href="Instructor/instructorCourses.php">
                <b>
                  <font color="black">Instructor Section</font>
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
      This website is made with the intent to facilitate the academic lives of teachers, TAs and students alike.

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
      <li><strong>Change Email</strong></li>
  </ul>

  <p>
      Update your email which is recorded in the system. Make sure to change your username to the ones as required by the instructor.
  </p>



    </div>

</body>
</html>
