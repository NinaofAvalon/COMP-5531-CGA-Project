<?phprequire_once "../php/config.php";if(isset($_POST['update'])){    $nid = $_GET['Id'];    $valid = $_GET['valid'];    $admin = $_POST['admin'];    $t = $_POST['ptime'];    $content = $_POST['content'];        // notice_id, admin_name, content, posting_time, valid    $query = "update notices set admin_name = '".$admin."',content = '".$content."',posting_time = '".$t."',valid = '".$valid."' where notice_id ='".$nid."' ";    $result = mysqli_query($conn,$query);    if ($result){        header("location:adminNotices.php");    }    else{        echo 'Please check your query';    }   }elseif(isset($_POST['insert'])){    $admin = $_POST['admin'];    $content = $_POST['content'];    $t = $_POST['ptime'];    $valid = $_POST['valid'];    // notice_id, admin_name, content, posting_time, valid       $query2 = "insert into notices(admin_name, content, posting_time, valid) VALUES ('".$admin."',  '".$content."', '".$time."', '".$valid."')";    $result2 = mysqli_query($conn,$query2);    if ($result2){        header("location:adminNotices.php");    }    else{        echo 'Please check your query';    }   }else{    header("location:adminNotices.php");}?>