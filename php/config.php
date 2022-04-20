<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'Xw982122');
   define('DB_DATABASE', 'abc');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   // if($conn){
   //   echo "Database connected".mysqli_connect_error();
   // }
?>
