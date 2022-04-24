<?php
date_default_timezone_set('America/New_York');
   include('../session.php');
   require_once "../php/config.php";
   $queryc = "select distinct course_id from class_group";
   $resultc = mysqli_query($conn,$queryc);
   
  
   
   $query2 = "select termname,term_id,term_begin_date,term_end_date from term where is_term_now = 'YES' ";
   $result2 = mysqli_query($conn,$query2);
   
  
   while($rowinprocess = mysqli_fetch_assoc($result2))
   {
    $termname = $rowinprocess['termname'];
    }
     if($termname){$termname = $termname;}else{$termname = 'Not in Term!';} 
    
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Groups Information</title>
    <style><?php include '../style.css'; ?></style>

</head>
<body>

    <!-- header -->
    <div class="header" height="20%" scrolling="no">
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td width="5%" align="left"><h2>CGA</h2></td>
            <td align="center"><font size="5"><b>Groups Information</b></font></td>
          </tr>
        </tbody>
      </table>
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td align="left"><font size="3">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font></td>
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
          <i>
            <?php echo $termname?>
            
          </i>
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
     

    <h2>Group Information  </h2>
   
    
  <?php  
    while($row = mysqli_fetch_assoc($resultc)){
        $cid = $row['course_id'];
        $querycn= "select id, course_name, instructor_id,course_term from course where id = ' $cid' ";
        $resultcn = mysqli_query($conn,$querycn);
        while($rowcn = mysqli_fetch_assoc($resultcn)){
        $cname = $rowcn['course_name'];
        $cterm = $rowcn['course_term'];
        
    ?>
        
        <table border="1" width="50%">
        
          <h4> Course: <?php echo $cname ?>     &nbsp&nbsp   Term: <?php echo $cterm ?> <a href="editNewGroup.php?cid=<?php echo $cid?>&cname=<?php echo $cname?>"><button class="administrator"  style="position: absolute; right:43%; margin: 2px;" type="reset" value="Insert">Insert</button></a>
         </h4> 
               
            <tbody>
                
                  <tr bgcolor="F6E5F5">
                    
                      <th>Group Name</th>
                      <th>Group Leader</th>
                      <th>Action</th>
                  </tr>
                  <?php
                      $query = "select group_id, group_name, leader_id,course_id from class_group where course_id = ' $cid' ";
                      $resultonc = mysqli_query($conn,$query);
                      while($rowonc = mysqli_fetch_assoc($resultonc)){
                           $cid =  $rowonc['course_id'];
                           $gid =  $rowonc['group_id'];
                           $gname = $rowonc['group_name'];
                           $lid = $rowonc['leader_id'];
                      $queryln= "select first_name, last_name from student where student_id = '$lid' ";
                      $resultln = mysqli_query($conn,$queryln);
                      while($rowln = mysqli_fetch_assoc($resultln))
                      {
                      $fname  = $rowln['first_name'];
                      $lname = $rowln['last_name'];   
                      $fullname = $fname." ".$lname;
                     
                      
                  ?>
                  
                  <tr>
                    
                    <td><?php echo $gname ?></td>
                    <td><?php echo $fullname ?></td>
               
                    <td colspan="3" align="center"><a href="groupDetail.php?GetId=<?php echo $gid ?>&gname=<?php echo $gname ?>&cname=<?php echo $cname ?>&lid=<?php echo $lid ?>&cid=<?php echo $cid?>"><button class="administrator" type="reset" value="Clear">Detail</button></a>
                    <a href="editGroup.php?GetId=<?php echo $gid ?>&lname=<?php echo $fullname ?>&cname=<?php echo $cname ?>&cterm=<?php echo $cterm ?>"> <button class="administrator" type="reset" value="Clear">Edit</button> </a> 
                    <a href="deleteGroup.php?del=<?php echo $gid ?>"><button class="administrator" type="reset" value="Clear">Delete</button></a>
                    
                    </td>
                  </tr>
                  
            <?php
            }
            }
            ?>
              </tbody>
            
            
        </table>
        
        
        
       <?php 
        }
        
        
    
    
    
    }
    ?>

    

   
   
   
    <br>

    <hr>
    
     <br>

    
  

<div class="main_home">

    

    <!-- Links -->
    
    
    
</body>
</html>
