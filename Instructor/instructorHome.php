<?php
include('../session.php');
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <style><?php include '../style.css'; ?></style>
    <title>Home</title>
</head>
<body>

    <body>
        <!-- header -->
        <div class="header" height="20%" scrolling="no">
            <table border="0" width="100%">
                <tbody>
                    <tr width="100%">
                        <td width="5%" align="left"><h2>CGA</h2></td>
                        <td align="center"><font size="5"><b>Home</b></font></td>
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
        <div class="menu1" height="100%" width="150px">
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

        <!-- Home -->
    <div class="main_home">
    <b>Notices </b>

 <br><br>
     <table border="1" width="50%">

         <tbody>

               <tr bgcolor="d5e8da">
                   <th>Notice</th>
                   <th width="20%">Time </th>

               </tr>
     <?php
         $querynotice = "select content, posting_time from notices where valid = '1'";
         $resultnotice = mysqli_query($conn,$querynotice);

         while($rownotice = mysqli_fetch_assoc($resultnotice))
             {
                   $content  = $rownotice['content'];
                   $time = $rownotice['posting_time'];
                   if($time <= substr(date("c"),0,19))
                     {
                        $Ptime = str_replace('T',' ',$time);
     ?>
                   <tr>
                     <td><?php echo $content ?></td>
                     <td><?php echo $Ptime ?></td>
                   </tr>
                <?php }  ?>
     <?php }?>



           </tbody>


     </table>
    <!-- Headings -->
    <h2>Welcome to CrsMgr Group-work Assistant(CGA)</h2>

    <!-- Paragraph -->
    <p>
        This webpage allows you to set up and update students, TAs, groups, members of each group, and the group marked entities.
        The features offered as menus are explained below.

    </p>

    <p>
        <strong>Features</strong>
    </p>

    <ul>
        <li><strong>Tutor Information</strong></li>
        <ul>
            <li>List the contact information for the tutors for the course.</li>
        </ul>
        <ul>
            <li>Insert tutors for the course.</li>
        </ul>
        <ul>
            <li>Update tutors for the course.</li>
        </ul>
    </ul>

    <ul>
        <li><strong>Students</strong></li>
        <ul>
            <li>View detailed information of all students in the section.</li>
        </ul>
        <ul>
            <li>Insert set of students.</li>
        </ul>
    </ul>



    <ul>
        <li><strong>Course Groups</strong></li>
        <ul>
            <li>View detailed information of all section groups.</li>
        </ul>
        <ul>
            <li>Insert groups in the section.</li>
        </ul>
        <ul>
            <li>Make changes to teammates in groups over the term.</li>
        </ul>
    </ul>


    <ul>
        <li><strong>Discussion Board</strong></li>
    </ul>

    <p>
        Read the ideas discussed by students on a message board and add suggestions and comments.
    </p>

    <ul>
        <li><strong>Marked Entities</strong></li>
        <ul>
            <li>Download assignments and projects uploaded by student groups</li>
        </ul>
        <ul>
            <li>Insert marked entities for group assignments and projects</li>
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

</div>
</body>
</html>
