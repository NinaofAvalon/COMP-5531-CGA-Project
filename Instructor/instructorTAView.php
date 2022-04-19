<?php
include('../session.php');
//echo 'Record Added Successfully';
 
require_once("connection.php");
$query = "select TA_id,TA_firstName,TA_lastName,TA_email,TA_section, TA_group from project.TA";
$result = mysqli_query($con,$query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css" />
    <title>View Tutors</title>
</head>
<body>
  <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>View Tutors for the Course</b></font></td>
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
    <b >
      <font size="4">
        <i>
          COMP 5531/Winter 2022
          <br>
          Section NN
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
            <a href="instructorUsername.php">
              <b>
                <font color="black">Change Username</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>
  </div>


    <!-- Table -->
    <div class="main_home">

    <b>Tutors</b>
    <br>
    <br>

  <table border="1" width="100%">
    <tbody>
          <tr bgcolor="F6E5F5">
             <th>ID</th>
             <th>Course Section</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Group</th>
             <th>Edit</th>
             <th>Delete</th>
          </tr>
</thead>
                                <tbody>

                                <?php
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                             $id = $row['TA_id'];
                                             $section = $row['TA_section'];   
                                             $firstName = $row['TA_firstName'];
                                             $lastName = $row['TA_lastName'];   
                                             $email = $row['TA_email'];
                                             $group = $row['TA_group'];
                                        
                                ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $section ?></td>
                                        <td><?php echo $firstName ?></td>
                                        <td><?php echo $lastName ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $group ?></td>
                                        <td><a href="instructorTAEdit.php?GetId=<?php echo $id ?>"> Edit </a></td>
                                        <td><a href="instructorTADelete.php?del=<?php echo $id ?>"> Delete </a></td>
                                    </tr>
                                <?php
                                        }
                                ?>

                                        </tbody>
  </table>

    <div class="main_home">

</body>
</html>
