<?php

    $stu_name = $_POST['sname'];
    $stu_address = $_POST['saddress'];
    $stu_class = $_POST['class'];
    $stu_phone = $_POST['sphone'];

    $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Failed");

    $sql = "insert into student(sname, saddress, sclass, sphone) values ('{$stu_name}', '{$stu_address}', '{$stu_class}', '{$stu_phone}')";

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

    header("location: http://localhost/MySQL_CRUD/index.php");

    mysqli_close($conn);

?>