<?php
   include_once ('../session.php');

   $username = $_SESSION["username"];


   $group_id = $_SESSION["group_id"];



   if(isset($_POST['submit'])){

     if($conn === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
        }

     //get user Message
     $message = mysqli_real_escape_string(
        $conn, $_REQUEST['message']);

        // Attempt insert query execution
        date_default_timezone_set('America/Montreal');
        $date=date('y-m-d h:ia');
        $username = $_SESSION["username"];
        $sql = "INSERT INTO chat (message,username,date,group_id)
                    VALUES ('$message', '$username', '$date','$group_id')";
        if(mysqli_query($conn, $sql)){
          //prevent form to be resubmitted multiple times
          header("Location:studentGroupChat.php");
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
  <body onload="show_func()">

    <script>
    function show_func(){
     var element = document.getElementById("chathist");
        element.scrollTop = element.scrollHeight;
     }
     </script>



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

    <!-- main part -->
    <div class="main_home">
    <form  name="myform" action="studentGroupChat.php" method="post">
      <section class="chat_area">
        <header>
          <div class="chat_details" id="chat_details">

            <span><?php echo htmlspecialchars($_SESSION["username"]); ?> </span>
            <p>Active Now</p>

          </div>

          </header>

        <div class="chat_box" id="chathist">
          <?php
          $query = "SELECT * FROM chat where group_id='$group_id'";
          $run = $conn->query($query);
          $i=0;

           while($row = $run->fetch_array()) {
           if($_SESSION['username']==$row['username']){

           ?>

          <div class="chat_outgoing">
            <div class="chat_details">
              <?php echo $row['message']; ?>
              <div class="info">
                  <?php echo $row['username']; ?>, <?php echo $row['date']; ?>
              </div>
            </div>
          </div>

          <?php
          }

          else
          {

            if($_SESSION['username']!=$row['username'])
            {
            ?>
            <div class="chat_incoming">
              <div class="chat_details">
                <?php echo $row['message']; ?>
                <div class="info">
                    <?php echo $row['username']; ?>, <?php echo $row['date']; ?>
                </div>
              </div>
          </div>
            <br>
          <?php
        }
          else
          {
            ?>

            <div class="chat_outgoing">
              <div class="chat_details">
                <?php echo $row['message']; ?>
                <div class="info">
                    <?php echo $row['username']; ?>, <?php echo $row['date']; ?>
                </div>

              </div>

            </div>
            <br>
            <?php
          }
        }
      }
          ?>
          </div>
          <div class="typing_area">
            <input type="text" placeholder="Type a message" id="message" name="message">
                <button type="submit" name="submit" id="submit" value="send">
                  <img src="../telegram.png" alt="">
                </button>
          </div>
      </section>
      </form>
    </div>
   </body>
</html>
