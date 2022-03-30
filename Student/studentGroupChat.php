<?php
   include('../session.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style><?php include '../style.css'; ?></style>

  </head>
  <body>

    <!-- header -->
    <div class="header" height="20%" scrolling="no">
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td width="5%" align="left"><h2>CGA</h2></td>
            <td align="center"><font size="5"><b>Group Chat</b></font></td>
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

    <!-- main part -->
    <div class="main_home">
      <section class="chat_area">
        <header>
          <div class="chat_details">
            <span>Student Name</span>
            <p>Active Now</p>
          </div>
        </header>
        <div class="chat_box">
          <div class="chat_outgoing">
            <div class="chat_details">
              <p>Hello This is a group chat</p>
            </div>
          </div>
            <div class="chat_incoming">
              <div class="chat_details">
                <p>we have a group chat</p>
              </div>
            </div>
          </div>
          <form class="typing_area" action="#">
            <input type="text" placeholder="Type a message">
              <button type="button" name="button">
                <img src="../telegram.png" alt="">
              </button>
          </form>
      </section>
    </div>

  </body>
</html>
