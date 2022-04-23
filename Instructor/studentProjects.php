<?php
   include('session.php');

   $course = $_SESSION['course'];
   $username = $_SESSION['username'];

   if(isset($_POST['submit'])){
      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $path = "../files/".$fileName;


     //sql query

     $username = $_SESSION['username'];
     $sql = "INSERT INTO uploads(username,file,course_id, file_date) values ('$username','$fileName','$course', now())";

       if(mysqli_query($conn, $sql)){
         move_uploaded_file($fileTmpName, $path);
         header("Location:studentProjects.php");
         die();
       } else{
         echo "error".mysqli_error($conn);
       }
   }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Assignment/Project Upload</title>
    <style><?php include 'style.css'; ?></style>

</head>
<body>
  <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left"><h2>CGA</h2></td>
          <td align="center"><font size="5"><b>Assignment/Project Upload</b></font></td>
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
  <div class="menu" height="100%" width="150px">
    <hr>
    <b >
      <font size="4">
        <i>
          <?php echo htmlspecialchars($_SESSION["course_name"]); ?>/Winter 2022
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
            <a href="studentContact.php">
              <b>
                <font color="black">Contact Information</font>
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
            <a href="studentGroup.php">
              <b>
                <font color="black">Course Group</font>
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
            <a href="studentGroupChat.php">
              <b>
                <font color="black">Group Chat</font>
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
            <a href="studentGroupDiscussion.php">
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
            <a href="studentAgenda.php">
              <b>
                <font color="black">Agenda</font>
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
            <a href="studentProjects.php">
              <b>
                <font color="black">Upload Files</font>
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
            <a href="studentFeed.php">
              <b>
                <font color="black">Feed</font>
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
            <a href="studentPassword.php">
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
            <a href="studentEmail.php">
              <b>
                <font color="black">Change Email</font>
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
            <a href="studentProfilePicture.php">
              <b>
                <font color="black">Change Profile Picture</font>
              </b>
            </a>
          </li>
        </ul>
      </font>
    </b>
  </div>
  <div class="main_home">
    <table border="1" width="100%">
      <tbody>
        <tr bgcolor="F6E5F5">
          <form class="" action="studentProjects.php" method="post" enctype="multipart/form-data">
            <th><input type="file" name="file">
          <button type="submit" name="submit">UPLOAD</button></th>
          </form>
        </tr>


        <?php
        $query = "SELECT * FROM uploads where username='$username' and course_id='$course_id'";
        $run = $conn->query($query);
        while($row=$run->fetch_array()){
        ?>
        <tr>
          <div class="">
            <td><a href="download.php?file=<?php echo $row['file']?>"><?php echo $row['file']?></a></td>
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
