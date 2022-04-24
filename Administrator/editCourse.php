<?php
   include('../session.php');
   $cid = $_GET['GetId'];
   $instructor = $_GET['instructor'];
   $query = "select course_name,instructor_id,course_section,course_term from course where id = $cid";
   $result = mysqli_query($conn,$query);



   while($row = mysqli_fetch_assoc($result))
{
     $insid = $row['instructor_id'];
     $cname = $row['course_name'];
     $section = $row['course_section'];
     $cterm = $row['course_term'];



}

 $qthisterm = "select termname from term where is_term_now = 'YES' ";
 $resthisterm = mysqli_query($conn,$qthisterm);

 while($rowinprocess = mysqli_fetch_assoc($resthisterm))
 {
  $thisTname = $rowinprocess['termname'];
  }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Courses and Course Sections Information</title>
    <style><?php include '../style.css'; ?></style>
</head>
<body>
     <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Edit Term Information</b></font></td>
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
        <i> <?php echo $thisTname?></i>
      </font>
    </b>
    <hr>
    <b>
      <font size="4">
        <ul>
          <li>
            <a href="adminCourses.php">
              <b>
                <font color="black">Terms and Courses </font>
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

    <!-- Main section -->
    <div class="main_home">

       <div >
                        <div class="title">
                            <h1 > Edit Course Information </h1>
                            <h4 > Course: <?php echo $cname ?> </h4>
                        </div>
                        <div class="form_container">
                            <form action="updateCourse.php?Id=<?php echo $cid ?>" method="post">

                                <Label>Course ID</Label>
                                <input type="text"  name="courseid" value ="<?php echo $cid ?>" readonly>
                                <br><br>

                                <Label>Course Name</Label>
                                <input type="text"  name="coursename" value ="<?php echo $cname ?>">
                                <br><br>

                                <Label>Instructor</Label>

                                    <select name="instructor">
                                        <option value="<?php echo $instructor ?>" ><?php echo $instructor ?></option>
                                        <?php
                                        $command = "select first_name, last_name from instructor";
                                        $result3 = mysqli_query($conn,$command);
                                        while($insresult = mysqli_fetch_array($result3)){

                                         $fullname = $insresult['first_name']." ".$insresult['last_name'];
                                         ?>
                                         <option value="<?php echo $fullname ?>"><?php echo $fullname ?></option>
                                         <?php
                                        }
                                        ?>
                                   </select>
                                <br><br>

                                <Label>Section</Label>
                                <input type="text"  name="section" value ="<?php echo $section ?>">
                                <br><br>

                                <Label>Term</Label>

                                    <input type="text"  name="term" value ="<?php echo $cterm ?>" readonly>
                                    <br><br>
                                    <!-- decide to make  the existing course's term can not change
                                      <select name="term">
                                        <option value="<?php echo $cterm ?>" ><?php echo $cterm ?></option>
                                         <?php

                                         $command2 = "select termname from term";
                                         $result4 = mysqli_query($conn,$command2);
                                         while($termresult = mysqli_fetch_array($result4)){

                                          $fulltermname = $termresult['termname'];
                                          ?>
                                          <option value="<?php echo $fulltermname ?>"><?php echo $fulltermname ?></option>
                                          <?php
                                         }
                                         ?>
                                    </select>
                                    -->

                                <br><br>
                               <button name="update">Update</button>
                               <p><font color=gray> Other values will be automatically created according to dates provided above.</font>

                            </p>
                            </form>

                        </div>
                    </div>
                    </div>

   </p>



</body>
</html>
