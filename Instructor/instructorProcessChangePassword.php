<?php
include('session.php');

$_SESSION["username"];

$conn = mysqli_connect("localhost", "root", "root", "project") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * from users WHERE username='" . $_SESSION["username"] . "'");
    $row = mysqli_fetch_array($result);
if ($_POST["instructorNewPassword"] == $_POST["instructorNewPasswordConfirmation"]) {
    mysqli_query($conn, "UPDATE users SET password='" . $_POST["instructorNewPassword"] . "' WHERE username='" . $_SESSION["username"] . "'");
    header("location:instructorPasswordChangeConfirm.php");
    }
else {
      header("location:instructorPasswordsIncorrect.php");
    }
}
?>