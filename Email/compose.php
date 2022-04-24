<?php
// require_once '../partials/database.php';
require_once "../php/config.php";

session_start();
echo 'php version' . phpversion();
$user_check = $_SESSION['id'];

$ses_sql = mysqli_query($conn,"select * from emails join users on emails.recipient = users.id where recipient = '$user_check' ");
if (!isset($_SESSION['id'])) {
  header('Location: ../../login.php');
}

$message = '';


if (!empty($_POST['sent'])
&& !empty($_POST['subject'])
&& !empty($_POST['body'])) {
    
    // $stmt = $conn->prepare("INSERT INTO new_project.emails(recipient, sender, email_subject, email_body) VALUES (:recipient, :sender, :email_subject, :email_body)");
    $recipient = mysqli_real_escape_string($conn,$_POST['sent']);
    
    $sqlForRecipient = "select * from users where username = '$recipient'";
    $result = mysqli_query($conn, $sqlForRecipient);
    
    $count = mysqli_num_rows($result);
    if($count == 1) {
      $user_id = $_SESSION["id"];
      $sentToRow = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $sentToId = $sentToRow['id'];
      $subjectStr = $_POST['subject'];
      $bodyStr = $_POST['body'];
      date_default_timezone_set('America/New_York');
      $emailDate = date('Y-m-d H:i:s');
      $insertEmail = "INSERT INTO emails(recipient, sender, email_subject, email_body, email_date) VALUES ('$sentToId', '$user_id', '$subjectStr', '$bodyStr', '$emailDate')";
      $resultInsertEmail = mysqli_query($conn, $insertEmail);
      echo $resultInsertEmail;
      header("Location: ./sent.php");
    }
    
    
}




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
            Simulated Inbox For <?php echo htmlspecialchars($_SESSION["username"]); ?> 
        </h1>

        <div class="row mb-4">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">New Message</h5>
                      <form method="POST" action="./compose.php">
                          <div class="form-group">
                              <label for="sent">To:</label>
                              <input type="text" name="sent" class="form-control" id="sent" aria-describedby="sentHelp">
                          </div>
                          <div class="form-group">
                              <label for="subject">Subject</label>
                              <input type="text" name="subject" class="form-control" id="subject" aria-describedby="subjectHelp">
                          </div>
                          <div class="form-group">
                              <label for="body">Body</label>
                              <textarea  type="text" name="body" class="form-control" id="body" aria-describedby="bodyHelp"></textarea>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
        </div>
        



    </div>
    

</body>

</html>
