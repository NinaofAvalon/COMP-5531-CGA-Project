<?php
   include('../session.php');
   require_once("connection.php");


   $post_id = $_GET["id"];

   if(isset($_POST['submit'])){

     if($conn === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
        }

     //get user Message
     $reply = mysqli_real_escape_string(
        $conn, $_REQUEST['comment']);

        // Attempt insert query execution
        date_default_timezone_set('America/Montreal');
        $date=date('y-m-d h:ia');
        $username = $_SESSION["username"];
        $sql = "INSERT INTO replies (creator,content,creation_date,post_id)
                    VALUES ('$username', '$reply', '$date','$post_id')";
        if(mysqli_query($conn, $sql)){
          //prevent form to be resubmitted multiple times

          header("Location:instructorPostDetails.php?id=$post_id");
          die();
        } else{
            echo "ERROR: Message not sent!!!";
        }

        // Close connection
        mysqli_close($conn);
   }


?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
    <title>Discussion Board</title>
</head>
<body>

    <body>
        <!-- header -->
        <div class="header" height="20%" scrolling="no">
            <table border="0" width="100%">
                <tbody>
                    <tr width="100%">
                        <td width="5%" align="left"><h2>CGA</h2></td>
                        <td align="center"><font size="5"><b>Discussion Board</b></font></td>
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
            <b>
                <font size="4">
                    <i>
                        <?php echo htmlspecialchars($_SESSION["course_name"]); ?><br>
                        Section <?php echo htmlspecialchars($_SESSION["course_section"]); ?>
                    </i>
                </font>
            </b>
            <hr>
            <b>
                <font size="4">
                    <ul>
                        <li>
                            <a href="instructorTutorInfo.php">
                                <b>
                                    <font color="black">Tutor Information</font>
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
                            <a href="instructorStudents.php">
                                <b>
                                    <font color="black">Students</font>
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
                            <a href="instructorGroups.php">
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
                            <a href="instructorDiscussion.php">
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
                            <a href="instructorMarkedEntities.php">
                                <b>
                                    <font color="black">Marked Entities</font>
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
                            <a href="instructorPassword.php">
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
                            <a href="instructorEmail.php">
                                <b>
                                    <font color="black">Change Email</font>
                                </b>
                            </a>
                        </li>
                    </ul>
                </font>
            </b>
        </div>


    <!--Topic Section-->
      <div class="main_home">
        <form class="" action="instructorPostDetails.php?id=<?php echo $post_id ?>"  method="post">


        <div class="topic-container">
          <?php

          $query = "SELECT * FROM discussion_board where id='$post_id'";
          $run = $conn->query($query);
          $row = $run->fetch_array();
           ?>
            <!--Original thread-->
            <div class="head">
                <div class="authors">Author</div>
                <div class="content" name="original_post_title"><?php echo $row['title'];?></div>
            </div>

            <div class="body">
                <div class="authors">
                    <div class="username" name=author><?php echo $row['creator']; ?></div>
                    <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">

                </div>
                <div class="content" name="orignal_post">
                    <?php echo $row['content']; ?>
                    <br>

                </div>
            </div>


            <?php

             $query = "SELECT * FROM replies where post_id='$post_id'";
             $run = $conn->query($query);
             $i=0;
             while($row= $run->fetch_array()) {

             if($i==0){


              ?>
               <!--replies-->

               <div class="body-replies">
                   <div class="authors">
                       <div class="username"><?php echo $row['creator']; ?></div>
                       <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">

                   </div>
                   <div class="content">
                       <?php echo $row['content']; ?>
                       <br>

                   </div>
               </div>

               <?php
             }
           }
                ?>


  </div>


        <!--Comment Area-->
          <div class="comment-area hide" id="comment-area">
              <input type="text" class="reply" name="comment" id="comment" placeholder="reply here ... ">
              <div class="reply-submit">
                <input type="submit" value="Send" name="submit" id="submit">
              </div>

          </div>

        </form>


        </div>


  </body>
</html>