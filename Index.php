<?php

// include config file
require_once "php/config.php";
session_start();

//processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  $sql = "SELECT id FROM users WHERE username = '$username'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];

  $count = mysqli_num_rows($result);

  if($count == 1) {
         session_start();
         $_SESSION["username"] = $username;

         header("location: Student/studentCourses.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
  ?>
  <!DOCTYPE html>
  <html>
  <head>
      <title> Log In</title>
      <link rel="stylesheet" href="style.css"/>

  </head>

  <body>
      <br>
      <br>
      <br>
      <table border="0" width="100%">
        <tbody>
          <tr>
            <td align="center">
              <h1>CGA</h1>
            </td>
          </tr>
          <tr>
            <td>
              <br>
            </td>
          </tr>
          <tr bgcolor="#B7CADB">
            <td align="center">
              <b>
                <font size="5">
                  "Welcome to CGA -- The CrsMgr Group-Work Assistant!"
                </font>
              </b>
            </td>
          </tr>
        </tbody>
      </table>

      <br>
      <br>


        <section class="form login">
          <form action=" " method="post">
            <table border="0" align="center">
            <tbody
              <tr>
                <td>
                  <b>User Name:</b>
                </td>
                <td>
                  <input type="text" name="username" maxlength="20" size="20" required>
                </td>
              </tr>
              <tr>
                <td>
                  <b>Password:</b>
                </td>
                <td>
                  <input type="password" name=password maxlength="20" maxlength="20" required>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="submit_button">
                  <input type="submit" value="Login">
                  <input type="reset" value="Clear">

                </td>
              </tr>
              <tr>
                <td colspan="2"><br></td>
              </tr>
              <tr>
                <td align="center" colspan="2">
                  <a href="get_password.php">Forgot Password?</a>
                </td>
              </tr>
            </tbody>
            </table>
            <br>
          </form>
          </section>
          </body>

  </html>
