<?php
include('../session.php');


?>
<!DOCTYPE html>
<html>

<head>
  <title>Group Discussion</title>
  <style>
    <?php include '../style.css'; ?>
  </style>

</head>

<body>
  <!-- header -->
  <div class="header" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left">
            <h2>CGA</h2>
          </td>
          <td align="center">
            <font size="5"><b>Discussion Board</b></font>
          </td>
        </tr>
      </tbody>
    </table>
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td align="left">
            <font class="font-header" size="3">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?> ! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font>
          </td>
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
    <b>
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
  </div>
  <!-- main section -->


  <div class="main_home">



    <div class="table-head">
      <div class="subjects">Subjects</div>

    </div>


    <div class="table-row">

      <div class="subjects">
        <?php
        $course_id = $_SESSION["course_id"];
        $query = "SELECT * FROM discussion_board where course_id = '$course_id'";

        $run = $conn->query($query);
        $i = 0;


        while ($row = $run->fetch_array()) {
          if ($i == 0) {


        ?>

            <form class="" action="taPostDetails.php" method="get">

              <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
              <div class="author-div">
                <span>Author: <?php echo $row['creator']; ?></span>
              </div>

              <input type="submit" id="title" value="<?php echo $row['title']; ?>">
              <br>


            </form>
        <?php
          }
        }
        ?>


      </div>

    </div>
  </div>

</body>

</html>