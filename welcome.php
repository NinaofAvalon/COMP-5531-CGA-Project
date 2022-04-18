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
       This webpage allows you to navigate to Student, TA, Insturctor, Administrator section based on your roles.

   </p>

   
    </div>

</body>
</html>
