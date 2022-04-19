<?php

include('../session.php');

require_once "php/config.php";

session_start();

$user_check = $_SESSION['id'];

$ses_sql = mysqli_query($conn,"select users.username as username, emails.email_subject, emails.email_body, r.username as sender from emails join users on emails.recipient = users.id join users r on r.id = emails.sender where recipient = '$user_check' ");

?>

<!DOCTYPE html>
  <html>
  <head>
      <title> Email Inbox</title>
      <link rel="stylesheet" href="style.css"/>
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
  
    <!-- header -->
    <div class="header" height="20%" scrolling="no">
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td width="5%" align="left"><h2>CGA</h2></td>
            <td align="center"><font size="5"><b>Email Inbox</b></font></td>
          </tr>
        </tbody>
      </table>
      <table border="0" width="100%">
        <tbody>
          <tr width="100%">
            <td align="left"><font size="3">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font></td>
            <td align="right">
              <i>
                <b>
                  <a href="welcome.php">
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

    <!--menu-->
    <div class="menu1" height="100%" width="150px">
      <hr>
      <b >
        <font size="4">
          <i>
            COMP 5531/Winter 2022
            <br>
            Email System
          </i>
        </font>
      </b>
      <hr>
      <b>
        <font size="4">
          <ul>
            <li>
              <a href="compose.php">
                <b>
                  <font color="black">Compose</font>
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
              <a href="inbox.php">
                <b>
                  <font color="black">Inbox</font>
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
              <a href="sent.php">
                <b>
                  <font color="black">Sent</font>
                </b>
              </a>
            </li>
          </ul>
        </font>
      </b>

    </div>

    <!-- Main section -->
    <div class="main_home">
        <h1>
            Simulated Inbox For <?php echo htmlspecialchars($_SESSION["username"]); ?> 
        </h1>

        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Recieve From</th>
                            <th>Subject</th>
                            <th>Summary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row_count = 1;
                        while ($row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC)) {
                        ?>

                            <tr>
                                <td><?= $row_count ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['sender'] ?></td>
                                <td><?= $row['email_subject'] ?></td>
                                <td><?= $row['email_body'] ?></td>
                            </tr>
                        <?php
                            $row_count++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

</body>

</html>