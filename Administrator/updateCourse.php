<?phprequire_once "../php/config.php";if(isset($_POST['update'])){    $id = $_GET['Id'];    $coursename = trim($_POST['coursename']);    $instructor = $_POST['instructor'];    $section = trim($_POST['section']);    $term= trim($_POST['term']);    $instructorarr = explode(' ',$instructor);    $fname = $instructorarr[0];    $lname = $instructorarr[1];    $termarr = explode(' ',$term);    $termseason = $termarr[0];    $termyear = $termarr[1];    $nameterm = $coursename.$term;        $query = "select id from instructor where first_name ='".$fname."' and last_name = '".$lname."'";    $result = mysqli_query($conn,$query);    while($row = mysqli_fetch_assoc($result)){                $insid = $row['id'];    }        $uniquequery = "SELECT concat ( course_name, course_term) as 'course_unique'  FROM course GROUP BY id";    $uniqueresult = mysqli_query($conn,$uniquequery);    $check = 0;    while($uniquer = mysqli_fetch_assoc($uniqueresult)){                $eachrow = $uniquer['course_unique'];        if ($eachrow == $nameterm){        $check = $check +1;        }    }    if($check == 0){    $query2 = "update course set course_name = '".$coursename."' ,instructor_id = '".$insid."',course_section = '".$section."',course_term = '".$term."' where id ='".$id."' ";    $result2 = mysqli_query($conn,$query2);    $query3 = "update course_taught set instructor_id = '".$insid."' where course_id ='".$id."' ";    $result2 = mysqli_query($conn,$query2);    if ($result)    {        header("location:adminCourses.php");    }    else    {        echo 'Please check your query';    }            }else{    echo 'Can only have one unique course name in one term';    }    }else{    header("location:adminCourses.php");}?>