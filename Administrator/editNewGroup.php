<?php   include('../session.php');   $cid = $_GET['cid'];   $cname = $_GET['cname'];      $query = "select max(group_id) as mid from class_group";   $result = mysqli_query($conn,$query);   while($row = mysqli_fetch_assoc($result))       {         $nextid = $row['mid']+1;         }            $qthisterm = "select termname from term where is_term_now = 'YES' ";   $resthisterm = mysqli_query($conn,$qthisterm);      while($rowinprocess = mysqli_fetch_assoc($resthisterm))   {    $thisTname = $rowinprocess['termname'];    }?><!DOCTYPE html><html><head>    <title>Groups Information</title>    <style><?php include '../style.css'; ?></style></head><body>    <!-- header -->    <div class="header" height="20%" scrolling="no">      <table border="0" width="100%">        <tbody>          <tr width="100%">            <td width="5%" align="left"><h2>CGA</h2></td>            <td align="center"><font size="5"><b>Add a group</b></font></td>          </tr>        </tbody>      </table>      <table border="0" width="100%">        <tbody>          <tr width="100%">            <td align="left"><font size="3">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font></td>            <td align="right">              <i>                <b>                  <a href="adminHome.php">                    <font class="home_link" color="black">Home</font>                  </a>                </b>              </i>              <i>                <b>                  <a href="../logout.php">                    <font color="black">Logout</font>                  </a>                </b>              </i>              <br>            </td>          </tr>        </tbody>      </table>    </div>    <!-- menu -->    <div class="menu-welcome" height="100%" width="150px">      <hr>      <b >        <font size="4">          <i>            <?php echo $thisTname?>                      </i>        </font>      </b>      <hr>      <b>        <font size="4">          <ul>            <li>              <a href="adminCourses.php">                <b>                  <font color="black">Terms and Courses </font>                </b>              </a>            </li>          </ul>        </font>      </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminInstructor.php">                <b>                  <font color="black">Instructor Information</font>                </b>              </a>            </li>          </ul>        </font>      </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminStudents.php">                <b>                  <font color="black">Students Information</font>                </b>              </a>            </li>          </ul>        </font>      </b> <b>   <font size="4">     <ul>       <li>         <a href="adminGroups.php">           <b>             <font color="black">Course Groups</font>           </b>         </a>       </li>     </ul>   </font> </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminNotices.php">                <b>                  <font color="black">Notices</font>                </b>              </a>            </li>          </ul>        </font>      </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminPassword.php">                <b>                  <font color="black">Change Password</font>                </b>              </a>            </li>          </ul>        </font>      </b>      <b>        <font size="4">          <ul>            <li>              <a href="adminEmail.php">                <b>                  <font color="black">Change Email</font>                </b>              </a>            </li>          </ul>        </font>      </b>     </div>         <!-- Main section -->    <div class="main_home">       <div >                        <div class="title">                            <h1 > Add A Group Member </h1>                        </div>                        <div class="form_container">                            <form action="insertGroup.php?cid=<?php echo $cid?>" method="post">                                <Label>ID</Label>                                <input type="text"  name="id" value =" <?php echo $nextid ?> " readonly>                                 <br><br>                                <Label>Group Name</Label>                                <input type="text"  name="GroupName"  >                                 <br><br>                                <Label>Group Leader</Label>                                                                    <select name="groupleader">                                                        <?php                                                                                $qsid = "select course_id, student_id FROM course_enrolled where (course_enrolled.course_id, course_enrolled.student_id) not in (select course_id,student_id from  class_group inner join stud_in_group on class_group.group_id = stud_in_group.group_id)";                                        $resultsid = mysqli_query($conn,$qsid);                                        while($rowsid = mysqli_fetch_array($resultsid)){                                                                              $sid = $rowsid['student_id'];                                        $hcid = $rowsid['course_id'];                                        if($hcid==$cid){                                        $qsname = "select first_name,last_name from student where student_id = '".$sid."'";                                        $resultsname= mysqli_query($conn,$qsname);                                        while($rowsname = mysqli_fetch_array($resultsname)){                                            $sfullname = $rowsname['first_name']." ".$rowsname['last_name'];                                        }                                                                                  ?>                                          <option value="<?php echo $sid ?>"><?php echo $sfullname ?></option>                                         <?php                                         }                                        }                                        ?>                                   </select>                                <br><br>                                                                                                  <button name="insert">Insert</button>                                 <p><font color=gray> If there is no one can choose, it means all students that have enrolled in this course are already in a group.</font>                                                            </p>                            </form>                        </div>                    </div>                    </div>   </p>            </body></html>
