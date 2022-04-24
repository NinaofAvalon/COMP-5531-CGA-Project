<?php
   include('../session.php');
   require_once "../php/config.php";
   $query = "select term_id, term_season,term_year,term_begin_date,term_end_date,is_term_now from term";
   $result = mysqli_query($conn,$query);
   
   $query2 = "select termname,term_id,term_begin_date,term_end_date from term where is_term_now = 'YES' ";
   $result2 = mysqli_query($conn,$query2);
   
   $query3 = "select id, course_name,instructor_id,course_section,course_term from course";
   $result3 = mysqli_query($conn,$query3);
   
   while($rowinprocess = mysqli_fetch_assoc($result2))
   {
    $termname = $rowinprocess['termname'];
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
          <td align="center"><font size="5"><b>Terms and Courses </b></font></td>
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
 
 
    <!-- terms -->
    
 <div class="main_home">
     

    <b>Term Information <a href="editNewTerm.php"><button class="administrator"  style="position: absolute; right: 0.5%; margin: 2px;" type="reset" value="Insert">Insert</button></a>
    </b>
    
    <br><br>

    <table border="1" width="100%">
            
        <tbody>
                
              <tr bgcolor="F6E5F5">
                  <th>Term Season</th>
                  <th>Term Year</th>
                  <th>Begin Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
              <?php
                  while($row = mysqli_fetch_assoc($result))
                  {
                  $termid  = $row['term_id'];
                  $termseason = $row['term_season'];   
                  $termyear = $row['term_year'];   
                  $begindate = $row['term_begin_date'];
                  $enddate = $row['term_end_date'];
                  $status =  $row['is_term_now'];
                 
                  
              ?>
              
              <?php
              while($row2 = mysqli_fetch_assoc($result2))
              {
               $thisid = $row2['term_id']; 
               $thisbegin = $row2['term_begin_date'];
               $thisend = $row2['term_end_date'];
               
              ?>
               <?php
               }
               ?>
               
               
               
                <?php
                    $today = date("Y-m-d");
                    
                    if($status == 'YES')
                    {
                        $textstatus = "<p> <font color=green>In Process</font> </p>";
                    }else if($enddate <$today){
                        $textstatus = "Passed";
                    }else{
                        $textstatus = "Up Coming";
                    }
                ?>
              
              <tr>
                <td><?php echo $termseason ?></td>
                <td><?php echo $termyear ?></td>
                <td><?php echo $begindate ?></td>
                <td><?php echo $enddate ?></td>
                <td><?php echo $textstatus ?></td>
                <td colspan="2" align="center"><a href="editTerm.php?GetId=<?php echo $termid ?>"> <button class="administrator" type="reset" value="Clear">Edit</button> </a> 
                <a href="deleteTerm.php?del=<?php echo $termid ?>"><button class="administrator" type="reset" value="Clear">Delete</button></a>
                </td>
              </tr>
              
        <?php
        }
        ?>
          </tbody>
        
        
    </table>

    <br>

    <hr>
    
     <br>

    <b>Course Information <a href="editNewCourse.php"><button class="administrator"  style="position: absolute; right: 0.5%; margin: 2px;" type="reset" value="Insert">Insert</button></a>
    </b>
    <br>
<br>
  <table border="1" width="100%">
    <tbody>
          <tr bgcolor="F6E5F5">
              <th>Course ID</th>
              <th>Course Name</th>
              <th>Instructor</th>
              <th>Course Section</th>
              <th>Course Term</th>
              <th>Action</th>
          </tr>
          <tr> 
          <?php
               while($row = mysqli_fetch_assoc($result3))
               {
                   $cid = $row['id'];
                   $cname  = $row['course_name'];
                   $insid = $row['instructor_id']; 
               
                 
                   $section = $row['course_section'];   
                   $cterm = $row['course_term'];
                   if($insid){
               
                   $query4 = "select first_name, last_name from instructor where id = '".$insid."' ";
                   $result4= mysqli_query($conn,$query4);
                   while($row4 = mysqli_fetch_assoc($result4)){
                       
                       $insname = $row4['first_name']." ".$row4['last_name'];
                   }
                   
                   }else{ $insname =  "TBA";
                   
                   }
           ?>
           <tr>
             <td><?php echo $cid ?></td>
             <td><?php echo $cname ?></td>
             <td><?php echo $insname?></td>
             <td><?php echo $section ?></td>
             <td><?php echo $cterm ?></td>
             
             <td colspan="2" align="center"><a href="courseTA.php?Id=<?php echo $cid ?>&cname=<?php echo $cname?>"><button class="administrator" type="reset" value="Clear">TA</button></a>
             <a href="editCourse.php?GetId=<?php echo $cid ?>&instructor=<?php echo $insname ?>"> <button class="administrator" type="reset" value="Clear">Edit</button> </a> 
             <a href="deleteCourse.php?del=<?php echo $cid ?>"><button class="administrator" type="reset" value="Clear">Delete</button></a>
             
             </td>
           </tr>
           
     <?php
     }
     ?>
          </tr>
      </tbody>
  </table>
  

<div class="main_home">

    

    <!-- Links -->
    
    
    
</body>
</html>
