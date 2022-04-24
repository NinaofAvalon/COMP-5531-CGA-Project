<?php
include('../session.php');
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
    <title>Add New Tutor</title>
</head>
<body>

    <body>
        <!-- header -->
        <div class="header" height="20%" scrolling="no">
            <table border="0" width="100%">
                <tbody>
                    <tr width="100%">
                        <td width="5%" align="left"><h2>CGA</h2></td>
                        <td align="center"><font size="5"><b>Add New Tutor</b></font></td>
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

  <!-- Main -->
    <div class="main_home">

    <b>Add new Tutor</b>
    <br>
    <br>

  <table border="1" width="100%">
    <tbody>
          <tr bgcolor="F6E5F5">
             <th>User ID</th>
             <th>Tutor ID</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Phone</th>
             <th>Birth Date</th>
          </tr>
</thead>

<tbody>

            <form action="instructorTAInsert.php" method="post">
              <tr>
                <td><input type="number" placeholder=" User ID " name="user_id"></td>
                <td><input type="number" placeholder=" Tutor ID " name="ta_id"></td>
                <td><input type="text" placeholder=" First Name " name="fName"></td>
                <td><input type="text" placeholder=" Last Name " name="lName"></td>
                <td><input type="number" placeholder=" Phone " name="phone"></td>
                <td><input type="text" placeholder=" Birth date " name="birth_date"></td>
              </tr>

        </tbody>
        </table>

                    <br>
                    <!--<input type="submit" name="submit" value="Submit">-->
                    <button name="submit">Submit</button>
                  </form>


</body>
</html>
