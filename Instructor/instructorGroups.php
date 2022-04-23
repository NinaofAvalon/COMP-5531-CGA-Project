<?php
include('../session.php');

    $course = $_SESSION['course'];


    $query = "select group_id,group_name,leader_id, course_id, first_name, last_name from class_group inner join student
on leader_id = student_id where course_id ='".$course."'";
    $result = mysqli_query($conn,$query);

 ?>

<!DOCTYPE html>
<html>
<head>
    <style><?php include '../style.css'; ?></style>
    <title>Group Information</title>
</head>
<body>

    <body>
        <!-- header -->
        <div class="header" height="20%" scrolling="no">
            <table border="0" width="100%">
                <tbody>
                    <tr width="100%">
                        <td width="5%" align="left"><h2>CGA</h2></td>
                        <td align="center"><font size="5"><b>Group Information</b></font></td>
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



<!-- Table -->
        <div class="main_home">

            <b>Groups</b>
            <br>
            <br>

            <table border="1" width="100%">
                <tbody>
                    <tr bgcolor="F6E5F5">
                        <th>Group Name</th>
                        <th>Leader</th>
                        <th>Members</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                <tbody>

                    <?php
                    $space = " ";
                    while($row = mysqli_fetch_assoc($result))
                    {
                    $id = $row['group_id'];
                    $groupName = $row['group_name'];
                    $leaderID = $row['leader_id'];
                    $leaderfn = $row['first_name'];
                    $leaderln = $row['last_name'];
                ?>

                    <tr>
                        <td><?php echo $groupName ?></td>
                        <td><?php echo $leaderfn?><?php echo $space?> <?php echo $leaderln?></td>
                        <td><a href="instructorGroupMembersInfo.php?GetId=<?php echo $id ?>"> List </a></td>
                        <td><a href="instructorGroupLeaderEdit.php?GetId=<?php echo $id ?>"> Edit </a></td>
                        <td><a href="instructorGroupLeaderDelete.php?del=<?php echo $id ?>"> Delete </a></td>
                    </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>

<br>
            <br>
            <div>
                <div class="form-body">
                    <form action="addGroup.php" method="post">
                        <!--<input type="submit" name="submit" value="Submit">-->
                        <button name="submit">Add new Group</button>
                    </form>

                </div>
    </body>
</html>
