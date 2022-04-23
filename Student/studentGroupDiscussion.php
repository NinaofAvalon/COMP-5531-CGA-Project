<?php
   include('../session.php');
   $course_id = $_SESSION["course_id"];
   $group_id = $_SESSION['group_id'];



?>
<!DOCTYPE html>
<html>
<head>
    <title>Group Discussion</title>
    <style><?php include '../style.css'; ?></style>

</head>

<body>
  <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Discussion Board</b></font></td>
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
  </div>
  <!-- main section -->


  <div class="main_home">



            <div class="table-head">
                <div class="subjects">Subjects</div>

            </div>


            <div class="table-row">

                <div class="subjects">
                  <?php
                  $query = "SELECT * FROM discussion_board where course_id='$course_id' and group_id='$group_id'";

                  $run = $conn->query($query);
                  $i=0;


                  while($row = $run->fetch_array()) {
                  if($i==0){


                ?>

                  <form class="" action="studentPostDetails.php" method="get">

                    <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                    <div class="author-div">
                      <span>Author:  <?php echo $row['creator']; ?></span>
                    </div>

                  <input type="submit" id="title" value="<?php echo $row['title']; ?>">
                  <br>


                   </form>
                   <?php
                     }
                   }
                 ?>


                </div>

            </div>


        <button class="post-button"><a href="studentCreatePost.php">Submit New Post</a></button>
        </div>

  </body>

</html>
