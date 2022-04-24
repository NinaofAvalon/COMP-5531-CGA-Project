<?php
require_once "../php/config.php";


if(isset($_POST['update'])){
    $id = $_GET['Id'];
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $bday = $_POST['bday'];
    $phone = $_POST['phone'];
    
    $query = "update instructor set first_name = '".$firstname."' ,last_name = '".$lastname."',phone = '".$phone."',birth_date = '".$bday."' where id ='".$id."' ";
    $result = mysqli_query($conn,$query);

    if ($result){
        header("location:adminInstructor.php");
    }
    else{
        echo 'Please check your query';
    }
   
}

else{
    header("location:adminInstructor.php");
}


?>
