<?php   include('../session.php');    $query2 = "select termname,term_id,term_begin_date,term_end_date from term where is_term_now = 'YES' ";    $result2 = mysqli_query($conn,$query2);        while($rowinprocess = mysqli_fetch_assoc($result2))    {     $termname = $rowinprocess['termname'];     }?><!DOCTYPE html><html><head>    <title>Courses and Course Sections Information</title>    <style><?php include '../style.css'; ?></style>   </head><body>     <!-- header -->  <div class="header" height="20%" scrolling="no">    <table border="0" width="100%">      <tbody>        <tr width="100%">          <td width="5%" align="left"><h2>CGA</h2></td>          <td align="center"><font size="5"><b>Edit Course Information</b></font></td>        </tr>      </tbody>    </table>    <table border="0" width="100%">      <tbody>        <tr width="100%">          <td align="left"><font class="font-header" size="3">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?> ! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font></td>          <td align="right">            <i>              <b>                <a href="adminHome.php">                  <font class="home_link" color="black">Home</font>                </a>              </b>            </i>            <i>              <b>                <a href="../logout.php">                  <font color="black">Logout</font>                </a>              </b>            </i>            <br>          </td>        </tr>      </tbody>    </table>  </div>        <!-- menu -->  <div class="menu" height="100%" width="150px">    <hr>    <b >      <font size="4">        <i><?php echo $termname?></i>      </font>    </b>    <hr>    <b>      <font size="4">        <ul>          <li>            <a href="adminCourses.php">              <b>                <font color="black">Courses and Courses Sections</font>              </b>            </a>          </li>        </ul>      </font>    </b>    <b>      <font size="4">        <ul>          <li>            <a href="adminInstructor.php">              <b>                <font color="black">Instructor Information</font>              </b>            </a>          </li>        </ul>      </font>    </b>    <b>      <font size="4">        <ul>          <li>            <a href="adminStudents.php">              <b>                <font color="black">Students Information</font>              </b>            </a>          </li>        </ul>      </font>    </b>    <b>      <font size="4">        <ul>          <li>            <a href="adminGroups.php">              <b>                <font color="black">Course Groups</font>              </b>            </a>          </li>        </ul>      </font>    </b>    <b>      <font size="4">        <ul>          <li>            <a href="adminNotices.php">              <b>                <font color="black">Notices</font>              </b>            </a>          </li>        </ul>      </font>    </b>    <b>      <font size="4">        <ul>          <li>            <a href="adminPassword.php">              <b>                <font color="black">Change Password</font>              </b>            </a>          </li>        </ul>      </font>    </b>    <b>      <font size="4">        <ul>          <li>            <a href="adminEmail.php">              <b>                <font color="black">Change Email</font>              </b>            </a>          </li>        </ul>      </font>    </b>  </div>        <!-- Main section -->    <div class="main_home">       <div >                        <div class="title">                            <h1 > Add Course Information </h1>                        </div>                        <div class="form_container">                            <form action="insertCourse.php" method="post">                                <Label>Course Name</Label>                                <input type="text"  name="CourseName">                                 <br><br>                                                                <Label>Instructor</Label>                                                                    <select name="instructor">                                        <option value="<?php echo $instructor ?>" ><?php echo 'TBA' ?></option>                                        <p><font color=gray> If no instructor selected, it will be set as TBA. Can be modify later.'</font> </p>                                        <?php                                        $command = "select id, first_name, last_name from instructor";                                        $result3 = mysqli_query($conn,$command);                                        while($insresult = mysqli_fetch_array($result3)){                                         $fullname = $insresult['first_name']." ".$insresult['last_name'];                                         ?>                                          <option value="<?php echo $fullname ?>"><?php echo $fullname ?></option>                                         <?php                                        }                                        ?>                                   </select>                                   <br><br>                                   <Label>Course Section</Label>                                   <input type="text"  name="CourseSection">                                    <br><br>                                                                   <Label>Term</Label>                                      <select name="term">                                        <option value="" selected disabled hidden>Choose here</option>                                         <?php                                                                                  $command2 = "select termname from term";                                         $result4 = mysqli_query($conn,$command2);                                         while($termresult = mysqli_fetch_array($result4)){                                              $fulltermname = $termresult['termname'];                                          ?>                                           <option value="<?php echo $fulltermname ?>"><?php echo $fulltermname ?></option>                                          <?php                                         }                                         ?>	                                                       </select>                                                                                <br><br>                               <button name="insert">Insert</button>                               <p><font color=gray> Other values will be automatically created according to dates provided above.</font>                                                            </p>                            </form>                        </div>                    </div>                    </div>   </p>            </body></html>