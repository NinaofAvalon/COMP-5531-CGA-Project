<?phpinclude('../session.php');require_once "../php/config.php";if( isset($_GET['del'])){    $id = $_GET['del'];    $query = "delete from notices where notice_id = '".$id."' ";    $result = mysqli_query($conn,$query);    if ($result){        header("location:adminNotices.php");    }    else    {        echo 'Please check your Query';    }  }elseif(isset($_GET['GetId'])){    $nid = $_GET['GetId'];    $valid = $_GET['valid'];    $query2 = "update notices set valid = '".$valid."' where notice_id = '".$nid."'"  ;    $result2 = mysqli_query($conn,$query2);    if ($result2){        header("location:adminNotices.php");    }    else    {        echo 'Please check your Query';    }}else{    header("location:adminNotices.php");}?>