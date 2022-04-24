<?php
// require_once '../partials/database.php';
require_once "../php/config.php";
// require_once '../partials/head-public.php';

// $email_records = $conn->prepare('SELECT *
// FROM gxc55311.z_emails
// JOIN gxc55311.z_users on user_id = email_user_id;
// ');

// $email_records->execute();
session_start();

$user_check = $_SESSION['id'];

$ses_sql = mysqli_query($conn,"select emails.id as email_id, users.username as username, emails.email_subject, emails.email_body, r.username as sender, emails.email_date  from emails join users on emails.recipient = users.id join users r on r.id = emails.sender where recipient = '$user_check' ");

// $email_records = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);



?>
<!DOCTYPE html>
  <html>
  <head>
      <title> Email Inbox</title>
      <link rel="stylesheet" href="../style.css"/>
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
  
    <!-- header -->
    <div class="header1" height="20%" scrolling="no">
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

    <!--menu-->
    <div class="menu1" height="100%" width="150px">
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
                            <th class="col-6">Mail Title</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row_count = 1;
                        while ($row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC)) {
                        ?>

                            <tr>
                                <td>
                                  <?= $row_count ?>
                                </td>
                                <td>
                                  <a href="emailDetails.php?email_id=<?= $row['email_id'] ?>">
                                    <?= $row['email_subject'] ?>
                                  </a>
                                </td>
                                <td><?= $row['sender'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['email_date'] ?></td>
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