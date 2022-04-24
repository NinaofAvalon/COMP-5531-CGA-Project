<?php
include('../session.php');
    $_SESSION["username"];

   if(isset($_POST['submit'])){

     if($conn === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
        }

     //get user Message
     $newEmail = mysqli_real_escape_string(
        $conn, $_REQUEST['instructorNewEmail']);

    $confirmNewEmail =  mysqli_real_escape_string(
       $conn, $_REQUEST['instructorNewEmailConfirmation']);

        // Attempt insert query execution
        if($newEmail == $confirmNewEmail){
        $username = $_SESSION["username"];
        $sql = "UPDATE users SET email='$newEmail' WHERE username='$username'";
        if(mysqli_query($conn, $sql)){
          //prevent form to be resubmitted multiple times

          header("Location:instructorEmail.php");
          die();
        } else{
            echo "ERROR: Message not sent!!!";
        }

        // Close connection
        mysqli_close($conn);
      } else{
                  header("Location:instructorEmailIncorrect.php");
      }
   }

?>

<!DOCTYPE html>
<html>
<head>
    <style><?php include '../style.css'; ?></style>
    <title>Change Password</title>
</head>
<body>

    <body>
        <!-- header -->
        <div class="header" height="20%" scrolling="no">
            <table border="0" width="100%">
                <tbody>
                    <tr width="100%">
                        <td width="5%" align="left"><h2>CGA</h2></td>
                        <td align="center"><font size="5"><b>Change Password</b></font></td>
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
        <div class="menu-welcome" height="100%" width="150px">
            <hr>
            <b>
                <font size="4">
                    <i>
                        <?php echo htmlspecialchars($_SESSION["course_name"]); ?><br>
                        Section <?php echo htmlspecialchars($_SESSION["course_section"]); ?>
                    </i>
                </font>
            </b>
            <hr>
            <b>
                <font size="4">
                    <ul>
                        <li>
                            <a href="instructorTutorInfo.php">
                                <b>
                                    <font color="black">Tutor Information</font>
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
                            <a href="instructorStudents.php">
                                <b>
                                    <font color="black">Students</font>
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
                            <a href="instructorGroups.php">
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
                            <a href="instructorDiscussion.php">
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
                            <a href="instructorMarkedEntities.php">
                                <b>
                                    <font color="black">Marked Entities</font>
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
                            <a href="../Email/email_welcome.php">
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
                            <a href="instructorPassword.php">
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
                            <a href="instructorEmail.php">
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
               <b>
                 <form>
<input type="button" class="button-email" value="Back" onclick="history.back()">
</form>
               </b>
         </ul>
       </font>
     </b>
        </div>

    <!-- main page -->
 <div class="main_home">


    <b>Please enter the same email</b>
    <br>
    <form action="instructorEmail.php" method="POST">

 <table border="1" width="100%">
    <tbody>
          <tr bgcolor="F6E5F5">
            <th>Enter New Email</th>
            <td><input type="text" name="instructorNewEmail"></td>

            </tr>
            <tr bgcolor="F6E5F5">
            <th>Confirm New Email</th>
             <td><input type="text" name="instructorNewEmailConfirmation"></td>

        </tr>

            </tbody>
  </table>

<br>
   <button name="submit">Submit</button>
    </form>

</body>
</html>
