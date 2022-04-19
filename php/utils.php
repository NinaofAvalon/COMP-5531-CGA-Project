<?php
function getRoleByUserId($conn, $user_id)
{
    session_start();
    $hasRoles = array();
    $roles = array("student", "ta", "instructor");
    foreach ($roles as $value) {
        $query = "select * from users join " . $value ." as a on users.id = a.user_id where users.id = " . $user_id;
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            array_push($hasRoles, $value);
        }
    }
    return $hasRoles;
}
?>