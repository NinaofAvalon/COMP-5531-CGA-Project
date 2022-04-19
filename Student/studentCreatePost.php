<?php
   include('../session.php');

   $username = $_SESSION['username'];
   $course_id = $_SESSION["id"];
   $group_id = $_SESSION['group_id'];

   if(isset($_POST['submit'])){

     if($conn === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
        }

        //get user title
      $post_title = mysqli_real_escape_string(
           $conn, $_REQUEST['post-title']);
     //get user Message
     $post_content = mysqli_real_escape_string(
        $conn, $_REQUEST['post-content']);

        // Attempt insert query execution
        date_default_timezone_set('America/Montreal');
        $date=date('y-m-d h:ia');
        $username = $_SESSION["username"];
        $sql = "INSERT INTO discussion_board (title,creator,content,creation_date,course_id,group_id)
                    VALUES ('$post_title', '$username', '$post_content','$date','$course_id','$group_id')";
        if(mysqli_query($conn, $sql)){
          //prevent form to be resubmitted multiple times
          header("Location:studentGroupDiscussion.php");
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

  </head>
  <body>

    <!-- header -->
    <div class="header" height="20%" scrolling="no">
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td width="5%" align="left"><h2>CGA</h2></td>
            <td align="center"><font size="5"><b>Create Post</b></font></td>
          </tr>
        </tbody>
      </table>
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td align="left"><font class="font-header" size="3">Welcome, <?php
            echo htmlspecialchars($_SESSION["username"]); ?> ! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font></td>
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

      <form class="" action="studentCreatePost.php" method="post" id="create-post">

        <input name="post-title" type="text" class="feedback-input" placeholder="Title" />
    <textarea name="post-content" class="feedback-input" placeholder="Post"></textarea>
    <input type="submit" name="submit" class="post_submit" value="SUBMIT"><a href="studentGroupDiscussion.php"></a></input>


      </form>

    </div>

  </body>
</html>
