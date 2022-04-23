<?php
   include('../session.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Assignment/Project Upload</title>
    <style><?php include '../style.css'; ?></style>

</head>
<body>
  <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Assignment/Project Download</b></font></td>
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
  <!-- menu -->
  <div class="menu" height="100%" width="150px">
    <hr>
    <b>
      <font size="4">
        <i>
          <?php echo substr($_SESSION["course_name"],0,-3); ?>/<?php echo htmlspecialchars($_SESSION["course_term"]); ?>
          <br>
          SECTION <?php echo htmlspecialchars($_SESSION["course_section"]); ?>
        </i>
      </font>
    </b>
    <hr>

    <b>
      <font size="4">
        <ul>
          <li>
            <a href="taDiscussionBoard.php">
              <b>
                <font color="black">Discussion Board</font>
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
            <a href="taProjects.php">
              <b>
                <font color="black">Download Files</font>
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
                              <a href="../Email/inbox.php">
                                   <b>
                                       <font color="black">Email</font>
                                   </b>
                               </a>
                           </li>
                       </ul>
                   </font>
               </b>
               <b>
                  <font size="4">
                    <ul>
                          <b>
                            <form>
           <input type="button" class="button-email" value="Back" onclick="history.back()">
           </form>
                          </b>
                    </ul>
                  </font>
                </b>
  </div>
  <div class="main_home">
    <table border="1" width="100%">
      <tbody>
        <tr>
        <th>File Name</th>
        <th>User Name</th>
        <th>Update Time</th>
        <tr>
        <?php
        $course_name = $_SESSION["course_name"];
        $query = "SELECT * FROM uploads u
        join course c on c.id = u.course_id
        where c.course_name = '$course_name'";
        $run = $conn->query($query);
        while($row=$run->fetch_array()){
        ?>
        <tr>
          <div class="">
            <td><a href="../Student/download.php?file=<?php echo $row['file']?>"><?php echo $row['file']?></a></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['file_date']?></td>
          </div>
        </tr>

        <?php
      }

         ?>
      </tbody>

    </table>


  </div>
</body>
</html>
