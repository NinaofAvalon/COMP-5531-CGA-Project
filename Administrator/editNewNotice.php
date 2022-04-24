<?php
    date_default_timezone_set('America/New_York');
   include('../session.php');
   $user_check = $_SESSION['username'];
   
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
    <title>Edit New Notice</title>
    <style><?php include '../style.css'; ?></style>   
</head>
<body>
     <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Edit New Notice</b></font></td>
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
                            <h1 > Add Notice Information </h1>
                        </div>
                        <div class="form_container">
                            <form action="updateNotice.php" method="post">
                                
                                <Label>Admin Name</Label>
                                <input type="text"  name="admin" value ="<?php echo $user_check  ?>" readonly>
                                <br><br>
                                
                                <Label>Content</Label>
                                
                                <textarea value ="<?php echo $content ?>" cols="25" rows="5" name="content" >Please input here.</textarea>
                                <br><br>
                                
                                <Label>Posting Time</Label>
                                <input type="datetime-local"  name="ptime" value =<?php echo substr(date("c"),0,19) ?>  min=<?php echo substr(date("c"),0,19) ?> >
                                <p><font color=gray>Posting time should be later than time of now.</font>
                                <br><br>
                                
                               
                                
                                <input type="radio" value=1 name=valid checked="checked"/> 
                                <Label>Valid</Label>
                                
                                <input type="radio" value=0 name=valid /> 
                                <Label>Unvalid</Label>
                               
                                <br><br>
                    
                               <button name="insert">Insert</button>
                             </p>
                            </form>

                        </div>
                    </div>
                    </div>

   </p>
    
    
    
</body>
</html>
