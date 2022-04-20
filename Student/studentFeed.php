<?php
   include('../session.php');
   //get student id
   $student_id = $_SESSION['student_id'];
   $username = $_SESSION['username'];
   $id = $_SESSION['course_id'];


   if(isset($_POST['submit'])){

     if($conn === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
        }

        // full name
        $query="SELECT first_name,last_name from student where user_id=(select id from users where username='$username')";
        $run = $conn->query($query);
        $row = $run->fetch_array();
        $space = " ";
        $full_name = $row['first_name'].$space.$row['last_name'];



        //feed content
        $feed_content = mysqli_real_escape_string(
             $conn, $_REQUEST['feed-content']);

     //get user Message
     $post_content = mysqli_real_escape_string(
        $conn, $_REQUEST['post-content']);


        // Attempt insert query execution

        $sql = "INSERT INTO feed (fullName,username,feedContent,course_id)
                    VALUES ('$full_name', '$username', '$feed_content','$id')";
        if(mysqli_query($conn, $sql)){
          //prevent form to be resubmitted multiple times
          header("Location:studentFeed.php");
          die();
        } else{
            echo "ERROR: Message not sent!!!";
        }

        // Close connection
        mysqli_close($conn);
   }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style><?php include '../style.css'; ?></style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>


  </head>
  <body>

    <!-- header -->
    <div class="header" height="20%" scrolling="no">
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td width="5%" align="left"><h2>CGA</h2></td>
            <td align="center"><font size="5"><b>Feed</b></font></td>
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
                  <a href="StudentFeed.phpp">
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

    <div class="main_home">

      <div class="feed">
        <div class="feed-header">
          <h2>Home</h2>
        </div>
        <?php

        $query = "SELECT profilePicture from users where username='$username'";
        $run = $conn -> query($query);
        $row = $run ->fetch_array();

         ?>
          <div class="feed-box">
            <form class="" action="studentFeed.php" method="post">
              <div class="feed-box-input">
                <img src="../files/<?php echo $row['profilePicture']; ?>" alt="">
                <input type="text" name="feed-content"  placeholder="What's on your mind?">
              </div>
              <button type="submit" name="submit" class="feed-box__feed-button">Post</button>
            </form>
          </div>
          <!-- feed starts -->
          <?php
          $query2 = "SELECT feed.fullName,feed.id, feed.feedContent, feed.username, users.profilePicture, users.username FROM feed LEFT JOIN users ON feed.username=users.username where course_id='$id'";
          $run2 = $conn->query($query2);

           while($row2 = $run2->fetch_array()) {
           ?>
          <div class="post">
            <div class="post-avatar">
              <img src="../files/<?php echo $row2['profilePicture']; ?>" alt="">
            </div>

            <div class="post-body">
              <div class="post-header">
                <div class="post-header-text">
                  <h3><?php echo $row2['fullName']; ?>
                  <span class="post-header-special"> <?php echo $row2['username']; ?></span>
                  </h3>
                </div>
                <div class="post-header-description">
                  <p><?php echo $row2['feedContent']; ?></p>
                </div>
              </div>

            </div>

          </div>

                        <?php
                      }

                         ?>

        </div>

      </div>

  </body>
</html>
