<?php
include('../session.php');
$course = $_SESSION['course'];
 ?>

<!DOCTYPE html>
<html>
<head>
    <style><?php include '../style.css'; ?></style>
    <title>Discussion Board</title>
</head>
<body>

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

  <!-- main section -->
  <div class="main_home">



            <div class="table-head">
                <div class="subjects">Subjects</div>

            </div>

            <div class="table-row">

                <div class="subjects">
                  <?php
                  $query = "SELECT * FROM discussion_board where course_id = '$course'";

                  $run = $conn->query($query);
                  $i=0;


                  while($row = $run->fetch_array()) {
                  if($i==0){
                  ?>

                  <form class="" action="instructorPostDetails.php" method="get">

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


  </body>

</html>
