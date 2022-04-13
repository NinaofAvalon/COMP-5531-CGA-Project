<?php
   include('../session.php');
   $username = $_SESSION['username'];
   $group_id = $_SESSION['group_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Course Group</title>
  <style><?php include '../style.css'; ?></style>

</head>

<body>
  <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Course Group</b></font></td>
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
  </div>

  <!-- Table -->
  <div class="main_home">

    <br>
    <br>

    <?php
    //all group members
    $query ="SELECT student.student_id,student.first_name, student.last_name, student.group_id, class_group.group_name, class_group.leader_id, users.email
            from ((student
            inner join class_group on student.group_id = class_group.group_id
            inner join users on student.user_id = users.id))
            having group_id = (select group_id from student where user_id = ( select id from users where username='$username'))";

    //leader information
    $query1 ="SELECT student.student_id,student.first_name, student.last_name, student.group_id, class_group.group_name, class_group.leader_id, users.email
              from ((student
              inner join class_group on student.student_id = class_group.leader_id
              inner join users on student.user_id = users.id))
              having group_id = (select group_id from student where user_id = ( select id from users where username='$username'))";
    $run1 = $conn -> query($query1);
    $row1= $run1 ->fetch_array();

    //group count Members
    $query2 = "SELECT COUNT(group_id)
                FROM student
                WHERE group_id='$group_id'";


    $run2 = $conn -> query($query2);
    $row2= $run2 ->fetch_array();

     ?>
  <table border="1" width="100%">
    <tbody>
          <tr bgcolor="F6E5F5">
              <th>Group Name</th>
              <th>Leader ID</th>
              <th>Leader Name</th>
              <th>Leader Email</th>
              <th>Number of Members/Capacity</th>
          </tr>
          <tr>
            <td><?php echo $row1['group_name'];?></td>
            <td><?php echo $row1['leader_id'];?></td>
            <td><?php echo $row1['first_name'];?>  <?php echo $row1['last_name']?></td>
            <td><?php echo $row1['email'];?></td>
            <td><?php echo $row2['COUNT(group_id)'];?>/4</td>
          </tr>
      </tbody>
  </table>

  <br>
  <hr>

  <b>Current Group Members</b>
  <br>
  <br>



<table border="1" width="100%">


  <tbody>


        <tr bgcolor="F6E5F5">
            <th>Student_ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>

        <tr>
          <?php
          $run = $conn -> query($query);
          $i=0;
          while($row = $run ->fetch_array()){

          if($i==0){


           ?>

          <td><?php echo $row['student_id'];?></td>
          <td><?php echo $row['first_name'];?></td>
          <td><?php echo $row['last_name'];?></td>
          <td><?php echo $row['email'];?></td>
        </tr>

        <?php
        }
        }
         ?>
    </tbody>
</table>



  <div class="main_home">

</body>
</html>
