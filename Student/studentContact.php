<?php
   include('session.php');

   $instructor_fname = "SELECT * FROM instructor WHERE username = '$username'";
   $instructor_lname;
   $instructor_phone;
   $instructor_office;
   $instructor_email;

?>
﻿<!DOCTYPE html>
<html>
<head>
    <title>Contact Information</title>
    <style><?php include 'style.css'; ?></style>

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
                <a href="../welcome.php">
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
          COMP 5531/Winter 2022
          <br>
          Section NN
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
  </div>


    <!-- Table -->
    <div class="main_home">

      <b>Course Instructor</b>
      <br>
      <br>

    <table border="1" width="100%">
      <tbody>
            <tr bgcolor="F6E5F5">
                <th>First name</th>
                <th>Last name</th>
                <th>Phone</th>
                <th>Office</th>
                <th>Email</th>
            </tr>
            <tr>
              <td>First name</td>
              <td>Last name</td>
              <td>Phone</td>
              <td>Office</td>
              <td>email</td>
            </tr>
        </tbody>
    </table>

    <br>

    <hr>

    <b>Course TA</b>
    <br>
    <br>

  <table border="1" width="100%">
    <tbody>
          <tr bgcolor="F6E5F5">
              <th>First name</th>
              <th>Last name</th>
              <th>Phone</th>
              <th>Office</th>
              <th>Email</th>
          </tr>
          <tr>
            <td>First name</td>
            <td>Last name</td>
            <td>Phone</td>
            <td>Office</td>
            <td>email</td>
          </tr>
      </tbody>
  </table>

    <div class="main_home">

</body>
</html>
