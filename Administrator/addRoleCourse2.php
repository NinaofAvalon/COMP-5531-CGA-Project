<?php
include('../session.php');
require_once "../php/config.php";

    $pid = $_GET['Id'];
    $Role = $_GET['Role'];
    $Name = $_GET['fullname'];
    
    
?>
<?php
    $query2 = "select termname,term_id,term_begin_date,term_end_date from term where is_term_now = 'YES' ";
    $result2 = mysqli_query($conn,$query2);
    
    while($rowinprocess = mysqli_fetch_assoc($result2))
    {
     $termname = $rowinprocess['termname'];
     }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Section</title>
    <style><?php include '../style.css'; ?></style>   
</head>
<body>
     <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Edit Student Information</b></font></td>
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
        <i><?php echo $termname?></i>
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
    
    <!-- Main section -->
    <div class="main_home">

       <div >
                        <div class="title">
                            <h1 > Add Course Information </h1>
                        </div>
                        <div class="form_container">
                        
                        
                        <?php
                            if($Role == 'Student'){
                              ?>   
                                <form action="insertRoleCourse.php?Role=<?php echo $Role ?>" method="post">
                                    <Label>Student ID</Label>
                                    <input type="text"  name="StudentID" value="<?php echo $pid ?>" readonly> 
                                    <br><br>
                                    
                                    <Label>Student Name</Label>
                                    <input type="text"  name="StudentName" value="<?php echo $Name ?>" readonly> 
                                    <br><br>
                                    
                                    <Label>Course Name</Label>
                                        <select name="courseName">"
                                   <?php
                                   $query1 = "select id,course_name,course_term from course where id  not in (select course_id from course_enrolled where student_id = '$pid')";
                                   $result1 = mysqli_query($conn,$query1);
                                   
                                   while($row1 = mysqli_fetch_assoc($result1))
                                   {
                                       $cid = $row1['id'];
                                       $cname = $row1['course_name'];
                                     
                                ?>  
                                    
                                            <option value="<?php echo $cid.".".$cname  ?>" ><?php echo $cid.".".$cname  ?></option>
                                       
                                    
                                    
                                    
                                    <?php    
                                    }
                                      
                                      
                                         
                                         
                                    ?> 
                                    </select>
                                    <br><br>
                                    
                                    
                                    
                                    <Label>Grade</Label>
                                    <input type="number" placeholder=" Grade can be NULL " name="grade"  > 
                                    <br><br>

                                   <button name="insert">Insert</button>
                                   <p><font color=gray>When there is no course provided, all courses have already be assigned to other instructors. You can not assign that course to the instructor.</font> 
                                   
                                </p>
                                </form>
                        <?php
                                
                            } 
                              ?>  
                               
                        
                       
                        </div>
                    </div>
                </div>


   </p>
    
    
    
</body>
</html>