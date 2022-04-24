<?php
   include('../session.php');
   $query = "select term_season,term_year from term where is_term_now = 'YES'";
   $result = mysqli_query($conn,$query);


   if(isset($_POST['submit'])){

     if($conn === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
        }

     //get user Message
     $newEmail = mysqli_real_escape_string(
        $conn, $_REQUEST['adminNewEmail']);

    $confirmNewEmail =  mysqli_real_escape_string(
       $conn, $_REQUEST['adminNewEmailConfirmation']);

        // Attempt insert query execution
        if($newEmail == $confirmNewEmail){
        $username = $_SESSION["username"];
        $sql = "UPDATE users SET email='$newEmail' WHERE username='$username'";
        if(mysqli_query($conn, $sql)){
          //prevent form to be resubmitted multiple times
          header("Location:adminEmail.php");
          die();
        } else{
            echo "ERROR: Message not sent!!!";
        }

        // Close connection
        mysqli_close($conn);
      } else{
        echo "emails don't match";
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Email</title>
    <style><?php include '../style.css'; ?></style>

</head>
<body>
  <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Change Email</b></font></td>
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
                <a href="adminHome.php">
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
  <div class="menu-welcome" height="100%" width="150px">
    <hr>
    <b >
      <font size="4">
        <?php
        while($row = mysqli_fetch_assoc($result))
        {
         $season = $row['term_season'];
         $year = $row['term_year'];
         $termname = $season." ".$year;
        ?>
         <i>
           <?php echo $termname?>

         </i>
         <?php
         }
         ?>
      </font>
    </b>
    <hr>
    <b>
      <font size="4">
        <ul>
          <li>
            <a href="adminCourses.php">
              <b>
                <font color="black">Terms and Courses</font>
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
            <a href="adminInstructor.php">
              <b>
                <font color="black">Instructor Information</font>
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
            <a href="adminStudents.php">
              <b>
                <font color="black">Students Information</font>
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
            <a href="adminNotices.php">
              <b>
                <font color="black">Notices</font>
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
        <a href="adminGroups.php">
          <b>
            <font color="black">Course Groups</font>
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
            <a href="adminPassword.php">
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
            <a href="adminEmail.php">
              <b>
                <font color="black">Change Email</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>
 </div>



    <!-- main page -->
    <div class="main_home">

    <form action="adminEmail.php" method="POST">
        <div>
            <input type="text" class="feedback-input" name="adminNewEmail" placeholder="New email">
        </div>
        <br>
        <div>
            <input type="text" class="feedback-input" name="adminNewEmailConfirmation" placeholder="Confirm New email">
        </div>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
  </div>



</body>
</html>
