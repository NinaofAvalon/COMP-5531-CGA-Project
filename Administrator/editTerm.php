<?php
   include('../session.php');
   $id = $_GET['GetId'];
   $query = "select term_id, term_season,term_year,term_begin_date,term_end_date,is_term_now from term where term_id = '".$id."'  ";
   $result = mysqli_query($conn,$query);

   while($row = mysqli_fetch_assoc($result))
{
     $termid  = $row['term_id'];
     $termseason = $row['term_season'];
     $termyear = $row['term_year'];
     $begindate = $row['term_begin_date'];
     $enddate = $row['term_end_date'];
     $status =  $row['is_term_now'];

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

    <!-- Main section -->
    <div class="main_home">

       <div >
                        <div class="title">
                            <h1 > Edit Term Information </h1>
                            <h4 > Term: <?php echo $termname = $termseason." ".$termyear ?> </h4>
                        </div>
                        <div class="form_container">
                            <form action="updateTerm.php?Id=<?php echo $id ?>" method="post">
                                <Label>Start Date</Label>
                                <input type="date"  name="BeginDate" value = <?php echo $begindate ?>  >
                                <br><br>
                                <Label>End Date</Label>
                                <input type="date"  name="EndDate" value = <?php echo $enddate ?> >
                                <br><br>
                                <Label>Season</Label>

                                    <select name="Season">
                                        <option value="Winter">Winter Term</option>
                	                        <option value="Fall">Fall Term</option>
                	                        <option value="Summer">Summer Term</option>
                                    </select>
                                <br><br>
                                <Label>Status</Label>

                                    <select name="Status">
                                        <option value="Passed">Passed</option>
                	                        <option value="InProcess">In Process</option>
                	                        <option value="UpComing">Up Coming</option>
                                    </select>

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
