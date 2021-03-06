<?php
include('../session.php');
require_once("connection.php");
$id = intval($_GET['GetId']);
$query = "select student.student_id, student.first_name,student.last_name, users.email, stud_in_group.group_id from student join users on users.id = student.user_id inner join stud_in_group on student.student_id = stud_in_group.student_id
where
group_id = '$id'";
$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
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
        <div class="menu_instructor" height="100%" width="150px">
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
        </div>

 <!-- Table -->
    <div class="main_home">

    <b>Group Members</b>
    <br>
    <br>

  <table border="1" width="100%">
    <tbody>
          <tr bgcolor="F6E5F5">
             <th>Student ID</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Delete</th>
          </tr>
</thead>

<tbody>

                        <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                        $student_id = $row['student_id'];
                        $firstName = $row['first_name'];
                        $lastName = $row['last_name'];
                        $email = $row['email'];
                        ?>

                        <tr>
                            <td><?php echo $student_id ?></td>
                            <td><?php echo $firstName ?></td>
                            <td><?php echo $lastName ?></td>
                            <td><?php echo $email ?></td>
                            <td><a href="instructorGroupStudentDelete.php?del=<?php echo $student_id ?>"> Delete </a></td>
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
                    <form action="addGroupMember.php?id=<?php echo $id ?>" method="post">
                        <!--<input type="submit" name="submit" value="Submit">-->
                        <button name="submit">Add new Member</button>
                    </form>

                </div>
</body>
</html>