<?phpdate_default_timezone_set('America/New_York');   include('../session.php');   require_once "../php/config.php";      $gid = $_GET['GetId'];   $lid = $_GET['lid'];   $cid = $_GET['cid'];   $cname = $_GET['cname'];   $gname = $_GET['gname'];   $query = "select student_id from stud_in_group where group_id = '$gid'";   $result = mysqli_query($conn,$query);           $query2 = "select termname,term_id,term_begin_date,term_end_date from term where is_term_now = 'YES' ";   $result2 = mysqli_query($conn,$query2);        while($rowinprocess = mysqli_fetch_assoc($result2))   {    $termname = $rowinprocess['termname'];    }     if($termname){$termname = $termname;}else{$termname = 'Not in Term!';}         ?><!DOCTYPE html><html><head>    <title>Groups Information</title>    <style><?php include '../style.css'; ?></style></head><body>    <!-- header -->    <div class="header" height="20%" scrolling="no">      <table border="0" width="100%">        <tbody>          <tr width="100%">            <td width="5%" align="left"><h2>CGA</h2></td>            <td align="center"><font size="5"><b>Groups Information</b></font></td>          </tr>        </tbody>      </table>      <table border="0" width="100%">        <tbody>          <tr width="100%">            <td align="left"><font size="3">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font></td>            <td align="right">              <i>                <b>                  <a href="adminHome.php">                    <font class="home_link" color="black">Home</font>                  </a>                </b>              </i>              <i>                <b>                  <a href="../logout.php">                    <font color="black">Logout</font>                  </a>                </b>              </i>              <br>            </td>          </tr>        </tbody>      </table>    </div>    <!-- menu -->    <div class="menu" height="100%" width="150px">      <hr>      <b >        <font size="4">          <i>            <?php echo $termname?>                      </i>        </font>      </b>      <hr>      <b>        <font size="4">          <ul>            <li>              <a href="adminCourses.php">                <b>                  <font color="black">Terms and Courses</font>                </b>              </a>            </li>          </ul>        </font>      </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminInstructor.php">                <b>                  <font color="black">Instructor Information</font>                </b>              </a>            </li>          </ul>        </font>      </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminStudents.php">                <b>                  <font color="black">Students Information</font>                </b>              </a>            </li>          </ul>        </font>      </b> <b>   <font size="4">     <ul>       <li>         <a href="adminGroups.php">           <b>             <font color="black">Course Groups</font>           </b>         </a>       </li>     </ul>   </font> </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminNotices.php">                <b>                  <font color="black">Notices</font>                </b>              </a>            </li>          </ul>        </font>      </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminPassword.php">                <b>                  <font color="black">Change Password</font>                </b>              </a>            </li>          </ul>        </font>      </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminEmail.php">                <b>                  <font color="black">Change Email</font>                </b>              </a>            </li>          </ul>        </font>      </b>       </div>        <!-- terms -->     <div class="main_home">         <h2>Group Members Information  </h2>                   <table border="1" width="50%">                  <h4> Course: <?php echo $cname ?>     &nbsp&nbsp   Group: <?php echo $gname ?> <a href="checkGroupMember.php?Id=<?php echo $gid?>&cid=<?php echo $cid?>&cname=<?php echo $cname?>&gname=<?php echo $gname?>&lid=<?php echo $lid?>"><button class="administrator"  style="position: absolute; right:43%; margin: 2px;" type="reset" value="Insert">Insert</button></a>         </h4>                            <tbody>                                  <tr bgcolor="F6E5F5">                                          <th>Member Name</th>                      <th>Member Identity</th>                      <th>Action</th>                  </tr>                  <?php                          while($row = mysqli_fetch_assoc($result)){                           $sid =  $row['student_id'];                           if($sid == $lid){                             $status = 'Group Leader';                                                      }else{                            $status = 'Group Member';                           }                                                        $querysn= "select first_name, last_name from student where student_id = '$sid' ";                             $resultsn = mysqli_query($conn,$querysn);                             while($rowsn = mysqli_fetch_assoc($resultsn))                             {                             $fname  = $rowsn['first_name'];                             $lname = $rowsn['last_name'];                                $fullname = $fname." ".$lname;                                                             ?>                                    <tr>                                        <td><?php echo $fullname ?></td>                    <td><?php echo $status ?></td>                                   <td colspan="3" align="center">                    <a href="deleteGroupMember.php?del=<?php echo $gid ?>&sid=<?php echo $sid ?>&lid=<?php echo $lid ?>"><button class="administrator" type="reset" value="Clear">Delete</button></a>                    </td>                  </tr>                              <?php                        }            }            ?>              </tbody>                                </table>                             <br>    <hr>         <br>      <div class="main_home">        <!-- Links -->            </body></html>