<?php
   include('../session.php');
   $Iid = $_GET['GetId'];
   $query = "select id, user_id,first_name,last_name,birth_date, phone from instructor where id = '".$Iid."'  ";
   $result = mysqli_query($conn,$query);

   while($row = mysqli_fetch_assoc($result))
{
     $ID  = $row['id'];
     $fname = $row['first_name'];
     $lname = $row['last_name'];
     $bday = $row['birth_date'];
     $phone = $row['phone'];



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
                            <h1 > Edit Intructor Information </h1>
                            <h4 > Instructor: <?php echo $Iname = $fname." ".$lname ?> </h4>
                        </div>
                        <div class="form_container">
                            <form action="updateInstructor.php?Id=<?php echo $ID ?>" method="post">
                                <Label>First Name</Label>
                                <input type="text"  name="FirstName" value ="<?php echo $fname ?>" >
                                <br><br>
                                <Label>Last Name</Label>
                                <input type="text"  name="LastName" value ="<?php echo $lname ?>">
                                <br><br>
                                <Label>Birthday  </Label>

                                <input type="date"  name="bday" value = <?php echo $bday ?> >
                                <br><br>

                                <Label>Enter Phone</Label>
                                <input type="number" name="phone"  value=<?php echo $phone  ?> >
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
