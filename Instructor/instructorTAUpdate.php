<?php

include('../session.php'); 
if(isset($_POST['update']))
{
    $id = $_GET['Id'];
    $phone = $_POST['phone'];

    $query = "update TA set phone = '".$phone."'
                where id ='".$id."' ";
    $result = mysqli_query($conn,$query);

    if ($result)
    {
        header("location:instructorTutorInfo.php");
    }
    else
    {
        echo 'Please check your query';
    }
}
else
{
    header("location:instructorTutorInfo.php");
}


?>
