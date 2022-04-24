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

// $user_check = $_SESSION['id'];
if (isset($_GET['email_id'])) {
  $user_check = $_GET['email_id'];
}

$result = mysqli_query($conn, "select emails.id, users.username as username, emails.email_subject, emails.email_body, r.username as sender, emails.email_date from emails join users on emails.recipient = users.id join users r on r.id = emails.sender where emails.id = '$user_check' ");
$count = mysqli_num_rows($result);
echo $count;
if ($count == 1) {
  echo "aaa";
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  // header("location: Student/studentCourses.php");
} else {
  $error = "The email id is invalid";
  header("location: inbox.php");
}




// $email_records = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);



?>
<!DOCTYPE html>
<html>

<head>
  <title> Email Inbox</title>
  <link rel="stylesheet" href="../style.css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    .email_table { border-collapse: collapse; width: 100%; height: 80%}
    .email_tr { display: block; float: left; }
    .emil_th, .email_td { display: block; border: 1px solid black; }
    .table_value {width: 80%;}
    .content_height {height: 50%;}
  </style>
</head>

<body>

  <!-- header -->
  <div class="header1" height="20%" scrolling="no">
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td width="5%" align="left">
            <h2>CGA</h2>
          </td>
          <td align="center">
            <font size="5"><b>Email Inbox</b></font>
          </td>
        </tr>
      </tbody>
    </table>
    <table border="0" width="100%">
      <tbody>
        <tr width="100%">
          <td align="left">
            <font size="3">Welcome, <?php echo "ddd"; ?> <?php echo htmlspecialchars($_SESSION["username"]); ?>! <?php echo "Today is " . date("Y-m-d") . "<br>"; ?></font>
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

  <!-- Main section -->
  <div class="main_home">
    <h1>
      <?php echo htmlspecialchars($_SESSION["username"]); ?> Email:
    </h1>

    <table class="email_table">
      <tr class="email_tr">
        <th class="emil_th text-right">Date: </th>
        <th class="emil_th text-right">From: </th>
        <th class="emil_th text-right">To: </th>
        <th class="emil_th text-right">Subject: </th>
        <th class="emil_th text-right content_height">Content: </th>
      </tr>
      <tr class="email_tr table_value  h-100">
        <th class="emil_th"><?= $row['email_date'] ?> </th>
        <th class="emil_th"><?= $row['sender'] ?> </th>
        <th class="emil_th"><?= $row['username'] ?> </th>
        <th class="emil_th"><?= $row['email_subject'] ?> </th>
        <th class="emil_th content_height my-auto"><div class="align-middle"><?= $row['email_body'] ?></div></th>
      </tr>
    </table>

    
  </div>


</body>

</html>
