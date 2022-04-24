<?php

include('../session.php'); 
if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from  uploads where id = '".$id."' ";
    $result = mysqli_query($conn,$query);

    if ($result){
        header("location:instructorMarkedEntities.php");
    }
    else
    {
        echo 'Please check your Query';
    }
}
else
{
    header("location:instructorMarkedEntities.php");
}

?>
