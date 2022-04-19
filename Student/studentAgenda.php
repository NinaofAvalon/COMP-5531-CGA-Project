<?php
   include('../session.php');
   require('../php/calendarFunction.php');

   $month = date('M');
   $numericalMonth = numericalMonth($month);
   $year = date('Y');
   $group_id = $_SESSION['group_id'];



   if(isset($_GET['submit'])){

     if($conn === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
        }
     //get user Message
     $month = mysqli_real_escape_string(
        $conn, $_REQUEST['calendar__month']);
        $numericalMonth = numericalMonth($month);

      $year = mysqli_real_escape_string(
           $conn, $_REQUEST['calendar__year']);
   }


   if(isset($_POST['submit'])){

     if($conn === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
        }

     //get event details
     $event_title = mysqli_real_escape_string(
        $conn, $_REQUEST['event_title']);

    $event_description = mysqli_real_escape_string(
        $conn, $_REQUEST['description']);

    $start_time = mysqli_real_escape_string(
          $conn, $_REQUEST['start-time']);

      $end_time = mysqli_real_escape_string(
            $conn, $_REQUEST['end-time']);

      $month  = mysqli_real_escape_string(
            $conn, $_REQUEST['month-number']);

      $day = mysqli_real_escape_string(
            $conn, $_REQUEST['day-number']);


        // Attempt insert query execution
        $username = $_SESSION["username"];
        $sql = "INSERT INTO events (event_title,start_time,end_time,description,group_id,monthNumber,dayNumber)
                    VALUES ('$event_title', '$start_time', '$end_time','$event_description', '$group_id','$month','$day')";
        if(mysqli_query($conn, $sql)){
          //prevent form to be resubmitted multiple times
          header("Location:studentAgenda.php");
          die();
        } else{
            echo "ERROR: Message not sent!!!";
        }

        // Close connection
        mysqli_close($conn);
   }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style><?php include '../style.css'; ?></style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="function.js"></script>

  </head>
  <body>





    <!-- header -->
    <div class="header" height="20%" scrolling="no">
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td width="5%" align="left"><h2>CGA</h2></td>
            <td align="center"><font size="5"><b>Agenda</b></font></td>
          </tr>
        </tbody>
      </table>
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td align="left"><font class="font-header" size="3">Welcome, <?php
            echo htmlspecialchars($_SESSION["username"]); ?> ! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font></td>
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



<form class="" action="studentAgenda.php" method="get">

<div align='center' class="dropdown-agenda">
  <div class="inline">
  <div class="calendar__opts">
   <select name="calendar__month" id="calendar__month">
     <option <?=$numericalMonth==1?'selected="selected"':'';?>>Jan</option>
     <ption <?=$numericalMonth==2?'selected="selected"':'';?>>Feb</option>
     <option <?=$numericalMonth==3?'selected="selected"':'';?>>Mar</option>
     <option <?=$numericalMonth==4?'selected="selected"':'';?>>Apr</option>
     <option <?=$numericalMonth==5?'selected="selected"':'';?>>May</option>
     <option <?=$numericalMonth==6?'selected="selected"':'';?>>Jun</option>
     <option <?=$numericalMonth==7?'selected="selected"':'';?>>Jul</option>
     <option <?=$numericalMonth==8?'selected="selected"':'';?>>Aug</option>
     <option <?=$numericalMonth==9?'selected="selected"':'';?>>Sep</option>
     <option <?=$numericalMonth==10?'selected="selected"':'';?>>Oct</option>
     <option <?=$numericalMonth==11?'selected="selected"':'';?>>Nov</option>
     <option <?=$numericalMonth==12?'selected="selected"':'';?>>Dec</option>
   </select>

<select name="calendar__year" id="calendar__year">
    <option>2022</option>

</select>

<button type="submit" name="submit">Go</button>
  </div>

</div>

</div>


</form>

<?php
/* sample usages */
echo draw_calendar($numericalMonth,$year);


 ?>

<!-- pop-up form -->

<!--Home page popup button-->

    <!--popup box-->
    <div class="center modal-box">
      <!--cancle button-->
      <div class="fas fa-times"></div>

<!--Event form-->
    <div class="form_container">
     <form name="form" action="studentAgenda.php" method="post">

       <!-- event title input box-->
       <div class="form_wrap form_grp">
          <div class="form_item">
              <label>Event Name</label>
              <input type="text" name="event_title">
          </div>
      </div>

      <!--Description of the event-->
      <div class="form_wrap form_grp">
          <div class="form_item">
              <label>Description</label>
              <input type="text" name="description">
          </div>
      </div>
      <!-- day -->
      <div class="form_wrap form_grp">
          <div class="form_item">

            <script >
            var day_value ="hello";
            $(document).on("click", ".day-number", function(e){

            day_value = $(this).text();
            console.log(day_value);
            document.getElementById("day_value").value = day_value;
          });

            </script>
              <input id="month_value" type="hidden" name="month-number" value=<?php echo $numericalMonth ?>>
              <input id="day_value" type="hidden" name="day-number">
          </div>
      </div>
      <!--city name input-->
      <div class="form_wrap">
          <div class="form_item">
              <label>Start</label>
              <select name="start-time">
                  <option>00:00</option>
                  <option>00:30</option>
                  <option>01:00</option>
                  <option>01:30</option>
                  <option>02:00</option>
                  <option>02:30</option>
                  <option>03:00</option>
                  <option>03:30</option>
                  <option>04:00</option>
                  <option>04:30</option>
                  <option>05:00</option>
                  <option>05:30</option>
                  <option>06:00</option>
                  <option>06:30</option>
                  <option>07:00</option>
                  <option>07:30</option>
                  <option>08:00</option>
                  <option>08:30</option>
                  <option>09:00</option>
                  <option>09:30</option>
                  <option>10:00</option>
                  <option>10:30</option>
                  <option>11:00</option>
                  <option>11:30</option>
                  <option>12:00</option>
                  <option>12:30</option>
                  <option>13:00</option>
                  <option>13:30</option>
                  <option>14:00</option>
                  <option>14:30</option>
                  <option>15:00</option>
                  <option>15:30</option>
                  <option>16:00</option>
                  <option>16:30</option>
                  <option>17:00</option>
                  <option>17:30</option>
                  <option>18:00</option>
                  <option>19:30</option>
                  <option>20:00</option>
                  <option>20:30</option>
                  <option>21:00</option>
                  <option>21:30</option>
                  <option>22:00</option>
                  <option>22:30</option>
                  <option>23:00</option>
                  <option>23:30</option>
              </select>

              <label>End</label>
              <select name="end-time">
                  <option>00:00</option>
                  <option>00:30</option>
                  <option>01:00</option>
                  <option>01:30</option>
                  <option>02:00</option>
                  <option>02:30</option>
                  <option>03:00</option>
                  <option>03:30</option>
                  <option>04:00</option>
                  <option>04:30</option>
                  <option>05:00</option>
                  <option>05:30</option>
                  <option>06:00</option>
                  <option>06:30</option>
                  <option>07:00</option>
                  <option>07:30</option>
                  <option>08:00</option>
                  <option>08:30</option>
                  <option>09:00</option>
                  <option>09:30</option>
                  <option>10:00</option>
                  <option>10:30</option>
                  <option>11:00</option>
                  <option>11:30</option>
                  <option>12:00</option>
                  <option>12:30</option>
                  <option>13:00</option>
                  <option>13:30</option>
                  <option>14:00</option>
                  <option>14:30</option>
                  <option>15:00</option>
                  <option>15:30</option>
                  <option>16:00</option>
                  <option>16:30</option>
                  <option>17:00</option>
                  <option>17:30</option>
                  <option>18:00</option>
                  <option>19:30</option>
                  <option>20:00</option>
                  <option>20:30</option>
                  <option>21:00</option>
                  <option>21:30</option>
                  <option>22:00</option>
                  <option>22:30</option>
                  <option>23:00</option>
                  <option>23:30</option>
              </select>
          </div>
      </div>

      <!--submit button-->
      <div class="btn">
        <input type="submit" name="submit" value="Add Event">
      </div>
     </form>
   </div>
  </div>

  <h3>Meetings: </h3>

  <?php
  $query = "SELECT * FROM events WHERE group_id = $group_id and monthNumber=$numericalMonth";
  $run = $conn->query($query);
  while($row= $run->fetch_array()) {
  $slash = "/";

  ?>
  <h4><?php echo $row['monthNumber']; echo $slash; echo $row['dayNumber']; ?></h4>
    <div>
      <span>Title: </span>
      <span><?php echo $row['event_title']; ?></span>
    </div>

    <div>
      <label>Time: </label>
      <span><?php echo $row['start_time']; ?></span>
      <span>-</span>
      <span><?php echo $row['end_time']; ?></span>
    </div>
    <div class="">
      <label>Description: </label>
      <span><?php echo $row['description']; ?></span>
    </div>

    <br>


<?php
}

 ?>













  </div>

  </body>
</html>
