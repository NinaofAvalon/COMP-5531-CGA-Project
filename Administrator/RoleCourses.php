<?php
   include('../session.php');
   $pid = $_GET['GetId'];
   $Role = $_GET['Role'];
   $fname = $_GET['fname'];
   $lname = $_GET['lname'];
   $fullname = $fname." ".$lname;
   if($Role == 'Instructor'){
       $query = "select course_name,instructor_id,course_section,course_term from course where instructor_id = $pid";
       $result = mysqli_query($conn,$query);
       $title =  'Teaching';
   
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
  <div class="menu" height="100%" width="150px">
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
                <font color="black">Courses and Courses Sections</font>
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
            <a href="adminUsername.php">
              <b>
                <font color="black">Change Username</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>
  </div>
  
  
    <!-- course_taught -->
    
 <div class="main_home">
    
     

    <b>Edit <?php echo $title ?> Information  <a href="addRoleCourse.php?Id=<?php echo $pid ?>&Role=<?php echo $Role ?>"><button class="administrator"  style="position: absolute; right: 0.5%; margin: 2px;" type="reset" value="Insert">Insert</button></a>
    </b>
    
    <br><br>

    <table border="1" width="100%">
            
        <tbody>
              <tr bgcolor="F6E5F5">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Term</th>
                  <th>Action</th>
              </tr>
              <?php
                  while($row = mysqli_fetch_assoc($result))
                  {  
                  $coursename = $row['course_name'];  
                  $term = $row['course_term']; 
                  
                  /*
                  $coursequery = "select course_name, course_term from course where id = $cid";
                  $courseresu = mysqli_query($conn,$coursequery);
                  
                  while($rowforcourse = mysqli_fetch_assoc($courseresu))
                  {
                   $coursename = $rowforcourse['course_name'];
                   $term = $rowforcourse['course_term'];
                   }
                   */
                  
                  
              ?>
              
              
              <tr>
                <td><?php echo $pid ?></td>
                <td><?php echo $fullname ?></td>
                <td><?php echo $coursename ?></td>
                <td><?php echo $term ?></td>
                <td colspan="1" align="center">
                <a href="deleteRoleCourse.php?del=<?php echo $pid ?>&Role=<?php echo $Role ?>&cname=<?php echo $coursename ?>"><button class="administrator" type="reset" value="Clear">Delete</button></a> 
                </td>
                 
              </tr>
              
        <?php
        }
        ?>
          </tbody>
        
        
    </table>

    <br>

    <hr>
  
    
    
</body>
</html>
