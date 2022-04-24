<?php
    
   include('../session.php');
   require_once "../php/config.php";
   $query = "select student_id, user_id, first_name, last_name, birth_date, phone from student";
   $result = mysqli_query($conn,$query);
   $qthisterm = "select termname from term where is_term_now = 'YES' ";
   $resthisterm = mysqli_query($conn,$qthisterm);
   
   while($rowinprocess = mysqli_fetch_assoc($resthisterm))
   {
    $thisTname = $rowinprocess['termname'];
    }
    
    $Role = 'Student';
   
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students Sections</title>
    <style><?php include '../style.css'; ?></style>   
</head>
<body>
     <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Students and Courses</b></font></td>
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
        <i><?php echo $thisTname?></i>
      </font>
    </b>
    <hr>
    <b>
      <font size="4">
        <ul>
          <li>
            <a href="adminCourses.php">
              <b>
                <font color="black">Terms and Courses</font>
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
 
 
    <!-- administrators -->
    
 <div class="main_home">
     

    <b>Students Information <a href="editNewStudent.php"><button class="administrator"  style="position: absolute; right: 0.5%; margin: 2px;" type="reset" value="Insert">Insert</button></a>
    </b>
    
    <br><br>

    <table border="1" width="100%">
            
        <tbody>
              <tr bgcolor="F6E5F5">
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Birthday</th>
                  <th>Phone</th>
                  <th>Action</th>
              </tr>
              <?php
                  while($row = mysqli_fetch_assoc($result))
                  {
                  $ID  = $row['student_id'];
                  $fname = $row['first_name'];   
                  $lname = $row['last_name']; 
                  $bday = $row['birth_date'];  
                  $phone = $row['phone'];
             
                  
                  
              ?>
              
              
              <tr>
                <td><?php echo $ID ?></td>
                <td><?php echo $fname ?></td>
                <td><?php echo $lname ?></td>
                <td><?php echo $bday ?></td>
                <td><?php echo $phone ?></td>
              
             
                <td colspan="3" align="center"><a href="editStudent.php?GetId=<?php echo $ID ?>"> <button class="administrator" type="reset" value="Clear">Edit</button> </a> 
                <a href="deleteStudent.php?del=<?php echo $ID ?>"><button class="administrator" type="reset" value="Clear">Delete</button></a> 
                 <a href="RoleCourses2.php?GetId=<?php echo $ID ?>&Role=<?php echo $Role ?>&fname=<?php echo $fname ?>&lname=<?php echo $lname ?> "><button class="administrator" type="reset" value="Clear">Learn</button></a> 
                 
                 </td>
              </tr>
              
        <?php
        }
        ?>
          </tbody>
        
        
    </table>

    <br>

    <hr>
  

<div class="main_home">

    

    <!-- Links -->
    
    
    
</body>
</html>