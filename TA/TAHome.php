<?php
   include('../session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>TA Home</title>
    <style><?php include '../style.css'; ?></style>
</head>
<body>
    <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>TA Home</b></font></td>
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

  <div class="main_home">  
    <hr>
    <!-- Headings -->
    <h2>Welcome to CrsMgr Group-work Assistant(CGA)</h2>

    <!-- Paragraph -->
    <p>
        This webpage allows you to access student groups discussions and their marked entities.
        The features offered as menus are explained below.

    </p>

    <p>
        <strong>Features</strong>
    </p>

    <ul>
        <li><strong>Contact Information</strong></li>
    </ul>

    <p>
        List the contact information for the instructor for the course.
    </p>


    <ul>
        <li><strong>Course Groups</strong></li>
        </ul>

        <p>
            View detailed information of all section groups.
        </p>


        <ul>
            <li><strong>Discussion Board for Student Groups</strong></li>
        </ul>

        <p>
            Read the ideas discussed by students on a message board and add suggestions and comments.
        </p>

        <ul>
            <li><strong>Marked Entities</strong></li>
            <ul>
                <li>View detailed information of all marked entities uploaded by student groups.</li>
            </ul>
            <ul>
                <li>Download assignments and projects uploaded by student groups.</li>
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
            Update your username which is recorded in the system.
        </p>

        <!-- Links -->
        <br>
        <hr>

        <a href="TAContact.html">
            <ul>
                <li><strong>Contact Information</strong></li>
            </ul>
        </a>
        <a href="TAGroup.html">
            <ul>
                <li><strong>Course Groups</strong></li>
            </ul>
        </a>
        <a href="TADiscussion.html">
            <ul>
                <li><strong>Discussion Board for Student Groups</strong></li>
            </ul>
        </a>
        <a href="TAMarkedEntities.html">
            <ul>
                <li><strong>Marked Entities</strong></li>
            </ul>
        </a>
        <a href="TAPassword.html">
            <ul>
                <li><strong>Change Password</strong></li>
            </ul>
        </a>
        <a href="TAUsername.html">
            <ul>
                <li><strong>Change Username</strong></li>
            </ul>
        </a>

        <div style="margin-top:500px"></div>
    <div class="main_home">
</body>
</html>
