<?php

    $stu_id = $_GET['id'];

    include "configue.php";

    $sql = "DELETE  FROM student WHERE sid = {$stu_id}";

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

    
    header("location: http://localhost/MySQL_CRUD/index.php");

    mysqli_close($conn);
?>